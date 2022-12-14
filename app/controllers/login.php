<?php

namespace App\Controller;

use App\Core\Controller;
use App\Model\User;

class Login extends Controller
{
    public function index()
    {
        // Display the login form and process user input
        if(isset($_POST['action']))
        {
            $user = $this->model('User')->find_username($_POST['username']);
            if($user != null && password_verify($_POST['password'], $user->password_hash))
            {
                setcookie('user_id', $user->user_id, time() + (86400 * 30), "/");
                setcookie('username', $user->username, time() + (86400 * 30), "/");
                header('location:/home/index');
            }
            $this->view('login/index', 'Incorrect username/password combination!');
        }
        else
        {
            $this->view('login/index');
        }
    }

    public function register()
    {
        // Display the register form and process new registration
        if(isset($_POST['action']))
        {
            $new_user = $this->model('User');
            $user = $new_user->find_username($_POST['username']);
            if($user == null && $_POST['password'] == $_POST['password_confirm'])
            {
                $new_user->username = $_POST['username'];
                $new_user->password_hash = password_hash($_POST['password'], PASSWORD_DEFAULT);
                $new_user->create_user();
                header('location:/login/index');
            }
            $this->view('login/register', 'Username already in use or passwords did not match!');
        }
        else
        {
            $this->view('login/register');
        }
    }

    public function logout()
    {
        // Process logout requests
        setcookie('user_id', NULL, 0, "/");
        setcookie('username', NULL, 0, "/");
        header('location:/login/index');
    }
}
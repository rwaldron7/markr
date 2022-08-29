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
            $the_user = $this->model('User')->find_user($_POST['username']);
            if($the_user != null && password_verify($_POST['password'], $the_user->password_hash))
            {
                $_SESSION['user_id'] = $the_user->user_id;
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
            $the_user = $new_user->find_user($_POST['username']);
            if($the_user == null && $_POST['password'] == $_POST['password_confirm'])
            {
                $new_user->username = $_POST['username'];
                $new_user->password_hash = password_hash($_POST['password'], PASSWORD_DEFAULT);
                $new_user->create();
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
        session_destroy();
        header('location:/login/index');
    }
}
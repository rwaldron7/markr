<?php

namespace App\Controller;

use App\Core\Controller;
use App\Model\User;

class Home extends Controller
{
    // Default method. Calls model and view for home/index. At the moment, just gets all users and prints to home view.
    public function index()
    {
        echo "Home/index is being called";
        $users = $this->model('User')->get();
        echo "Got past the get method";
        $this->view('/home/index', $users);
    }

    // Takes a post action, and creates a new user in the database
    public function new()
    {
        if(isset($_POST['action']))
        {
            $new_user = $this->model('User');
            $new_user->username = $_POST['name'];
            $new_user->create();
            header('location:/home/index');
        }
        else{
            $this->view('/home/new');
        }
    }

    public function detail($user_id)
    {
        $the_item = $this->model('User')->find($user_id);
        $this->view('home/detail', $the_item);
    }
}

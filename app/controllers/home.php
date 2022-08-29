<?php

namespace App\Controller;

use App\Core\Controller;
use App\Model\Item;

class Home extends Controller
{
    
    
    // Default method. Calls model and view for home/index. At the moment, just gets all users and prints to home view.
    public function index()
    {
        if ($_SESSION['user_id'] == null)
        {
            header('location:/login/index');
            return;
        }
        $users = $this->model('Item')->get();
        $this->view('/home/index', $users);
    }

    // Takes a post action, and creates a new user in the database
    public function new()
    {
        if ($_SESSION['user_id'] == null)
        {
            header('location:/login/index');
            return;
        }
        if(isset($_POST['action']))
        {
            $new_user = $this->model('Item');
            $new_user->username = $_POST['username'];
            $new_user->create();
            header('location:/home/index');
        }
        else{
            $this->view('/home/new');
        }
    }

    // View detail of user with user_id
    public function detail($user_id)
    {
        if ($_SESSION['user_id'] == null)
        {
            header('location:/login/index');
            return;
        }
        $the_item = $this->model('Item')->find($user_id);
        $this->view('home/detail', $the_item);
    }

    public function edit($user_id)
    {
        if ($_SESSION['user_id'] == null)
        {
            header('location:/login/index');
            return;
        }
        $the_item = $this->model('Item')->find($user_id);
        if(isset($_POST['action']))
        {
            $the_item->username = $_POST['username'];
            $the_item->update();
            header('location:/home/index');
        }
        else
        {
            $this->view('/home/edit', $the_item);
        }
    }

    public function delete($user_id)
    {
        if ($_SESSION['user_id'] == null)
        {
            header('location:/login/index');
            return;
        }
        $the_item = $this->model('Item')->find($user_id);
        if(isset($_POST['action']))
        {
            $the_item->remove();
            header('location:/home/index');
        }
        else{
            $this->view('/home/delete', $the_item);
        }
    }
}


<?php

class Home extends Controller
{
    public function index($name = '')
    {
        $user = $this->model('User');
        $user->name = $name;
        $this->view('home/index', ['name'=>$user->name]);
    }

    public function create($username = '', $email = '') 
    {
        User::create([
            'username' => $username,
            'email' => $email
        ]);
    }

    public function delete($username = '', $email = '') 
    {
        $user = User::find(2);
        $user->delete();
    }
}
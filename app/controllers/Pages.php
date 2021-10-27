<?php

class Pages extends Controller
{
    public $id;
    public function __construct()
    {
        $this->userModel = $this->model('User');
    }
    //////////////////////////////////////////////////////////////////////////////////////////////
    public function adminPage()
    {
        if (isset($_GET['delete'])) {
            $delete = new User();
            $delete->deleteUser();
            header('location:' . URLROOT . 'pages/adminpage');
        }

        if (isset($_GET['edit'])) {
            $users = $this->userModel->getName();
            $this->view('edit', $users);
        }
        if (isset($_POST['update'])) {
            $edit = new User();
            $edit->editUser();
            header('refresh:0');
        }
        $users = $this->userModel->getUsers();
        $data = [
            'users' => $users,
        ];
        $this->view('adminpage', $data);
    }
    ////////////////////////////////////////////////////////////////////////////////////////////////
    public function create()
    {
        if (isset($_POST['submit'])) {
            $user = new User();
            $user->createUser();
            echo 'done';
        }
        $this->view('create');
    }
    ///////////////////////////////////////////////////////////////////////////////////////////////////////
    public function index()
    {
        if (isset($_POST['submit'])) {
            $login = new User();
            $login->userLogin();
        }


        $this->view('index');
    }
    ////////////////////////////////////////////////////////////////////////////////////////////////////

    public function signup()
    {
        if (isset($_POST['submit'])) {
            $signUp = new User();
            $signUp->userSignup();
            echo 'done';
        }
        $this->view('signup');
    }

    public function logout()
    {
        session_unset();
        session_destroy();
        header("Location: " . URLROOT);
    }

    public function userPage()
    {
        $this->view('userpage');
    }

    // /////////////////////////////////////////////////////////////////////////////////////////
}

<?php

require_once __DIR__ . "/../libraries/Controller.php";
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
            echo '<div class="alert alert-primary" role="alert">
            user edited successfully!
             </div>';
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
            $this->addUser($_POST['name'], $_POST['type'], $_POST['email'], $_POST['password']);
            // $user = new User();
            // $user->createUser();
            echo '<div class="alert alert-primary" role="alert">
            user created successfully!
             </div>';
        }
        // $this->view('create');
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
            echo '<div class="alert alert-primary" role="alert">
            signed up successfully!
             </div>';
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
    public function addUser($name, $type, $password, $email)
    {
        $user = new User();
        $user->createUser($name, $type, $email, $password);
        return (true);
    }
}

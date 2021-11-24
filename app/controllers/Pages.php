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
    public function adminPage($id)
    {
        if (isset($_GET['delete'])) {
            $this->userDelete($_GET['delete']);
            header('location:' . URLROOT . 'pages/adminpage');
        }


        if (isset($_GET['edit'])) {
            $users = $this->userModel->getName();
            $this->view('edit', $users);
        }
        if (isset($_POST['update'])) {
            $this->userEdit($_POST['update']);
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
            echo '<div class="alert alert-primary" role="alert">
            user created successfully!
             </div>';
        }
        $this->view('create');
    }
    ///////////////////////////////////////////////////////////////////////////////////////////////////////
    public function index()
    {
        if (isset($_POST['submit'])) {
            $this->userLogin($_POST['email'], $_POST['password']);
        }
        $this->view('index');
    }
    ////////////////////////////////////////////////////////////////////////////////////////////////////

    public function signup()
    {
        if (isset($_POST['submit'])) {
            $this->userSignup($_POST['name'], $_POST['email'], $_POST['password']);
            echo '<div class="alert alert-primary" role="alert">
            signed up successfully!
             </div>';
        }
        // $this->view('signup');
    }

    public function logout()
    {
        session_unset();
        session_destroy();
        header("Location: " . URLROOT);
    }

    public function userPage()
    {
        return $this->view('userpage');
    }

    ////////////////////////////////////////////////////////////////////////////////////////////
    public function addUser($name, $email, $password)
    {
        $user = new User();
        return $user->createUser($name, $email, $password);
    }

    public function userSignup($name, $email, $password)
    {
        $signUp = new User();
        return $signUp->userSignup($name, $email, $password);
    }

    public function userDelete($id)
    {
        $delete = new User();
        return $delete->deleteUser($id);
    }

    public function userEdit($id, $name,)
    {
        $edit = new User();
        return $edit->editUser($id, $name);
    }

    public function userLogin($email, $password)
    {
        $login = new User();
        return $login->chechUser($email, $password);
    }
}

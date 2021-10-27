<?php

class User
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    ///////////////////////////////////////////////////////////////////////////////////////////////////
    //Test (database and table needs to exist before this works)
    public function getUsers()
    {
        $this->db->query(" SELECT * FROM users ");
        $result = $this->db->resultSet();
        return $result;
    }
    ///////////////////////////////////////////////////////////////////////////////////////////////////
    public function getUserData()
    {
        $id = $_GET['edit'];
        $this->db->query(" SELECT * FROM users WHERE user_id = $id ");

        $result = $this->db->resultSet();

        return $result;
    }
    /////////////////////////////////////////////////////////////////////////////////////////////////
    public function userSignup()
    {
        $this->db->query("INSERT INTO users (user_name,type,user_email,password)
        VALUES ('" . $_POST['name'] . "','user','" . $_POST['email'] . "','" . $_POST['password'] . "')");
        $this->db->execute();
        echo 'done';
    }
    /////////////////////////////////////////////////////////////////////////////////////////////
    public function userLogin()
    {

        $eamil = $_POST['email'];
        $password = $_POST['password'];
        $this->db->query(" SELECT * FROM users WHERE user_email=:email AND password=:password");
        $this->db->bind("email", $eamil);
        $this->db->bind('password', $password);
        $this->db->execute();
        $result = $this->db->single();

        if ($result) {
            $_SESSION['user'] = $result;

            if ($result->type === 'user') {
                header('location:' . URLROOT . 'pages/userpage');
            } elseif ($result->type === 'admin') {
                header('location:' . URLROOT . 'pages/adminpage');
            } else {
                echo 'you didnt register in the site ( not user or admin)';
            }
        } else {
            echo '<div class="alert alert-danger" role="alert"><center>email or
             password is wrong please try again</center></div>';
        }
    }
    ///////////////////////////////////////////////////////////////////////////////////////////////////

    public function createUser()
    {
        $this->db->query("INSERT INTO users (user_name,type,user_email,password)
        VALUES ('" . $_POST['name'] . "','user','" . $_POST['email'] . "','" . $_POST['password'] . "')");
        $this->db->execute();
    }
    ///////////////////////////////////////////////////////////////////////////////////////////////////

    public function editUser()
    {
        $name = $_POST['name'];
        $this->db->query(" UPDATE users  SET user_name='$name'  WHERE user_id=" . $_GET['edit']);
        $this->db->execute();
    }
    ///////////////////////////////////////////////////////////////////////////////////////////////////

    public function deleteUser()
    {
        $id = $_GET['delete'];
        $this->db->query("DELETE FROM users WHERE user_id =:id ");
        $this->db->bind(':id', $id);
        $this->db->execute();
    }
    ///////////////////////////////////////////////////////////////////////////////////////////////////
    public function getName()
    {
        $id = $_GET['edit'];
        $this->db->query(" SELECT * FROM users WHERE user_id = $id ");
        $result = $this->db->resultSet();

        return $result;
    }
}

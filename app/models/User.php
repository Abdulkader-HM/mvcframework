<?php

class User
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    ///////////////////////////////////////////////////////////////////////////////////////////////////
    //Test (database and table needs to exist before this works)
    public function getUsers()
    {
        $this->db->query(" SELECT * FROM users WHERE type='user' ");
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
    public function userSignup($name, $email, $password)
    {
        $this->db->query("INSERT INTO users (user_name,type,user_email,password)
        VALUES ('$name','user','$email','$password')");
        return $this->db->execute();
    }
    /////////////////////////////////////////////////////////////////////////////////////////////
    public function userLogin($email, $password)
    {

        // $eamil = $_POST['email'];
        // $password = $_POST['password'];
        $result = $this->chechUser($email, $password);

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

    public function createUser($name, $email, $password)
    {
        $this->db->query("INSERT INTO users (user_name,type,user_email,password)
        VALUES ('$name','user','$email','$password')");
        return $this->db->execute();
    }
    ///////////////////////////////////////////////////////////////////////////////////////////////////
    public function editUser($id, $name)
    {
        // $name = $_POST['name'];
        $this->db->query(" UPDATE users  SET user_name='$name'  WHERE user_id=$id");
        return $this->db->execute();
    }
    ///////////////////////////////////////////////////////////////////////////////////////////////////

    public function deleteUser($id)
    {
        // $id = $_GET['delete'];
        $this->db->query("DELETE FROM users WHERE user_id =:id ");
        $this->db->bind(':id', $id);
        return $this->db->execute();
    }
    ///////////////////////////////////////////////////////////////////////////////////////////////////
    public function getName()
    {
        $id = $_GET['edit'];
        $this->db->query(" SELECT * FROM users WHERE user_id = $id ");
        $result = $this->db->resultSet();

        return $result;
    }

    public function chechUser($email, $password)
    {
        $this->db->query(" SELECT * FROM users WHERE user_email=:email AND password=:password");
        $this->db->bind("email", $email);
        $this->db->bind('password', $password);
        $this->db->execute();
        return $this->db->single();

    }
}

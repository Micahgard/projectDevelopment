<?php
include_once ("DB.php");

class Administrator
{
    public $id;
    public $username;
    private $password;
    public $email;
    public $phone;
    public $role;
    private $conn;

    public function __construct()
    {
        $this->conn = (new DB())->conn;
    }

//  check username and password for this administrator login
    public function login($username, $password)
    {
        //1. check if the username exists
        $query = "select * from Admin where username = '$username'";
        //echo $query;
        $result = mysqli_query($this->conn, $query);
        if ($result->num_rows == 1) { //2. if the username exists, check the password
            while ($row = $result->fetch_assoc()) {
                if ($row['password'] == $password) {
                    //3. if username and password are correct, I set information to this administrator login
                    $this->id = $row['id'];
                    $this->username = $username;
                    $this->password = $password;
                    $this->email = $email;
                    $this->phone = $phone;
                    $this->role = $role;
                }
            }
        }
    }
}
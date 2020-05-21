<?php


class Student
{
    public $id;
    public $name;
    public $username;
    public $password;
    public $dbconn;

    public function  __construct($id, $name, $username, $password)
    {
        $this->id = $id;
        $this->name = $name;
        $this->username = $username;
        $this->password = $password;
        //

    }
    public  function save(){
        //if I don't have this object in my database, I will register him first
        $this->dbconn = (new DB())->conn ;
    }

    public function edit(){

    }

    public function delete(){

    }
}
<?php


class Allocation
{
    public $id;
    public $fee;
    public $role;
    public $dbconn;

    public function  __construct($id, $fee, $role)
    {
        $this->id = $id;
        $this->fee = $fee;
        $this->role = $role;
        //
    }
    public  function save(){
        //if I don't have this object in my database, I will register him first
        $this->dbconn = (new DB())->conn ;
        if (is_null($this->id)){
            $query = "insert into Allocation values (null, '$this->fee', '$this->role')";
            echo $query;
            mysqli_query($this->dbconn, $query);
        }else{
            $query = "Update Allocation SET name = '$this->fee' where id = $this->id";
            mysqli_query($query);
        }

    }
}
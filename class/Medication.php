<?php


class Medication
{
    public $id;
    public $name;
    public $cost;
    public $dbconn;

    public function  __construct($id, $name, $cost)
    {
        $this->id = $id;
        $this->name = $name;
        $this->cost = $cost;
        //
    }
    public  function save(){
        //if I don't have this object in my database, I will register him first
        $this->dbconn = (new DB())->conn ;
        if (is_null($this->id)){
            $query = "insert into Medication values (null, '$this->name', '$this->cost')";
            echo $query;
            mysqli_query($this->dbconn, $query);
        }else{
            $query = "Update Medication SET name = '$this->name' where id = $this->id";
            mysqli_query($query);
        }

    }
}
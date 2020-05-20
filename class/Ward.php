<?php


class Ward
{
    public $id;
    public $name;
    public $location;
    public $capacity;
    public $dbconn;

    public function  __construct($id, $name, $location, $capacity)
    {
        $this->id = $id;
        $this->name = $name;
        $this->location = $location;
        $this->capacity = $capacity;
        //
    }
    public  function save(){
        //if I don't have this object in my database, I will register him first
        $this->dbconn = (new DB())->conn ;
        if (is_null($this->id)){
            $query = "insert into Ward values (null, '$this->name', '$this->location', '$this->capacity')";
            echo $query;
            mysqli_query($this->dbconn, $query);
        }else{
            $query = "Update Ward SET name = '$this->name' where id = $this->id";
            mysqli_query($query);
        }

    }
}
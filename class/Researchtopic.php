<?php


class Researchtopic
{
    public $id;
    public $description;
    public $level;
    public $dbconn;

    public function  __construct($id, $description, $level)
    {
        $this->id = $id;
        $this->description= $description;
        $this->level = $level;
        //
    }
    public  function save(){
        //if I don't have this object in my database, I will register him first
        $this->dbconn = (new DB())->conn ;
        if (is_null($this->id)){
            $query = "insert into Researchtopic values (null, '$this->description', '$this->level')";
            echo $query;
            mysqli_query($this->dbconn, $query);
        }else{
            $query = "Update Researchtopic SET name = '$this->description' where id = $this->id";
            mysqli_query($query);
        }

    }
}
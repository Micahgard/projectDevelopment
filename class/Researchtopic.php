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
        }
        $this->dbconn->close();
    }
    public function update(){
        $this->dbconn = (new DB())->conn ;
        if (is_null($this->id)){
            $query = "UPDATE Researchtopic SET description='$this->description', level='$this->level' WHERE WardID=$this->id";
            mysqli_query($this->dbconn, $query);
        }
        $this->dbconn->close();
    }
    public function delete(){
        $this->dbconn = (new DB())->conn ;
        if (is_null($this->id)){
            $query = "DELETE FROM Researchtopic WHERE ResearchtopicID=$this->>id";
            mysqli_query($this->dbconn, $query);
        }
        $this->dbconn->close();
    }
}
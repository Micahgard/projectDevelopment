<?php
/**
 * Author: Joel
 * Date: 26/05/2020
 * Version: 1.1
 * Purpose: class for ward
 */
include_once "DB.php";
class Ward
{
    public $id;
    public $name;
    public $location;
    public $capacity;
    public $dbconn;

    public function __construct($id, $name, $location, $capacity)
    {
        $this->id = $id;
        $this->name = $name;
        $this->location = $location;
        $this->capacity = $capacity;
    }
    public function save(){
        $this->dbconn = (new DB())->conn ;
        if (is_null($this->id)){
            $query = "insert into Ward values (null, '$this->name', '$this->location', $this->capacity)";
            mysqli_query($this->dbconn, $query);
        }
        $this->dbconn->close();
    }

    public function update(){
        $this->dbconn = (new DB())->conn ;
        if (!is_null($this->id)){
            $query = "UPDATE Ward SET name='$this->name', location='$this->location', capacity=$this->capacity WHERE WardID=$this->id";
            mysqli_query($this->dbconn, $query);
        }
        $this->dbconn->close();
    }

    public function delete(){
        $this->dbconn = (new DB())->conn ;
        if (!is_null($this->id)){
            $query = "DELETE FROM Ward WHERE WardID=$this->id";
            mysqli_query($this->dbconn, $query);
        }
        $this->dbconn->close();
    }
}
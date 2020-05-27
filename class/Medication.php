<?php
/**
 * Author: Joel
 * Date: 27/05/2020
 * Version: 1.1
 * Purpose: class for medication
 */
include_once "DB.php";
class Medication
{
    public $id;
    public $name;
    public $cost;
    public $dbconn;

    public function __construct($id, $name, $cost)
    {
        $this->id = $id;
        $this->name = $name;
        $this->cost = $cost;
    }

    public function save(){
        //if I don't have this object in my database, I will register him first
        $this->dbconn = (new DB())->conn ;
        if (is_null($this->id)){
            $query = "insert into Medication values (null, '$this->name', $this->cost)";
            mysqli_query($this->dbconn, $query);
        }
        $this->dbconn->close();
    }

    public function update(){
        $this->dbconn = (new DB())->conn ;
        if (!is_null($this->id)){
            $query = "UPDATE Medication SET name='$this->name', cost=$this->cost WHERE MedicationID=$this->id";
            mysqli_query($this->dbconn, $query);
        }
        $this->dbconn->close();
    }

    public function delete(){
        $this->dbconn = (new DB())->conn ;
        if (!is_null($this->id)){
            $query = "DELETE FROM Medication WHERE MedicationID=$this->id";
            mysqli_query($this->dbconn, $query);
        }
        $this->dbconn->close();
    }
}
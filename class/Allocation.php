<?php
/**
 * Author: Joel
 * Updated: Micah
 * Date: 27/05/2020
 * Version: 1.2
 * Purpose: class for allocation
 */
include_once "DB.php";
class Allocation
{
    public $id;
    public $fee;
    public $role;
    public $doctorid;
    public $admissionid;
    public $dbconn;


    public function __construct($id, $fee, $role, $doctorid, $admissionid)
    {
        $this->id = $id;
        $this->fee = $fee;
        $this->role = $role;
        $this->doctorid = $doctorid;
        $this->admissionid = $admissionid;
    }

    public function save(){
        //if I don't have this object in my database, I will register him first
        $this->dbconn = (new DB())->conn ;
        if (is_null($this->id)){
            $query = "insert into Allocation values (null, '$this->fee', '$this->role', '$this->doctorid', '$this->admissionid')";
            mysqli_query($this->dbconn, $query);
        }
        $this->dbconn->close();
    }

    public function update(){
        $this->dbconn = (new DB())->conn ;
        if (!is_null($this->id)){
            $query = "UPDATE Allocation SET fee='$this->fee', role='$this->role', doctorID='$this->doctorid', admissionID='$this->admissionid' WHERE AllocationID=$this->id";
            mysqli_query($this->dbconn, $query);
        }
        $this->dbconn->close();
    }

    public function delete()
    {
        $this->dbconn = (new DB())->conn;
        if (!is_null($this->id)) {
            $query = "DELETE FROM Allocation WHERE AllocationID=$this->id";
            mysqli_query($this->dbconn, $query);
        }
        $this->dbconn->close();
    }

}
<?php
/**
 * Author: Joel
 * Updated: Micah
 * Date: 27/05/2020
 * Version: 1.2
 * Purpose: class for prescription
 */
include_once "DB.php";
class Prescription
{
    public $id;
    public $prescriptiondate;
    public $amount;
    public $admissionid;
    public $medicationid;
    public $dbconn;

    public function __construct($id, $prescriptiondate, $amount, $admissionid, $medicationid)
    {
        $this->id = $id;
        $this->prescriptiondate = $prescriptiondate;
        $this->amount = $amount;
        $this->admissionid = $admissionid;
        $this->medicationid = $medicationid;
    }

    public function save(){
        //if I don't have this object in my database, I will register him first
        $this->dbconn = (new DB())->conn ;
        if (is_null($this->id)){
            $query = "insert into Prescription values (null, '$this->prescriptiondate', $this->amount, $this->admissionid, $this->medicationid)";
            mysqli_query($this->dbconn, $query);
        }
        $this->dbconn->close();
    }

    public function update(){
        $this->dbconn = (new DB())->conn ;
        if (!is_null($this->id)){
            $query = "UPDATE Prescription SET prescriptiondate='$this->prescriptiondate', amount=$this->amount, admissionid=$this->admissionid, 
medicationid=$this->medicationid WHERE PrescriptionID=$this->id";
            mysqli_query($this->dbconn, $query);
        }
        $this->dbconn->close();
    }

    public function delete(){
        $this->dbconn = (new DB())->conn ;
        if (!is_null($this->id)){
            $query = "DELETE FROM Prescription WHERE admissionID=$this->admissionid AND medicationID=$this->medicationid";
            mysqli_query($this->dbconn, $query);
        }
        $this->dbconn->close();
    }
}
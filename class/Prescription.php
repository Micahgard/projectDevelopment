<?php
/**
 * Author: Joel
 * Date: 27/05/2020
 * Version: 1.1
 * Purpose: class for prescription
 */
include_once "DB.php";
class Prescription
{
    public $id;
    public $prescriptiondate;
    public $amount;
    public $dbconn;
    public $medicationID;
    public $admissionID;

    public function __construct($id, $prescriptiondate, $amount, $medicationID, $admissionID)
    {
        $this->id = $id;
        $this->prescriptiondate = $prescriptiondate;
        $this->amount = $amount;
        $this->medicationID = $medicationID;
        $this->admissionID = $admissionID;
    }

    public function save(){
        //if I don't have this object in my database, I will register him first
        $this->dbconn = (new DB())->conn ;
        if (is_null($this->id)){
            $query = "insert into Prescription values (null, '$this->prescriptiondate', $this->amount, $this->medicationID, $this->admissionID)";
            mysqli_query($this->dbconn, $query);
        }
        $this->dbconn->close();
    }

    public function update(){
        $this->dbconn = (new DB())->conn ;
        if (!is_null($this->id)){
            $query = "UPDATE Prescription SET prescriptiondate='$this->prescriptiondate', amount=$this->amount, medicationID=$this->medicationID,
            admissionID=$this->admissionID WHERE PrescriptionID=$this->id";
            mysqli_query($this->dbconn, $query);
        }
        $this->dbconn->close();
    }

    public function delete(){
        $this->dbconn = (new DB())->conn ;
        if (!is_null($this->id)){
            $query = "DELETE FROM Prescription WHERE PrescriptionID=$this->id";
            mysqli_query($this->dbconn, $query);
        }
        $this->dbconn->close();
    }
}
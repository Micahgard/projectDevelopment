<?php
/**
 * Author: Joel
 * Date: 27/05/2020
 * Version: 1.1
 * Purpose: class for admission
 */
include_once "DB.php";
class Admission
{
    public $id;
    public $description;
    public $admissiondate;
    public $status;
    public $patientID;
    public $wardID;
    public $dbconn;

    public function __construct($id, $description, $admissiondate, $status, $patientID, $wardID)
    {
        $this->id = $id;
        $this->description = $description;
        $this->admissiondate = $admissiondate;
        $this->status = $status;
        $this->patientID = $patientID;
        $this->wardID = $wardID;
    }

    public function save(){
        $this->dbconn = (new DB())->conn ;
        if (is_null($this->id)){
            $query = "insert into Admission values (null, '$this->description', '$this->admissiondate', '$this->status', $this->patientID, $this->wardID)";
            mysqli_query($this->dbconn, $query);
        }
        $this->dbconn->close();
    }

    public function update(){
        $this->dbconn = (new DB())->conn ;
        if (!is_null($this->id)){
            $query = "UPDATE Admission SET description='$this->description', admissiondate='$this->admissiondate', status='$this->status' WHERE AdmissionID=$this->id";
            mysqli_query($this->dbconn, $query);
        }
        $this->dbconn->close();
    }

    public function delete()
    {
        $this->dbconn = (new DB())->conn;
        if (!is_null($this->id)) {
            $query = "DELETE FROM Payment WHERE admissionID=$this->id;";
            $query .= "DELETE FROM Admission WHERE AdmissionID=$this->id;";
            mysqli_multi_query($this->dbconn, $query);
        }
        $this->dbconn->close();
    }

    public function closeAndDelete()
    {
        $this->dbconn = (new DB())->conn;
        if (!is_null($this->id)) {
            $query = "UPDATE Admission SET status='close' WHERE AdmissionID=$this->id;";
            $query .= "DELETE FROM Allocation WHERE admissionID=$this->id;";
            $query .= "DELETE FROM Prescription WHERE admissionID=$this->id;";
            mysqli_multi_query($this->dbconn, $query);
        }
        $this->dbconn->close();
    }
}
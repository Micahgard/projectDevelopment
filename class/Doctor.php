<<?php
/**
 * Author: Joel
 * Date: 27/05/2020
 * Version: 1.1
 * Purpose: class for doctor
 */
include_once "DB.php";
class Doctor
{
    public $id;
    public $lastname;
    public $firstname;
    public $street;
    public $suburb;
    public $city;
    public $phone;
    public $speciality;
    public $salary;
    public $dbconn;

    public function __construct($id, $lastname, $firstname, $street, $suburb, $city, $phone, $speciality, $salary)
    {
        $this->id = $id;
        $this->lastname = $lastname;
        $this->firstname = $firstname;
        $this->street = $street;
        $this->suburb = $suburb;
        $this->city = $city;
        $this->phone = $phone;
        $this->speciality = $speciality;
        $this->salary = $salary;
    }

    public function save(){
        //if I don't have this object in my database, I will register him first
        $this->dbconn = (new DB())->conn ;
        if (is_null($this->id)){
            $query = "insert into Doctor values (null, '$this->lastname',
 '$this->firstname', '$this->street', '$this->suburb','$this->city', '$this->phone',
  '$this->speciality', $this->salary)";
            mysqli_query($this->dbconn, $query);
        }
        $this->dbconn->close();
    }

    public function update(){
        $this->dbconn = (new DB())->conn ;
        if (!is_null($this->id)){
            $query = "UPDATE Doctor SET lastname='$this->lastname', firstname='$this->firstname', 
street='$this->street', suburb='$this->suburb', city='$this->city', phone='$this->phone', 
speciality='$this->speciality', salary=$this->salary WHERE DoctorID=$this->id";
            mysqli_query($this->dbconn, $query);
        }
        $this->dbconn->close();
    }

    public function delete(){
        $this->dbconn = (new DB())->conn ;
        if (!is_null($this->id)){
            $query = "DELETE FROM Doctor WHERE DoctorID=$this->id";
            mysqli_query($this->dbconn, $query);
        }
        $this->dbconn->close();
    }
}
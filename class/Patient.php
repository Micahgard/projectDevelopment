<?php
/**
 * Author: Joel
 * Date: 27/05/2020
 * Version: 1.1
 * Purpose: class for patient
 */
include_once "DB.php";
class Patient
{
    public $id;
    public $lastname;
    public $firstname;
    public $street;
    public $suburb;
    public $city;
    public $email;
    public $phone;
    public $insurcode;
    public $dbconn;


    public function __construct($id, $lastname, $firstname, $street, $suburb, $city, $email, $phone, $insurcode)
    {
        $this->id = $id;
        $this->lastname = $lastname;
        $this->firstname = $firstname;
        $this->street = $street;
        $this->suburb = $suburb;
        $this->city = $city;
        $this->email = $email;
        $this->phone = $phone;
        $this->insurcode = $insurcode;
    }

    public function save(){
        //if I don't have this object in my database, I will register him first
        $this->dbconn = (new DB())->conn ;
        if (is_null($this->id)){
            $query = "insert into Patient values (null, '$this->lastname', '$this->firstname', '$this->street',
                     '$this->suburb', '$this->city', '$this->email', '$this->phone', '$this->insurcode')";
            mysqli_query($this->dbconn, $query);
        }
        $this->dbconn->close();
    }

    public function update(){
        $this->dbconn = (new DB())->conn ;
        if (!is_null($this->id)){
            $query = "UPDATE Patient SET lastname='$this->lastname', firstname='$this->firstname', street='$this->street',
                      suburb='$this->suburb', city='$this->city', email='$this->email', phone='$this->phone', insurcode='$this->insurcode' 
                      WHERE PatientID=$this->id";
            mysqli_query($this->dbconn, $query);
        }
        $this->dbconn->close();
    }

    public function delete(){
        $this->dbconn = (new DB())->conn ;
        if (!is_null($this->id)){
            $query = "DELETE FROM Patient WHERE PatientID=$this->id";
            mysqli_query($this->dbconn, $query);
        }
        $this->dbconn->close();
    }

}
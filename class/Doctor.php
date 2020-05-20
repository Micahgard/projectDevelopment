<<?php


class Doctor
{
    public $id;
    public $lastname;
    public $firstname;
    public $street;
    public $suburb;
    public $city;
    public $phone;
    public $specialty;
    public $salary;
    public $dbconn;

    public function  __construct($id, $lastname, $firstname, $street, $suburb, $city, $phone, $specialty, $salary)
    {
        $this->id = $id;
        $this->lastname = $lastname;
        $this->firstname = $firstname;
        $this->street = $street;
        $this->suburb = $suburb;
        $this->city = $city;
        $this->phone = $phone;
        $this->specialty = $specialty;
        $this->salary = $salary;
        //
    }
    public  function save(){
        //if I don't have this object in my database, I will register him first
        $this->dbconn = (new DB())->conn ;
        if (is_null($this->id)){
            $query = "insert into Doctor values (null, '$this->lastname', '$this->firstname', '$this->street', '$this->suburb', '$this->password', '$this->city', '$this->phone', '$this->specialty', '$this->salary')";
            echo $query;
            mysqli_query($this->dbconn, $query);
        }else{
            $query = "Update Doctor SET name = '$this->lastname' where id = $this->id";
            mysqli_query($query);
        }

    }
}
<?php


class DoctorsReport
{
    public $DoctorID;
    public $lastname;
    public $firstname;
    public $street;
    public $suburb;
    public $city;
    public $phone;
    public $speciality;
    public $salary;
    public $admission;
    public $project;

    /**
     * DoctorsReport constructor.
     * @param $DoctorID
     * @param $lastname
     * @param $firstname
     * @param $street
     * @param $suburb
     * @param $city
     * @param $phone
     * @param $speciality
     * @param $salary
     * @param $admission
     * @param $project
     */
    public function __construct($DoctorID, $lastname, $firstname, $street, $suburb, $city, $phone, $speciality, $salary, $admission, $project)
    {
        $this->DoctorID = $DoctorID;
        $this->lastname = $lastname;
        $this->firstname = $firstname;
        $this->street = $street;
        $this->suburb = $suburb;
        $this->city = $city;
        $this->phone = $phone;
        $this->speciality = $speciality;
        $this->salary = $salary;
        $this->admission = $admission;
        $this->project = $project;
    }
}
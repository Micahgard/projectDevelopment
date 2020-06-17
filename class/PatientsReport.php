<?php
/**
 * Author: Joel
 * Date: 11/06/2020
 * Version: 1.0
 * Purpose: class for patients report
 */

class PatientsReport
{
    public $PatientID;
    public $lastname;
    public $firstname;
    public $street;
    public $suburb;
    public $city;
    public $email;
    public $phone;
    public $insurcode;
    public $complete;
    public $current;

    /**
     * PatientsReport constructor.
     * @param $PatientID
     * @param $lastname
     * @param $firstname
     * @param $street
     * @param $suburb
     * @param $city
     * @param $email
     * @param $phone
     * @param $insurcode
     * @param $complete
     * @param $current
     */
    public function __construct($PatientID, $lastname, $firstname, $street, $suburb, $city, $email, $phone, $insurcode, $complete, $current)
    {
        $this->PatientID = $PatientID;
        $this->lastname = $lastname;
        $this->firstname = $firstname;
        $this->street = $street;
        $this->suburb = $suburb;
        $this->city = $city;
        $this->email = $email;
        $this->phone = $phone;
        $this->insurcode = $insurcode;
        $this->complete = $complete;
        $this->current = $current;
    }
}
<<<<<<< HEAD
<?php


class PatientsReport
{
    public $PatientID;
    public $lastanme;
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
     * @param $lastanme
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
    public function __construct($PatientID, $lastanme, $firstname, $street, $suburb, $city, $email, $phone, $insurcode, $complete, $current)
    {
        $this->PatientID = $PatientID;
        $this->lastanme = $lastanme;
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
=======
<?php


class PatientsReport
{
    public $PatientID;
    public $lastanme;
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
     * @param $lastanme
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
    public function __construct($PatientID, $lastanme, $firstname, $street, $suburb, $city, $email, $phone, $insurcode, $complete, $current)
    {
        $this->PatientID = $PatientID;
        $this->lastanme = $lastanme;
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
>>>>>>> 32ab9c6ff62b317d49147caeebccc53d191e6984
}
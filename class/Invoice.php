<?php


class Invoice
{
    public $AdmissionID;
    public $description;
    public $patient;
    public $medication;
    public $doctor;

    /**
     * Invoice constructor.
     * @param $AdmissionID
     * @param $description
     * @param $patient
     * @param $medication
     * @param $doctor
     */
    public function __construct($AdmissionID, $description, $patient, $medication, $doctor)
    {
        $this->AdmissionID = $AdmissionID;
        $this->description = $description;
        $this->patient = $patient;
        $this->medication = $medication;
        $this->doctor = $doctor;
    }
}
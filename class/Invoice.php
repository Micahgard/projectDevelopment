<?php
/**
 * Author: Joel
 * Date: 13/06/2020
 * Version: 1.0
 * Purpose: class for getting data for admission invoice
 */

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
<?php
/**
 * Author: Joel
 * Date: 23/06/2020
 * Version: 1.2
 * Purpose: class for getting data for admissions report, allocating, prescribing, closing admission
 */

class AdmissionsAll
{
    public $id;
    public $description;
    public $admissiondate;
    public $status;
    public $patient;
    public $medication;
    public $doctor;
    public $payment;

    /**
     * AdmissionsAll constructor.
     * @param $id
     * @param $description
     * @param $admissiondate
     * @param $status
     * @param $patient
     * @param $medication
     * @param $doctor
     * @param $payment
     */
    public function __construct($id, $description, $admissiondate, $status, $patient, $medication, $doctor, $payment)
    {
        $this->id = $id;
        $this->description = $description;
        $this->admissiondate = $admissiondate;
        $this->status = $status;
        $this->patient = $patient;
        $this->medication = $medication;
        $this->doctor = $doctor;
        $this->payment = $payment;
    }
}


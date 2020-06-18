<?php
/**
 * Author: Joel
 * Date: 18/06/2020
 * Version: 1.1
 * Purpose: class for admissions report and getting data from admission
 */

class AdmissionsReport
{
    public $id;
    public $description;
    public $admissiondate;
    public $status;
    public $patient;
    public $medication;

    /**
     * AdmissionsReport constructor.
     * @param $id
     * @param $description
     * @param $admissiondate
     * @param $status
     * @param $patient
     * @param $medication
     */
    public function __construct($id, $description, $admissiondate, $status, $patient, $medication)
    {
        $this->id = $id;
        $this->description = $description;
        $this->admissiondate = $admissiondate;
        $this->status = $status;
        $this->patient = $patient;
        $this->medication = $medication;
    }
}


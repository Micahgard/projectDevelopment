<?php


class Invoice
{
    public $AdmissionID;
    public $description;
    public $patient;
    public $medication;
    public $amount;
    public $doctorname;
    public $fee;

    /**
     * Invoice constructor.
     * @param $AdmissionID
     * @param $description
     * @param $patient
     * @param $medication
     * @param $amount
     * @param $doctorname
     * @param $fee
     */
    public function __construct($AdmissionID, $description, $patient, $medication, $amount, $doctorname, $fee)
    {
        $this->AdmissionID = $AdmissionID;
        $this->description = $description;
        $this->patient = $patient;
        $this->medication = $medication;
        $this->amount = $amount;
        $this->doctorname = $doctorname;
        $this->fee = $fee;
    }
}
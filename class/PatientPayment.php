<?php
/**
 * Author: Joel
 * Date: 22/06/2020
 * Version: 1.0
 * Purpose: class for getting data for recording payment
 */

class PatientPayment
{
    public $id;
    public $lastname;
    public $firstname;
    public $admission;

    /**
     * PatientPayment constructor.
     * @param $id
     * @param $lastname
     * @param $firstname
     * @param $admission
     */
    public function __construct($id, $lastname, $firstname, $admission)
    {
        $this->id = $id;
        $this->lastname = $lastname;
        $this->firstname = $firstname;
        $this->admission = $admission;
    }
}
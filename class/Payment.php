<?php
/**
 * Author: Joel
 * Date: 27/05/2020
 * Version: 1.1
 * Purpose: class for payment
 */
include_once "DB.php";
class Payment
{
    public $id;
    public $paymentdate;
    public $amount;
    public $dbconn;

    public function __construct($id, $paymentdate, $amount)
    {
        $this->id = $id;
        $this->paymentdate = $paymentdate;
        $this->amount = $amount;
    }

    public function save(){
        //if I don't have this object in my database, I will register him first
        $this->dbconn = (new DB())->conn ;
        if (is_null($this->id)){
            $query = "insert into Payment values (null, '$this->paymentdate', $this->amount)";
            mysqli_query($this->dbconn, $query);
        }
        $this->dbconn->close();
    }

    public function update(){
        $this->dbconn = (new DB())->conn ;
        if (!is_null($this->id)){
            $query = "UPDATE Payment SET paymentdate='$this->paymentdate', amount=$this->amount WHERE Paymentcode=$this->id";
            mysqli_query($this->dbconn, $query);
        }
        $this->dbconn->close();
    }

    public function delete(){
        $this->dbconn = (new DB())->conn ;
        if (!is_null($this->id)){
            $query = "DELETE FROM Payment WHERE Paymentcode=$this->id";
            mysqli_query($this->dbconn, $query);
        }
        $this->dbconn->close();
    }
}
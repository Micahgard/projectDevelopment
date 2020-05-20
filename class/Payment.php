<?php


class Payment
{
    public $id;
    public $paymentdate;
    public $amount;
    public $dbconn;

    public function  __construct($id, $paymentdate, $amount)
    {
        $this->id = $id;
        $this->paymentdate = $paymentdate;
        $this->amount = $amount;
        //
    }
    public  function save(){
        //if I don't have this object in my database, I will register him first
        $this->dbconn = (new DB())->conn ;
        if (is_null($this->id)){
            $query = "insert into Payment values (null, '$this->paymentdate', '$this->amount')";
            echo $query;
            mysqli_query($this->dbconn, $query);
        }else{
            $query = "Update Payment SET name = '$this->paymentdate' where id = $this->id";
            mysqli_query($query);
        }

    }
}
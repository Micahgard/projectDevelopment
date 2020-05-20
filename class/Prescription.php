<?php


class Prescription
{
    public $id;
    public $prescriptiondate;
    public $amount;
    public $dbconn;

    public function  __construct($id, $prescriptiondate, $amount)
    {
        $this->id = $id;
        $this->prescriptiondate = $prescriptiondate;
        $this->amount = $amount;
        //
    }
    public  function save(){
        //if I don't have this object in my database, I will register him first
        $this->dbconn = (new DB())->conn ;
        if (is_null($this->id)){
            $query = "insert into Prescription values (null, '$this->prescriptiondate', '$this->amount')";
            echo $query;
            mysqli_query($this->dbconn, $query);
        }else{
            $query = "Update Prescription SET name = '$this->prescriptiondate' where id = $this->id";
            mysqli_query($query);
        }

    }
}
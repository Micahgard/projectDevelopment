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
            mysqli_query($this->dbconn, $query);
        }
        $this->dbconn->close();
    }
    public function update(){
        $this->dbconn = (new DB())->conn ;
        if (is_null($this->id)){
            $query = "UPDATE Prescription SET prescriptiondate='$this->prescriptiondate', amount='$this->amount' WHERE WardID=$this->id";
            mysqli_query($this->dbconn, $query);
        }
        $this->dbconn->close();
    }
    public function delete(){
        $this->dbconn = (new DB())->conn ;
        if (is_null($this->id)){
            $query = "DELETE FROM Prescription WHERE Precision ID=$this->>id";
            mysqli_query($this->dbconn, $query);
        }
        $this->dbconn->close();
    }
}
<?php


class Admission
{
    public $id;
    public $description;
    public $admissiondate;
    public $status;
    public $dbconn;

    public function __construct($id, $description, $admissiondate, $status)
    {
        $this->id = $id;
        $this->description = $description;
        $this->admissiondate = $admissiondate;
        $this->status = $status;
    }

    public function save(){
        //if I don't have this object in my database, I will register him first
        $this->dbconn = (new DB())->conn ;
        if (is_null($this->id)){
            $query = "insert into Admission values (null, '$this->description', '$this->admissiondate)', $this->status";
            mysqli_query($this->dbconn, $query);
        }
        $this->dbconn->close();
    }

    public function update(){
        $this->dbconn = (new DB())->conn ;
        if (is_null($this->id)){
            $query = "UPDATE Admission SET description='$this->description', admissiondate='$this->admissiondate', status='$this->status' WHERE AdmissionID=$this->id";
            mysqli_query($this->dbconn, $query);
        }
        $this->dbconn->close();
    }

    public function delete()
    {
        $this->dbconn = (new DB())->conn;
        if (is_null($this->id)) {
            $query = "DELETE FROM Admission WHERE AdmissionID=$this->id";
            mysqli_query($this->dbconn, $query);
        }
        $this->dbconn->close();
    }


}
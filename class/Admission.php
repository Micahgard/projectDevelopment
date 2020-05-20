<?php


class Admission
{
    public $id;
    public $description;
    public $admissiondate;
    public $status;
    public $dbconn;

    public function  __construct($id, $description, $admissiondate, $status)
    {
        $this->id = $id;
        $this->description = $description;
        $this->admissiondate = $admissiondate;
        $this->status = $status;
        //
    }
    public  function save(){
        //if I don't have this object in my database, I will register him first
        $this->dbconn = (new DB())->conn ;
        if (is_null($this->id)){
            $query = "insert into Admission values (null, '$this->description', '$this->admissiondate', '$this->status')";
            echo $query;
            mysqli_query($this->dbconn, $query);
        }else{
            $query = "Update Admission SET name = '$this->description' where id = $this->id";
            mysqli_query($query);
        }

    }
}
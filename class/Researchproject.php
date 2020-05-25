<?php


class Researchproject
{
    public $id;
    public $enddate;
    public $outcome;
    public $budget;
    public $dbconn;

    public function  __construct($id, $enddate, $outcome, $budget)
    {
        $this->id = $id;
        $this->enddate = $enddate;
        $this->outcome = $outcome;
        $this->budget = $budget;
        //
    }
    public  function save(){
        //if I don't have this object in my database, I will register him first
        $this->dbconn = (new DB())->conn ;
        if (is_null($this->id)){
            $query = "insert into Researchproject values (null, '$this->enddate', '$this->outcome', '$this->budget')";
            echo $query;
            mysqli_query($this->dbconn, $query);
        }else{
            $query = "Update Researchproject SET name = '$this->enddate' where id = $this->id";
            mysqli_query($query);
        }

    }
}
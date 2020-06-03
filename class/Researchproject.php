<?php
/**
 * Author: Joel
 * Date: 03/06/2020
 * Version: 1.2
 * Purpose: class for research project
 */
include_once "DB.php";
class Researchproject
{
    public $id;
    public $enddate;
    public $outcome;
    public $budget;
    public $dbconn;

    public function __construct($id, $enddate, $outcome, $budget, $doctorID, $topicID)
    {
        $this->id = $id;
        $this->enddate = $enddate;
        $this->outcome = $outcome;
        $this->budget = $budget;
        $this->doctorID = $doctorID;
        $this->topicID = $topicID;
    }

    public function save(){
        //if I don't have this object in my database, I will register him first
        $this->dbconn = (new DB())->conn ;
        if (is_null($this->id)){
            $query = "insert into Researchproject values (null, '$this->enddate', '$this->outcome', $this->budget, $this->doctorID, $this->topicID)";
            mysqli_query($this->dbconn, $query);
        }
        $this->dbconn->close();
    }

    public function update(){
        $this->dbconn = (new DB())->conn ;
        if (!is_null($this->id)){
            $query = "UPDATE Researchproject SET enddate='$this->enddate', outcome='$this->outcome', budget=$this->budget, doctorID=$this->doctorID, topicID=$this->topicID WHERE ProjectID=$this->id";
            mysqli_query($this->dbconn, $query);
        }
        $this->dbconn->close();
    }

    public function delete(){
        $this->dbconn = (new DB())->conn ;
        if (!is_null($this->id)){
            $query = "DELETE FROM Researchproject WHERE ProjectID=$this->id";
            mysqli_query($this->dbconn, $query);
        }
        $this->dbconn->close();
    }
}
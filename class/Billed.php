<?php
/**
 * Author: Joel
 * Date: 14/06/2020
 * Version: 1.0
 * Purpose: class for changing admission's status to billed
 */
include_once "DB.php";
class Billed
{
    public $id;
    public $status;
    public $dbconn;

    /**
     * Billed constructor.
     * @param $id
     * @param $status
     */
    public function __construct($id, $status)
    {
        $this->id = $id;
        $this->status = $status;
    }

    public function invoice()
    {
        $this->dbconn = (new DB())->conn;
        if (!is_null($this->id)) {
            $query = "UPDATE Admission SET status='$this->status' WHERE AdmissionID=$this->id";
            mysqli_query($this->dbconn, $query);
        }
        $this->dbconn->close();
    }
}
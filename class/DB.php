<?php


class DB
{
    var $conn;
    var $servername = "ocvwlym0zv3tcn68.cbetxkdyhwsb.us-east-1.rds.amazonaws.com";
    var $dbusername = "bntn0fyumq6q1tuz";
    var $dbpassword = "mr6mgkhkm5dmgtnl";
    var $dbname = "umpablvyo92sy9r5";

    /**
     * DB constructor.
     */
    public function __construct()
    {
        $conn = new mysqli($this->servername, $this->dbusername, $this->dbpassword, $this->dbname);
        if (!$conn->connect_error){
            $this->conn =$conn;
        }else{
            echo $conn->connect_error;
        }
    }
}

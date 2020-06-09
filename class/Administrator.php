<?php
include_once ("DB.php");
include_once "class/Admission.php";

class Administrator
{
    public $id;
    public $username;
    private $password;
    public $email;
    public $phone;
    public $role;

//  check username and password for this administrator login
    /**
     * Administrator constructor.
     */
    public function __construct()
    {
        $this->id = null;
        $this->username = null;
        $this->password = null;
        $this->email = null;
        $this->phone = null;
        $this->role = null;
    }

    public function login($username, $password)
    {
      $conn = (new DB())->conn;
        $query = "select * from Admin where username = '$username'";   // check if the username exists
        $result = mysqli_query($conn, $query);  //  run the query
        if ($result->num_rows == 1) {    // if the username exists, check the password
            while ($row = $result->fetch_assoc()) {   //  fetching the data
                if ($row['password'] == $password) {  //  if username and password are correct, I set information to this administrator login
                    $this->id = $row['id'];
                    $this->username = $row['username'];
                    $this->password = $row['password'];
                    $this->email = $row['email'];
                    $this->phone = $row['phone'];
                    $this->role = $row['role'];
                }
            }
        }
        $conn->close();
    }

    /**
     * @name showAdmission
     * @return Admission array
     */
    public function showAdmission(){
        $conn = (new DB())->conn;
        $sql = "select * from Admission";
        $admissions = array();
        $result = $conn->query($sql);
        if ($result->num_rows>0){
            while ($result->fetch_assoc()){
                $admission = new Admission($row["id"], $row["description"], $row["admissiondate"], $row["admissionstatus"], $row["patientID"], $row["wardID"]);
                array_push($admissions, $admission);
            }
        }
        $conn->close();
        return $admission;
    }

}

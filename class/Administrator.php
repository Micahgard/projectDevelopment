<?php
include_once("DB.php");
include_once "Patient.php";
include_once "Ward.php";
include_once "Doctor.php";
include_once "AdmissionsReport.php";
include_once "PatientsReport.php";

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
    // admissions report start

    public function showAdmissions()
    {
        $conn = (new DB())->conn;
        $sql = "select * from Admission";
        $admissions = array();
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $admission = new AdmissionsReport($row["AdmissionID"], $row["description"], $row["admissiondate"], $row["status"], $this->findPatientByPatientID($row["patientID"]), $this->findMedicationsByAdmission($row["AdmissionID"]));
                array_push($admissions, $admission);
            }
        }
        $conn->close();
        return $admissions;
    }

    public function findPatientByPatientID($patientID)
    {
        $conn = (new DB())->conn;
        $sql = "select * from Patient where PatientID = " . $patientID;
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $id = $row["PatientID"];
                $lastname = $row["lastname"];
                $firstname = $row["firstname"];
            }
        }
        $conn->close();
        return array($id, $lastname, $firstname);
    }

    public function findMedicationsByAdmission($admissionID)
    {
        $conn = (new DB())->conn;
        $sql = "select Medication.name from Medication, Prescription, Admission where Medication.MedicationID = Prescription.medicationID and Prescription.admissionID = Admission.AdmissionID and Admission.AdmissionID = " . $admissionID;
        $result = $conn->query($sql);
        $medicationnames = "";
        if ($result->num_rows>0){
            while ($row=$result->fetch_assoc()){
                $medicationnames .=$row["name"]." ";
            }
        }
        $conn->close();
        return $medicationnames;
    }
    // admissions report end

    // patients report start
    public function showPatients()
    {
        $conn = (new DB())->conn;
        $sql = "select * from Patient";
        $patients = array();
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $patient = new PatientsReport($row["PatientID"], $row["lastname"], $row["firstname"], $row["street"], $row["suburb"], $row["city"], $row["email"], $row["phone"], $row["insurcode"], $this->countCompleteAdmissions($row["PatientID"]), $this->countCurrentAdmissions($row["PatientID"]));
                array_push($patients, $patient);
            }
        }
        $conn->close();
        return $patients;
    }

    public function countCompleteAdmissions($patientID)
    {
        $conn = (new DB())->conn;
        $sql = "SELECT Admission.patientID FROM Admission WHERE status='complete' AND patientID=" . $patientID;
        $result = $conn->query($sql);
        $number = mysqli_num_rows($result);
        $conn->close();
        return $number;
    }

    public function countCurrentAdmissions($patientID)
    {
        $conn = (new DB())->conn;
        $sql = "SELECT Admission.patientID FROM Admission WHERE status='current' AND patientID=" . $patientID;
        $result = $conn->query($sql);
        $number = mysqli_num_rows($result);
        $conn->close();
        return $number;
    }
    // patients report end


    public function findWardByWardID($wardID)
    {
        $conn = (new DB())->conn;
        $sql = "select * from Ward where WardID = " . $wardID;
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $wardname = $row["lastname"] . ", " . $row["firstname"];
            }
        }
        $conn->close();
        return $wardname;
    }

    public function allPatiens(){
        $conn = (new DB())->conn;
        $sql = "select * from Patient";
        $result = $conn->query($sql);
        $patients = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $patient = new Patient($row["PatientID"], $row["lastname"], $row["firstname"], $row["street"], $row["suburb"], $row["city"], $row["email"], $row["phone"], $row["insurcode"]);
                array_push($patients,$patient);
            }
        }
        $conn->close();
        return $patients;
    }

    public function allWards(){
        $conn = (new DB())->conn;
        $sql = "select * from Ward";
        $result = $conn->query($sql);
        $wards = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $ward = new Ward($row["WardID"], $row["name"], $row["location"], $row["capacity"]);
                array_push($wards,$ward);
            }
        }
        $conn->close();
        return $wards;
    }

    public function allDoctors(){
        $conn = (new DB())->conn;
        $sql = "select * from Doctor";
        $result = $conn->query($sql);
        $doctors = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $doctor = new Doctor($row["DoctorID"], $row["lastname"], $row["firstname"], $row["street"], $row["suburb"], $row["city"], $row["phone"], $row["speciality"], $row["salary"]);
                array_push($doctors,$doctor);
            }
        }
        $conn->close();
        return $doctors;
    }

    public function allMedications(){
        $conn = (new DB())->conn;
        $sql = "select * from Medication";
        $result = $conn->query($sql);
        $medications = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $medication = new Medication($row["MedicationID"], $row["name"], $row["cost"]);
                array_push($medications, $medication);
            }
        }
        $conn->close();
        return $medications;
    }
}

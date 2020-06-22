<?php
include_once("DB.php");
include_once "Patient.php";
include_once "Ward.php";
include_once "Doctor.php";
include_once "Medication.php";
include_once "Admission.php";
include_once "Invoice.php";
include_once "AdmissionsReport.php";
include_once "PatientsReport.php";
include_once "DoctorsReport.php";

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
        $result = mysqli_query($conn, $query);
        if ($result->num_rows == 1) {    // if the username exists, check the password
            while ($row = $result->fetch_assoc()) {
                if ($row['password'] == $password) {
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

    // invoice start
    public function completeAdmissions()
    {
        $conn = (new DB())->conn;
        $sql = "select * from Admission where status = 'complete'";
        $admissions = array();
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $admission = new Invoice($row["AdmissionID"], $row["description"], $this->patientDetailsForInvoice($row["patientID"]), $this->medicationForInvoice($row["AdmissionID"]), $this->allocatedDoctorForInvoice($row["AdmissionID"]));
                array_push($admissions, $admission);
            }
        }
        $conn->close();
        return $admissions;
    }

    public function patientDetailsForInvoice($patientID)
    {
        $conn = (new DB())->conn;
        $sql = "select * from Patient where PatientID = " . $patientID;
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $getID = $row["PatientID"];
                $getname = $row["firstname"]." ".$row["lastname"];
                $getaddress = $row["street"].", ".$row["suburb"].", ".$row["city"];
                $patient = array("id"=>$getID, "name"=>$getname, "address"=>$getaddress);
            }
        }
        $conn->close();
        return $patient;
    }

    public function medicationForInvoice($admissionID)
    {
        $conn = (new DB())->conn;
        $sql = "select Medication.name, Medication.cost, Prescription.amount from Medication, Prescription, Admission where Medication.MedicationID = Prescription.medicationID and Prescription.admissionID = Admission.AdmissionID and Admission.AdmissionID = " . $admissionID;
        $result = $conn->query($sql);
        $medications = array();
        if ($result->num_rows>0){
            while ($row=$result->fetch_assoc()){
                $getname = $row["name"];
                $getcost = $row["cost"];
                $getamount = $row["amount"];
                $medication = array("name"=>$getname, "cost"=>$getcost, "amount"=>$getamount);
                array_push($medications,$medication);
            }
        }
        $conn->close();
        return $medications;
    }

    public function allocatedDoctorForInvoice($admissionID)
    {
        $conn = (new DB())->conn;
        $sql = "select Doctor.lastname, Doctor.firstname, Allocation.fee from Doctor, Allocation, Admission where Doctor.DoctorID = Allocation.doctorID and Allocation.admissionID = Admission.AdmissionID and Admission.AdmissionID = " . $admissionID;
        $result = $conn->query($sql);
        $doctors = array();
        if ($result->num_rows>0){
            while ($row=$result->fetch_assoc()){
                $getname = $row["firstname"]." ".$row["lastname"];
                $getfee = $row["fee"];
                $doctor = array("name"=>$getname, "fee"=>$getfee);
                array_push($doctors,$doctor);
            }
        }
        $conn->close();
        return $doctors;
    }
    // invoice end

    // admissions report start
    public function showAdmissions()
    {
        $conn = (new DB())->conn;
        $sql = "select * from Admission";
        $admissions = array();
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $admission = new AdmissionsReport($row["AdmissionID"], $row["description"], $row["admissiondate"], $row["status"],
                    $this->findPatientByPatientID($row["patientID"]), $this->findMedicationsByAdmission($row["AdmissionID"]), $this->findDoctorsByAdmission($row["AdmissionID"]));
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
            $patient = array("id"=>$id, "lastname"=>$lastname, "firstname"=>$firstname);
            }
        }
        $conn->close();
        return $patient;
    }

    public function findMedicationsByAdmission($admissionID)
    {
        $conn = (new DB())->conn;
        $sql = "select Medication.name from Medication, Prescription, Admission where Medication.MedicationID = Prescription.medicationID and Prescription.admissionID = Admission.AdmissionID and Admission.AdmissionID = " . $admissionID;
        $result = $conn->query($sql);
        $medications = array();
        if ($result->num_rows>0){
            while ($row=$result->fetch_assoc()){
                $medication = $row["name"];
                array_push($medications,$medication);
            }
        }
        $conn->close();
        return $medications;
    }
    // admissions report end

    // allocate doctor start
    public function currentAdmissionsForAllocation()
    {
        $conn = (new DB())->conn;
        $sql = "select * from Admission WHERE status = 'current'";
        $admissions = array();
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $admission = new AdmissionsReport($row["AdmissionID"], $row["description"], $row["admissiondate"], $row["status"],
                    $this->findPatientByPatientID($row["patientID"]), $this->findMedicationsByAdmission($row["AdmissionID"]), $this->findDoctorsByAdmission($row["AdmissionID"]));
                array_push($admissions, $admission);
            }
        }
        $conn->close();
        return $admissions;
    }

    public function findDoctorsByAdmission($admissionID)
    {
        $conn = (new DB())->conn;
        $sql = "select * from Doctor, Allocation, Admission where Doctor.DoctorID = Allocation.doctorID and Allocation.admissionID = Admission.AdmissionID and Admission.AdmissionID = " . $admissionID;
        $result = $conn->query($sql);
        $doctors = array();
        if ($result->num_rows>0){
            while ($row=$result->fetch_assoc()){
                $id = $row["DoctorID"];
                $lastname = $row["lastname"];
                $firstname = $row["firstname"];
                $role = $row["role"];
                $doctor = array("id"=>$id, "lastname"=>$lastname, "firstname"=>$firstname, "role"=>$role);
                array_push($doctors,$doctor);
            }
        }
        $conn->close();
        return $doctors;
    }
    // allocate doctor end

    // prescribe medication start






    // prescribe medication end

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

    // doctors report start
    public function showDoctors()
    {
        $conn = (new DB())->conn;
        $sql = "select * from Doctor";
        $doctors = array();
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $doctor = new DoctorsReport($row["DoctorID"], $row["lastname"], $row["firstname"], $row["street"], $row["suburb"], $row["city"], $row["phone"], $row["speciality"], $row["salary"], $this->countAdmissionsForDoctor($row["DoctorID"]), $this->countProjectsForDoctor($row["DoctorID"]));
                array_push($doctors, $doctor);
            }
        }
        $conn->close();
        return $doctors;
    }

    public function countAdmissionsForDoctor($doctorID)
    {
        $conn = (new DB())->conn;
        $sql = "SELECT Admission.AdmissionID FROM Admission, Allocation, Doctor WHERE Admission.AdmissionID = Allocation.admissionID AND Allocation.doctorID = Doctor.DoctorID AND Doctor.DoctorID =" . $doctorID;
        $result = $conn->query($sql);
        $number = mysqli_num_rows($result);
        $conn->close();
        return $number;
    }

    public function countProjectsForDoctor($doctorID)
    {
        $conn = (new DB())->conn;
        $sql = "SELECT Researchproject.doctorID FROM Researchproject WHERE doctorID=" . $doctorID;
        $result = $conn->query($sql);
        $number = mysqli_num_rows($result);
        $conn->close();
        return $number;
    }
    // doctors report end

    // patient updating
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

    // patient deleting
    public function patiensWithoutAdmission(){
        $conn = (new DB())->conn;
        $sql = "SELECT * FROM Patient WHERE NOT EXISTS (SELECT patientID FROM Admission WHERE Admission.patientID = Patient.PatientID)";
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

    // doctor updating
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

    // doctor deleting
    public function doctorsWithoutAllocation(){
        $conn = (new DB())->conn;
        $sql = "SELECT * FROM Doctor WHERE NOT EXISTS (SELECT * FROM Allocation, Researchproject
                WHERE Allocation.doctorID = Doctor.DoctorID OR Researchproject.doctorID = Doctor.DoctorID)";
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

    // ward updating
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

    // ward deleting
    public function wardsWithoutAdmission(){
        $conn = (new DB())->conn;
        $sql = "SELECT * FROM Ward WHERE NOT EXISTS (SELECT wardID FROM Admission WHERE Admission.wardID = Ward.WardID)";
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

    // medication updating
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

    // medication deleting
    public function medicationsWithoutPresciption(){
        $conn = (new DB())->conn;
        $sql = "SELECT * FROM Medication WHERE NOT EXISTS (SELECT medicationID FROM Prescription WHERE Prescription.medicationID = Medication.MedicationID)";
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

    // admission updating start
    public function currentAdmissions()
    {
        $conn = (new DB())->conn;
        $sql = "select * from Admission where status = 'current'";
        $admissions = array();
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $admission = new Admission($row["AdmissionID"], $row["description"], $row["admissiondate"], $row["status"], $this->findPatientByPatientID($row["patientID"]), $this->findWardByWardID($row["wardID"]));
                array_push($admissions, $admission);
            }
        }
        $conn->close();
        return $admissions;
    }

    public function findWardByWardID($wardID)
    {
        $conn = (new DB())->conn;
        $sql = "select * from Ward where WardID = " . $wardID;
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $id = $row["WardID"];
                $name = $row["name"];
                $ward = array("id"=>$id, "name"=>$name);
            }
        }
        $conn->close();
        return $ward;
    }
    // admission updating end

    // admission deleting
    public function closeAdmissions()
    {
        $conn = (new DB())->conn;
        $sql = "select * from Admission where status = 'close'";
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

    // admission closing
    public function billedAdmissions()
    {
        $conn = (new DB())->conn;
        $sql = "select * from Admission where status = 'billed'";
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
}

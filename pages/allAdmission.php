<title>Admission</title>
<?php include_once 'head.php'; ?>

<!--Nav Tabs-->
<ul class="nav nav-tabs justify-content-center" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" data-toggle="tab" href="#addAdmission">Add Admission</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#updateAdmission">Update Admission</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#deleteAdmission">Delete Admission</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#admissionsReport">Admissions Report</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#produceInvoice">Produce Invoice</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#closeAdmission">Close Admission</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#allocateDoctor">Allocate Doctor</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#removeDoctor">Remove Doctor</a>
    </li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
    <div id="addAdmission" class="container tab-pane active"><br>
        <script>
            $(document).ready(function () {
                $.ajax({
                    type: 'GET',
                    url: "../api/apiAllPatients.php",
                    dataType: "JSON",
                    success: function (data) {
                        i = 0;
                        while (i < data.length){
                            $("#getPatient").append("<option value='" + data[i].id + "'>" + data[i].id + " " + data[i].firstname + " " + data[i].lastname + "</option>");
                            i++;
                        }
                    },
                    error: function () {
                        alert("Not connected");
                    }
                });
                $.ajax({
                    type: 'GET',
                    url: "../api/apiAllWards.php",
                    dataType: "JSON",
                    success: function (data) {
                        i = 0;
                        while (i < data.length){
                            $("#getWard").append("<option value='" + data[i].id + "'>" + data[i].id + " " + data[i].name + "</option>");
                            i++;
                        }
                    },
                    error: function () {
                        alert("Not connected");
                    }
                });
            });
        </script>
        <form action="../api/apiAddAdmission.php" method="post">
            <h1>Add Admission</h1>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Description:* </span>
                </div>
                <input type="text" maxlength="30" class="form-control" id="description" name="description" placeholder="Description" title="Description" required>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Admission Date:* </span>
                </div>
                <input type="date" maxlength="10" class="form-control" id="admissiondate" name="admissiondate" title="Admission Date" required>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Patient:* </span>
                </div>
                <select class="form-control" id="getPatient" name="patientID" required>
                    <option disabled selected hidden>Select a Patient</option>
                </select>
                <div class="input-group-prepend">
                    <span class="input-group-text">Ward:* </span>
                </div>
                <select class="form-control" id="getWard" name="wardID" required>
                    <option disabled selected hidden>Select a Ward</option>
                </select>
            </div>
            <i class="grey">* Required Fields</i>
            <div class="d-flex justify-content-around">
                <input class="btn btn-outline-primary" type="submit" value="Add Admission"/>
                <a href="../api/apiLogin.php"><input class="btn btn-outline-primary" type="button" value="Return"></a>
            </div>
        </form>
    </div>

    <div id="updateAdmission" class="container tab-pane fade"><br>
        <script>
            $(document).ready(function () {
                $.ajax({
                    type: 'GET',
                    url: "../api/apiCurrentAdmissions.php",
                    dataType: "JSON",
                    success: function (data) {
                        i = 0;
                        while (i < data.length){
                            $("#getUpdateAdmissions").append("<option value='" + data[i].id + "'>" + data[i].id + " " + data[i].description + "</option>");
                            i++;
                        }
                        $("#getUpdateAdmissions").change(function() {
                            i = 0;
                            while (i < data.length) {
                                if (data[i].id == $("#getUpdateAdmissions").val()) {
                                    $("#updateAdmissionId").val(data[i].id);
                                    $("#updateDescription").val(data[i].description);
                                    $("#updateAdmissiondate").val(data[i].admissiondate);
                                    $("#updatePatientID").val(data[i].patientID.id);
                                    $("#updatePatientLastname").val(data[i].patientID.lastname);
                                    $("#updatePatientFirstname").val(data[i].patientID.firstname);
                                    $("#updateWardID").val(data[i].wardID.id);
                                    $("#updateWardName").val(data[i].wardID.name);
                                }
                                i++;
                            }
                        });
                    },
                    error: function () {
                        alert("Not connected");
                    }
                });
            });
        </script>
        <form action="../api/apiUpdateAdmission.php" method="post">
            <h1>Update Admission</h1>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Admissions:* </span>
                </div>
                <select class="form-control" id="getUpdateAdmissions" name="id" required>
                    <option disabled selected hidden>Select an Admission</option>
                </select>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Admission Id: </span>
                </div>
                <input type="text" maxlength="30" class="form-control" id="updateAdmissionId" name="id" readonly>
                <div class="input-group-prepend">
                    <span class="input-group-text">Description:* </span>
                </div>
                <input type="text" maxlength="30" class="form-control" id="updateDescription" name="description" placeholder="Description" required>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Admission Date:* </span>
                </div>
                <input type="date" maxlength="10" class="form-control" id="updateAdmissiondate" name="admissiondate" required>
                <div class="input-group-prepend">
                    <span class="input-group-text">Status:* </span>
                </div>
                <div>
                    <input type="radio" name="status" value="current" checked>
                    <label>Current</label>
                    <input type="radio" name="status" value="complete">
                    <label>Complete</label>
                </div>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Patient Last Name: </span>
                </div>
                <input type="text" class="form-control" id="updatePatientLastname" readonly>
                <div class="input-group-prepend">
                    <span class="input-group-text">Patient First Name: </span>
                </div>
                <input type="text" class="form-control" id="updatePatientFirstname" readonly>
                <input type="text" id="updatePatientID" name="patientID" hidden>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Ward Name: </span>
                </div>
                <input type="text" class="form-control" id="updateWardName" readonly>
                <input type="text" id="updateWardID" name="wardID" hidden>
            </div>
            <i class="grey">* Required Fields</i>
            <div class="d-flex justify-content-around">
                <input class="btn btn-outline-primary" type="submit" value="Update Admission"/>
                <a href="../api/apiLogin.php"><input class="btn btn-outline-primary" type="button" value="Return"></a>
            </div>
        </form>
    </div>

    <div id="deleteAdmission" class="container tab-pane fade"><br>
        <script>
            $(document).ready(function () {
                $.ajax({
                    type: 'GET',
                    url: "../api/apiCloseAdmissions.php",
                    dataType: "JSON",
                    success: function (data) {
                        $("#getDeleteAdmissions").change(function() {
                            i = 0;
                            while (i < data.length) {
                                if (data[i].id == $("#getDeleteAdmissions").val()) {
                                    $("#deletePatientLastname").val(data[i].lastname);
                                    $("#deletePatientFirstname").val(data[i].firstname);
                                }
                                i++;
                            }
                        });
                    },
                    error: function () {
                        alert("Not connected");
                    }
                });
                $.ajax({
                    type: 'GET',
                    url: "../api/apiAllWards.php",
                    dataType: "JSON",
                    success: function (data) {
                        i = 0;
                        while (i < data.length){
                            $("#getDeleteWard").append("<option value='" + data[i].id + "'>" + data[i].id + " " + data[i].name + "</option>");
                            i++;
                        }
                    },
                    error: function () {
                        alert("Not connected");
                    }
                });
                $.ajax({
                    type: 'GET',
                    url: "",
                    dataType: "JSON",
                    success: function (data) {
                        i = 0;
                        while (i < data.length){
                            $("#getDeleteAdmissions").append("<option value='" + data[i].id + "'>" + data[i].id + " " + data[i].description + "</option>");
                            i++;
                        }
                        $("#getDeleteAdmissions").change(function() {
                            i = 0;
                            while (i < data.length) {
                                if (data[i].id == $("#getDeleteAdmissions").val()) {
                                    $("#deleteAdmissionId").val(data[i].id);
                                    $("#deleteDescription").val(data[i].description);
                                    $("#deleteAdmissiondate").val(data[i].admissiondate);
                                }
                                i++;
                            }
                        });
                    },
                    error: function () {
                        alert("Not connected");
                    }
                });
            });
        </script>
        <form action="../api/apiDeleteAdmission.php" method="get">
            <h1>Update Admission</h1>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Admissions:* </span>
                </div>
                <select class="form-control" id="getDeleteAdmissions" name="id" required>
                    <option disabled selected hidden>Select an Admission</option>
                </select>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Admission Id: </span>
                </div>
                <input type="text" class="form-control" id="deleteAdmissionId" name="deleteAdmissionId" placeholder="Admission Id" readonly>
                <div class="input-group-prepend">
                    <span class="input-group-text">Description: </span>
                </div>
                <input type="text" class="form-control" id="deleteDescription" name="deleteDescription" placeholder="Description*" readonly>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Admission Date: </span>
                </div>
                <input type="text" class="form-control" id="deleteAdmissiondate" name="deleteAdmissiondate" placeholder="Admission Date" readonly>
                <div class="input-group-prepend">
                    <span class="input-group-text">Status: </span>
                </div>
                <input type="text" class="form-control" id="deleteStatus" name="deleteStatus" placeholder="Status" readonly>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Patient Last Name: </span>
                </div>
                <input type="text" class="form-control" id="deletePatientLastname" name="deletePatientLastname" readonly>
                <div class="input-group-prepend">
                    <span class="input-group-text">Patient First Name: </span>
                </div>
                <input type="text" class="form-control" id="deletePatientFirstname" name="deletePatientFirstname" readonly>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Ward Name: </span>
                </div>
                <input type="text" class="form-control" id="deleteWardName" name="deleteWardName" readonly>
            </div>
            <i class="grey">* Required Fields</i>
            <div class="d-flex justify-content-around">
                <input class="btn btn-outline-primary" type="submit" value="Delete Admission"/>
                <a href="../api/apiLogin.php"><input class="btn btn-outline-primary" type="button" value="Return"></a>
            </div>
        </form>
    </div>

    <div id="admissionsReport" class="container tab-pane fade"><br>
    <h1>Admissions Report</h1>
        <script>
            $(document).ready(function () {
                $.ajax({
                    type: 'GET',
                    url: "../api/apiAdmissionsReport.php",
                    dataType: "JSON",
                    success: function (data) {
                        i = 0;
                        while (i < data.length){
                            $("#report").append("<hr>");
                            $("#report").append("<p>ID: "+data[i].id+" </p>");
                            $("#report").append("<p>Description: "+data[i].description+" </p>");
                            $("#report").append("<p>Status: "+data[i].status+" </p>");
                            $("#report").append("<p>Admission Date: "+data[i].admissiondate+" </p>");
                            $("#report").append("<p>Patient: "+data[i].patient.firstname+" "+data[i].patient.lastname+" </p>");
                            m = 0;
                            while (m < data[i].medication.length) {
                                $("#report").append("<p>Medication: "+data[i].medication[m].name+" </p>");
                                m++;
                            }
                            $("#report").append("<hr>");
                            i++;
                        }
                    },
                    error: function () {
                        alert("Not connected");
                    }
                });
            });
        </script>
        <div id="report"></div>
    </div>

    <div id="produceInvoice" class="container tab-pane fade"><br>
        <script>
            $(document).ready(function () {
                $.ajax({
                    type: 'GET',
                    url: "../api/apiCompleteAdmissions.php",
                    dataType: "JSON",
                    success: function (data) {
                        i = 0;
                        while (i < data.length) {
                            $("#getInvoice").append("<option value='" + data[i].AdmissionID + "'>" + data[i].AdmissionID + " " + data[i].description + "</option>");
                            i++;
                        }

                        $("#getInvoice").change(function() {
                            i = 0;
                            while (i < data.length) {
                                if (data[i].AdmissionID == $("#getInvoice").val()) {
                                    $("#invoice").html("<table>");
                                    $("#invoice").append("<tr><td>Patient ID:</td><td>" + data[i].patient.id + "</td>" +
                                        "<td>Patient Name:</td><td>" + data[i].patient.firstname + " " + data[i].patient.lastname + "</td></tr>");
                                    $("#invoice").append("<tr><td>Patient Address:</td><td>" + data[i].patient.address + "</td></tr>");
                                    $("#invoice").append("<tr style='height: 20px'></tr>");

                                    m = 0;
                                    subtotal = 0;
                                    while (m < data[i].medication.length) {
                                        $("#invoice").append("<tr><td>Medication Name:</td><td>" + data[i].medication[m].name + "</td>" +
                                            "<td>Medication Cost:</td><td>$" + data[i].medication[m].cost + "</td>" +
                                            "<td>Prescribed Quantity:</td><td>" + data[i].medication[m].amount + "</td></tr>");
                                        subtotal += (data[i].medication[m].cost) * (data[i].medication[m].amount);
                                        m++;
                                    }
                                    $("#invoice").append("<tr style='height: 20px'></tr>");

                                    d = 0;
                                    fee = 0;
                                    while (d < data[i].doctor.length) {
                                        $("#invoice").append("<tr><td>Doctor Name:</td><td>" + data[i].doctor[d].firstname + " " + data[i].doctor[d].lastname + "</td>" +
                                            "<td>Fee:</td><td>$" + data[i].doctor[d].fee + "</td></tr>");
                                        fee += parseInt(data[i].doctor[d].fee);
                                        d++;
                                    }
                                    $("#invoice").append("<tr style='height: 20px'></tr>");

                                    due = subtotal + fee;
                                    $("#invoice").append("<tr><td>Total Due:</td><td>$" + due + "</td></tr>");
                                    $("#invoice").append("<tr style='height: 30px'></tr>");
                                    $("#invoice").append("</table>");
                                }
                                i++;
                            }
                        });
                    },
                    error: function () {
                        alert("Not connected");
                    }
                });
            });
        </script>
        <form action="../api/apiBilledInvoice.php" method="post">
            <h1>Produce Invoice</h1>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Complete Admissions: </span>
                </div>
                <select class="form-control" id="getInvoice" name="id" required>
                    <option disabled selected hidden>Select an Admission</option>
                </select>
            </div>

            <div id="invoice">
            </div>

            <div class="d-flex justify-content-around">
                <input class="btn btn-outline-primary" type="submit" value="Produce Invoice"/>
                <a href="../api/apiLogin.php"><input class="btn btn-outline-primary" type="button" value="Return"></a>
            </div>
        </form>
    </div>

    <div id="closeAdmission" class="container tab-pane fade"><br>
        <script>
            $(document).ready(function () {
                $.ajax({
                    type: 'GET',
                    url: "",
                    dataType: "JSON",
                    success: function (data) {
                        i = 0;
                        while (i < data.length){
                            $("#getCloseAdmissions").append("<option value='" + data[i].id + "'>" + data[i].id + " " + data[i].description + "</option>");
                            i++;
                        }
                        $("#getCloseAdmissions").change(function() {
                            i = 0;
                            while (i < data.length) {
                                if (data[i].id == $("#getCloseAdmissions").val()) {
                                    $("#closeAdmissionId").val(data[i].id);
                                    $("#closeDescription").val(data[i].description);
                                    $("#closeAdmissiondate").val(data[i].admissiondate);
                                }
                                i++;
                            }
                        });
                    },
                    error: function () {
                        alert("Not connected");
                    }
                });
            });
        </script>
        <form action="../api/apiCloseAdmission.php" method="post">
            <h1>Close Admission</h1>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Billed Admissions (That Have Payments):* </span>
                </div>
                <select class="form-control" id="getCloseAdmissions" name="id" required>
                    <option disabled selected hidden>Select an Admission</option>
                </select>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Admission Id: </span>
                </div>
                <input type="text" class="form-control" id="closeAdmissionId" name="closeAdmissionId" placeholder="Admission Id" readonly>
                <div class="input-group-prepend">
                    <span class="input-group-text">Admission Date: </span>
                </div>
                <input type="date" class="form-control" id="closeAdmissiondate" name="admissiondate" placeholder="Admission Date" readonly>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Description: </span>
                </div>
                <input type="text" class="form-control" id="closeDescription" name="closeDescription" placeholder="Description" readonly>
            </div>
            <i class="grey">* Required Fields</i>
            <div class="d-flex justify-content-around">
                <input class="btn btn-outline-primary" type="submit" value="Close Admission"/>
                <a href="../api/apiLogin.php"><input class="btn btn-outline-primary" type="button" value="Return"></a>
            </div>
        </form>
    </div>

    <div id="allocateDoctor" class="container tab-pane fade"><br>
        <script>
            $.ajax({
                type: 'GET',
                url: "../api/apiAllDoctors.php",
                dataType: "JSON",
                success: function (data) {
                    i = 0;
                    while (i < data.length){
                        $("#getAllocateDoctors").append("<option value='" + data[i].id + "'>" + data[i].id + " " + data[i].firstname + " " + data[i].lastname + "</option>");
                        i++;
                    }
                },
                error: function () {
                    alert("Not connected");
                }
            });
            $.ajax({
                type: 'GET',
                url: "../api/apiAllocationPrescription.php",
                dataType: "JSON",
                success: function (data) {
                    i = 0;
                    while (i < data.length){
                        $("#getAllocateAdmissions").append("<option value='" + data[i].id + "'>" + data[i].id + " " + data[i].description + "</option>");
                        i++;
                    }
                    $("#getAllocateAdmissions").change(function() {
                        i = 0;
                        while (i < data.length) {
                            if (data[i].id == $("#getAllocateAdmissions").val()) {
                                $("#allocateAdmissionId").val(data[i].id);
                                $("#allocateDescription").val(data[i].description);
                                $("#allocatePatientInfo").val(data[i].patient.firstname + " " + data[i].patient.lastname);
                                d = 0;
                                info = "";
                                while (d < data[i].doctor.length) {
                                    info += (data[i].doctor[d].id + " , " + data[i].doctor[d].firstname + " " + data[i].doctor[d].lastname +
                                        " , " + data[i].doctor[d].role + " | ");
                                    d++;
                                }
                                $("#allocateDoctorInfo").val(info);
                            }
                            i++;
                        }
                    });
                },
                error: function () {
                    alert("Not connected");
                }
            });
        </script>
        <form action="../api/apiAddAllocation.php" method="post">
            <h1>Allocate Doctor</h1>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Admissions:* </span>
                </div>
                <select class="form-control" id="getAllocateAdmissions" name="admissionID" required>
                    <option disabled selected hidden>Select an Admission</option>
                </select>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Admission Id: </span>
                </div>
                <input type="text" class="form-control" id="allocateAdmissionId" name="id" readonly>
                <div class="input-group-prepend">
                    <span class="input-group-text">Description: </span>
                </div>
                <input type="text" maxlength="25" class="form-control" id="allocateDescription" name="description" readonly>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Patient Name: </span>
                </div>
                <input type="text" maxlength="50" class="form-control" id="allocatePatientInfo" name="patient" readonly>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Allocated Doctors: </span>
                </div>
                <input type="text" maxlength="50" class="form-control" id="allocateDoctorInfo" name="doctor" readonly>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Doctors:* </span>
                </div>
                <select class="form-control" id="getAllocateDoctors" name="doctorID" required>
                    <option disabled selected hidden>Select a Doctor</option>
                </select>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Fee:* </span>
                </div>
                <input type="number" min="0" max="99999.99" maxlength="8" class="form-control" id="allocateFee" name="fee" required>
                <div class="input-group-prepend">
                    <span class="input-group-text">Role:* </span>
                </div>
                <select class="form-control" id="allocateRole" name="role" required>
                    <option value="primary">Primary</option>
                    <option value="secondary">Secondary</option>
                </select>
            </div>
            <i class="grey">* Required Fields</i>
            <div class="d-flex justify-content-around">
                <input class="btn btn-outline-primary" type="submit" value="Allocate Doctor"/>
                <a href="../api/apiLogin.php"><input class="btn btn-outline-primary" type="button" value="Return"></a>
            </div>
        </form>
    </div>

    <div id="removeDoctor" class="container tab-pane fade"><br>

    </div>
</div>
<?php include_once 'foot.php';?>
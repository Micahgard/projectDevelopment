<title>Admission</title>
<?php include_once 'head.php'; ?>
<?php include_once 'head-child.php'; ?>
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
                        var i = 0;
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
                        var i = 0;
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
                    <option disabled value="" selected hidden>Select a Patient</option>
                </select>
                <div class="input-group-prepend">
                    <span class="input-group-text">Ward:* </span>
                </div>
                <select class="form-control" id="getWard" name="wardID" required>
                    <option disabled value="" selected hidden>Select a Ward</option>
                </select>
            </div>
            <i class="grey">* Required Fields</i>
            <div class="d-flex justify-content-around">
                <input class="btn btn-outline-primary" type="submit" value="Add Admission">
                <input class="btn btn-outline-primary" onclick="goBack()" value="Return">
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
                        var i = 0;
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
                    <option disabled value="" selected hidden>Select an Admission</option>
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
                <input type="text" maxlength="30" class="form-control" id="updateDescription" name="description" placeholder="Description" title="Description" required>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Admission Date:* </span>
                </div>
                <input type="date" maxlength="10" class="form-control" id="updateAdmissiondate" name="admissiondate" title="Admission Date" required>
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
                <input class="btn btn-outline-primary" type="submit" value="Update Admission">
                <input class="btn btn-outline-primary" onclick="goBack()" value="Return">
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
                        var i = 0;
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
                                    $("#deleteStatus").val(data[i].status);
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
        <form action="../api/apiDeleteAdmission.php" method="post">
            <h1>Delete Admission</h1>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Admissions:* </span>
                </div>
                <select class="form-control" id="getDeleteAdmissions" name="id" required>
                    <option disabled value="" selected hidden>Select an Admission</option>
                </select>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Admission Id: </span>
                </div>
                <input type="text" class="form-control" id="deleteAdmissionId" name="id" readonly>
                <div class="input-group-prepend">
                    <span class="input-group-text">Description: </span>
                </div>
                <input type="text" class="form-control" id="deleteDescription" name="description" readonly>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Admission Date: </span>
                </div>
                <input type="text" class="form-control" id="deleteAdmissiondate" name="admissiondate" readonly>
                <div class="input-group-prepend">
                    <span class="input-group-text">Status: </span>
                </div>
                <input type="text" class="form-control" id="deleteStatus" name="status" readonly>
            </div>
            <i class="grey">* Required Fields</i>
            <div class="d-flex justify-content-around">
                <input class="btn btn-outline-primary" type="submit" value="Delete Admission">
                <input class="btn btn-outline-primary" onclick="goBack()" value="Return">
            </div>
        </form>
    </div>

    <div id="admissionsReport" class="container tab-pane fade" style="width: 50rem"><br>
    <h1>Admissions Report</h1>
        <script>
            $(document).ready(function () {
                $.ajax({
                    type: 'GET',
                    url: "../api/apiAdmissionsReport.php",
                    dataType: "JSON",
                    success: function (data) {
                        var i = 0;
                        while (i < data.length){
                            $("#report").append("<hr>");
                            $("#report").append("<table class='table table-borderless' style='table-layout: fixed; width: 125%'><tr><td><b>Admission ID:</b> "+data[i].id+" </td><td><b>Description:</b> "+data[i].description+"</td><td></td></tr></table>");
                            $("#report").append("<table class='table table-borderless' style='table-layout: fixed; width: 125%'><tr><td><b>Status:</b> "+data[i].status+"</td><td><b>Date:</b> "+data[i].admissiondate+"</td>" +
                                "<td><b>Patient:</b> "+data[i].patient.firstname+" "+data[i].patient.lastname+"</td></tr></table>");
                            $("#report").append("<table class='table table-borderless' style='width: 125%'><tr><td><b>Medication(s):</b> </td>");
                            $("#report").append("<tr><td>abc</td>");
                            var m = 0;
                            while (m < data[i].medication.length) {
                                $("#report").append("<td>"+data[i].medication[m].name+"</td>");
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
        <div id="report">
        </div>
        <input class="btn btn-outline-primary" onclick="goBack()" value="Return">
        <br><br><br>
    </div>

    <div id="produceInvoice" class="container tab-pane fade" style="width: 50rem"><br>
        <script>
            $(document).ready(function () {
                $.ajax({
                    type: 'GET',
                    url: "../api/apiCompleteAdmissions.php",
                    dataType: "JSON",
                    success: function (data) {
                        var i = 0;
                        while (i < data.length) {
                            $("#getInvoice").append("<option value='" + data[i].AdmissionID + "'>" + data[i].AdmissionID + " " + data[i].description + "</option>");
                            i++;
                        }
                        $("#getInvoice").change(function() {
                            i = 0;
                            while (i < data.length) {
                                if (data[i].AdmissionID == $("#getInvoice").val()) {
                                    $("#invoice").html("<table class='table table-sm table-borderless'><tr><td><b>Patient Details:</b></td></tr></table>");
                                    $("#invoice").append("<hr>");
                                    $("#invoice").append("<table class='table table-borderless table-sm'><tr><td>" + data[i].patient.patient
                                        + " &nbsp;&nbsp;&nbsp;" + data[i].patient.firstname + " " + data[i].patient.lastname
                                        + "</td></tr><tr><td>" + data[i].patient.address + "</td></tr></table>");
                                    $("#invoice").append("<hr>");
                                    $("#invoice").append("<table class='table table-sm table-borderless' style='table-layout: fixed'><tr style='font-weight: bold'><td>Medication(s)</td><td style='text-align: center'>Quantity</td><td style='float: right'>Cost</td></tr></table>");
                                    $("#invoice").append("<hr>");
                                    var m = 0;
                                    var med = 0;
                                    while (m < data[i].medication.length) {
                                        $("#invoice").append("<table class='table table-borderless table-sm' style='table-layout: fixed'><tr><td>" + data[i].medication[m].name + "</td><td style='text-align: center'>" + data[i].medication[m].amount + "</td><td style='float: right'>$" + data[i].medication[m].cost + "</td></tr></table>");
                                        med += (data[i].medication[m].cost) * (data[i].medication[m].amount);
                                        m++;
                                    }
                                    $("#invoice").append("<hr>");
                                    $("#invoice").append("<table class='table table-sm table-borderless'><tr style='font-weight: bold'><td>Doctor(s)</td><td style='float: right'>Fee</td></tr></table>");
                                    $("#invoice").append("<hr>");
                                    var d = 0;
                                    var fee = 0;
                                    while (d < data[i].doctor.length) {
                                        $("#invoice").append("<table class='table table-borderless table-sm'><tr><td>" + data[i].doctor[d].firstname + " " + data[i].doctor[d].lastname + "</td><td style='float: right'>$" + data[i].doctor[d].fee + "</td></tr></table>");
                                        fee += parseFloat(data[i].doctor[d].fee);
                                        d++;
                                    }
                                    var due = med + fee;
                                    $("#invoice").append("<hr>");
                                    $("#invoice").append("<table class='table table-borderless table-sm'><tr><td style='float: right'><b>Total Due:</b> $ " + due + "</td></tr></table>");
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
                    <span class="input-group-text">Admissions: </span>
                </div>
                <select class="form-control" id="getInvoice" name="id" required>
                    <option disabled value="" selected hidden>Select an Invoice</option>
                </select>
            </div>

            <div id="invoice">
            </div>

            <div class="d-flex justify-content-around">
                <input class="btn btn-outline-primary" type="submit" value="Produce Invoice">
                <input class="btn btn-outline-primary" onclick="goBack()" value="Return">
            </div>
        </form>
        <br><br><br>
    </div>

    <div id="closeAdmission" class="container tab-pane fade"><br>
        <script>
            $(document).ready(function () {
                $.ajax({
                    type: 'GET',
                    url: "../api/apiBilledAdmissions.php",
                    dataType: "JSON",
                    success: function (data) {
                        var due, pay, i = 0;
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

                                    var m = 0;
                                    var med = 0;
                                    while (m < data[i].medication.length) {
                                        med += (data[i].medication[m].cost) * (data[i].medication[m].amount);
                                        m++;
                                    }

                                    var d = 0;
                                    var doc = 0;
                                    while (d < data[i].doctor.length) {
                                        doc += parseFloat(data[i].doctor[d].fee);
                                        d++;
                                    }

                                    due = med + doc;

                                    var p = 0;
                                    pay = 0;
                                    while (p < data[i].payment.length) {
                                        pay += parseFloat(data[i].payment[p].amount);
                                        p++;
                                    }
                                }
                                i++;
                            }
                            $("#amountdue").val(due);
                            $("#amountpay").val(pay);
                        });

                        $(function() {
                            $("#closeForm").on("submit",function() {
                                if (pay < due) {
                                    alert('Full payment has not been made yet. This admission cannot be closed');
                                    return false; // cancel submit
                                }
                                return true; // allow submit
                            });
                        });
                    },
                    error: function () {
                        alert("Not connected");
                    }
                });
            });
        </script>
        <form action="../api/apiCloseBilled.php" method="post" id="closeForm">
            <h1>Close Admission</h1>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Admissions:* </span>
                </div>
                <select class="form-control" id="getCloseAdmissions" name="id" required>
                    <option disabled value="" selected hidden>Select an Admission</option>
                </select>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Admission Id: </span>
                </div>
                <input type="text" class="form-control" id="closeAdmissionId" name="id" readonly>
                <div class="input-group-prepend">
                    <span class="input-group-text">Admission Date: </span>
                </div>
                <input type="date" class="form-control" id="closeAdmissiondate" name="admissiondate" readonly>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Description: </span>
                </div>
                <input type="text" class="form-control" id="closeDescription" name="description" readonly>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Amount Due($): </span>
                </div>
                <input type="text" class="form-control" id="amountdue" name="due" readonly>
                <div class="input-group-prepend">
                    <span class="input-group-text">Amount Pay($): </span>
                </div>
                <input type="text" class="form-control" id="amountpay" name="pay" readonly>
            </div>
            <i class="grey">* Required Fields</i>
            <div class="d-flex justify-content-around">
                <input class="btn btn-outline-primary" type="submit" id="closeAdmission" value="Close Admission">
                <input class="btn btn-outline-primary" onclick="goBack()" value="Return">
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
                    var i = 0;
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
                    var i = 0;
                    while (i < data.length){
                        $("#getAllocateAdmissions").append("<option value='" + data[i].id + "'>" + data[i].id + " " + data[i].description + "</option>");
                        if (data[i].doctor.length > 0) {
                            $("#getRemoveAdmissions").append("<option value='" + data[i].id + "'>" + data[i].id + " " + data[i].description + "</option>");
                        }
                        i++;
                    }

                    $("#getAllocateAdmissions").change(function() {
                        i = 0;
                        while (i < data.length) {
                            if (data[i].id == $("#getAllocateAdmissions").val()) {
                                $("#allocateAdmissionId").val(data[i].id);
                                $("#allocateDescription").val(data[i].description);
                                $("#allocatePatientLastname").val(data[i].patient.lastname);
                                $("#allocatePatientFirstname").val(data[i].patient.firstname);
                                var d = 0;
                                var info = "";
                                while (d < data[i].doctor.length) {
                                    info += (data[i].doctor[d].doctor + " , " + data[i].doctor[d].firstname + " " + data[i].doctor[d].lastname +
                                        " , " + data[i].doctor[d].role + " | ");
                                    d++;
                                }
                                $("#allocateDoctorInfo").val(info);
                            }
                            i++;
                        }
                    });

                    $("#getRemoveAdmissions").change(function() {
                        i = 0;
                        while (i < data.length) {
                            if (data[i].id == $("#getRemoveAdmissions").val()) {
                                $("#removeAdmissionId").val(data[i].id);
                                $("#removeDescription").val(data[i].description);
                                $("#removePatientLastname").val(data[i].patient.lastname);
                                $("#removePatientFirstname").val(data[i].patient.firstname);
                                var d = 0;
                                $("#getRemoveDoctors").html("");
                                while (d < data[i].doctor.length) {
                                    $("#getRemoveDoctors").append("<option value='" + data[i].doctor[d].allocation + "'>" + data[i].doctor[d].doctor + ", " +
                                        data[i].doctor[d].firstname + " " + data[i].doctor[d].lastname + ", " + data[i].doctor[d].role + ", " + data[i].doctor[d].fee + "</option>");
                                    d++;
                                }
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
                    <option disabled value="" selected hidden>Select an Admission</option>
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
                    <span class="input-group-text">Patient Last Name: </span>
                </div>
                <input type="text" maxlength="50" class="form-control" id="allocatePatientLastname" name="lastname" readonly>
                <div class="input-group-prepend">
                    <span class="input-group-text">Patient First Name: </span>
                </div>
                <input type="text" maxlength="50" class="form-control" id="allocatePatientFirstname" name="firstname" readonly>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Allocated Doctor(s): </span>
                </div>
                <input type="text" maxlength="50" class="form-control" id="allocateDoctorInfo" name="doctor" readonly>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Doctors:* </span>
                </div>
                <select class="form-control" id="getAllocateDoctors" name="doctorID" required>
                    <option disabled value="" selected hidden>Select a Doctor</option>
                </select>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Fee($):* </span>
                </div>
                <input type="number" step=".01" min="0" max="99999.99" maxlength="8" class="form-control" id="allocateFee" name="fee" title="fee" required>
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
                <input class="btn btn-outline-primary" type="submit" value="Allocate Doctor">
                <input class="btn btn-outline-primary" onclick="goBack()" value="Return">
            </div>
        </form>
    </div>

    <div id="removeDoctor" class="container tab-pane fade"><br>
        <form action="../api/apiDeleteAllocation.php" method="post">
            <h1>Remove Doctor</h1>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Admissions:* </span>
                </div>
                <select class="form-control" id="getRemoveAdmissions" name="admissionID" required>
                    <option disabled value="" selected hidden>Select an Admission</option>
                </select>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Admission Id: </span>
                </div>
                <input type="text" class="form-control" id="removeAdmissionId" name="admissionID" readonly>
                <div class="input-group-prepend">
                    <span class="input-group-text">Description: </span>
                </div>
                <input type="text" class="form-control" id="removeDescription" name="description" readonly>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Patient Last Name: </span>
                </div>
                <input type="text" class="form-control" id="removePatientLastname" name="patientLastname" readonly>
                <div class="input-group-prepend">
                    <span class="input-group-text">Patient First Name: </span>
                </div>
                <input type="text" class="form-control" id="removePatientFirstname" name="patientFirstname" readonly>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Allocated Doctor(s):* </span>
                </div>
                <select class="form-control" id="getRemoveDoctors" name="allocationID" required>
                    <option disabled value="" selected hidden>Select a Doctor</option>
                </select>
            </div>
            <i class="grey">* Required Fields</i>
            <div class="d-flex justify-content-around">
                <input class="btn btn-outline-primary" type="submit" value="Remove Doctor">
                <input class="btn btn-outline-primary" onclick="goBack()" value="Return">
            </div>
        </form>
    </div>
</div>
<?php include_once 'foot.php';?>
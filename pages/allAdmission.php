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
        <a class="nav-link" data-toggle="tab" href="#closeAdmission">Close Admission</a>
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
                        let i = 0;
                        while (i < data.length){
                            $("#getPatient").append("<option value='" + data[i].id + "'>" + data[i].id + " " + data[i].firstname + " " + data[i].lastname + "</option>");
                            i = i + 1;
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
                        let i = 0;
                        while (i < data.length){
                            $("#getWard").append("<option value='" + data[i].id + "'>" + data[i].id + " " + data[i].name + "</option>");
                            i = i + 1;
                        }
                    },
                    error: function () {
                        alert("Not connected");
                    }
                });
            });
        </script>
        <form action="../api/apiAddAdmission.php" method="post">
            <h2>Add Admission</h2>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Description:* </span>
                </div>
                <input type="text" maxlength="30" class="form-control" id="description" name="description" placeholder="Description*" title="Description" required>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Admission Date:* </span>
                </div>
                <input type="date" maxlength="10" class="form-control" id="admissiondate" name="admissiondate" placeholder="Admission Date" title="Admission Date" required>
                <div class="input-group-prepend">
                    <span class="input-group-text">Status:* </span>
                </div>
                <select class="form-control" id="status" name="status" required>
                    <option disabled selected hidden>Select a Status</option>
                    <option value="current">Current</option>
                    <option value="complete">Complete</option>
                    <option value="billed">Billed</option>
                    <option value="closed">Closed</option>
                </select>
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
                    url: "../api/apiAllPatients.php",
                    dataType: "JSON",
                    success: function (data) {
                        $("#getUpdateAdmissions").change(function() {
                            var i = 0;
                            while (i < data.length) {
                                if (data[i].id == $("#getUpdateAdmissions").val()) {
                                    $("#updatePatientLastname").val(data[i].lastname);
                                    $("#updatePatientFirstname").val(data[i].firstname);
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
                        let i = 0;
                        while (i < data.length){
                            $("#getUpdateWard").append("<option value='" + data[i].id + "'>" + data[i].id + " " + data[i].name + "</option>");
                            i = i + 1;
                        }
                    },
                    error: function () {
                        alert("Not connected");
                    }
                });
                $.ajax({
                    type: 'GET',
                    url: "../api/apiAllAdmissions.php",
                    dataType: "JSON",
                    success: function (data) {
                        let i = 0;
                        while (i < data.length){
                            $("#getUpdateAdmissions").append("<option value='" + data[i].id + "'>" + data[i].id + " " + data[i].description + "</option>");
                            i = i + 1;
                        }
                        $("#getUpdateAdmissions").change(function() {
                            var i = 0;
                            while (i < data.length) {
                                if (data[i].id == $("#getUpdateAdmissions").val()) {
                                    $("#updateAdmissionId").val(data[i].id);
                                    $("#updateDescription").val(data[i].description);
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
            <h2>Update Admission</h2>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Admissions:* </span>
                </div>
                <select class="form-control" id="getUpdateAdmissions" name="id" required>
                    <option disabled selected hidden>Select a Doctor</option>
                </select>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Admission Id: </span>
                </div>
                <input type="text" maxlength="30" class="form-control" id="updateAdmissionId" name="updateAdmissionId" title="Admission Id" readonly>
                <div class="input-group-prepend">
                    <span class="input-group-text">Description:* </span>
                </div>
                <input type="text" maxlength="30" class="form-control" id="updateDescription" name="updateDescription" placeholder="Description*" title="Description" required>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Admission Date:* </span>
                </div>
                <input type="date" maxlength="10" class="form-control" id="updateAdmissiondate" name="updateAdmissiondate" placeholder="Admission Date" title="Admission Date" required>
                <div class="input-group-prepend">
                    <span class="input-group-text">Status:* </span>
                </div>
                <select class="form-control" id="updateStatus" name="updateStatus" required>
                    <option disabled selected hidden>Select a Status</option>
                    <option value="current">Current</option>
                    <option value="complete">Complete</option>
                    <option value="billed">Billed</option>
                    <option value="closed">Closed</option>
                </select>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Patient Last Name: </span>
                </div>
                <input type="text" class="form-control" id="updatePatientLastname" name="updatePatientLastname" readonly>
                <div class="input-group-prepend">
                    <span class="input-group-text">Patient First Name: </span>
                </div>
                <input type="text" class="form-control" id="updatePatientFirstname" name="updatePatientFirstname" readonly>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Ward Name: </span>
                </div>
                <input type="text" class="form-control" id="updateWardName" name="updateWardName" readonly>
            </div>
            <i class="grey">* Required Fields</i>
            <div class="d-flex justify-content-around">
                <input class="btn btn-outline-primary" type="submit" value="Add Admission"/>
                <a href="../api/apiLogin.php"><input class="btn btn-outline-primary" type="button" value="Return"></a>
            </div>
        </form>
    </div>
    <div id="deleteAdmission" class="container tab-pane fade"><br>

    </div>

    <div id="closeAdmission" class="container tab-pane fade"><br>

    </div>
</div>
<?php include_once 'foot.php';?>
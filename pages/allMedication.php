<title>Medication</title>
<?php include_once 'head.php'; ?>

<!--Nav Tabs-->
<ul class="nav nav-tabs justify-content-center" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" data-toggle="tab" href="#addMedication">Add Medication</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#updateMedication">Update Medication</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#deleteMedication">Delete Medication</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#prescribeMedication">Prescribe Medication</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#removePrescription">Remove Prescription</a>
    </li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
    <div id="addMedication" class="container tab-pane active"><br>
        <form action="../api/apiAddMedication.php" method="post">
            <h1>Add Medication</h1>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Name:* </span>
                </div>
                <input type="text" maxlength="30" class="form-control" id="name" name="name" placeholder="Name" title="name" required>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Cost:* </span>
                </div>
                <input type="number" min="0" max="9999.99" maxlength="7" step=".01" class="form-control" id="cost" name="cost" title="cost" required>
            </div>
            <i class="grey">* Required Fields</i>
            <div class="d-flex justify-content-around">
                <input class="btn btn-outline-primary" type="submit" value="Add Medication"/>
                <a href="../api/apiLogin.php"><input class="btn btn-outline-primary" type="button" value="Return"></a>
            </div>
        </form>
    </div>

    <div id="updateMedication" class="container tab-pane fade"><br>
        <script>
            $.ajax({
                type: 'GET',
                url: "../api/apiAllMedications.php",
                dataType: "JSON",
                success: function (data) {
                    let i = 0;
                    while (i < data.length){
                        $("#getUpdateMedications").append("<option value='" + data[i].id + "'>" + data[i].id + " " + data[i].name + "</option>");
                        i = i + 1;
                    }
                    $("#getUpdateMedications").change(function() {
                        i = 0;
                        while (i < data.length) {
                            if (data[i].id == $("#getUpdateMedications").val()) {
                                $("#updateMedicationId").val(data[i].id);
                                $("#updateName").val(data[i].name);
                                $("#updateCost").val(data[i].cost);
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
        <form action="../api/apiUpdateMedication.php" method="post">
            <h1>Update Medication</h1>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Medications:* </span>
                </div>
                <select class="form-control" id="getUpdateMedications" name="id" required>
                    <option disabled selected hidden>Select a Medication</option>
                </select>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Medication Id: </span>
                </div>
                <input type="text" class="form-control" id="updateMedicationId" name="id" readonly>
                <div class="input-group-prepend">
                    <span class="input-group-text">Name:* </span>
                </div>
                <input type="text" maxlength="30" class="form-control" id="updateName" name="name" placeholder="Name" title="name" required>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Cost:* </span>
                </div>
                <input type="number" min="0" max="9999.99" maxlength="7" step=".01" class="form-control" id="updateCost" name="cost" title="cost" required>
            </div>
            <i class="grey">* Required Fields</i>
            <div class="d-flex justify-content-around">
                <input class="btn btn-outline-primary" type="submit" value="Update Medication"/>
                <a href="../api/apiLogin.php"><input class="btn btn-outline-primary" type="button" value="Return"></a>
            </div>
        </form>
    </div>

    <div id="deleteMedication" class="container tab-pane fade"><br>
        <script>
            $.ajax({
                type: 'GET',
                url: "../api/apiMedicationsNoPrescription.php",
                dataType: "JSON",
                success: function (data) {
                    i = 0;
                    while (i < data.length){
                        $("#getDeleteMedications").append("<option value='" + data[i].id + "'>" + data[i].id + " " + data[i].name + "</option>");
                        i = i + 1;
                    }
                    $("#getDeleteMedications").change(function() {
                        i = 0;
                        while (i < data.length) {
                            if (data[i].id == $("#getDeleteMedications").val()) {
                                $("#deleteMedicationId").val(data[i].id);
                                $("#deleteName").val(data[i].name);
                                $("#deleteCost").val(data[i].cost);
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
        <form action="../api/apiDeleteMedication.php" method="get">
            <h1>Delete Medication</h1>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Medications:* </span>
                </div>
                <select class="form-control" id="getDeleteMedications" name="id" required>
                    <option disabled selected hidden>Select a Medication</option>
                </select>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Medication Id: </span>
                </div>
                <input type="text" class="form-control" id="deleteMedicationId" name="id" readonly>
                <div class="input-group-prepend">
                    <span class="input-group-text">Name: </span>
                </div>
                <input type="text" maxlength="30" class="form-control" id="deleteName" name="name" readonly>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Cost: </span>
                </div>
                <input type="text" class="form-control" id="deleteCost" name="cost" readonly>
            </div>
            <i class="grey">* Required Fields</i>
            <div class="d-flex justify-content-around">
                <input class="btn btn-outline-primary" type="submit" value="Delete Medication"/>
                <a href="../api/apiLogin.php"><input class="btn btn-outline-primary" type="button" value="Return"></a>
            </div>
        </form>
    </div>

    <div id="prescribeMedication" class="container tab-pane fade"><br>
        <script>
            $.ajax({
                type: 'GET',
                url: "../api/apiAllMedications.php",
                dataType: "JSON",
                success: function (data) {
                    i = 0;
                    while (i < data.length){
                        $("#getPrescibeMedications").append("<option value='" + data[i].id + "'>" + data[i].id + " " + data[i].name + " " + data[i].cost + "</option>");
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
                        $("#getPrescibeAdmissions").append("<option value='" + data[i].id + "'>" + data[i].id + " " + data[i].description + "</option>");
                        i = i + 1;
                    }
                    $("#getPrescibeAdmissions").change(function() {
                        i = 0;
                        while (i < data.length) {
                            if (data[i].id == $("#getPrescibeAdmissions").val()) {
                                $("#prescribeAdmissionId").val(data[i].id);
                                $("#prescribeDescription").val(data[i].description);
                                $("#prescribePatientInfo").val(data[i].patient.firstname + " " + data[i].patient.lastname);
                                m = 0;
                                info = "";
                                while (m < data[i].medication.length) {
                                    info += (data[i].medication[m].name + " , " + data[i].medication[m].amount + " , " + data[i].medication[m].prescriptiondate + " | ");
                                    m++;
                                }
                                $("#prescribeMedicationInfo").val(info);
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
        <form action="../api/apiAddPrescription.php" method="post">
            <h1>Prescribe Medication</h1>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Admissions:* </span>
                </div>
                <select class="form-control" id="getPrescibeAdmissions" name="admissionID" required>
                    <option disabled selected hidden>Select an Admission</option>
                </select>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Admission Id: </span>
                </div>
                <input type="text" class="form-control" id="prescribeAdmissionId" name="id" readonly>
                <div class="input-group-prepend">
                    <span class="input-group-text">Description: </span>
                </div>
                <input type="text" maxlength="25" class="form-control" id="prescribeDescription" name="description" readonly>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Patient Name: </span>
                </div>
                <input type="text" maxlength="50" class="form-control" id="prescribePatientInfo" name="patient" readonly>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Prescribed Medications: </span>
                </div>
                <input type="text" maxlength="50" class="form-control" id="prescribeMedicationInfo" name="medication" readonly>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Medications:* </span>
                </div>
                <select class="form-control" id="getPrescibeMedications" name="medicationID" required>
                    <option disabled selected hidden>Select a Medication</option>
                </select>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Amount:* </span>
                </div>
                <input type="number" step=".01" min="0" max="999.99" maxlength="6" class="form-control" id="preAmount" name="amount" title="amount" required>
            </div>
            <i class="grey">* Required Fields</i>
            <div class="d-flex justify-content-around">
                <input class="btn btn-outline-primary" type="submit" value="Prescribe Medication"/>
                <a href="../api/apiLogin.php"><input class="btn btn-outline-primary" type="button" value="Return"></a>
            </div>
        </form>
    </div>

    <div id="removePrescription" class="container tab-pane fade"><br>

    </div>
</div>

<?php include_once 'foot.php';?>
<title>Patient</title>
<?php include_once 'head.php'; ?>
<?php include_once 'head-child.php'; ?>
<!--Nav Tabs-->
<ul class="nav nav-tabs justify-content-center" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" data-toggle="tab" href="#addPatient">Add Patient</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#updatePatient">Update Patient</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#deletePatient">Delete Patient</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#patientsReport">Patients Report</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#recordPayment">Record Payment</a>
    </li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
    <div id="addPatient" class="container tab-pane active"><br>
        <form action="../api/apiAddPatient.php" method="post">
            <h1>Add Patient</h1>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Last Name:* </span>
                </div>
                <input type="text" maxlength="25" class="form-control" id="lastname" name="lastname" placeholder="Last Name" required>
                <div class="input-group-prepend">
                    <span class="input-group-text">First Name:* </span>
                </div>
                <input type="text" maxlength="25" class="form-control" id="firstname" name="firstname" placeholder="First Name" required>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Street Address:* </span>
                </div>
                <input type="text" maxlength="50" class="form-control" id="street" name="street" placeholder="Street Address" required>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Suburb:* </span>
                </div>
                <input type="text" maxlength="20" class="form-control" id="suburb" name="suburb" placeholder="Suburb" required>
                <div class="input-group-prepend">
                    <span class="input-group-text">City:* </span>
                </div>
                <input type="text" maxlength="20" class="form-control" id="city" name="city" placeholder="City" required>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Email:* </span>
                </div>
                <input type="text" maxlength="30" class="form-control" id="email" name="email" placeholder="Email Address" required>
                <div class="input-group-prepend">
                    <span class="input-group-text">Phone:* </span>
                </div>
                <input type="text" maxlength="15" class="form-control" id="phone" name="phone" placeholder="Phone Number" required>
                <div class="input-group-prepend">
                    <span class="input-group-text">Insurance Code: </span>
                </div>
                <input type="text" maxlength="8" class="form-control" id="insurcode" name="insurcode" placeholder="Insurance Code">
            </div>
            <i class="grey">* Required Fields</i>
            <div class="d-flex justify-content-around">
                <input class="btn btn-outline-primary" type="submit" value="Add Patient"/>
                <button class="btn btn-outline-primary" onclick="goBack()">Return</button>
            </div>
        </form>
    </div>

    <div id="updatePatient" class="container tab-pane fade"><br>
        <script>
            $.ajax({
                type: 'GET',
                url: "../api/apiAllPatients.php",
                dataType: "JSON",
                success: function (data) {
                    let i = 0;
                    while (i < data.length){
                        $("#getUpdatePatients").append("<option value='" + data[i].id + "'>" + data[i].id + " " + data[i].firstname + " " + data[i].lastname + "</option>");
                        i = i + 1;
                    }
                    $("#getUpdatePatients").change(function() {
                        var i = 0;
                        while (i < data.length) {
                            if (data[i].id == $("#getUpdatePatients").val()) {
                                $("#updatePatientId").val(data[i].id);
                                $("#updateLastname").val(data[i].lastname);
                                $("#updateFirstname").val(data[i].firstname);
                                $("#updateStreet").val(data[i].street);
                                $("#updateSuburb").val(data[i].suburb);
                                $("#updateCity").val(data[i].city);
                                $("#updateEmail").val(data[i].email);
                                $("#updatePhone").val(data[i].phone);
                                $("#updateInsurcode").val(data[i].insurcode);
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
        <form action="../api/apiUpdatePatient.php" method="post">
            <h1>Update Patient</h1>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Patients:* </span>
                </div>
                <select class="form-control" id="getUpdatePatients" name="id" required>
                    <option disabled selected hidden>Select a Patient</option>
                </select>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Patient Id: </span>
                </div>
                <input type="text" class="form-control" id="updatePatientId" name="id" readonly>
                <div class="input-group-prepend">
                    <span class="input-group-text">Last Name:* </span>
                </div>
                <input type="text" maxlength="25" class="form-control" id="updateLastname" name="lastname" placeholder="Last Name" required>
                <div class="input-group-prepend">
                    <span class="input-group-text">First Name:* </span>
                </div>
                <input type="text" maxlength="25" class="form-control" id="updateFirstname" name="firstname" placeholder="First Name" required>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Street Address:* </span>
                </div>
                <input type="text" maxlength="50" class="form-control" id="updateStreet" name="street" placeholder="Street Address" required>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Suburb:* </span>
                </div>
                <input type="text" maxlength="20" class="form-control" id="updateSuburb" name="suburb" placeholder="Suburb" required>
                <div class="input-group-prepend">
                    <span class="input-group-text">City:* </span>
                </div>
                <input type="text" maxlength="20" class="form-control" id="updateCity" name="city" placeholder="City" required>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Email:* </span>
                </div>
                <input type="text" maxlength="30" class="form-control" id="updateEmail" name="email" placeholder="Email Address" required>
                <div class="input-group-prepend">
                    <span class="input-group-text">Phone:* </span>
                </div>
                <input type="text" maxlength="15" class="form-control" id="updatePhone" name="phone" placeholder="Phone Number" required>
                <div class="input-group-prepend">
                    <span class="input-group-text">Insurance Code: </span>
                </div>
                <input type="text" maxlength="8" class="form-control" id="updateInsurcode" name="insurcode" placeholder="Insurance Code">
            </div>
            <i class="grey">* Required Fields</i>
            <div class="d-flex justify-content-around">
                <input class="btn btn-outline-primary" type="submit" value="Update Patient"/>
                <button class="btn btn-outline-primary" onclick="goBack()">Return</button>
            </div>
        </form>
    </div>

    <div id="deletePatient" class="container tab-pane fade"><br>
        <script>
            $.ajax({
                type: 'GET',
                url: "../api/apiPatientsNoAdmission.php",
                dataType: "JSON",
                success: function (data) {
                    let i = 0;
                    while (i < data.length){
                        $("#getDeletePatients").append("<option value='" + data[i].id + "'>" + data[i].id + " " + data[i].firstname + " " + data[i].lastname + "</option>");
                        i = i + 1;
                    }
                    $("#getDeletePatients").change(function() {
                        var i = 0;
                        while (i < data.length) {
                            if (data[i].id == $("#getDeletePatients").val()) {
                                $("#deletePatientId").val(data[i].id);
                                $("#deleteLastname").val(data[i].lastname);
                                $("#deleteFirstname").val(data[i].firstname);
                                $("#deleteStreet").val(data[i].street);
                                $("#deleteSuburb").val(data[i].suburb);
                                $("#deleteCity").val(data[i].city);
                                $("#deleteEmail").val(data[i].email);
                                $("#deletePhone").val(data[i].phone);
                                $("#deleteInsurcode").val(data[i].insurcode);
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
        <form action="../api/apiDeletePatient.php" method="get">
            <h1>Delete Patient</h1>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Patients:* </span>
                </div>
                <select class="form-control" id="getDeletePatients" name="id" required>
                    <option disabled selected hidden>Select a Patient</option>
                </select>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Patient Id: </span>
                </div>
                <input type="text" class="form-control" id="deletePatientId" name="id" readonly>
                <div class="input-group-prepend">
                    <span class="input-group-text">Last Name: </span>
                </div>
                <input type="text" class="form-control" id="deleteLastname" name="lastname" readonly>
                <div class="input-group-prepend">
                    <span class="input-group-text">First Name: </span>
                </div>
                <input type="text" class="form-control" id="deleteFirstname" name="firstname" readonly>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Street Address: </span>
                </div>
                <input type="text" class="form-control" id="deleteStreet" name="street" readonly>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Suburb: </span>
                </div>
                <input type="text" class="form-control" id="deleteSuburb" name="suburb" readonly>
                <div class="input-group-prepend">
                    <span class="input-group-text">City: </span>
                </div>
                <input type="text" class="form-control" id="deleteCity" name="city" readonly>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Email: </span>
                </div>
                <input type="text" class="form-control" id="deleteEmail" name="email" readonly>
                <div class="input-group-prepend">
                    <span class="input-group-text">Phone: </span>
                </div>
                <input type="text" class="form-control" id="deletePhone" name="phone" readonly>
                <div class="input-group-prepend">
                    <span class="input-group-text">Insurance Code: </span>
                </div>
                <input type="text" class="form-control" id="deleteInsurcode" name="insurcode" readonly>
            </div>
            <i class="grey">* Required Fields</i>
            <div class="d-flex justify-content-around">
                <input class="btn btn-outline-primary" type="submit" value="Delete Patient"/>
                <button class="btn btn-outline-primary" onclick="goBack()">Return</button>
            </div>
        </form>
    </div>

    <div id="patientsReport" class="container tab-pane fade"><br>
        <h1>Patients Report</h1>
        <script>
            $(document).ready(function () {
                $.ajax({
                    type: 'GET',
                    url: "../api/apiPatientsReport.php",
                    dataType: "JSON",
                    success: function (data) {
                        i = 0;
                        while (i < data.length){
                            $("#report").append("<hr>");
                            $("#report").append("<p>ID: "+data[i].PatientID+" </p>");
                            $("#report").append("<p>Name: "+data[i].firstname+" "+data[i].lastname+" </p>");
                            $("#report").append("<p>Address: "+data[i].street+", "+data[i].suburb+", "+data[i].city+"</p>");
                            $("#report").append("<p>Email: "+data[i].email+" </p>");
                            $("#report").append("<p>Phone Number: "+data[i].phone+" </p>");
                            $("#report").append("<p>Insurance Code: "+data[i].insurcode+" </p>");
                            $("#report").append("<p>Complete Admissions: "+data[i].complete+" </p>");
                            $("#report").append("<p>Current Admissions: "+data[i].current+" </p>");
                            $("#report").append("<hr>");
                            i = i+1;
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
        <button class="btn btn-outline-primary" onclick="goBack()">Return</button>
        <br><br><br>
    </div>

    <div id="recordPayment" class="container tab-pane fade"><br>
        <script>
            $.ajax({
                type: 'GET',
                url: "../api/apiPatientPayment.php",
                dataType: "JSON",
                success: function (data) {
                    i = 0;
                    while (i < data.length){
                        $("#getPaymentPatients").append("<option value='" + data[i].id + "'>" + data[i].id + " " + data[i].firstname + " " + data[i].lastname + "</option>");
                        i++;
                    }
                    $("#getPaymentPatients").change(function() {
                        i = 0;
                        while (i < data.length) {
                            if (data[i].id == $("#getPaymentPatients").val()) {
                                $("#paymentPatientID").val(data[i].id);
                                $("#paymentLastname").val(data[i].lastname);
                                $("#paymentFirstname").val(data[i].firstname);
                                a = 0;
                                $("#getPaymentAdmissions").html("");
                                while (a < data[i].admission.length) {
                                    $("#getPaymentAdmissions").append("<option value='" + data[i].admission[a].id + "'>" + data[i].admission[a].id + " " + data[i].admission[a].description + "</option>");
                                    a++;
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
        <form action="../api/apiAddPayment.php" method="post">
            <h1>Record Payment</h1>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Patients:* </span>
                </div>
                <select class="form-control" id="getPaymentPatients" name="patientID" required>
                    <option disabled selected hidden>Select a Patient</option>
                </select>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Patient Id: </span>
                </div>
                <input type="text" class="form-control" id="paymentPatientID" name="patientID" readonly>
                <div class="input-group-prepend">
                    <span class="input-group-text">Last Name: </span>
                </div>
                <input type="text" maxlength="25" class="form-control" id="paymentLastname" name="lastname" readonly>
                <div class="input-group-prepend">
                    <span class="input-group-text">First Name: </span>
                </div>
                <input type="text" maxlength="50" class="form-control" id="paymentFirstname" name="firstname" readonly>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Admissions:* </span>
                </div>
                <select class="form-control" id="getPaymentAdmissions" name="admissionID" required>
                    <option disabled selected hidden>Select an Admission</option>
                </select>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Payment Amount($):* </span>
                </div>
                <input type="number" step=".01" min="0" max="99999.99" maxlength="8" class="form-control" id="amount" name="amount" title="amount" required>
            </div>
            <i class="grey">* Required Fields</i>
            <div class="d-flex justify-content-around">
                <input class="btn btn-outline-primary" type="submit" value="Record Payment"/>
                <button class="btn btn-outline-primary" onclick="goBack()">Return</button>
            </div>
        </form>
    </div>
</div>

<?php include_once 'foot.php';?>
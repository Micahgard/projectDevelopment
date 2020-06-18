<title>Doctor</title>
<?php include_once 'head.php'; ?>

<!--Nav Tabs-->
<ul class="nav nav-tabs justify-content-center" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" data-toggle="tab" href="#addDoctor">Add Doctor</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#updateDoctor">Update Doctor</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#deleteDoctor">Delete Doctor</a>
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
    <div id="addDoctor" class="container tab-pane active"><br>
        <form action="../api/apiAddDoctor.php" method="post">
            <h1>Add Doctor</h1>
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
                <input type="text" maxlength="20" class="form-control" id="suburb" name="suburb" placeholder="Suburb*" required>
                <div class="input-group-prepend">
                    <span class="input-group-text">City: </span>
                </div>
                <input type="text" maxlength="20" class="form-control" id="city" name="city" placeholder="City">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Phone Number: </span>
                </div>
                <input type="text" maxlength="15" class="form-control" id="phone" name="phone" placeholder="Phone Number">
                <div class="input-group-prepend">
                    <span class="input-group-text">Speciality:* </span>
                </div>
                <input type="text" maxlength="20" class="form-control" id="speciality" name="speciality" placeholder="Speciality*" required>
                <div class="input-group-prepend">
                    <span class="input-group-text">Salary:* </span>
                </div>
                <input type="number" min="20000" max="200000" maxlength="9" class ="form-control" id="salary" name="salary" required>
            </div>
            <i class="grey">* Required Fields</i>
            <div class="d-flex justify-content-around">
                <input class="btn btn-outline-primary" type="submit" value="Add Doctor"/>
                <a href="../api/apiLogin.php"><input class="btn btn-outline-primary" type="button" value="Return"></a>
            </div>
        </form>
    </div>
    <div id="updateDoctor" class="container tab-pane fade"><br>
        <script>
            $.ajax({
                type: 'GET',
                url: "../api/apiAllDoctors.php",
                dataType: "JSON",
                success: function (data) {
                    let i = 0;
                    while (i < data.length){
                        $("#getUpdateDoctors").append("<option value='" + data[i].id + "'>" + data[i].id + " " + data[i].firstname + " " + data[i].lastname + "</option>");
                        i = i + 1;
                    }
                    $("#getUpdateDoctors").change(function() {
                        var i = 0;
                        while (i < data.length) {
                            if (data[i].id == $("#getUpdateDoctors").val()) {
                                $("#updateDoctorId").val(data[i].id);
                                $("#updateLastname").val(data[i].lastname);
                                $("#updateFirstname").val(data[i].firstname);
                                $("#updateStreet").val(data[i].street);
                                $("#updateSuburb").val(data[i].suburb);
                                $("#updateCity").val(data[i].city);
                                $("#updatePhone").val(data[i].phone);
                                $("#updateSpeciality").val(data[i].speciality);
                                $("#updateSalary").val(data[i].salary);
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
        <form action="../api/apiUpdateDoctor.php" method="post">
            <h1>Update Doctor</h1>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Doctors:* </span>
                </div>
                <select class="form-control" id="getUpdateDoctors" name="id" required>
                    <option disabled selected hidden>Select a Doctor</option>
                </select>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Doctor Id: </span>
                </div>
                <input type="text" class="form-control" id="updateDoctorId" name="updateDoctorId" placeholder="Doctor Id" readonly>
                <div class="input-group-prepend">
                    <span class="input-group-text">Last Name:* </span>
                </div>
                <input type="text" maxlength="25" class="form-control" id="updateLastname" name="updateLastname" placeholder="Last Name" required>
                <div class="input-group-prepend">
                    <span class="input-group-text">First Name:* </span>
                </div>
                <input type="text" maxlength="25" class="form-control" id="updateFirstname" name="updateFirstname" placeholder="First Name" required>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Street Address:* </span>
                </div>
                <input type="text" maxlength="50" class="form-control" id="updateStreet" name="updateStreet" placeholder="Street Address" required>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Suburb:* </span>
                </div>
                <input type="text" maxlength="20" class="form-control" id="updateSuburb" name="updateSuburb" placeholder="Suburb" required>
                <div class="input-group-prepend">
                    <span class="input-group-text">City: </span>
                </div>
                <input type="text" maxlength="20" class="form-control" id="updateCity" name="updateCity" placeholder="City">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Phone Number: </span>
                </div>
                <input type="text" maxlength="15" class="form-control" id="updatePhone" name="updatePhone" placeholder="Phone Number">
                <div class="input-group-prepend">
                    <span class="input-group-text">Speciality:* </span>
                </div>
                <input type="text" maxlength="20" class="form-control" id="updateSpeciality" name="updateSpeciality" placeholder="Speciality" required>
                <div class="input-group-prepend">
                    <span class="input-group-text">Salary:* </span>
                </div>
                <input type="number" min="20000" max="200000" maxlength="9" class ="form-control" id="updateSalary" name="updateSalary" required>
            </div>
            <i class="grey">* Required Fields</i>
            <div class="d-flex justify-content-around">
                <input class="btn btn-outline-primary" type="submit" value="Update Doctor"/>
                <a href="../api/apiLogin.php"><input class="btn btn-outline-primary" type="button" value="Return"></a>
            </div>
        </form>
    </div>
    <div id="deleteDoctor" class="container tab-pane fade"><br>
        <script>
            $.ajax({
                type: 'GET',
                url: "../api/apiAllDoctors.php",
                dataType: "JSON",
                success: function (data) {
                    let i = 0;
                    while (i < data.length){
                        $("#getDeleteDoctors").append("<option value='" + data[i].id + "'>" + data[i].id + " " + data[i].firstname + " " + data[i].lastname + "</option>");
                        i = i + 1;
                    }
                    $("#getDeleteDoctors").change(function() {
                        var i = 0;
                        while (i < data.length) {
                            if (data[i].id == $("#getDeleteDoctors").val()) {
                                $("#deleteDoctorId").val(data[i].id);
                                $("#deleteLastname").val(data[i].lastname);
                                $("#deleteFirstname").val(data[i].firstname);
                                $("#deleteStreet").val(data[i].street);
                                $("#deleteSuburb").val(data[i].suburb);
                                $("#deleteCity").val(data[i].city);
                                $("#deletePhone").val(data[i].phone);
                                $("#deleteSpeciality").val(data[i].speciality);
                                $("#deleteSalary").val(data[i].salary);
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
            <form action="../api/apiDeleteDoctor.php" method="get">
                <h1>Delete Doctor</h1>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Doctors:* </span>
                    </div>
                    <select class="form-control" id="getDeleteDoctors" name="id" required>
                        <option disabled selected hidden>Select a Doctor</option>
                    </select>
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Doctor Id: </span>
                    </div>
                    <input type="text" class="form-control" id="deleteDoctorId" name="deleteDoctorId" placeholder="Doctor Id" readonly>
                    <div class="input-group-prepend">
                        <span class="input-group-text">Last Name: </span>
                    </div>
                    <input type="text" class="form-control" id="deleteLastname" name="deleteLastname" readonly>
                    <div class="input-group-prepend">
                        <span class="input-group-text">First Name: </span>
                    </div>
                    <input type="text" class="form-control" id="deleteFirstname" name="deleteFirstname" readonly>
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Street Address: </span>
                    </div>
                    <input type="text" class="form-control" id="deleteStreet" name="deleteStreet" readonly>
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Suburb: </span>
                    </div>
                    <input type="text" class="form-control" id="deleteSuburb" name="deleteSuburb" readonly>
                    <div class="input-group-prepend">
                        <span class="input-group-text">City: </span>
                    </div>
                    <input type="text" class="form-control" id="deleteCity" name="deleteCity" readonly>
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Phone Number: </span>
                    </div>
                    <input type="text" class="form-control" id="deletePhone" name="deletePhone" readonly>
                    <div class="input-group-prepend">
                        <span class="input-group-text">Speciality: </span>
                    </div>
                    <input type="text" class="form-control" id="deleteSpeciality" name="deleteSpeciality" readonly>
                    <div class="input-group-prepend">
                        <span class="input-group-text">Salary: </span>
                    </div>
                    <input type="text" class="form-control" id="deleteSalary" name="deleteSalary" readonly>
                </div>
                <i class="grey">* Required Fields</i>
                <div class="d-flex justify-content-around">
                    <input class="btn btn-outline-primary" type="submit" value="Delete Doctor"/>
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
                    let i = 0;
                    while (i < data.length){
                        $("#getAllocateDoctors").append("<option value='" + data[i].id + "'>" + data[i].id + " " + data[i].firstname + " " + data[i].lastname + "</option>");
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
                        $("#getAllocateAdmissions").append("<option value='" + data[i].id + "'>" + data[i].id + " " + data[i].description + "</option>");
                        i = i + 1;
                    }
                    $("#getAllocateAdmissions").change(function() {
                        var i = 0;
                        while (i < data.length) {
                            if (data[i].id == $("#getAllocateAdmissions").val()) {
                                $("#allocateAdmissionId").val(data[i].id);
                                $("#allocateDescription").val(data[i].description);
                                $("#allocatePatientLastname").val(data[i].lastname);
                                $("#allocatePatientFirstname").val(data[i].firstname);
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
        <form action="../api/apiAllocateDoctor.php" method="post">
            <h1>Allocate Doctor</h1>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Admissions:* </span>
                </div>
                <select class="form-control" id="getAllocateAdmissions" name="id" required>
                    <option disabled selected hidden>Select an Admission</option>
                </select>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Admission Id: </span>
                </div>
                <input type="text" class="form-control" id="allocateAdmissionId" name="allocateAdmissionId" placeholder="Admission Id" readonly>
                <div class="input-group-prepend">
                    <span class="input-group-text">Description: </span>
                </div>
                <input type="text" maxlength="25" class="form-control" id="allocateDescription" name="allocateDescription" placeholder="Description" readonly>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Patient Last Name: </span>
                </div>
                <input type="text" maxlength="25" class="form-control" id="allocatePatientLastname" name="allocatePatientLastname" placeholder="Patient Last Name" readonly>
                <div class="input-group-prepend">
                    <span class="input-group-text">Patient First Name: </span>
                </div>
                <input type="text" maxlength="50" class="form-control" id="allocatePatientFirstname" name="allocatePatientFirstname" placeholder="Patient First Name" readonly>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Doctors:* </span>
                </div>
                <select class="form-control" id="getAllocateDoctors" name="id" required>
                    <option disabled selected hidden>Select a Doctor</option>
                </select>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Fee:* </span>
                </div>
                <input type="number" min="1" max="99999.99" maxlength="8" class="form-control" id="allocateFee" name="allocateFee" required>
                <div class="input-group-prepend">
                    <span class="input-group-text">Role:* </span>
                </div>
                <select class="form-control" id="allocateRole" name="allocateRole" required>
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
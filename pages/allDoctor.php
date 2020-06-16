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
            <h2>Add Doctor</h2>
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
                <input type="text" maxlength="9" class="form-control" id="salary" name="salary" placeholder="Salary*" required>
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
            <h2>Update Doctor</h2>
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
                <input type="text" maxlength="50" class="form-control" id="updateStreet" placeholder="Street Address" required>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Suburb:* </span>
                </div>
                <input type="text" maxlength="20" class="form-control" id="updateSuburb" placeholder="Suburb" required>
                <div class="input-group-prepend">
                    <span class="input-group-text">City: </span>
                </div>
                <input type="text" maxlength="20" class="form-control" id="updateCity" placeholder="City">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Phone Number: </span>
                </div>
                <input type="text" maxlength="15" class="form-control" id="updatePhone" placeholder="Phone Number">
                <div class="input-group-prepend">
                    <span class="input-group-text">Speciality:* </span>
                </div>
                <input type="text" maxlength="20" class="form-control" id="updateSpeciality" placeholder="Speciality" required>
                <div class="input-group-prepend">
                    <span class="input-group-text">Salary:* </span>
                </div>
                <input type="text" maxlength="9" class="form-control" id="updateSalary" placeholder="Salary" required>
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
                <h2>Delete Doctor</h2>
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
                        <span class="input-group-text">Last Name: </span>
                    </div>
                    <input type="text" class="form-control" id="deleteLastname" name="deleteLastname" title="Last Name" readonly>
                    <div class="input-group-prepend">
                        <span class="input-group-text">First Name: </span>
                    </div>
                    <input type="text" class="form-control" id="deleteFirstname" name="deleteFirstname" title="First Name" readonly>
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Street Address: </span>
                    </div>
                    <input type="text" class="form-control" id="deleteStreet" title="Street Address" readonly>
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Suburb: </span>
                    </div>
                    <input type="text" class="form-control" id="deleteSuburb" readonly>
                    <div class="input-group-prepend">
                        <span class="input-group-text">City: </span>
                    </div>
                    <input type="text" class="form-control" id="deleteCity" readonly>
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Phone Number: </span>
                    </div>
                    <input type="text" class="form-control" id="deletePhone" readonly>
                    <div class="input-group-prepend">
                        <span class="input-group-text">Speciality: </span>
                    </div>
                    <input type="text" class="form-control" id="deleteSpeciality" readonly>
                    <div class="input-group-prepend">
                        <span class="input-group-text">Salary: </span>
                    </div>
                    <input type="text" class="form-control" id="deleteSalary" readonly>
                </div>
                <i class="grey">* Required Fields</i>
                <div class="d-flex justify-content-around">
                    <input class="btn btn-outline-primary" type="submit" value="Delete Doctor"/>
                    <a href="../api/apiLogin.php"><input class="btn btn-outline-primary" type="button" value="Return"></a>
                </div>
            </form>
    </div>
    <div id="allocateDoctor" class="container tab-pane fade"><br>

    </div>
    <div id="removeDoctor" class="container tab-pane fade"><br>

    </div>
</div>

<?php include_once 'foot.php';?>
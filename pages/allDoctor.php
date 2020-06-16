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
                    <span class="input-group-text">Name: </span>
                </div>
                <input type="text" maxlength="25" class="form-control" id="lastname" name="lastname" placeholder="Last Name*" title="Last Name" required>
                <input type="text" maxlength="25" class="form-control" id="firstname" name="firstname" placeholder="First Name*" title="First Name" required>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Address 1: </span>
                </div>
                <input type="text" maxlength="50" class="form-control" id="street" name="street" placeholder="Street Address*" title="Street Address" required>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Address 2: </span>
                </div>
                <input type="text" maxlength="20" class="form-control" id="suburb" name="suburb" placeholder="Suburb*" title="Suburb" required>
                <input type="text" maxlength="20" class="form-control" id="city" name="city" placeholder="City" title="City">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Details: </span>
                </div>
                <input type="text" maxlength="15" class="form-control" id="phone" name="phone" placeholder="Phone Number" title="Phone Number">
                <input type="text" maxlength="20" class="form-control" id="speciality" name="speciality" placeholder="Speciality*" title="Speciality" required>
                <input type="text" maxlength="9" class="form-control" id="salary" name="salary" placeholder="Salary*" title="Salary" required>
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
                    <span class="input-group-text">Doctors: </span>
                </div>
                <select class="form-control" id="getUpdateDoctors" name="id" required>
                    <option disabled selected hidden>Select a Doctor</option>
                </select>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Name: </span>
                </div>
                <input type="text" maxlength="25" class="form-control" id="updateLastname" name="updateLastname" placeholder="Last Name*" title="Last Name" required>
                <input type="text" maxlength="25" class="form-control" id="updateFirstname" name="updateFirstname" placeholder="First Name*" title="First Name" required>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Address 1: </span>
                </div>
                <input type="text" maxlength="50" class="form-control" id="updateStreet" placeholder="Street Address*" title="Street Address" required>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Address 2: </span>
                </div>
                <input type="text" maxlength="20" class="form-control" id="updateSuburb" placeholder="Suburb*" title="Suburb" required>
                <input type="text" maxlength="20" class="form-control" id="updateCity" placeholder="City" title="City">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Details: </span>
                </div>
                <input type="text" maxlength="15" class="form-control" id="updatePhone" placeholder="Phone Number" title="Phone Number">
                <input type="text" maxlength="20" class="form-control" id="updateSpeciality" placeholder="Speciality*" title="Speciality" required>
                <input type="text" maxlength="9" class="form-control" id="updateSalary" placeholder="Salary*" title="Salary" required>
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
                        <span class="input-group-text">Doctors: </span>
                    </div>
                    <select class="form-control" id="getDeleteDoctors" name="id" required>
                        <option disabled selected hidden>Select a Doctor</option>
                    </select>
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Name: </span>
                    </div>
                    <input type="text" class="form-control" id="deleteLastname" name="deleteLastname" placeholder="Last Name" title="Last Name" readonly>
                    <input type="text" class="form-control" id="deleteFirstname" name="deleteFirstname" placeholder="First Name" title="First Name" readonly>
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Address 1: </span>
                    </div>
                    <input type="text" class="form-control" id="deleteStreet" placeholder="Street Address" title="Street Address" readonly>
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Address 2: </span>
                    </div>
                    <input type="text" class="form-control" id="deleteSuburb" placeholder="Suburb" title="Suburb" readonly>
                    <input type="text" class="form-control" id="deleteCity" placeholder="City" title="City" readonly>
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Details: </span>
                    </div>
                    <input type="text" class="form-control" id="deletePhone" placeholder="Phone Number" title="Phone Number" readonly>
                    <input type="text" class="form-control" id="deleteSpeciality" placeholder="Speciality" title="Speciality" readonly>
                    <input type="text" class="form-control" id="deleteSalary" placeholder="Salary" title="Salary" readonly>
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
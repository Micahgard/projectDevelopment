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
                    <span class="input-group-text">Doctor: </span>
                </div>
                <input type="text" class="form-control" placeholder="First Name" required>
                <input type="text" class="form-control" placeholder="Last Name" required>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Address 1: </span>
                </div>
                <input type="text" class="form-control" placeholder="Street Address" required>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Address 2: </span>
                </div>
                <input type="text" class="form-control" placeholder="Suburb" required>
                <input type="text" class="form-control" placeholder="City" required>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Details: </span>
                </div>
                <input type="text" class="form-control" placeholder="Phone Number" required>
                <input type="text" class="form-control" placeholder="Speciality" required>
                <input type="text" class="form-control" placeholder="Salary" required>
            </div>
            <table>
                <tr>
                    <td><label>Last Name:<b class="red">*</b> </label></td>
                    <td><input type="text" id="lastname" name="lastname" size="25" placeholder="Last Name" required></td>
                </tr>

                <tr>
                    <td><label>First Name:<b class="red">*</b> </label></td>
                    <td><input type="text" id="firstname" name="firstname" size="25" placeholder="First Name" required></td>
                </tr>

                <tr>
                    <td><label>Street Address:<b class="red">*</b> </label></td>
                    <td><input type="text" id="street" name="street" size="50" placeholder="Street Address" required></td>
                </tr>

                <tr>
                    <td><label>Suburb:<b class="red">*</b> </label></td>
                    <td><input type="text" id="suburb" name="suburb" size="20" placeholder="Suburb" required></td>
                </tr>

                <tr>
                    <td><label>City:<b class="red">*</b> </label></td>
                    <td><input type="text" id="city" name="city" size="20" placeholder="City" required></td>
                </tr>

                <tr>
                    <td><label>Phone Number:<b class="red">*</b> </label></td>
                    <td><input type="text" id="phone" name="phone" size="15" placeholder="Phone Number" required></td>
                </tr>

                <tr>
                    <td><label>Speciality:<b class="red">*</b> </label></td>
                    <td><input type="text" id="speciality" name="speciality" size="15" placeholder="Speciality" required></td>
                </tr>

                <tr>
                    <td><label>Salary:<b class="red">*</b> </label></td>
                    <td><input type="text" id="salary" name="salary" size="15" placeholder="Salary" required></td>
                </tr>

                <tr><td><i class="red">* Required Fields</i></td></tr>
                <tr>
                    <td><input class="btn btn-outline-primary" type="submit" value="Add Doctor"/></td>
                    <td><a href="../api/apiLogin.php"><input class="btn btn-outline-primary" type="button" value="Return"></a></td>
                </tr>
            </table>
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
            <table>
                <tr>
                    <td><label>Doctors:<b class="red">*</b> </label></td>
                    <td><select id="getUpdateDoctors" name="id">
                            <option disabled selected hidden>Select a Doctor</option>
                        </select></td>
                </tr>
                <tr>
                    <td><label>Last Name:<b class="red">*</b> </label></td>
                    <td><input type="text" id="updateLastname" name="lastname" size="25" placeholder="Last Name" required></td>
                </tr>
                <tr>
                    <td><label>First Name:<b class="red">*</b> </label></td>
                    <td><input type="text" id="updateFirstname" name="firstname" size="25" placeholder="First Name" required></td>
                </tr>
                <tr>
                    <td><label>Street Address:<b class="red">*</b> </label></td>
                    <td><input type="text" id="updateStreet" name="street" size="50" placeholder="Street Address" required></td>
                </tr>
                <tr>
                    <td><label>Suburb:<b class="red">*</b> </label></td>
                    <td><input type="text" id="updateSuburb" name="suburb" size="20" placeholder="Suburb" required></td>
                </tr>
                <tr>
                    <td><label>City:<b class="red">*</b> </label></td>
                    <td><input type="text" id="updateCity" name="city" size="20" placeholder="City" required></td>
                </tr>
                <tr>
                    <td><label>Phone Number:<b class="red">*</b> </label></td>
                    <td><input type="text" id="updatePhone" name="phone" size="15" placeholder="Phone Number" required></td>
                </tr>
                <tr>
                    <td><label>Speciality:<b class="red">*</b> </label></td>
                    <td><input type="text" id="updateSpeciality" name="speciality" size="15" placeholder="Speciality" required></td>
                </tr>
                <tr>
                    <td><label>Salary:<b class="red">*</b> </label></td>
                    <td><input type="text" id="updateSalary" name="salary" size="15" placeholder="Salary" required></td>
                </tr>
                <tr><td><i class="red">* Required Fields</i></td></tr>
                <tr>
                    <td><input class="btn btn-outline-primary" type="submit" value="Update Doctor"/ ></td>
                    <td><a href="../api/apiLogin.php"><input class="btn btn-outline-primary" type="button" value="Return"></a></td>
                </tr>
            </table>
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
                <table>
                    <tr>
                        <td><label>Doctors:<b class="red">*</b> </label></td>
                        <td><select id="getDeleteDoctors" name="id" required>
                                <option disabled selected hidden>Select a Doctor</option>
                            </select></td>
                    </tr>
                    <tr>
                        <td><label>Last Name: </label></td>
                        <td><input type="text" id="deleteLastname" name="lastname" size="25" placeholder="Last Name" readonly></td>
                    </tr>
                    <tr>
                        <td><label>First Name: </label></td>
                        <td><input type="text" id="deleteFirstname" name="firstname" size="25" placeholder="First Name" readonly></td>
                    </tr>
                    <tr>
                        <td><label>Street Address: </label></td>
                        <td><input type="text" id="deleteStreet" name="street" size="50" placeholder="Street Address" readonly></td>
                    </tr>
                    <tr>
                        <td><label>Suburb: </label></td>
                        <td><input type="text" id="deleteSuburb" name="suburb" size="20" placeholder="Suburb" readonly></td>
                    </tr>
                    <tr>
                        <td><label>City: </label></td>
                        <td><input type="text" id="deleteCity" name="city" size="20" placeholder="City" readonly></td>
                    </tr>
                    <tr>
                        <td><label>Phone Number: </label></td>
                        <td><input type="text" id="deletePhone" name="phone" size="15" placeholder="Phone Number" readonly></td>
                    </tr>
                    <tr>
                        <td><label>Speciality: </label></td>
                        <td><input type="text" id="deleteSpeciality" name="speciality" size="15" placeholder="Speciality" readonly></td>
                    </tr>
                    <tr>
                        <td><label>Salary: </label></td>
                        <td><input type="text" id="deleteSalary" name="salary" size="15" placeholder="Salary" readonly></td>
                    </tr>
                    <tr><td><i class="red">* Required Fields</i></td></tr>
                    <tr>
                        <td><input class="btn btn-outline-primary" type="submit" value="Delete Doctor"/ ></td>
                        <td><a href="../api/apiLogin.php"><input class="btn btn-outline-primary" type="button" value="Return"></a></td>
                    </tr>
                </table>
            </form>
    </div>
    <div id="allocateDoctor" class="container tab-pane fade"><br>

    </div>
    <div id="removeDoctor" class="container tab-pane fade"><br>

    </div>
</div>

<?php include_once 'foot.php';?>
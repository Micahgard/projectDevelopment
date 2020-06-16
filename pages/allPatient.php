<title>Patient</title>
<?php include_once 'head.php'; ?>

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
        <a class="nav-link" data-toggle="tab" href="#recordPayment">Record Payment</a>
    </li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
    <div id="addPatient" class="container tab-pane active"><br>
        <form action="../api/apiAddPatient.php" method="post">
            <h2>Add Patient</h2>
            <table>
                <tr>
                    <td><label>Last Name:<b class="red">*</b> </label></td>
                    <td><input type="text"  name="lastname" size="25" required></td>
                </tr>

                <tr>
                    <td><label>First Name:<b class="red">*</b> </label></td>
                    <td><input type="text" id="firstname" name="firstname" size="25" required></td>
                </tr>

                <tr>
                    <td><label>Street Address:<b class="red">*</b> </label></td>
                    <td><input type="text" id="street" name="street" size="50" required></td>
                </tr>

                <tr>
                    <td><label>Suburb:<b class="red">*</b> </label></td>
                    <td><input type="text" id="suburb" name="suburb" size="20" required></td>
                </tr>

                <tr>
                    <td><label>City:<b class="red">*</b> </label></td>
                    <td><input type="text" id="city" name="city" size="20" required></td>
                </tr>

                <tr>
                    <td><label>Email Address:<b class="red">*</b> </label></td>
                    <td><input type="email" id="email" name="email" size="30" required></td>
                </tr>

                <tr>
                    <td><label>Phone Number:<b class="red">*</b> </label></td>
                    <td><input type="text" id="phone" name="phone" size="15" required></td>
                </tr>

                <tr>
                    <td><label>Insurance Code: </label></td>
                    <td><input type="text" id="insurcode" name="insurcode" size="10"></td>
                </tr>

                <tr><td><i class="red">* Required Fields</i></td></tr>
                <tr>
                    <td><input class="btn btn-outline-primary" type="submit" value="Add Patient"/></td>
                    <td><a href="../api/apiLogin.php"><input class="btn btn-outline-primary" type="button" value="Return"></a></td>
                </tr>
            </table>
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
            <h2>Update Patient</h2>
            <table>
                <tr>
                    <td><label>Patients:<b class="red">*</b> </label></td>
                    <td><select name="getUpdatePatients" class="custom-select">
                            <option></option>
                        </select></td>
                </tr>
                <tr>
                    <td><label>Last Name:<b class="red">*</b> </label></td>
                    <td><input type="text" id="updateLastname" name="updateLastname" size="25" required></td>
                </tr>
                <tr>
                    <td><label>First Name:<b class="red">*</b> </label></td>
                    <td><input type="text" id="updateFirstname" name="updateFirstname" size="25" required></td>
                </tr>
                <tr>
                    <td><label>Street Address:<b class="red">*</b> </label></td>
                    <td><input type="text" id="updateStreet" name="updateStreet" size="50" required></td>
                </tr>
                <tr>
                    <td><label>Suburb:<b class="red">*</b> </label></td>
                    <td><input type="text" id="updateSuburb" name="updateSuburb" size="20" required></td>
                </tr>
                <tr>
                    <td><label>City:<b class="red">*</b> </label></td>
                    <td><input type="text" id="updateCity" name="updateCity" size="20" required></td>
                </tr>
                <tr>
                    <td><label>Email Address:<b class="red">*</b> </label></td>
                    <td><input type="email" id="updateEmail" name="updateEmail" size="30" required></td>
                </tr>
                <tr>
                    <td><label>Phone Number:<b class="red">*</b> </label></td>
                    <td><input type="text" id="updatePhone" name="updatePhone" size="15" required></td>
                </tr>

                <tr>
                    <td><label>Insurance Code: </label></td>
                    <td><input type="text" id="updateInsurcode" name="updateInsurcode" size="10"></td>
                </tr>

                <tr><td><i class="red">* Required Fields</i></td></tr>
                <tr>
                    <td><input class="btn btn-outline-primary" type="submit" value="Update Patient"/></td>
                    <td><a href="../api/apiLogin.php"><input class="btn btn-outline-primary" type="button" value="Return"></a></td>
                </tr>
            </table>
        </form>
    </div>
    <div id="deletePatient" class="container tab-pane fade"><br>
        <script>
            $.ajax({
                type: 'GET',
                url: "../api/apiAllPatients.php",
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
            <h2>Delete Patient</h2>
            <table>
                <tr>
                    <td><label>Patients:<b class="red">*</b> </label></td>
                    <td><select name="getDeletePatients" class="custom-select" required>
                            <option></option>
                        </select></td>
                </tr>
                <tr>
                    <td><label>Last Name:<b class="red">*</b> </label></td>
                    <td><input type="text" id="deleteLastname"  name="deleteLastname" size="25" readonly></td>
                </tr>
                <tr>
                    <td><label>First Name:<b class="red">*</b> </label></td>
                    <td><input type="text" id="deleteFirstname" name="deleteFirstname" size="25" readonly></td>
                </tr>
                <tr>
                    <td><label>Street Address:<b class="red">*</b> </label></td>
                    <td><input type="text" id="deleteStreet" name="deleteStreet" size="50" readonly></td>
                </tr>
                <tr>
                    <td><label>Suburb:<b class="red">*</b> </label></td>
                    <td><input type="text" id="deleteSuburb" name="deleteSuburb" size="20" readonly></td>
                </tr>
                <tr>
                    <td><label>City:<b class="red">*</b> </label></td>
                    <td><input type="text" id="deleteCity" name="deleteCity" size="20" readonly></td>
                </tr>
                <tr>
                    <td><label>Email Address:<b class="red">*</b> </label></td>
                    <td><input type="email" id="deleteEmail" name="deleteEmail" size="30" readonly></td>
                </tr>
                <tr>
                    <td><label>Phone Number:<b class="red">*</b> </label></td>
                    <td><input type="text" id="deletePhone" name="deletePhone" size="15" readonly></td>
                </tr>

                <tr>
                    <td><label>Insurance Code: </label></td>
                    <td><input type="text" id="deleteInsurcode" name="deleteInsurcode" size="10" readonly></td>
                </tr>
                <tr><td><i class="red">* Required Fields</i></td></tr>
                <tr>
                    <td><input class="btn btn-outline-primary" type="submit" value="Delete Patient"/></td>
                    <td><a href="../api/apiLogin.php"><input class="btn btn-outline-primary" type="button" value="Return"></a></td>
                </tr>
            </table>
        </form>
    </div>
    <div id="recordPayment" class="container tab-pane fade"><br>

    </div>
</div>

<?php include_once 'foot.php';?>
<title>Patient</title>
<?php include_once 'head.php'; ?>

<!--Nav Tabs-->
<ul class="nav nav-tabs justify-content-center" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" data-toggle="tab" href="#addPatient">Add Doctor</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#updatePatient">Update Doctor</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#deletePatient">Delete Doctor</a>
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
                    <td><input class="btn" type="submit" value="Add Patient"/></td>
                    <td><a href="../api/apiLogin.php"><input class="btn" type="button" value="Return"></a></td>
                </tr>
            </table>
        </form>
    </div>
    <div id="updatePatient" class="container tab-pane fade"><br>
        <form action="../api/apiAddPatient.php" method="post">
            <h2>Update Patient</h2>
            <table>
                <tr>
                    <td><label>Patients:<b class="red">*</b> </label></td>
                    <td><select name="patients" class="custom-select">
                            <option></option>
                        </select></td>
                </tr>
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
                    <td><input class="btn" type="submit" value="Update Patient"/></td>
                    <td><a href="../api/apiLogin.php"><input class="btn" type="button" value="Return"></a></td>
                </tr>
            </table>
        </form>
    </div>
    <div id="deletePatient" class="container tab-pane fade"><br>

    </div>
</div>

<?php include_once 'foot.php';?>
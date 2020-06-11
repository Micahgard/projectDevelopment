<title>Admission</title>
<?php include_once 'head.php'; ?>

<!--Nav Tabs-->
<ul class="nav nav-tabs justify-content-center" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" data-toggle="tab" href="#addAdmission">Add Doctor</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#updateAdmission">Update Doctor</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#deleteAdmission">Delete Doctor</a>
    </li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
    <div id="addAdmission" class="container tab-pane active"><br>
        <script>
            $(document).ready(function () {
                $.ajax({
                    type: 'GET',
                    url: "https://unitecproject.herokuapp.com/api/apiAllAdmissions.php",
                    dataType: "JSON",
                    success: function (data) {
                        $("#patientInfo").append("<select name='patient' class='custom-select'>");
                        let i = 0;
                        while (i < data.length){
                            $("#patientInfo").append("<option value='" + data[i].patientID + "'>" + data[i].patientID + "</option>");
                            // $("#patientinfo").append("<p>patient info: " + data[i].patientID + "</p>");
                            i = i + 1;
                        }
                        $("#PatientInfo").append("</select>");
                    },
                    error: function () {
                        alert("Not connected");
                    }
                });
            });
        </script>
        <form action="../api/apiAddAdmission.php" method="post">
            <h2>Add Admission</h2>
            <table>
                <tr>
                    <td><label>Description:<b class="red">*</b> </label></td>
                    <td><input type="text" id="description" name="description" size="30" required></td>
                </tr>

                <tr>
                    <td><label>Admission Date:<b class="red">*</b> </label></td>
                    <td><input type="date" id="admissiondate" name="admissiondate" required></td>
                </tr>

                <tr>
                    <td><label>Patient:<b class="red">*</b> </label></td>
                    <td><label id="patientInfo"></label></td>
                </tr>

                <tr><td><i style="color: red">* Required Fields</i></td></tr>
                <tr>
                    <td><input class="btn btn-outline-primary" type="submit" value="Add Admission"/></td>
                    <td><a href="../api/apiLogin.php"><input class="btn btn-outline-primary" type="button" value="Return"></a></td>
                </tr>
            </table>
        </form>
    </div>
    <div id="updateAdmission" class="container tab-pane fade"><br>
        <script>
            $(document).ready(function () {
                $.ajax({
                    type: 'GET',
                    url: "https://unitecproject.herokuapp.com/api/apiAllAdmissions.php",
                    dataType: "JSON",
                    success: function (data) {
                        $("#updatePatientInfo").append("<select name='updatePatient' class='custom-select'>");
                        let i = 0;
                        while (i < data.length){
                            $("#updatePatientInfo").append("<option value='" + data[i].patientID + "'>" + data[i].patientID + "</option>");
                            // $("#patientinfo").append("<p>patient info: " + data[i].patientID + "</p>");
                            i = i + 1;
                        }
                        $("#updatePatientInfo").append("</select>");
                    },
                    error: function () {
                        alert("Not connected");
                    }
                });
            });
        </script>
        <form action="../api/apiAddAdmission.php" method="post">
            <h2>Add Admission</h2>
            <table>
                <tr>
                    <td><label>Admissions:<b class="red">*</b> </label></td>
                    <td><select name="admissions" class="custom-select">
                            <option></option>
                        </select></td>
                </tr>
                <tr>
                    <td><label>Description:<b class="red">*</b> </label></td>
                    <td><input type="text" id="updateDescription" name="description" size="30" required></td>
                </tr>

                <tr>
                    <td><label>Admission Date:<b class="red">*</b> </label></td>
                    <td><input type="date" id="updateAdmissiondate" name="admissiondate" required></td>
                </tr>

                <tr>
                    <td><label>Patient:<b class="red">*</b> </label></td>
                    <td><label id="updatePatientInfo"></label></td>
                </tr>
                <tr>
                    <td><label>Status:<b class="red">*</b> </label></td>
                    <td><div class="form-check-inline">
                        <label class="form-check-label" for="radio1">
                            <input type="radio" class="form-check-input" id="radio1" name="optradio" value="Current" checked>Current
                        </label>
                    </div>
                    <div class="form-check-inline">
                        <label class="form-check-label" for="radio2">
                            <input type="radio" class="form-check-input" id="radio2" name="optradio" value="Complete">Complete
                        </label>
                    </div>
                    <div class="form-check-inline">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" id="radio3" name="optradio" value="Billed">Billed
                        </label>
                    </div>
                     <div class="form-check-inline">
                         <label class="form-check-label" for="radio2">
                             <input type="radio" class="form-check-input" id="radio4" name="optradio" value="Closed"><Closed></Closed>
                          </label>
                     </div></td>
                </tr>
                <tr>
                    <td><label>Patient Last Name: </label></td>
                    <td><input type="text" id="patientLastName" name="patientLastName" size="20" required></td>
                </tr>
                <tr>
                    <td><label>Patient First Name: </label></td>
                    <td><input type="text" id="patientFirstName" name="patientFirstName" size="20" required></td>
                </tr>
                <tr>
                    <td><label>Ward: </label></td>
                    <td><input type="text" id="admissionWard" name="ward" size="20" required></td>
                </tr>
                <tr>
                    <td><i style="color: red">* Required Fields</i></td></tr>
                <tr>
                    <td><input class="btn btn-outline-primary" type="submit" value="Update Admission"/></td>
                    <td><a href="../api/apiLogin.php"><input class="btn btn-outline-primary" type="button" value="Return"></a></td>
                </tr>
            </table>
        </form>
    </div>
    <div id="deleteAdmission" class="container tab-pane fade"><br>

    </div>
</div>

<?php include_once 'foot.php';?>
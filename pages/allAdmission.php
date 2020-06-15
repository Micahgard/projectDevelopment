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
                    <td><label>Description:* </label></td>
                    <td><input type="text" id="description" name="description" size="30" required></td>
                </tr>

                <tr>
                    <td><label>Admission Date:* </label></td>
                    <td><input type="date" id="admissiondate" name="admissiondate" required></td>
                </tr>

                <tr>
                    <td><label>Patient:* </label></td>
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
<<<<<<< HEAD
<<<<<<< HEAD
        <form action="../api/apiUpdateAdmission.php" method="post">
            <h2>Update Admission</h2>
=======
=======
>>>>>>> parent of 0d65c6c... bb
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
>>>>>>> parent of 0d65c6c... bb
            <table>
                <tr>
                    <td><label>Description:* </label></td>
                    <td><input type="text" id="description" name="description" size="30" required></td>
                </tr>

                <tr>
                    <td><label>Admission Date:* </label></td>
                    <td><input type="date" id="admissiondate" name="admissiondate" required></td>
                </tr>

                <tr>
                    <td><label>Patient:* </label></td>
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
    <div id="deleteAdmission" class="container tab-pane fade"><br>

    </div>
</div>

<?php include_once 'foot.php';?>
<title>Add Admission</title>
<?php include_once 'head.php'; ?>
    <script>
        $(document).ready(function () {
            $.ajax({
                type: 'GET',
                url: "https://unitecproject.herokuapp.com/api/apiAllPatients.php",
                dataType: "JSON",
                success: function (data) {
                    let i = 0;
                    while (i < data.length){
                       $("#getPatient").append("<option value='" + data[i].id + "'>" + data[i].id + " " + data[i].firstname + " " + data[i].lastname + "</option>");
                        i = i + 1;
                    }
                },
                error: function () {
                    alert("Not connected");
                }
            });

            $.ajax({
                type: 'GET',
                url: "https://unitecproject.herokuapp.com/api/apiAllWards.php",
                dataType: "JSON",
                success: function (data) {
                    let i = 0;
                    while (i < data.length){
                        $("#getWard").append("<option value='" + data[i].id + "'>" + data[i].id + " " + data[i].name + "</option>");
                        i = i + 1;
                    }
                },
                error: function () {
                    alert("Not connected");
                }
            });
        });
    </script>
<body>
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
            <td><select id="getPatient" name="patientID"></select></td>
        </tr>

        <tr>
            <td><label>Ward:* </label></td>
            <td><select id="getWard" name="wardID"></select></td>
        </tr>

        <tr><td><i style="color: red">* Required Fields</i></td></tr>
        <tr>
            <td><input class="btn btn-outline-primary" type="submit" value="Add Admission"/></td>
            <td><a href="../api/apiLogin.php"><input class="btn btn-outline-primary" type="button" value="Return"></a></td>
        </tr>
    </table>
</form>
<?php include_once 'foot.php'; ?>
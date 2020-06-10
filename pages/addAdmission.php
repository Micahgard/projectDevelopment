<!DOCTYPE html>
<html lang="en">
<head>
    <title>Add Admission</title>
    <?php include_once 'head.php'; ?>

    <script>
        $(document).ready(function () {
            $.ajax({
                type: 'GET',
                url: "https://unitecproject.herokuapp.com/api/apiAllAdmissions.php",
                dataType: "JSON",
                success: function (data) {
                    i = 0;
                    while (i < data.length){
                        $("#patientinfo").append("<option value='" + data[i].patientID + "'>" + data[i].patientID + "</option><br>");
                        // $("#patientinfo").append("<p>patient info: " + data[i].patientID + "</p>");
                        i = i + 1;
                    }
                },
                error: function () {
                    alert("Not connected");
                }
            });
        });
    </script>
</head>

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
            <td><select name="patient">
<<<<<<< HEAD

<!--                    <option id="patient"></option>-->
=======
                    <option id="patientinfo"></option>
>>>>>>> 85c15c8e4cc99642b74fedbd005cec07776904d2
                </select>
            </td>
        </tr>

        <tr><td><i style="color: red">* Required Fields</i></td></tr>
        <tr>
            <td><input class="btn" type="submit" value="Add Admission"/></td>
            <td><a href="../api/apiLogin.php"><input class="btn" type="button" value="Return"></a></td>
        </tr>
    </table>
</form>

<div id="patientinfo"></div>

<div class="foot">
    <?php include_once 'foot.php'; ?>
</div>
</body>
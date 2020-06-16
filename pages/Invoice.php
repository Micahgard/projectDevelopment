<!DOCTYPE html>
<html lang="en">
<head>
    <title>Invoice</title>
    <?php include_once 'head.php'; ?>

    <script>
        $(document).ready(function () {
            $.ajax({
                type: 'GET',
                url: "http://unitecproject.herokuapp.com/api/apiInvoice.php",
                dataType: "JSON",
                success: function (data) {
                    i = 0;
                    while (i < data.length){
                        $("#getAdmission").append("<option value='"+data[i].AdmissionID+"'>"+data[i].AdmissionID+"</option>");
                        $("#invoice").append("<p>Patient Details: "+data[i].patient+" </p>");
                        $("#invoice").append("<p>Prescribed Medications: "+data[i].medication+" </p>");
                        $("#invoice").append("<p>Allocated Doctors: "+data[i].doctor+" </p>");
                        i = i+1;
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
<div>
    <h2>Produce Invoice</h2>
    <table>
        <tr>
            <td><label>Admission: </label></td>
            <td><select name="getUpdatePatients" class="custom-select">
                    <option></option>
                </select></td>
        </tr>

        <tr>
            <td><label>Patient Details: </label></td>
            <td><input type="text" id="getPatient" size="25" required></td>
        </tr>

        <tr>
            <td><label>Prescribed Medications: </label></td>
            <td><input type="text" id="updateFirstname" name="updateFirstname" size="25" required></td>
        </tr>

        <tr>
            <td><label>Allocated Doctors:  </label></td>
            <td><input type="text" id="updateStreet" name="updateStreet" size="50" required></td>
        </tr>
    </table>
</div>

<div class="foot">
    <?php include_once 'foot.php'; ?>
</div>
</body>
</html>
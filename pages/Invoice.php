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
                        $("#getAdmission").append("<option value='"+data[i].AdmissionID+"'>"+data[i].AdmissionID+" "+data[i].description+"</option>");
                        i = i+1;
                    }
                    $("#getAdmission").change(function() {
                        var i = 0;
                        while (i < data.length) {
                            if (data[i].id == $("#getAdmission").val()) {
                                $("#getPatient").val(data[i].patient);
                                $("#getMedication").val(data[i].medication);
                                $("#getDoctor").val(data[i].doctor);
                            }
                            i++;
                        }
                    });
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
            <td><select id="getAdmission">
                    <option></option>
                </select></td>
        </tr>
        <tr><td><label>Patient Details: </label></td></tr>
        <tr><td><input type="text" id="getPatient"></input></td><tr>
        <tr><td><label>Prescribed Medications: </label></td></tr>
        <tr><td><div id="getMedication"></div></td><tr>
        <tr><td><label>Allocated Doctors: </label></td></tr>
        <tr><td><div id="getDoctor"></div></td><tr>
    </table>
</div>

<div class="foot">
    <?php include_once 'foot.php'; ?>
</div>
</body>
</html>
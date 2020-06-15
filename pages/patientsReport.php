<!DOCTYPE html>
<html lang="en">
<head>
    <title>Patients Report</title>
    <?php include_once 'head.php'; ?>

    <script>
        $(document).ready(function () {
            $.ajax({
                type: 'GET',
                url: "http://unitecproject.herokuapp.com/api/apiPatientsReport.php",
                dataType: "JSON",
                success: function (data) {
                    i = 0;
                    while (i < data.length){
                        $("#report").append("<hr>");
                        $("#report").append("<p>ID: "+data[i].PatientID+" </p>");
                        $("#report").append("<p>Name: "+data[i].firstname+" "+data[i].lastname+" </p>");
                        $("#report").append("<p>Address: "+data[i].street+", "+data[i].suburb+", "+data[i].city+"</p>");
                        $("#report").append("<p>Email: "+data[i].email+" </p>");
                        $("#report").append("<p>Phone Number: "+data[i].phone+" </p>");
                        $("#report").append("<p>Insurance Code: "+data[i].insurcode+" </p>");
                        $("#report").append("<p>Complete Admissions: "+data[i].complete+" </p>");
                        $("#report").append("<p>Current Admissions: "+data[i].current+" </p>");
                        $("#report").append("<hr>");
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
<div id="report">

</div>
</body>
</html>

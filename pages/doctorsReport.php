<!DOCTYPE html>
<html lang="en">
<head>
    <title>Doctors Report</title>
    <?php include_once 'head.php'; ?>

    <script>
        $(document).ready(function () {
            $.ajax({
                type: 'GET',
                url: "http://unitecproject.herokuapp.com/api/apiDoctorsReport.php",
                dataType: "JSON",
                success: function (data) {
                    i = 0;
                    while (i < data.length){
                        $("#report").append("<hr>");
                        $("#report").append("<p>ID: "+data[i].DoctorID+" </p>");
                        $("#report").append("<p>Name: "+data[i].firstname+", "+data[i].lastname+" </p>");
                        $("#report").append("<p>Address: "+data[i].street+", "+data[i].suburb+", "+data[i].city+"</p>");
                        $("#report").append("<p>Phone Number: "+data[i].phone+" </p>");
                        $("#report").append("<p>Speciality: "+data[i].speciality+" </p>");
                        $("#report").append("<p>Salary: "+data[i].salary+" </p>");
                        $("#report").append("<p>Admissions: "+data[i].admission+" </p>");
                        $("#report").append("<p>Research Projects: "+data[i].project+" </p>");
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

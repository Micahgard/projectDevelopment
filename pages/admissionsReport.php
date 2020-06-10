<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admissions Report</title>
    <?php include_once 'head.php'; ?>

    <script>
        $(document).ready(function () {
            $.ajax({
                type: 'GET',
                url: "http://unitecproject.herokuapp.com/api/apiAllAdmissions.php",
                dataType: "JSON",
                success: function (data) {
                    i = 0;
                    while (i < data.length){
                        $("#report").append("<hr>");
                        $("#report").append("<p>ID: "+data[i].id+" </p>");
                        $("#report").append("<p>patientID: "+data[i].patientID+" </p>");
                        $("#report").append("<p>description: "+data[i].description+" </p>");
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

<div class="foot">
    <?php include_once 'foot.php'; ?>
</div>
</body>
</html>
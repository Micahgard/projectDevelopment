<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admission Report</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            $.ajax({
                type: 'GET',
                url: "http://unitecproject.herokuapp.com/api/apiAllAdmissions.php",
                dataType: "JSON",
                success: function (data) {
                    console.log(data);
                },
                error: function () {
                    alert("Not connected");
                }
            });
        });
    </script>
</head>
<body>

</body>
</html>

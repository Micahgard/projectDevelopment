<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <title>updateAdmission</title>
</head>
<body>
<div class="container">
    <form action="/updateAdmission.php">
        <h2>Update Admission</h2>
        <table class="table-sm table-borderless">
            <tbody>
            <tr>
                <td><label for="admissions">Admissions: </label></td>
                <td><select id="admissions" name="admissions">
                    <option value="volvo">Volvo</option>
                    <option value="saab">Saab</option>
                    <option value="fiat">Fiat</option>
                    <option value="audi">Audi</option>
                </select></td>
            </tr>
            <tr>
                <td><label for="admissionId">Admission ID: </label></td>
                <td><input type="text" id="admissionId" name="admissionId" size="3"></td>
            </tr>
            <tr>
                <td><label for="description">Description:* </label></td>
                <td><input type="text" id="description" name="description" size="30"></td>
            </tr>
            <tr>
                <td><label for="admissionDate">Admission Date:* </label></td>
                <td><input type="date" id="admissionDate" name="admissionDate"></td>
            </tr>
            <tr>
                <td><label for="patient">Patient:* </label></td>
                <td><select id="patient" name="patient">
                    <option value="volvo">Volvo</option>
                    <option value="saab">Saab</option>
                    <option value="fiat">Fiat</option>
                    <option value="audi">Audi</option>
                </select></td>
            </tr>
            <tr>
                <td><label for="ward">Ward:* </label></td>
                <td><select id="ward" name="ward">
                    <option value="volvo">Volvo</option>
                    <option value="saab">Saab</option>
                    <option value="fiat">Fiat</option>
                    <option value="audi">Audi</option>
                </select></td>
            </tr>
            <tr><td><i style="color: red">* Required Fields</i></td></tr>
            <tr>
                <td><button type="button">Return</button></td>
                <td><button type="button">Add Admission</button></td>
            </tr>
            </tbody>
        </table>
    </form>
</div>
</body>
</html>
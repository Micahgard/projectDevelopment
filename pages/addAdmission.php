<?php
include_once 'head.php';
?>
<title>addAdmission</title>
</head>
<body>
    <div class="container">
        <form action="/addAdmission.php">
            <h2>Add Admission</h2>
            <table class="table-sm table-borderless">
                <tbody>
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
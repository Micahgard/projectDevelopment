<title>Medication</title>
<?php include_once 'head.php'; ?>

<!--Nav Tabs-->
<ul class="nav nav-tabs justify-content-center" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" data-toggle="tab" href="#addMedication">Add Medication</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#updateMedication">Update Medication</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#deleteMedication">Delete Medication</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#prescribeMedication">Prescribe Medication</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#removePrescription">Remove Prescription</a>
    </li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
    <div id="addMedication" class="container tab-pane active"><br>
        <form action="../api/apiAddMedication.php" method="post">
            <h2>Add Medication</h2>
            <table>
                <tr>
                    <td><label>Medications:<b class="red">*</b> </label></td>
                    <td><select name="medications" class="custom-select">
                            <option></option>
                        </select></td>
                </tr>
                <tr>
                    <td><label>Name:<b class="red">*</b> </label></td>
                    <td><input type="text" id="name" name="name" size="30" required></td>
                </tr>

                <tr>
                    <td><label>Cost:<b class="red">*</b> </label></td>
                    <td><input type="text" id="cost" name="cost" size="10" required></td>
                </tr>

                <tr><td><i class="red">* Required Fields</i></td></tr>
                <tr>
                    <td><input class="btn btn-outline-primary" type="submit" value="Add Medication"/></td>
                    <td><a href="../api/apiLogin.php"><input class="btn btn-outline-primary" type="button" value="Return"></a></td>
                </tr>
            </table>
        </form>
    </div>
    <div id="updateMedication" class="container tab-pane fade"><br>
        <script>
            $.ajax({
                type: 'GET',
                url: "../api/apiAllMedications.php",
                dataType: "JSON",
                success: function (data) {
                    let i = 0;
                    while (i < data.length){
                        $("#getUpdateMedications").append("<option value='" + data[i].id + "'>" + data[i].id + " " + data[i].name + "</option>");
                        i = i + 1;
                    }
                    $("#getUpdateMedications").change(function() {
                        var i = 0;
                        while (i < data.length) {
                            if (data[i].id == $("#getUpdateMedications").val()) {
                                $("#updateMedicationId").val(data[i].id);
                                $("#updateName").val(data[i].name);
                                $("#updateCost").val(data[i].cost);
                            }
                            i++;
                        }
                    });
                },
                error: function () {
                    alert("Not connected");
                }
            });
        </script>
        <form action="../api/apiUpdateMedication.php" method="post">
            <h2>Update Medication</h2>
            <table>
                <tr>
                    <td><label>Medications:<b class="red">*</b> </label></td>
                    <td><select id="getUpdateMedications" name="id" class="custom-select">
                            <option></option>
                        </select></td>
                </tr>
                <tr>
                    <td><label>Medication Id:<b class="red">*</b> </label></td>
                    <td><input type="text" id="updateMedicationId" name="updateMedicationId" size="30" readonly></td>
                </tr>
                <tr>
                    <td><label>Name:<b class="red">*</b> </label></td>
                    <td><input type="text" id="updateName" name="updateName" size="10" required></td>
                </tr>
                <tr>
                    <td><label>Cost:<b class="red">*</b> </label></td>
                    <td><input type="text" id="updateCost" name="updateCost" size="10" required></td>
                </tr>
                <tr><td><i class="red">* Required Fields</i></td></tr>
                <tr>
                    <td><input class="btn btn-outline-primary" type="submit" value="Update Medication"/></td>
                    <td><a href="../api/apiLogin.php"><input class="btn btn-outline-primary" type="button" value="Return"></a></td>
                </tr>
            </table>
        </form>
    </div>
    <div id="deleteMedication" class="container tab-pane fade"><br>
        <script>
            $.ajax({
                type: 'GET',
                url: "../api/apiAllMedications.php",
                dataType: "JSON",
                success: function (data) {
                    let i = 0;
                    while (i < data.length){
                        $("#getDeleteMedications").append("<option value='" + data[i].id + "'>" + data[i].id + " " + data[i].name + "</option>");
                        i = i + 1;
                    }
                    $("#getDeleteMedications").change(function() {
                        var i = 0;
                        while (i < data.length) {
                            if (data[i].id == $("#getDeleteMedications").val()) {
                                $("#deleteMedicationId").val(data[i].id);
                                $("#deleteName").val(data[i].name);
                                $("#deleteCost").val(data[i].cost);
                            }
                            i++;
                        }
                    });
                },
                error: function () {
                    alert("Not connected");
                }
            });
        </script>
        <form action="../api/apiDeleteMedication.php" method="get">
            <h2>Delete Medication</h2>
            <table>
                <tr>
                    <td><label>Medications:<b class="red">*</b> </label></td>
                    <td><select id="getDeleteMedications" name="id" class="custom-select">
                            <option></option>
                        </select></td>
                </tr>
                <tr>
                    <td><label>Medication Id:<b class="red">*</b> </label></td>
                    <td><input type="text" id="deleteMedicationId" name="deleteMedicationId" size="30" readonly></td>
                </tr>
                <tr>
                    <td><label>Name:<b class="red">*</b> </label></td>
                    <td><input type="text" id="deleteName" name="deleteName" size="10" readonly></td>
                </tr>
                <tr>
                    <td><label>Cost:<b class="red">*</b> </label></td>
                    <td><input type="text" id="deleteCost" name="deleteCost" size="10" readonly></td>
                </tr>
                <tr><td><i class="red">* Required Fields</i></td></tr>
                <tr>
                    <td><input class="btn btn-outline-primary" type="submit" value="Delete Medication"/></td>
                    <td><a href="../api/apiLogin.php"><input class="btn btn-outline-primary" type="button" value="Return"></a></td>
                </tr>
            </table>
        </form>
    </div>
    <div id="prescribeMedication" class="container tab-pane fade"><br>

    </div>
    <div id="removePrescription" class="container tab-pane fade"><br>

    </div>
</div>

<?php include_once 'foot.php';?>
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
                    <td><input class="btn" type="submit" value="Add Medication"/></td>
                    <td><a href="../api/apiLogin.php"><input class="btn" type="button" value="Return"></a></td>
                </tr>
            </table>
        </form>
    </div>
    <div id="updateMedication" class="container tab-pane fade"><br>

    </div>
    <div id="deleteMedication" class="container tab-pane fade"><br>

    </div>
</div>

<?php include_once 'foot.php';?>
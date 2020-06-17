<title>Ward</title>
<?php include_once 'head.php'; ?>

<!--Nav Tabs-->
<ul class="nav nav-tabs justify-content-center" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" data-toggle="tab" href="#addWard">Add Ward</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#updateWard">Update Ward</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#deleteWard">Delete Ward</a>
    </li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
    <div id="addWard" class="container tab-pane active"><br>
        <form action="../api/apiAddWard.php" method="post">
            <h2>Add Ward</h2>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Name:* </span>
                </div>
                <input type="text" maxlength="20" class="form-control" id="name" name="name" placeholder="Name" required>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Location:* </span>
                </div>
                <input type="text" maxlength="30" class="form-control" id="location" name="location" placeholder="Location" required>
                <div class="input-group-prepend">
                    <span class="input-group-text">Capacity:* </span>
                </div>
                <input type="number" min="1" max="20" class ="form-control" id="capacity" name="capacity" required>
            </div>
            </div>
            <i class="grey">* Required Fields</i>
            <div class="d-flex justify-content-around">
                <input class="btn btn-outline-primary" type="submit" value="Add Ward"/>
                <a href="../api/apiLogin.php"><input class="btn btn-outline-primary" type="button" value="Return"></a>
            </div>
        </form>
    </div>
    <div id="updateWard" class="container tab-pane fade"><br>
        <script>
            $.ajax({
                type: 'GET',
                url: "../api/apiAllWards.php",
                dataType: "JSON",
                success: function (data) {
                    let i = 0;
                    while (i < data.length){
                        $("#getUpdateWards").append("<option value='" + data[i].id + "'>" + data[i].id + " " + data[i].name + "</option>");
                        i = i + 1;
                    }
                    $("#getUpdateWards").change(function() {
                        var i = 0;
                        while (i < data.length) {
                            if (data[i].id == $("#getUpdateWards").val()) {
                                $("#udpateName").val(data[i].name);
                                $("#updateLocation").val(data[i].location);
                                $("#updateCapacity").val(data[i].capacity);
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
        <form action="../api/apiUpdateWard.php" method="post">
            <h2>Update Wards</h2>
            <table>
                <tr>
                    <td><label>Wards:<b class="red">*</b> </label></td>
                    <td><select name="getUpdateWards" class="custom-select">
                            <option></option>
                        </select></td>
                </tr>
                <tr>
                    <td><label>Name:<b class="red">*</b> </label></td>
                    <td><input type="text" id="udpateName" name="udpateName" size="25" required></td>
                </tr>
                <tr>
                    <td><label>Location:<b class="red">*</b> </label></td>
                    <td><input type="text" id="updateLocation" name="updateLocation" size="25" required></td>
                </tr>
                <tr>
                    <td><label>Capacity:<b class="red">*</b> </label></td>
                    <td><select id="updateCapacity" name="updateCapacity"></select>
                        <?php
                        $i = 1;
                        while ($i<=20){
                            echo "<option value='".$i."'>".$i."</option>";
                            $i = $i + 1;
                        }
                        ?>
                        </select></td>
                </tr>
                <tr><td><i class="red">* Required Fields</i></td></tr>
                <tr>
                    <td><input class="btn btn-outline-primary" type="submit" value="Update Ward"/></td>
                    <td><a href="../api/apiLogin.php"><input class="btn btn-outline-primary" type="button" value="Return"></a></td>
                </tr>
            </table>
        </form>
    </div>
    <div id="deleteWard" class="container tab-pane fade"><br>
        <script>
            $.ajax({
                type: 'GET',
                url: "../api/apiAllWards.php",
                dataType: "JSON",
                success: function (data) {
                    let i = 0;
                    while (i < data.length){
                        $("#getDeleteWards").append("<option value='" + data[i].id + "'>" + data[i].id + " " + data[i].name + "</option>");
                        i = i + 1;
                    }
                    $("#getDeleteWards").change(function() {
                        var i = 0;
                        while (i < data.length) {
                            if (data[i].id == $("#getDeleteWards").val()) {
                                $("#deleteName").val(data[i].name);
                                $("#deleteLocation").val(data[i].location);
                                $("#deleteCapacity").val(data[i].capacity);
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
        <form action="../api/apiDeleteWard.php" method="get">
            <h2>Delete Wards</h2>
            <table>
                <tr>
                    <td><label>Wards:<b class="red">*</b> </label></td>
                    <td><select name="getDeleteWards" class="custom-select">
                            <option></option>
                        </select></td>
                </tr>
                <tr>
                    <td><label>Name:<b class="red">*</b> </label></td>
                    <td><input type="text" id="deleteName" name="deleteName" size="25" readonly></td>
                </tr>
                <tr>
                    <td><label>Location:<b class="red">*</b> </label></td>
                    <td><input type="text" id="deleteLocation" name="deleteLocation" size="40" readonly></td>
                </tr>
                <tr>
                    <td><label>Capacity:<b class="red">*</b> </label></td>
                    <td><input id="deleteCapacity" name="deleteCapacity" size="5" readonly></td>
                </tr>
                <tr><td><i class="red">* Required Fields</i></td></tr>
                <tr>
                    <td><input class="btn btn-outline-primary" type="submit" value="Delete Ward"/></td>
                    <td><a href="../api/apiLogin.php"><input class="btn btn-outline-primary" type="button" value="Return"></a></td>
                </tr>
            </table>
        </form>
    </div>
</div>

<?php include_once 'foot.php';?>
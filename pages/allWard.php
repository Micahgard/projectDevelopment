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
                                $("#udpateWardId").val(data[i].id);
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
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Wards:* </span>
                </div>
                <select class="form-control" id="getUpdateWards" name="id" required>
                    <option disabled selected hidden>Select a Ward</option>
                </select>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Ward Id: </span>
                </div>
                <input type="text" class="form-control" id="updateWardId" name="updateWardId" placeholder="Ward Id" readonly>
                <div class="input-group-prepend">
                    <span class="input-group-text">Name:* </span>
                </div>
                <input type="text" maxlength="20" class="form-control" id="updateName" name="updateName" placeholder="Name" required>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Location:* </span>
                </div>
                <input type="text" maxlength="30" class="form-control" id="updateLocation" name="updateLocation" placeholder="Location" required>
                <div class="input-group-prepend">
                    <span class="input-group-text">Capacity:* </span>
                </div>
                <input type="number" min="1" max="20" class ="form-control" id="updateCapacity" name="updateCapacity" required>
                </div>
            </div>
            <i class="grey">* Required Fields</i>
            <div class="d-flex justify-content-around">
                <input class="btn btn-outline-primary" type="submit" value="Update Ward"/>
                <a href="../api/apiLogin.php"><input class="btn btn-outline-primary" type="button" value="Return"></a>
            </div>
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
                                $("#deleteWardId").val(data[i].id);
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
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Wards:* </span>
                </div>
                <select class="form-control" id="getDeleteWards" name="id" required>
                    <option disabled selected hidden>Select a Ward</option>
                </select>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Ward Id: </span>
                </div>
                <input type="text" class="form-control" id="deleteWardId" name="deleteWardId" placeholder="Ward Id" readonly>
                <div class="input-group-prepend">
                    <span class="input-group-text">Name: </span>
                </div>
                <input type="text" class="form-control" id="deleteName" name="deleteName" placeholder="Name" readonly>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Location: </span>
                </div>
                <input type="text" class="form-control" id="deleteLocation" name="deleteLocation" placeholder="Location" readonly>
                <div class="input-group-prepend">
                    <span class="input-group-text">Capacity: </span>
                </div>
                <input type="text" class ="form-control" id="deleteCapacity" name="deleteCapacity" placeholder="Capacity" readonly>
                </div>
            </div>
            <i class="grey">* Required Fields</i>
            <div class="d-flex justify-content-around">
                <input class="btn btn-outline-primary" type="submit" value="Delete Ward"/>
                <a href="../api/apiLogin.php"><input class="btn btn-outline-primary" type="button" value="Return"></a>
            </div>
        </form>
    </div>
</div>

<?php include_once 'foot.php';?>
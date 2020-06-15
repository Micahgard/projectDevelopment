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
            <table>
                <tr>
                    <td><label>Name:<b class="red">*</b> </label></td>
                    <td><input type="text" id="name" name="name" size="30" required></td>
                </tr>
                <tr>
                    <td><label>Location:<b class="red">*</b> </label></td>
                    <td><input type="text" id="location" name="location" size="10" required></td>
                </tr>

                <tr>
                    <td><label>capacity:<b class="red">*</b> </label></td>
                    <td><select name="capacity">
                            <?php
                            $i = 1;
                            while ($i<=20){
                                echo "<option value='".$i."'>".$i."</option>";
                                $i = $i + 1;
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr><td><i class="red">* Required Fields</i></td></tr>
                <tr>
                    <td><input class="btn btn-outline-primary" type="submit" value="Add Ward"/></td>
                    <td><a href="../api/apiLogin.php"><input class="btn btn-outline-primary" type="button" value="Return"></a></td>
                </tr>
            </table>
        </form>
    </div>
    <div id="updateWard" class="container tab-pane fade"><br>

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
            <h2>Delete Ward</h2>
            <table>
                <tr>
                    <td><label>Wards:<b class="red">*</b> </label></td>
                    <td><select id="getDeleteWards" name="id" class="custom-select">
                            <option></option>
                        </select></td>
                </tr>
                <tr>
                    <td><label>Name:<b class="red">*</b> </label></td>
                    <td><input type="text" id="deleteName" name="deleteName" size="30" required></td>
                </tr>
                <tr>
                    <td><label>Location:<b class="red">*</b> </label></td>
                    <td><input type="text" id="deleteLocation" name="deleteLocation" size="10" required></td>
                </tr>

                <tr>
                    <td><label>capacity:<b class="red">*</b> </label></td>
                    <td><input type="text" id="deleteCapacity" name="deleteCapacity" size="5" required></td>
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
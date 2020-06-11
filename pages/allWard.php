<title>Ward</title>
<?php include_once 'head.php'; ?>

<!--Nav Tabs-->
<ul class="nav nav-tabs justify-content-center" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" data-toggle="tab" href="#addWard">Add Doctor</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#updateWard">Update Doctor</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#deleteWard">Delete Doctor</a>
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
                    <td><input class="btn" type="submit" value="Add Medication"/></td>
                    <td><a href="../api/apiLogin.php"><input class="btn" type="button" value="Return"></a></td>
                </tr>
            </table>
        </form>
    </div>
    <div id="updateWard" class="container tab-pane fade"><br>

    </div>
    <div id="deleteWard" class="container tab-pane fade"><br>

    </div>
</div>

<?php include_once 'foot.php';?>
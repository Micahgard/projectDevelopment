<title>Doctors</title>
<?php include_once 'head.php'; ?>

<!--Nav Tabs-->
<ul class="nav nav-tabs" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" data-toggle="tab" href="#addDoctor">Add Doctor</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#menu1">Menu 1</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#menu2">Menu 2</a>
    </li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
    <div id="home" class="container tab-pane active"><br>
        <form action="../api/apiAddDoctor.php" method="post">
            <h2>Add Doctor</h2>
            <table>
                <tr>
                    <td><label>Last Name:<b style="color: red">*</b> </label></td>
                    <td><input type="text" id="lastname" name="lastname" size="25" required></td>
                </tr>

                <tr>
                    <td><label>First Name:* </label></td>
                    <td><input type="text" id="firstname" name="firstname" size="25" required></td>
                </tr>

                <tr>
                    <td><label>Street Address:* </label></td>
                    <td><input type="text" id="street" name="street" size="50" required></td>
                </tr>

                <tr>
                    <td><label>Suburb:* </label></td>
                    <td><input type="text" id="suburb" name="suburb" size="20" required></td>
                </tr>

                <tr>
                    <td><label>City:* </label></td>
                    <td><input type="text" id="city" name="city" size="20" required></td>
                </tr>

                <tr>
                    <td><label>Phone Number:* </label></td>
                    <td><input type="text" id="phone" name="phone" size="15" required></td>
                </tr>

                <tr>
                    <td><label>Speciality:* </label></td>
                    <td><input type="text" id="speciality" name="speciality" size="15" required></td>
                </tr>

                <tr>
                    <td><label>Salary:* </label></td>
                    <td><input type="text" id="salary" name="salary" size="15" required></td>
                </tr>

                <tr><td><i style="color: red">* Required Fields</i></td></tr>
                <tr>
                    <td><input class="btn btn-outline-primary" type="submit" value="Add Doctor"/></td>
                    <td><a href="../api/apiLogin.php"><input class="btn btn-outline-primary" type="button" value="Return"></a></td>
                </tr>
            </table>
        </form>
    </div>
    <div id="menu1" class="container tab-pane fade"><br>
        <h3>Menu 1</h3>
        <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
    </div>
    <div id="menu2" class="container tab-pane fade"><br>
        <h3>Menu 2</h3>
        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
    </div>
</div>

<?php include_once 'foot.php';?>
<?php
include_once 'head.php';

if (isset($_POST['addAdmissionBtn'])) {

?>
    <form action="">
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
                <td><input type="submit" name="addAdmission" value="Add Admission"/></td>
                <td><input type="submit" name="return" value="Return"></td>
            </tr>
            </tbody>
        </table>
    </form>
    <?php
}elseif (isset($_POST['updateAdmissionBtn'])) {
    ?>
    <form action="">
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
                <td><input type="submit" name="updateAdmission" value="Update Admission"/></td>
                <td><input type="submit" name="return" value="Return"></td>
            </tr>
            </tbody>
        </table>
    </form>
    }elseif (isset($_POST['deleteAdmissionBtn'])) {
    ?>
    <form action="">
        <h2>Delete Admission</h2>
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
                <td>
                    <p>Status: </p>
                    <input type="radio" id="current" name="status" value="current">
                    <label for="current">Current</label>
                    <input type="radio" id="complete" name="status" value="complete">
                    <label for="complete">Complete</label>
                    <input type="radio" id="billed" name="status" value="billed">
                    <label for="billed">Billed</label>
                    <input type="radio" id="closed" name="status" value="closed">
                    <label for="closed">Closed</label>
                </td>
            </tr>
            <tr><td><i style="color: red">* Required Fields</i></td></tr>
            <tr>
                <td><input type="submit" name="deleteAdmission" value="Delete Admission"/></td>
                <td><input type="submit" name="return" value="Return"></td>
            </tr>
            </tbody>
        </table>
    </form>
<?php
}else {
    
}
include_once 'foot.php';
?>
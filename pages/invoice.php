<title>Invoice</title>
<?php include_once 'head.php'; ?>

<script>
    $(document).ready(function () {
        $.ajax({
            type: 'GET',
            url: "http://unitecproject.herokuapp.com/api/apiInvoice.php",
            dataType: "JSON",
            success: function (data) {
                i = 0;
                while (i < data.length){
                    $("#getAdmission").append("<option value='"+data[i].AdmissionID+"'>"+data[i].AdmissionID+" "+data[i].description+"</option>");
                    i++;
                }

                $("#getAdmission").change(function() {
                    var i = 0;
                    while (i < data.length) {
                        if (data[i].AdmissionID == $("#getAdmission").val()) {
                            $("#getPatient").val(data[i].patient);
                            $("#getMedication").val(data[i].medication);
                            $("#getDoctor").val(data[i].doctor);

                            m = 0;
                            cost = 0;
                            while (m < data[i].medication.length) {
                               cost += (data[i].medication[m][1]) * (data[i].medication[m][2]);
                               m++;
                            }

                            d = 0;
                            fee = 0;
                            while (d < data[i].doctor.length) {
                                fee += parseInt(data[i].doctor[d][1]);
                                d++;
                            }

                            due = cost + fee;

                            $("#due").val(due);
                        }
                        i++;
                    }
                });
            },
            error: function () {
                alert("Not connected");
            }
        });
    });
</script>

<h2>Produce Invoice</h2>
<table>
    <tr>
        <td><label>Admission: </label></td>
        <td><select id="getAdmission">
                <option></option>
            </select></td>
    </tr>
    <tr><td><label>Patient Details: </label></td></tr>
    <tr><td><input type="text" id="getPatient" style="width: 500px"></td><tr>
    <tr><td><label>Prescribed Medications: </label></td></tr>
    <tr><td><input type="text" id="getMedication" style="width: 500px"></td><tr>
    <tr><td><label>Allocated Doctors: </label></td></tr>
    <tr><td><input type="text" id="getDoctor" style="width: 500px"></td><tr>
    <tr><td><label>Due: </label></td></tr>
    <tr><td><input type="text" id="due" style="width: 500px"></td><tr>
</table>

<?php include_once 'foot.php'; ?>
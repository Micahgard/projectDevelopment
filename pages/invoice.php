<title>Invoice</title>
<?php include_once 'head.php'; ?>



    <div id="tabInvoice" class="container tab-pane active"><br>
        <script>
            $(document).ready(function () {
                $.ajax({
                    type: 'GET',
                    url: "http://unitecproject.herokuapp.com/api/apiShowInvoice.php",
                    dataType: "JSON",
                    success: function (data) {
                        i = 0;
                        while (i < data.length) {
                            $("#admission").append("<option value='" + data[i].AdmissionID + "'>" + data[i].AdmissionID + " " + data[i].description + "</option>");
                            i++;
                        }

                        $("#admission").change(function() {
                            i = 0;
                            while (i < data.length) {
                                if (data[i].AdmissionID == $("#admission").val()) {
                                    $("#invoice").html("<table>");
                                    $("#invoice").append("<tr><td>Patient ID:</td><td>" + data[i].patient.id + "</td>" +
                                        "<td>Patient Name:</td><td>" + data[i].patient.name + "</td></tr>");
                                    $("#invoice").append("<tr><td>Patient Address:</td><td>" + data[i].patient.address + "</td></tr>");
                                    $("#invoice").append("<tr style='height: 20px'></tr>");

                                    m = 0;
                                    subtotal = 0;
                                    while (m < data[i].medication.length) {
                                        $("#invoice").append("<tr><td>Medication Name:</td><td>" + data[i].medication[m].name + "</td>" +
                                            "<td>Medication Cost:</td><td>$" + data[i].medication[m].cost + "</td>" +
                                            "<td>Prescribed Quantity:</td><td>" + data[i].medication[m].amount + "</td></tr>");
                                        subtotal += (data[i].medication[m].cost) * (data[i].medication[m].amount);
                                        m++;
                                    }
                                    $("#invoice").append("<tr style='height: 20px'></tr>");

                                    d = 0;
                                    fee = 0;
                                    while (d < data[i].doctor.length) {
                                        $("#invoice").append("<tr><td>Doctor Name:</td><td>" + data[i].doctor[d].name + "</td>" +
                                            "<td>Fee:</td><td>$" + data[i].doctor[d].fee + "</td></tr>");
                                        fee += parseInt(data[i].doctor[d].fee);
                                        d++;
                                    }
                                    $("#invoice").append("<tr style='height: 20px'></tr>");

                                    due = subtotal + fee;
                                    $("#invoice").append("<tr><td>Total Due:</td><td>" + due + "</td></tr>");
                                    $("#invoice").append("</table>");
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
        <form action="../api/apiUpdateInvoice.php" method="post">
            <h1>Produce Invoice</h1>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Complete Admissions: </span>
                </div>
                <select class="form-control" id="admission" name="id" required>
                    <option disabled selected hidden>Select an Admission</option>
                </select>
            </div>

            <div id="invoice">
            </div>

            <div class="d-flex justify-content-around">
                <input class="btn btn-outline-primary" type="submit" value="Produce Invoice"/>
                <a href="../api/apiLogin.php"><input class="btn btn-outline-primary" type="button" value="Return"></a>
            </div>
        </form>
    </div>
</div>

<?php include_once 'foot.php'; ?>
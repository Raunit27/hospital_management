<?php
    include "include/auth_session.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Doctor Registration</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <?php 
        include "include/links.php";
    ?>

</head>

<body>

    <?php 
        include 'include/header.php';
    ?>

    <?php 
        include 'include/navBar.php';  


    ?>


    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Appointment</h1>

        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Appointment</h5>
                    <?php 
               if(isset($_GET["msg"])){
               $message = $_GET["msg"];
               $patient_id = isset($_GET["patient_id"]) ? $_GET["patient_id"] : ''; // Check if patient_id is set
                   ?>
                    <div class="alert alert-danger" role="alert">
                        <?= $message ?>
                        <?php if($patient_id): ?>
                        <br><strong>Patient ID:</strong> <?= $patient_id ?>
                        <?php endif; ?>
                    </div>
                    <?php        
                    if($patient_id !=''){
                     $fetch = $fun->view_full_patient_details($patient_id);
                    }
                     }
                     
                     if(isset($_GET["message"])){
                     $message = $_GET["message"];
                    ?>
                      <div class="alert alert-danger" role="alert">
                      <?= $message ?>
                    </div>
                    <?php }
                    ?>
                    <form action="form_submit.php" method="post" enctype="multipart/form-data">
                        <div class="form-group row mt-1">
                            <label for="patient_is" class="col-sm-3 col-form-label">Enter patient ID :</label>
                            <div class="col-sm-6">
                                <input type="number" class="form-control" id="patient_is" name="patient_id" required>
                            </div>
                            <div class="col-sm-3">
                                <button type="submit" name="patient_appointment_search"
                                    class="btn btn-primary">Search</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>

        <section class="section dashboard">
            <div class="card">
                <div class="card-body">
                    <?php 
            if(isset($_GET["msg"])){
                if(mysqli_num_rows($fetch) > 0){
                    $res = mysqli_fetch_assoc($fetch);
            ?>
                    <h5 class="card-title">Patient Appointment</h5>
                    <form action="form_submit.php" method="post" enctype="multipart/form-data">
                        <div class="form-group row mt-1">
                            <input type="hidden" name="patient_id" value="<?php echo $res['id']; ?>" />

                            <div class="col-sm-6 mb-3">
                                <label for="name" class="form-label">Name:</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    value="<?php echo $res['name']; ?>" readonly>
                            </div>
                            <div class="col-sm-6 mb-3">
                                <label for="age" class="form-label">Age:</label>
                                <input type="number" class="form-control" id="age" name="age"
                                    value="<?php echo $res['age']; ?>" readonly>
                            </div>

                            <div class="col-sm-6 mb-3">
                                <label for="gender" class="form-label">Gender:</label>
                                <input type="text" class="form-control" id="gender" name="gender"
                                    value="<?php echo $res['gender']; ?>" readonly>
                            </div>

                            <div class="col-sm-6 mb-3">
                                <label for="email" class="form-label">Email:</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    value="<?php echo $res['email']; ?>" readonly>
                            </div>

                            <div class="col-sm-6 mb-3">
                                <label for="mobile" class="form-label">Phone:</label>
                                <input type="text" class="form-control" id="mobile" name="mobile"
                                    value="<?php echo $res['mobile']; ?>" readonly>
                            </div>

                            <!-- Category Dropdown -->
                            <div class="col-sm-6 mb-3">
                                <label for="category" class="form-label">Doctor Category:</label>
                                <select class="form-control" id="category" name="category"
                                    onchange="fetchDoctors(this.value)">
                                    <option value="">Select Category</option>
                                    <option value="cardiology">Cardiology</option>
                                    <option value="neurology">Neurology</option>
                                    <option value="orthopedics">Orthopedics</option>
                                    <option value="pediatrics">Pediatrics</option>
                                    <option value="gynecology">Gynecology</option>
                                    <option value="dermatology">Dermatology</option>
                                    <option value="general_surgery">General Surgery</option>
                                    <option value="urology">Urology</option>
                                    <option value="psychiatry">Psychiatry</option>
                                    <option value="ent">ENT</option>
                                    <option value="ophthalmology">Ophthalmology</option>
                                    <option value="gastroenterology">Gastroenterology</option>
                                    <option value="endocrinology">Endocrinology</option>
                                    <option value="pulmonology">Pulmonology</option>
                                </select>
                            </div>

                            <!-- Doctor Dropdown -->
                            <div class="col-sm-6 mb-3">
                                <label for="doctor" class="form-label">Doctor:</label>
                                <select class="form-control" id="doctor" name="doctor">
                                    <option value="">Select Doctor</option>
                                    <!-- Doctor options will be populated here -->
                                </select>
                            </div>


                            <div class="col-sm-6 mb-3">
                                <label for="date" class="form-label">Appointment Date:</label>
                                <input type="date" class="form-control" id="date" name="date" required>
                            </div>

                            <div class="col-sm-6 mb-3">
                                <label for="time" class="form-label">Appointment Time:</label>
                                <input type="time" class="form-control" id="time" name="time" required>
                            </div>

                        </div>

                        <div class="text-center">
                            <button type="submit" name="book_appointment" class="btn btn-primary">Book
                                Appointment</button>
                        </div>
                    </form>
                    <?php
                }
            }
            ?>
                </div>
            </div>
        </section>

    </main><!-- End #main -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script>
    function fetchDoctors(category) {
        if (category !== "") {
            $.ajax({
                url: 'fetch_doctors.php',
                type: 'POST',
                data: {
                    category: category
                },
                dataType: 'json',
                success: function(data) {
                    var doctorSelect = $('#doctor');
                    doctorSelect.empty(); // Clear the previous options

                    if (data.length > 0) {
                        doctorSelect.append('<option value="">Select Doctor</option>');
                        $.each(data, function(index, doctor) {
                            // Concatenate doctor ID and doctor name with a delimiter (e.g., a comma)
                            doctorSelect.append('<option value="' + doctor.id + '-' + doctor.name +
                                '">' + doctor.name + '</option>');
                        });
                    } else {
                        doctorSelect.append('<option value="">No doctors available</option>');
                    }
                }
            });
        }
    }
    </script>


    <?php 
        include "include/footer.php";
    ?>

</body>

</html>
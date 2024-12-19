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

    <script>
    function validatePassword() {
        var password = document.getElementById("exampleInputPassword2").value;
        var rePassword = document.getElementById("exampleInputConfirmPassword2").value;

        if (password !== rePassword) {
            alert("Passwords do not match. Please re-enter the password.");
            return false; // Prevent form submission
        }
        return true; // Allow form submission
    }
    </script>

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
            <h1>Doctor Registration</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item ">Doctors</li>
                    <li class="breadcrumb-item active">Register Doctor</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Doctor Registration Form</h5>
                    <?php 
                        if(isset($_GET["msg"])){
                    ?>
                    <div class="alert alert-danger" role="alert">
                        <?= $_GET["msg"]?>
                    </div>
                    <?php        
                        }
                    ?>
                    <form action="form_submit.php" method="post" enctype="multipart/form-data" onsubmit="return validatePassword()">
                        <div class="form-group row mt-1">
                            <label for="name" class="col-sm-3 col-form-label">Full Name:</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                        </div>

                        <div class="form-group row mt-3">
                            <label for="age" class="col-sm-3 col-form-label">Age:</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" id="age" name="age" required>
                            </div>
                        </div>

                        <div class="form-group row mt-3">
                            <label for="gender" class="col-sm-3 col-form-label">Gender:</label>
                            <div class="col-sm-9">
                                <select id="gender" name="gender" class="form-control" required>
                                    <option value="">select</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row mt-3">
                            <label for="email" class="col-sm-3 col-form-label">Email:</label>
                            <div class="col-sm-9">
                                <input type="email" name="email" class="form-control" id="email" required>
                            </div>
                        </div>

                        <div class="form-group row mt-3">
                            <label for="mobile" class="col-sm-3 col-form-label">Mobile Number:</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="mobile" name="mobile" required>
                            </div>
                        </div>

                        <div class="form-group row mt-3">
                            <label for="address" class="col-sm-3 col-form-label">Address:</label>
                            <div class="col-sm-9">
                                <input id="address" name="address" class="form-control" required>
                            </div>
                        </div>

                        <div class="form-group row mt-3">
                            <label for="specialty" class="col-sm-3 col-form-label">Specialty:</label>
                            <div class="col-sm-9">
                                <select id="specialty" name="specialty" class="form-control" required>
                                    <option value="">Select Specialty</option>
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
                        </div>

                        <div class="form-group row mt-3">
                            <label for="dob" class="col-sm-3 col-form-label">Date of Birth:</label>
                            <div class="col-sm-9">
                                <input type="date" class="form-control" id="dob" name="dob" required>
                            </div>
                        </div>

                        <div class="form-group row mt-3">
                            <label for="doj" class="col-sm-3 col-form-label">Date of Joining:</label>
                            <div class="col-sm-9">
                                <input type="date" class="form-control" id="doj" name="doj" required>
                            </div>
                        </div>

                        <div class="form-group row mt-3">
                            <label for="qualification" class="col-sm-3 col-form-label">Qualification:</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="qualification" name="qualification"
                                    required>
                            </div>
                        </div>

                        <div class="form-group row mt-3">
                            <label for="experience" class="col-sm-3 col-form-label">Years of Experience:</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" id="experience" name="experience" required>
                            </div>
                        </div>

                        <div class="form-group row mt-3">
                            <label for="exampleInputusername" class="col-sm-3 col-form-label">Username</label>
                            <div class="col-sm-9">
                                <input type="text" name="username" class="form-control" id="exampleInputusername"
                                    placeholder="username">
                            </div>
                        </div>

                        <div class="form-group row mt-3">
                            <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Password</label>
                            <div class="col-sm-9">
                                <input type="password" name="password" class="form-control" id="exampleInputPassword2"
                                    placeholder="Password">
                            </div>
                        </div>

                        <div class="form-group row mt-3">
                            <label for="exampleInputConfirmPassword2" class="col-sm-3 col-form-label">Re
                                Password</label>
                            <div class="col-sm-9">
                                <input type="password" name="re_password" class="form-control"
                                    id="exampleInputConfirmPassword2" placeholder="Password">
                            </div>
                        </div>


                        <div class="form-group row mt-3">
                            <label for="report" class="col-sm-3 col-form-label">Upload CV (PDF):</label>
                            <div class="col-sm-9">
                                <input type="file" class="form-control-file" id="report" name="report" accept=".pdf">
                            </div>
                        </div>

                        <div class="form-group row mt-5">
                            <div class="col-sm-9 offset-sm-3">
                                <button type="submit" name="register_doctor" class="btn btn-primary">Register
                                    Doctor</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </section>

    </main><!-- End #main -->

    <?php 
        include "include/footer.php";
    ?>

</body>

</html>
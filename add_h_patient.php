<?php
    include "include/auth_session.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Add Slider Images</title>
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
            <h1>Add Slider Images</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item ">Sliders</li>
                    <li class="breadcrumb-item active">Add Slider Images</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Patient Admission Form</h5>
                    <?php 
                                    if(isset($_GET["msg"])){
                                ?>
                                <div class="alert alert-danger" role="alert">
                                    <?= $_GET["msg"]?>
                                </div>
                                <?php        
                                    }
                                ?>
                    <form action="form_submit.php" method="post" enctype="multipart/form-data">
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
                            <label for="pincode" class="col-sm-3 col-form-label">Pincode:</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="pincode" name="pincode" required>
                            </div>
                        </div>

                        <div class="form-group row mt-3">
                            <label for="address" class="col-sm-3 col-form-label">Address:</label>
                            <div class="col-sm-9">
                                <input id="address" name="address" class="form-control" rows="4" required>
                            </div>
                        </div>

                        <div class="form-group row mt-3">
                            <label for="disease" class="col-sm-3 col-form-label">Disease:</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="disease" name="disease" required>
                            </div>
                        </div>

                        <div class="form-group row mt-3">
                            <label for="date" class="col-sm-3 col-form-label">Date of registration:</label>
                            <div class="col-sm-9">
                                <input type="date" class="form-control" id="date" name="date" required>
                            </div>
                        </div>

                        <div class="form-group row mt-3">
                            <label for="medication" class="col-sm-3 col-form-label">Current Medication :</label>
                            <div class="col-sm-9">
                                <select id="medication" name="medication" class="form-control">
                                    <option value="">select</option>
                                    <option value="yes">Yes</option>
                                    <option value="no">No</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row mt-3">
                            <label for="allergy" class="col-sm-3 col-form-label">Allergies (If any):</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="allergy" name="allergy">
                            </div>
                        </div>

                        <div class="form-group row mt-3">
                            <label for="reason" class="col-sm-3 col-form-label">Reason  for visit:</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="reason" name="reason">
                            </div>
                        </div>

                        <div class="form-group row mt-3">
                            <label for="report" class="col-sm-3 col-form-label">Upload Report (PDF):</label>
                            <div class="col-sm-9">
                                <input type="file" class="form-control-file" id="report" name="report" accept=".pdf"
                                >
                            </div>
                        </div>

                        <div class="form-group row mt-5">
                            <div class="col-sm-9 offset-sm-3">
                                <button type="submit" name="register_patient" class="btn btn-primary">Register Patient</button>
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
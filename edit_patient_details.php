
<?php 
     session_start();
     include "include/header.php";
     include "include/navBar.php";
     
     include "connect/db.php";
     include "connect/fun.php";
     include "include/links.php";
     $connect=new connect();
     $fun=new fun($connect->dbconnect());
     $msg="";
    $id=$_GET['id'];
    $fetch = $fun->edit_patient($id);
    ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Edit Doctor Details</title>
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
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Edit Patient Details</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="">Home</a></li>
                    <li class="breadcrumb-item ">Patient</li>
                    <li class="breadcrumb-item active">Edit Patient</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Edit Doctor Form</h5>
                    <?php 
                        if(isset($_GET["msg"])){
                    ?>
                    <div class="alert alert-danger" role="alert">
                        <?= $_GET["msg"]?>
                    </div>
                    <?php        
                        }
                    ?>
                     <?php

           if(mysqli_num_rows($fetch) >0) {
            $patient = mysqli_fetch_assoc($fetch);
           ?>
 <form action="form_submit.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="patient_id" value="<?= $patient['id']; ?>"> <!-- Hidden input to store the patient ID -->

    <div class="form-group row mt-1">
        <label for="name" class="col-sm-3 col-form-label">Full Name:</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" id="name" name="name" value="<?= $patient['name']; ?>" required>
        </div>
    </div>

    <div class="form-group row mt-3">
        <label for="age" class="col-sm-3 col-form-label">Age:</label>
        <div class="col-sm-9">
            <input type="number" class="form-control" id="age" name="age" value="<?= $patient['age']; ?>" required>
        </div>
    </div>

    <div class="form-group row mt-3">
        <label for="gender" class="col-sm-3 col-form-label">Gender:</label>
        <div class="col-sm-9">
            <select id="gender" name="gender" class="form-control" required>
                <option value="">Select</option>
                <option value="male" <?= $patient['gender'] == 'male' ? 'selected' : ''; ?>>Male</option>
                <option value="female" <?= $patient['gender'] == 'female' ? 'selected' : ''; ?>>Female</option>
                <option value="other" <?= $patient['gender'] == 'other' ? 'selected' : ''; ?>>Other</option>
            </select>
        </div>
    </div>

    <div class="form-group row mt-3">
        <label for="email" class="col-sm-3 col-form-label">Email:</label>
        <div class="col-sm-9">
            <input type="email" name="email" class="form-control" id="email" value="<?= $patient['email']; ?>" required>
        </div>
    </div>

    <div class="form-group row mt-3">
        <label for="mobile" class="col-sm-3 col-form-label">Mobile Number:</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" id="mobile" name="mobile" value="<?= $patient['mobile']; ?>" required>
        </div>
    </div>

    <div class="form-group row mt-3">
        <label for="pincode" class="col-sm-3 col-form-label">Pincode:</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" id="pincode" name="pincode" value="<?= $patient['pincode']; ?>" required>
        </div>
    </div>

    <div class="form-group row mt-3">
        <label for="address" class="col-sm-3 col-form-label">Address:</label>
        <div class="col-sm-9">
            <input type="text" id="address" name="address" class="form-control" value="<?= $patient['address']; ?>" required>
        </div>
    </div>

    <div class="form-group row mt-3">
        <label for="disease" class="col-sm-3 col-form-label">Disease:</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" id="disease" name="disease" value="<?= $patient['disease']; ?>" required>
        </div>
    </div>

    <div class="form-group row mt-3">
        <label for="date" class="col-sm-3 col-form-label">Date of registration:</label>
        <div class="col-sm-9">
            <input type="date" class="form-control" id="date" name="date" value="<?= $patient['dor']; ?>">
        </div>
    </div>

    <div class="form-group row mt-3">
        <label for="medication" class="col-sm-3 col-form-label">Current Medication:</label>
        <div class="col-sm-9">
            <select id="medication" name="medication" class="form-control">
                <option value="">Select</option>
                <option value="yes" <?= $patient['medication'] == 'yes' ? 'selected' : ''; ?>>Yes</option>
                <option value="no" <?= $patient['medication'] == 'no' ? 'selected' : ''; ?>>No</option>
            </select>
        </div>
    </div>

    <div class="form-group row mt-3">
        <label for="allergy" class="col-sm-3 col-form-label">Allergies (If any):</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" id="allergy" name="allergy" value="<?= $patient['allergy']; ?>">
        </div>
    </div>

    <div class="form-group row mt-3">
        <label for="reason" class="col-sm-3 col-form-label">Reason for visit:</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" id="reason" name="reason" value="<?= $patient['reason']; ?>">
        </div>
    </div>
    <div class="form-group row mt-5">
        <div class="col-sm-9 offset-sm-3">
            <button type="submit" name="edit_patient" class="btn btn-primary">Update Patient</button>
        </div>
    </div>
</form>
 <?php
                                         } 
                                        ?>
                </div>
            </div>
        </section>

    </main><!-- End #main -->

    <?php 
        include 'include/footer.php';
    ?>
</body>

</html>

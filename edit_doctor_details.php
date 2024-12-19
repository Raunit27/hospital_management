
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
    $fetch = $fun->edit_doctor($id);
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
            <h1>Edit Doctor Details</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item ">Doctors</li>
                    <li class="breadcrumb-item active">Edit Doctor</li>
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
           $res = mysqli_fetch_assoc($fetch);
           ?>
                    <form action="form_submit.php" method="post" enctype="multipart/form-data" onsubmit="return validatePassword()">
                        <!-- Include hidden field for doctor ID -->
                        <input type="hidden" name="doctor_id" value="<?= $res['id'] ?>">

                        <div class="form-group row mt-1">
                            <label for="name" class="col-sm-3 col-form-label">Full Name:</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="name" name="name" value="<?= $res['name'] ?>" required>
                            </div>
                        </div>

                        <div class="form-group row mt-3">
                            <label for="age" class="col-sm-3 col-form-label">Age:</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" id="age" name="age" value="<?= $res['age'] ?>" required>
                            </div>
                        </div>

                        <div class="form-group row mt-3">
                            <label for="gender" class="col-sm-3 col-form-label">Gender:</label>
                            <div class="col-sm-9">
                                <select id="gender" name="gender" class="form-control" required>
                                    <option value="">select</option>
                                    <option value="male" <?=$res['gender'] == 'male' ? 'selected' : '' ?>>Male</option>
                                    <option value="female" <?= $res['gender'] == 'female' ? 'selected' : '' ?>>Female</option>
                                    <option value="other" <?= $res['gender'] == 'other' ? 'selected' : '' ?>>Other</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row mt-3">
                            <label for="email" class="col-sm-3 col-form-label">Email:</label>
                            <div class="col-sm-9">
                                <input type="email" name="email" class="form-control" id="email" value="<?=$res['email'] ?>" required>
                            </div>
                        </div>

                        <div class="form-group row mt-3">
                            <label for="mobile" class="col-sm-3 col-form-label">Mobile Number:</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="mobile" name="mobile" value="<?=$res['mobile'] ?>" required>
                            </div>
                        </div>

                        <div class="form-group row mt-3">
                            <label for="address" class="col-sm-3 col-form-label">Address:</label>
                            <div class="col-sm-9">
                                <input id="address" name="address" class="form-control" value="<?= $res['address'] ?>" required>
                            </div>
                        </div>

                        <div class="form-group row mt-3">
                            <label for="specialty" class="col-sm-3 col-form-label">Specialty:</label>
                            <div class="col-sm-9">
                            <select id="specialty" name="specialty" class="form-control" required>
    <option value="">Select Specialty</option>
    <option value="cardiology" <?= ($res['specialty'] == 'cardiology') ? 'selected' : '' ?>>Cardiology</option>
    <option value="neurology" <?= ($res['specialty'] == 'neurology') ? 'selected' : '' ?>>Neurology</option>
    <option value="orthopedics" <?= ($res['specialty'] == 'orthopedics') ? 'selected' : '' ?>>Orthopedics</option>
    <option value="pediatrics" <?= ($res['specialty'] == 'pediatrics') ? 'selected' : '' ?>>Pediatrics</option>
    <option value="gynecology" <?= ($res['specialty'] == 'gynecology') ? 'selected' : '' ?>>Gynecology</option>
    <option value="dermatology" <?= ($res['specialty'] == 'dermatology') ? 'selected' : '' ?>>Dermatology</option>
    <option value="general_surgery" <?= ($res['specialty'] == 'general_surgery') ? 'selected' : '' ?>>General Surgery</option>
    <option value="urology" <?= ($res['specialty'] == 'urology') ? 'selected' : '' ?>>Urology</option>
    <option value="psychiatry" <?= ($res['specialty'] == 'psychiatry') ? 'selected' : '' ?>>Psychiatry</option>
    <option value="ent" <?= ($res['specialty'] == 'ent') ? 'selected' : '' ?>>ENT</option>
    <option value="ophthalmology" <?= ($res['specialty'] == 'ophthalmology') ? 'selected' : '' ?>>Ophthalmology</option>
    <option value="gastroenterology" <?= ($res['specialty'] == 'gastroenterology') ? 'selected' : '' ?>>Gastroenterology</option>
    <option value="endocrinology" <?= ($res['specialty'] == 'endocrinology') ? 'selected' : '' ?>>Endocrinology</option>
    <option value="pulmonology" <?= ($res['specialty'] == 'pulmonology') ? 'selected' : '' ?>>Pulmonology</option>
</select>

                            </div>
                        </div>

                        <div class="form-group row mt-3">
                            <label for="dob" class="col-sm-3 col-form-label">Date of Birth:</label>
                            <div class="col-sm-9">
                                <input type="date" class="form-control" id="dob" name="dob" value="<?= $res['dob'] ?>" required>
                            </div>
                        </div>

                        <div class="form-group row mt-3">
                            <label for="doj" class="col-sm-3 col-form-label">Date of Joining:</label>
                            <div class="col-sm-9">
                                <input type="date" class="form-control" id="doj" name="doj" value="<?= $res['doj'] ?>" required>
                            </div>
                        </div>

                        <div class="form-group row mt-3">
                            <label for="qualification" class="col-sm-3 col-form-label">Qualification:</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="qualification" name="qualification" value="<?= $res['qualification'] ?>" required>
                            </div>
                        </div>

                        <div class="form-group row mt-3">
                            <label for="experience" class="col-sm-3 col-form-label">Years of Experience:</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" id="experience" name="experience" value="<?= $res['experience'] ?>" required>
                            </div>
                        </div>

                        <div class="form-group row mt-3">
                            <label for="exampleInputusername" class="col-sm-3 col-form-label">Username</label>
                            <div class="col-sm-9">
                                <input type="text" name="username" class="form-control" id="exampleInputusername" value="<?= $res['username'] ?>" placeholder="username">
                            </div>
                        </div>

                        <div class="form-group row mt-3">
                            <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Password</label>
                            <div class="col-sm-9">
                                <input type="password" name="password" class="form-control" id="exampleInputPassword2"  value="<?= $res['password'] ?>" placeholder="Password">
                            </div>
                        </div>

                        <div class="form-group row mt-3">
                            <label for="exampleInputConfirmPassword2" class="col-sm-3 col-form-label">Re Password</label>
                            <div class="col-sm-9">
                                <input type="password" name="re_password" class="form-control" id="exampleInputConfirmPassword2" value="<?= $res['password'] ?>" placeholder="Re password">
                            </div>
                        </div>

                        
                        <div class="row justify-content-center mt-3">
                            <div class="col-md-3">
                                <button type="submit" class="btn btn-primary btn-block" name="edit_doctor">Update Doctor Details</button>
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

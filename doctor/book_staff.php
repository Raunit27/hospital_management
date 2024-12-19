<?php 
   include "auth_session.php";
  
  include "navbar.php";
  include "sidebar.php";
   $uname=$_SESSION["uname"];
   $fetch=$fun->view_manager_nav($uname);
    if(mysqli_num_rows($fetch)>0){
        $row = mysqli_fetch_assoc($fetch);
        $id=$row['id'];
        $name = $row['name'];
        $email = $row['email'];
        $phone = $row['number'];
        $dob= $row['dob'];
        $address = $row['address'];
        $doj= $row['doj'];
        $image = $row['image'];
        }
   
    $manager_id=$_GET['mana_id'];
    $staff_id=$_GET['staff_id'];

    $fetch1 = $fun->book_staff($staff_id);

  ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Manager Dashboard</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: Jul 27 2023 with Bootstrap v5.3.1
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
 
</head>

<body>
  <main id="main" class="main">

        <div class="pagetitle">
            <h1>Dashboard</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="welcome.php">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <div class="col-lg-12 grid-margin">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Book staff</h4>
                                <?php 
                                    if(isset($_GET["msg"])){
                                ?>
                                <div class="alert alert-danger" role="alert">
                                    <?= $_GET["msg"]?>
                                </div>
                                <?php        
                                    } 
                                ?>
                                <div class="col-md-10 grid-margin stretch-card container">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="card-title">Book Staff </h4>
                                            <p class="card-description">
                                               
                                            </p>
                                            <?php

                                              if(mysqli_num_rows($fetch1) >0) {
 
                                              $res = mysqli_fetch_assoc($fetch1);
                                            ?>
                                            <form class="forms-sample" action="./manager_form_sub.php " method="POST">
                                                <div class="form-group row">
                                                    <label for="exampleInputUsername2"
                                                        class="col-sm-3 col-form-label">Full Name</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="name" class="form-control"
                                                            id="exampleInputUsername2" value="<?php echo $res['name']; ?>" readonly>
                                                    </div>
                                                </div>
                                                <!-- <div class="form-group row">
                                                    <label for="exampleInputEmail2"
                                                        class="col-sm-3 col-form-label">Email</label>
                                                    <div class="col-sm-9">
                                                        <input type="email" name="email" class="form-control"
                                                            id="exampleInputEmail2" value="<?php echo $res['email']; ?>">
                                                    </div>
                                                </div> -->
                                                <!-- <div class="form-group row">
                                                    <label for="exampleInputMobile"
                                                        class="col-sm-3 col-form-label">Mobile :</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="m_nuber" class="form-control"
                                                            id="exampleInputMobile"value="<?php echo $res['mobile_number']; ?>">
                                                    </div>
                                                </div> -->

                                                <!-- <div class="form-group row">
                                                    <label for="exampleInputMobile1"
                                                        class="col-sm-3 col-form-label">Alternate Mobile :</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="m_nuber_1" class="form-control"
                                                 id="exampleInputMobile1"value="<?php echo $res['alternate_mobile_number']; ?>">
                                                    </div>
                                                </div> -->


 
 
                                                <div class="form-group row mt-4">
                                                    <label for="client" class=" col-sm-3 form-label">Category</label>
                                                    <div class="col-sm-9">
                                                        <select id="event" name="category" class="form-select">
                                                            <option value="<?php echo $res['category']; ?>"><?php echo $res['category']; ?></option>
                                                            
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group row mt-4">
                                                    <label for="exampleInputnumber"
                                                        class="col-sm-3 col-form-label">Number</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="number" class="form-control"
                                                            id="exampleInputnumber"  value="<?php echo $res['mobile_number']; ?>"readonly>
                                                    </div>
                                                </div>                                           
                                                <div class="form-group row mt-4">
                                                    <label for="exampleInputaddress"
                                                        class="col-sm-3 col-form-label">Address</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="address" class="form-control"
                                                            id="exampleInputaddress"  value="<?php echo $res['address']; ?>"readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group row mt-4">
                                                    <label for="exampleInputDOJ" class="col-sm-3 col-form-label">Booking Date </label>
                                                    <div class="col-sm-9">
                                                        <input type="date" name="dateofbooking" class="form-control"
                                                            id="exampleInputDOJ">
                                                    </div>
                                                </div>
                                                <div class="form-group row mt-4">
                                                    <label for="exampleInputtime" class="col-sm-3 col-form-label">Booking Time </label>
                                                    <div class="col-sm-9">
                                                        <input type="time" name="time" class="form-control"
                                                            id="exampleInputtime">
                                                    </div>
                                                </div>
                                                <div>
                                                    <input type="hidden" name="manager_id" value="<?php echo $manager_id; ?>">
                                                    <input type="hidden" name="staff_id" value="<?php echo $staff_id; ?>">
                                                </div>
                                                <button type="submit" class="btn btn-primary mt-4"
                                                    name="book_staff">Submit</button>
                                                <!-- <button class="btn btn-light mt-4">Cancel</button> -->
                                            </form>
                                            <?php
                                         } 
                                        ?>
                                  
                            </div>
                        </div>
                    </div>

    </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <?php include "footer.php"; ?>
 <!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>


</body>

</html>
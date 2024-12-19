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
        }else{
        
    }
    $fetch1=$fun->view_manager_client($id);
    if(mysqli_num_rows($fetch1)>0){
        
    }
  ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Event Up</title>
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
        <div class="container-fluid page-body-wrapper">
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="row">
                    <div class="col-lg-12 grid-margin">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">MY profile</h4>
                                <section class="h-100 gradient-custom-2">
                                    <div class="container py-5 h-100">
                                        <div class="row d-flex justify-content-center align-items-center h-100">
                                            <div class="col col-lg-9 col-xl-7">
                                                <div class="card">
                                                    <div class="rounded-top text-white d-flex flex-row"
                                                        style="background-color: #000; height:200px;">
                                                        <div class="ms-4 mt-5 d-flex flex-column" style="width: 150px;">
                                                            <img src="../owner/images/managers_images/<?php echo $image; ?>" alt="Generic placeholder image"
                                                                class="img-fluid img-thumbnail mt-1 mb-2"
                                                                style="width: 150px; z-index: 1">
                                                                
                                                            <!-- <button type="button" class="btn btn-outline-dark"
                                                                data-mdb-ripple-color="dark" style="z-index: 1;">
                                                                <a href="owner_edit_profile.php">Edit profile</a>
                                                                
                                                            </button> -->
                                                        </div>
                                                        <div class="ms-3" style="margin-top: 130px;">
                                                            <h5><?php echo $row['name'];?></h5>
                                                            <p> Manager</p>
                                                        </div>
                                                    </div>
                                                    <!-- <div class="p-4 text-black" style="background-color: #f8f9fa;">
                                                        <div class="d-flex justify-content-end text-center py-1">
                                                            <div>
                                                            <a href="<?php echo $row['fblink'];?>"target="_blank"><img src="images/facebook-logo.png" alt="Email Icon"  height="30" width="30" ></a>
                                                            </div>
                                                            <div class="px-3">
                                                            <a href="<?php echo $row['instalink'];?>"target="_blank"><img src="images/instagram.png" alt="Email Icon"  height="30" width="30" ></a>
                                                            </div>
                                                            <div>
                                                            <a href="<?php echo $row['twitterlink'];?>"target="_blank"><img src="images/twitter-logo.png" alt="Email Icon"  height="30" width="30" ></a>
                                                            </div>
                                                        </div>
                                                    </div> -->
                                                    <div class="card-body p-4 text-black">
                                                        <div class="mb-5">
                                                            <p class="lead fw-normal mb-1">About</p>
                                                            <div class="p-4" style="background-color: #f8f9fa;">
                                                    
                                                                <p class="font-italic mb-3 bold">Name : <?php echo $row['name'];?></p>
                                                                <!-- <p class="font-italic mb-3">Email : <?php echo $row['email'];?></p> -->
                                                                <!-- <p class="font-italic mb-3">Company Name : <?php echo $row['company_name'];?></p> -->
                                                                <p class="font-italic mb-3">Email : <?php echo $row['email'];?></p>
                                                                <p class="font-italic mb-3">Phone : <?php echo $row['number'];?></p>
                                                                <p class="font-italic mb-3">Date of Birth : <?php echo $row['dob'];?></p>
                                                                <p class="font-italic mb-3">Address : <?php echo $row['address'];?></p>
                                                                <p class="font-italic mb-3">Date of Joining : <?php echo $row['doj'];?></p>
                                                            </div>
                                                        </div>
                                                        <!-- <div
                                                            class="d-flex justify-content-between align-items-center mb-4">
                                                            <p class="lead fw-normal mb-0">Recent photos</p>
                                                            <p class="mb-0"><a href="#!" class="text-muted">Show all</a>
                                                            </p>
                                                        </div> -->
                                                        <!-- <div class="row g-2">
                                                            <div class="col mb-2">
                                                                <img src="https://mdbcdn.b-cdn.net/img/Photos/Lightbox/Original/img%20(112).webp"
                                                                    alt="image 1" class="w-100 rounded-3">
                                                            </div>
                                                            <div class="col mb-2">
                                                                <img src="https://mdbcdn.b-cdn.net/img/Photos/Lightbox/Original/img%20(107).webp"
                                                                    alt="image 1" class="w-100 rounded-3">
                                                            </div>
                                                        </div>
                                                        <div class="row g-2">
                                                            <div class="col">
                                                                <img src="https://mdbcdn.b-cdn.net/img/Photos/Lightbox/Original/img%20(108).webp"
                                                                    alt="image 1" class="w-100 rounded-3">
                                                            </div>
                                                            <div class="col">
                                                                <img src="https://mdbcdn.b-cdn.net/img/Photos/Lightbox/Original/img%20(114).webp"
                                                                    alt="image 1" class="w-100 rounded-3">
                                                            </div>
                                                        </div> -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
            <!-- partial: ./partials/_footer.html -->

            <!-- partial -->
        </div>
    </div>
         </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <?php include "footer.php"; ?><!-- End Footer -->

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
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
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

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

        <section class="section">
            <div class="card">
                <div class="card-body">
                    <h4>
                    <?php 
                                    if(isset($_GET["msg"])){
                                ?>
                                <div class="alert alert-danger" role="alert">
                                    <?= $_GET["msg"]?>
                                </div>
                                <?php        
                                    }
                                ?>
                    </h4>   
                    <form action="manager_form_sub.php" method="post" enctype="multipart/form-data">
                        <div class="form-group row mb-4">
                            <label for="client" class=" col-sm-3 form-label">Client</label>
                            <div class="col-sm-6">
                                <select id="client" name="client" class="form-select">
                                    
                                    <?php 
                                                            while($res1 = mysqli_fetch_assoc($fetch1)){
                                                            ?>
                                    <option value="<?php echo $res1['client_id'] . '|' . $res1['client']; ?>"><?php echo $res1['client']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group row mt-4">
                                <label for="image" class="col-sm-3 col-form-label">Upload Photo:</label>
                                <div class="col-sm-6">
                                    <input type="file" class="form-control" id="image" name="image1" value=""
                                        accept="image/*">
                                </div>
                            </div>

                            <div class="form-group row mt-4">
                                <label for="image1" class="col-sm-3 col-form-label">Upload Photo:</label>
                                <div class="col-sm-6">
                                    <input type="file" class="form-control" id="image1" name="image2" value=""
                                        accept="image/*">
                                </div>
                            </div>

                            <div class="form-group row mt-4">
                                <label for="image11" class="col-sm-3 col-form-label">Upload Photo:</label>
                                <div class="col-sm-6">
                                    <input type="file" class="form-control" id="image11" name="image3" value=""
                                        accept="image/*">
                                </div>
                            </div>

                            <div class="form-group row mt-4">
                                <label for="exampleInputdiscription" class="col-sm-3 col-form-label">Short
                                    Discription</label>
                                <div class="col-sm-6">
                                    <textarea id="exampleInputdiscription" class="form-control" name="discription"
                                        rows="4" cols="50"></textarea>
                                </div>
                            </div>
                        </div>
                        <div>
                            <input type="hidden" name="manager_id" value="<?php echo $id; ?>">
                        </div>
                        <button type="submit" name="details_to_client_submit" class="btn btn-primary">Submit</button>
                    </form>
        </section>
        </div>


    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <?php include "footer.php"; ?><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

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
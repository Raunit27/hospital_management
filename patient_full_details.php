
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
    
    // $fetch = $fun->view_doctor_details();
    ?>

<body>

    <?php  include "include/navBar.php"; ?>
    <?php 
    
    $msg="";
    $id=$_GET['id'];
    $fetch = $fun->view_full_patient_details($id);
    if(mysqli_num_rows($fetch)>0){
        $res=mysqli_fetch_assoc($fetch);
    }
    else{
        $res=null;
    }
   
    ?>
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
                                                            <img src="assets/img/patient.jpg" alt="Generic placeholder image"
                                                                class="img-fluid img-thumbnail mt-4 mb-2"
                                                                style="width: 150px; z-index: 1">
                                                                
                                                            <button type="button" class="btn btn-outline-dark"
                                                                data-mdb-ripple-color="dark" style="z-index: 1;">
                                                                <a href="owner_edit_profile.php">Edit profile</a>
                                                                
                                                            </button>
                                                        </div>
                                                        <div class="ms-3" style="margin-top: 130px;">
                                                            <h5><?php echo $res['name'];?></h5>
                                                            <p>Patient</p>
                                                        </div>
                                                    </div>
                                                    <div class="p-4 text-black" style="background-color: #f8f9fa;">
                                                        <!-- <div class="d-flex justify-content-end text-center py-1">
                                                            <div>
                                                            <a href="<?php echo $res[''];?>"target="_blank"><img src="images/facebook-logo.png" alt="Email Icon"  height="30" width="30" ></a>
                                                            </div>
                                                            <div class="px-3">
                                                            <a href="<?php echo $res[''];?>"target="_blank"><img src="images/instagram.png" alt="Email Icon"  height="30" width="30" ></a>
                                                            </div>
                                                            <div>
                                                            <a href="<?php echo $res['twitterlink'];?>"target="_blank"><img src="images/twitter-logo.png" alt="Email Icon"  height="30" width="30" ></a>
                                                            </div>
                                                        </div> -->
                                                    </div>
                                                    <div class="card-body p-4 text-black">
                                                        <div class="mb-5">
                                                            <p class="lead fw-normal mb-1">Full Details</p>
                                                            <div class="p-4" style="background-color: #f8f9fa;">
                                                    
                                                                <p class="font-italic mb-3 bold">Name : <?php echo $res['name'];?></p>
                                                                <p class="font-italic mb-3">Age : <?php echo $res['age'];?></p>
                                                                <p class="font-italic mb-3">Gender : <?php echo $res['gender'];?></p>
                                                                <p class="font-italic mb-3">Email : <?php echo $res['email'];?></p>
                                                                <p class="font-italic mb-3">Phone : <?php echo $res['mobile'];?></p>
                                                                <p class="font-italic mb-3">Address : <?php echo $res['address'];?></p>
                                                                <p class="font-italic mb-3">Disease : <?php echo $res['disease'];?></p>
                                                                <p class="font-italic mb-3">Date of Registration : <?php echo $res['dor'];?></p>
                                                                <p class="font-italic mb-3">Medication : <?php echo $res['medication'];?></p>
                                                                <p class="font-italic mb-3">Allergy : <?php echo $res['allergy'];?></p>
                                                                <p class="font-italic mb-3">Reason for visit : <?php echo $res['reason'];?></p>
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




    <!-- content-wrapper ends -->
    <!-- partial:partials/_footer.html -->
    <?php include "include/footer.php"; ?>
    <!-- partial -->
    </div>
    <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->

    <!-- plugins:js -->
    <script src="vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="vendors/chart.js/Chart.min.js"></script>
    <script src="vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <script src="vendors/progressbar.js/progressbar.min.js"></script>

    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="js/off-canvas.js"></script>
    <script src="js/hoverable-collapse.js"></script>
    <script src="js/template.js"></script>
    <script src="js/settings.js"></script>
    <script src="js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="js/jquery.cookie.js" type="text/javascript"></script>
    <script src="js/dashboard.js"></script>
    <script src="js/Chart.roundedBarCharts.js"></script>
    <!-- End custom js for this page-->
</body>

</html>
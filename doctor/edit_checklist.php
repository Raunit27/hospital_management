<?php 
   include "auth_session.php";
   
  include "navbar.php";
  include "sidebar.php";
   $uname=$_SESSION["uname"];
   $fetch=$fun->view_manager_nav($uname);
    if(mysqli_num_rows($fetch)>0){
        $row = mysqli_fetch_assoc($fetch);
        // $id=$row['id'];
        $name = $row['name'];
        $email = $row['email'];
        $phone = $row['number'];
        $dob= $row['dob'];
        $address = $row['address'];
        $doj= $row['doj'];
        $image = $row['image'];
        }else{
        
    }
    // $fetch1=$fun->view_manager_client($id);
    // if(mysqli_num_rows($fetch1)>0){
        
    // }
    
    $id=$_GET['id'];
    $fetch1=$fun->view_client_details($id);
    if(mysqli_num_rows($fetch1)>0){
        $row1= mysqli_fetch_assoc($fetch1);
        $client_name=$row1['name'];
         $event_name=$row1['event'];
    }

    $fetch_check=$fun->checklist_view($id);
    if(mysqli_num_rows($fetch_check)>0){
        $row_check= mysqli_fetch_assoc($fetch_check);
        $checklist=$row_check['check_d'];
        $checklist=explode(",",$checklist);   
    }
    else{
        $checklist=array();
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

        <div class="main-panel">
            <div class="content-wrapper">
                <div class="row">
                    <div class="col-lg-12 grid-margin">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Edit Project</h4>
                                <div class="col-md-10 grid-margin stretch-card container">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="card-title">Update Project</h4>
                                             <?php //print_r($checklist) ;
                                           // echo array_search("meet with client",$checklist);
                                           //echo (array_search("meet with client",$checklist) != null)?("checked"):("");
                                          // echo (array_search("Book staff",$checklist) != null)?("checked"):("")
                                            // echo (empty(array_search("Book staff",$checklist) ));
                                            // echo "after bs null <br>";
                                            // echo  (array_search("Book staff",$checklist) >=0);
                                            // echo "after bs 0 <br>";
                                            // echo (empty(array_search("meet with client",$checklist)));
                                            // echo "after mc null <br>";
                                            // echo  (array_search("meet with client",$checklist) >=0);
                                            // echo "after mc 0 <br>";
                                            ?>

                                            <p class="card-description">

                                            </p>
                                            <?php

                                            // if(mysqli_num_rows($fetch) >0) {

                                            // $res = mysqli_fetch_assoc($fetch);
                                            ?>
                                            <form class="forms-sample" action="manager_form_sub.php" method="POST">

                                                <!-- client Selection Dropdown -->
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group row mb-4">
                                                            
                                                            <label for="client"
                                                                class=" col-sm-3 form-label">Client</label>
                                                            <div class="col-sm-9">
                                                                <input type="text"  class="form-control" id="client"
                                                                    name="client"
                                                                   value="<?= $client_name; ?>" readonly>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- Event Selection Dropdown -->
                                                    <div class="col-sm-6">
                                                        <div class="form-group row mb-4">
                                                            <label for="event"
                                                                class=" col-sm-3 form-label">Event</label>
                                                            <div class="col-sm-9">
                                                                <input type="text" class="form-control" id="event"
                                                                    name="event"
                                                                  value="<?= $event_name; ?>" readonly >
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Manager Selection Dropdown -->
                                                <!-- checkboxs -->
                                                <span>Pre-Event</span>
                                                <div class="form-check  mt-2">
                                                    <input class="form-check-input" name="check[]" type="checkbox" value="meet with client"
                                                        id="flexCheckDefault" <?php echo (in_array("meet with client",$checklist) != null )?("checked"):("")?>>
                                                    <label class="form-check-label" for="flexCheckDefault">
                                                       meet with client
                                                    </label>
                                                </div>
                                               
                                                <div class="form-check  mt-4 mb-4">
                                                    <input class="form-check-input" name="check[]"type="checkbox" value="Book staff"
                                                        id="flexCheckDefault1" <?php echo (in_array("Book staff",$checklist) != null )?("checked"):("")?> >
                                                    <label class="form-check-label" for="flexCheckDefault1">
                                                       Book staff
                                                    </label>
                                                </div>
                                                <span>Event Day</span>
                                                <div class="form-check mt-4">
                                                    <input class="form-check-input"name="check[]" type="checkbox" value="Communicate with venue Manager"
                                                        id="flexCheckChecked2" <?php echo (in_array("Communicate with venue Manager",$checklist) != null )?("checked"):("")?>>
                                                    <label class="form-check-label" for="flexCheckChecked2">
                                                        Communicate with venue Manager
                                                    </label>
                                                </div>
                                                <div class="form-check mt-4">
                                                    <input class="form-check-input"name="check[]" type="checkbox" value="Ensure all staff reach on time"
                                                        id="flexCheckChecked3"<?php echo (in_array("Ensure all staff reach on time",$checklist) != null )?("checked"):("")?>>
                                                    <label class="form-check-label" for="flexCheckChecked3">
                                                       Ensure all staff reach on time
                                                    </label>
                                                </div>
                                                <div class="form-check mt-4">
                                                    <input class="form-check-input" name="check[]"type="checkbox" value="Decoration and catering work started"
                                                        id="flexCheckChecked4" <?php echo (in_array("Decoration and catering work started",$checklist) != null )?("checked"):("")?>>
                                                    <label class="form-check-label" for="flexCheckChecked4">
                                                       Decoration and catering work started
                                                    </label>
                                                </div>
                                                <div class="form-check mt-4">
                                                    <input class="form-check-input"name="check[]" type="checkbox" value="Venue in a organised form to organise event"
                                                        id="flexCheckChecked5" <?php echo (in_array("Venue in a organised form to organise event",$checklist) != null )?("checked"):("")?>>
                                                    <label class="form-check-label" for="flexCheckChecked5">
                                                       Venue in a organised form to organise event
                                                    </label>
                                                </div>
                                                <div class="form-check mt-4">
                                                    <input class="form-check-input" name="check[]"type="checkbox" value="Check with all staff that was book for the event"
                                                        id="flexCheckChecked6"<?php echo (in_array("Check with all staff that was book for the event",$checklist) != null )?("checked"):("")?>>
                                                    <label class="form-check-label" for="flexCheckChecked6">
                                                      Check with all staff that was book for the event
                                                    </label>
                                                </div>
                                                <div class="form-check mt-4">
                                                    <input class="form-check-input"name="check[]" type="checkbox" value="Check decoration personally"
                                                        id="flexCheckChecked7"<?php echo (in_array("Check decoration personally",$checklist) != null )?("checked"):("")?>>
                                                    <label class="form-check-label" for="flexCheckChecked7">
                                                     Check decoration personally 
                                                    </label>
                                                </div>
                                                <div class="form-check mt-4">
                                                    <input class="form-check-input"name="check[]" type="checkbox" value="Check catering personally"
                                                        id="flexCheckChecked8"<?php echo (in_array("Check catering personally",$checklist) != null )?("checked"):("")?>>
                                                    <label class="form-check-label" for="flexCheckChecked8">
                                                    Check catering personally
                                                    </label>
                                                </div>
                                                <div class="form-check mt-4">
                                                    <input class="form-check-input"name="check[]" type="checkbox" value="Check venue / Ready for event"
                                                        id="flexCheckChecked9"<?php echo (in_array("Check venue / Ready for event",$checklist) != null )?("checked"):("")?>>
                                                    <label class="form-check-label" for="flexCheckChecked9">
                                                   Check venue / Ready for event
                                                    </label>
                                                </div>
                                                <div class="form-check mt-4 mb-4">
                                                    <input class="form-check-input"name="check[]" type="checkbox" value="Monitor schdule and activities"
                                                        id="flexCheckChecked91"<?php echo (in_array("Monitor schdule and activities",$checklist) != null )?("checked"):("")?>>
                                                    <label class="form-check-label" for="flexCheckChecked91">
                                                   Monitor schdule and activities
                                                    </label>
                                                </div>
                                                <span>Post-Event</span>
                                                <div class="form-check mt-4">
                                                    <input class="form-check-input" name="check[]"type="checkbox" value="Manage post-party clean up"
                                                        id="flexCheckChecked10"<?php echo (in_array("Manage post-party clean up",$checklist) != null )?("checked"):("")?>>
                                                    <label class="form-check-label" for="flexCheckChecked10">
                                                  Manage post-party clean up
                                                    </label>
                                                </div>
                                                <div class="form-check mt-4">
                                                    <input class="form-check-input" name="check[]"type="checkbox" value="Collect feedback for future improvement"
                                                        id="flexCheckChecked11"<?php echo (in_array("Collect feedback for future improvement",$checklist) != null )?("checked"):("")?>>
                                                    <label class="form-check-label" for="flexCheckChecked11">
                                                  Collect feedback for future improvement
                                                    </label>
                                                </div>
                                                <div>
                                                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                                                </div>

                                                <div class="mt-4">                                                <button type="submit" class="btn btn-primary me-2"
                                                    name="checklist_submit">Submit</button>
                                                <button class="btn btn-light">Cancel</button>
                                                </div>

                                            </form>
                                            <?php
                                         //} 
                                        ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
            <!-- partial: ./partials/_footer.html -->

            <!-- partial -->
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
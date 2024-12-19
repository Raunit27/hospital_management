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

        <section class="section">
            <div class="row">

                <div class="col-lg-6">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"></h5> 
                            <div>
                                <table class="table">
                                <thead>
                                                        <tr>
                                                            <th>Sr_NO</th>
                                                            <th>Client</th>
                                                            <th>Event</th>
                                                            
                                                            <th>Action</th>
                                                            
                                                            
                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                        <?php
                                                         if(mysqli_num_rows($fetch1)>0){
                                                         $sr = 1;
                                                        while($res1 = mysqli_fetch_assoc($fetch1)){
                                                         ?>
                                                        <tr>
                                                            <th scope="row"><?php echo $sr;?></th>
                                                            <td><?php echo $res1['client'];?></td>
                                                            <td><?php echo $res1['event'];?></td>
                                                            <td class="">
                                                     <button type="button" 
                                                     onclick="fetch_details(<?php echo $res1['client_id']; ?>)"
                                                                    class="btn btn-primary">Details</button>
                                                            </td>
                                                           
                                                        </tr>
                                                        <?php 
                                                         $sr++;
                                                          }
                                                          }?>
                                                    </tbody>

                                </table>
                            </div>


                        </div>
                    </div>
                </div>
                <div class="col-lg-6">

                    <div class="card">
                        <div class="card-body">

                            <h5 class="card-title"> Event Details </h5>
                            <div style="  font-family: 'Times New Roman', serif;">
                               <p>Client : <span id="client"></span></p>
                               <p>Event : <span id="event"></span> </p>
                               <p>Start date : <span id="start"></span></p>
                               <p>End date : <span id="end"></span></p>
                               <p>Guest Expected :  <span id="guest"></span></p>
                               <p>Venue : <span id="venue"></span></p>
                               <p>Catering : <span id="catering"></span></p>
                               <p>Decoration : <span id="decoration"></span></p>
                               <p>Photography : <span id="photo"></span></p>
                               <p>Music : <span id="music"></span></p>
                               <p>Parlour : <span id="parlour"></span></p>
                            </div>


                        </div>
                    </div>

                </div>

            </div>
        </section>

    </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <?php include "footer.php"; ?><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <script>
   async function fetch_details(id){
        const details=await fetch(`./fetch_event_details.php?id=${id}`);
        const data=await details.json();
        console.log(data);
        document.getElementById('start').innerHTML = data.startdate;
        document.getElementById('end').innerHTML = data.enddate;
        document.getElementById('client').innerHTML = data.client_name;
        document.getElementById('event').innerHTML = data.event;
        document.getElementById('guest').innerHTML = data.guest_expected;
        document.getElementById('venue').innerHTML = data.venue;
        document.getElementById('catering').innerHTML = data.catering;
        document.getElementById('decoration').innerHTML = data.decoration;
        document.getElementById('photo').innerHTML = data.photography;
        document.getElementById('music').innerHTML = data.music;
        document.getElementById('parlour').innerHTML = data.parlour;
    }
  </script>
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
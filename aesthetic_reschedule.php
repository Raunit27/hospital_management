<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Reschedule Apointment</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  
  <?php 
    include "include/links.php";
    if(isset($_GET["id"])){
      $id = $_GET["id"];
      $patient = $fun->fetchAesthaticAppointmentsWithid($id);
      $patient = mysqli_fetch_assoc($patient);
     
      
    }
    else{
      header("location:appointments.php?msg=Id not found");
    }
   

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
      <h1>Reschedule appointment</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item ">Appointments</li>
          <li class="breadcrumb-item active">Reschedule appointment</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Reschedule appointment Form</h5>

               <!-- Multi Columns Form -->
          <form class="row g-3" action="form_submit.php" method="post" id="form" enctype="multipart/form-data">
            <?php
            if (isset($_GET["msg"]) && $_GET["msg"] == "Added Successfully") {
              echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                    <i class='bi bi-check-circle me-1'></i>
                    <span id='message' >" . $_GET['msg'] . "</span>
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                  </div>";
            } else if (isset($_GET["msg"]) && $_GET["msg"] != "Added Successfully") {
              echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                    <i class='bi bi-exclamation-octagon me-1'></i>
                    <span id='message' >" . $_GET['msg'] . "</span>
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                  </div>";
            }
            ?>

            
            <input type="text" name="id" id="id" value="<?php echo $patient["id"] ?>" hidden>
            
            <div class="col-md-6">
              <label for="name" class="form-label">Patient Name</label>
              <input type="text" name="name" class="form-control" id="name" readonly value="<?php echo $patient["name"]?>">
            </div>
            <div class="col-md-6">
              <label for="des" class="form-label">Phone no.</label> 
              <input type="text" name="des" class="form-control" id="des" readonly value="<?php echo $patient["phone"]?>" >
            </div>
            <div class="col-md-6">
              <label for="date" class="form-label">New date</label>
              <input type="date" name="date" min="<?php echo date('Y-m-d'); ?>" class="form-control" id="date" value="<?php echo $patient["date"]?>">
            </div>
           
            <div class="text-center">
              <div class="spinner-border text-success " hidden id="loader" role="status">
                <span class="visually-hidden">Loading...</span>
              </div>
              <div class="" id="buttons">
                <button type="submit" name="change_date_aesthatic" class="btn btn-primary">Submit </button>
                <button type="reset" class="btn btn-secondary">Reset</button>

              </div>
            </div>
          </form><!-- End Multi Columns Form -->

            </div>
          </div>
         
    </section>

  </main><!-- End #main -->

  <?php 
    include "include/footer.php";
  ?>

</body>

</html>
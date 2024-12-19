<?php
    include "include/auth_session.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Update Treatment Type</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  
  <?php 
    include "include/links.php";
    if($_GET["id"]){
      $id = $_GET["id"];
      $treatment_type = $fun->fetchTreatmentTypewithId($id);
      $treatment = ($treatment_type)? mysqli_fetch_assoc($treatment_type):(null);
    }
    else{
      header("location:add_treatment_type.php");
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
      <h1>update Treatment Type</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item ">Treatment</li>
          <li class="breadcrumb-item active">Update Treatment Type</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Treatment Type Form</h5>

              <!-- Multi Columns Form -->
              <form class="row g-3" action="form_submit.php" method="post" id="form">
                <?php 
                  if(isset($_GET["msg"]) && $_GET["msg"] == "Added Successfully"){
                    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                    <i class='bi bi-check-circle me-1'></i>
                    <span id='message' >".$_GET['msg']."</span>
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                  </div>";
                  }
                  else if(isset($_GET["msg"]) && $_GET["msg"] != "Added Successfully") {
                    echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                    <i class='bi bi-exclamation-octagon me-1'></i>
                    <span id='message' >".$_GET['msg']."</span>
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                  </div>";
                  }
                ?>
             
                <div class="col-md-12">
                  <label for="name" class="form-label">Treatment Type Name</label>
                  <input type="text" name="name" class="form-control" id="name" value="<?php echo $treatment["name"] ?>">
                </div>
                <div>
                  <input type="hidden" name="id" value="<?php echo $treatment["id"] ?>">
                </div>
               
                <div class="text-center">
                <div class="spinner-border text-success " hidden id="loader" role="status">
                    <span class="visually-hidden">Loading...</span>
                  </div>
                  <div class="" id="buttons">
                    <button type="submit" name="treatment_type_update" class="btn btn-primary">Update                  </button>
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
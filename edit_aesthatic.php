<?php
    include "include/auth_session.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Update Aesthatic Type</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  
  <?php 
    include "include/links.php";
    if(isset($_GET["id"])){
      $id = $_GET["id"];
      $treatment = $fun->fetchAesthaticsWithId($id);
      
      
    }
    else{
      header("location:edit_aesthatic.php?msg=Id not found");
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
      <h1>update Aesthatic Type</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item ">Aesthatic</li>
          <li class="breadcrumb-item active">Update Aesthatic Type</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Aesthatic Form</h5>
            <?php
            // echo $id;
            // print_r($treatment);
            ?>
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

            
            <input type="text" name="id" id="id" value="<?php echo $treatment["id"] ?>" hidden>
            
            <div class="col-md-6">
              <label for="name" class="form-label">Aesthatics Name</label>
              <input type="text" name="name" class="form-control" id="name" value="<?php echo $treatment["name"]?>">
            </div>
            <div class="col-md-6">
              <label for="image" name="image" class="col-sm-2 col-form-label">Upload Image</label>
              <div class="col-sm-10">
                <input class="form-control" name="image" type="file" id="image" accept="image/*">
              </div>
            </div>
            <div class="text-center">
              <div class="spinner-border text-success " hidden id="loader" role="status">
                <span class="visually-hidden">Loading...</span>
              </div>
              <div class="" id="buttons">
                <button type="submit" name="aesthatic_edit_submit" class="btn btn-primary">Submit </button>
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
<?php
    include "include/auth_session.php";
    if(isset($_POST["submit"])){
        $img_no = $_POST["image_no"];
        if(isset($_FILES["before"]["name"]) &&isset($_FILES["after"]["name"]) && !empty($_FILES["before"]["name"]) && !empty($_FILES["after"]["name"])){
            
            $target_dir = "../assets/img/";
            $target_file_before = $target_dir .basename($_FILES["before"]["name"]);
            $target_file_after = $target_dir .basename($_FILES["after"]["name"]);
            $uploadOk = 1;
            $imageFileType_before = strtolower(pathinfo($target_file_before,PATHINFO_EXTENSION));
            $imageFileType_after = strtolower(pathinfo($target_file_after,PATHINFO_EXTENSION));
            $file_name_before = $target_dir ."gallery-$img_no-1.".$imageFileType_before;
            $file_name_after = $target_dir ."gallery-$img_no-2.".$imageFileType_after;
             unlink($file_name_before);
             unlink($file_name_after);

            $imageTemp_before = $_FILES["before"]["tmp_name"]; 
           

            $imageTemp_after = $_FILES["after"]["tmp_name"]; 

            if(move_uploaded_file($imageTemp_after, $file_name_after) && move_uploaded_file($imageTemp_before, $file_name_before)){
               
                $msg = "Added Successfully";
                //echo "$msg";
                
                header("location:bA.php?msg=$msg");
            }
            else{
                $msg= "Image not uploaded";
                // echo "$msg";
                header("location:bA.php?id=$id&msg=$msg");
            }
    
        }
        else{
            $msg= "Image not uploaded";
            // echo "$msg";
            header("location:bA.php?msg=$msg");
        }
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Add Before After Images</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  
  <?php 
    include "include/links.php";
    
    
    

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
      <h1>Add Before After Images</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item ">Frontend</li>
          <li class="breadcrumb-item active">Add Before After Images</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Before After Form</h5>
            <?php
            // echo $id;
            // print_r($treatment);
            ?>
               <!-- Multi Columns Form -->
          <form class="row g-3" action="bA.php" method="post" id="form" enctype="multipart/form-data">
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

            
         
            
            <div class="col-md-6 form-floating mb-3 " >
              <select name="image_no" id="floatingSelect" class="form-select" aria-label="Floating label select example" > 
                    <option value="1" selected >1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>

              </select>
              <label for="floatingSelect">Image no.</label>

            </div>
            <div class="col-md-6">
              <label for="image" name="image" class="col-sm-6 col-form-label">Upload Before Image</label>
              <div class="col-sm-10">
                <input class="form-control" name="before" type="file" id="image" accept=".jpg">
              </div>
            </div>
            <div class="col-md-6">
              <label for="after" name="image" class="col-sm-6 col-form-label">Upload After Image</label>
              <div class="col-sm-10">
                <input class="form-control" name="after" type="file" id="after" accept=".jpg">
              </div>
            </div>
            <div class="text-center">
              <div class="spinner-border text-success " hidden id="loader" role="status">
                <span class="visually-hidden">Loading...</span>
              </div>
              <div class="" id="buttons">
                <button type="submit" name="submit" class="btn btn-primary">Submit </button>
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
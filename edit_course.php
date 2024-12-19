<?php
    include "include/auth_session.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Edit Course</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  
  <?php 
    include "include/links.php";
    if(isset($_GET["id"])){
      $id = $_GET["id"];
      $course = $fun->fetchCourseWithId($id);
      $course = mysqli_fetch_assoc($course);
      
    }
    else{
      header("location:add_course.php?msg=Id not found");
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
      <h1>update Course</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item ">Courses</li>
          <li class="breadcrumb-item active">Update Courses</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Edit Course Form</h5>

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

            
            <input type="text" name="id" id="id" value="<?php echo $course["id"] ?>" hidden>
            
            <div class="col-md-6">
              <label for="name" class="form-label">Course Name</label>
              <input type="text" name="name" class="form-control" id="name" value="<?php echo $course["name"]?>">
            </div>
            <div class="col-md-6">
              <label for="des" class="form-label">Short Description</label>
              <textarea type="text" name="des" class="form-control" id="des" ><?php echo $course["short_des"]?></textarea>
            </div>
            <div class="col-md-6">
              <label for="fee" class="form-label">Course Fees</label>
              <input type="text" name="fee" class="form-control" id="fee" value="<?php echo $course["fee"]?>">
            </div>
            <div class="col-md-6">
              <label for="image" name="image" class="col-sm-2 col-form-label">Upload Image</label>
              <div class="col-sm-10">
                <input class="form-control" name="image" type="file" id="image" accept="image/*">
              </div>
            </div>
            <div class="col-md-12" > 
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">TinyMCE Editor</h5>

                    <!-- TinyMCE Editor -->
                    <textarea class="tinymce-editor" name="editor"  >
                    <?php echo $course["des"]?>
              </textarea><!-- End TinyMCE Editor -->

                </div>
            </div>
            </div>
            <div class="text-center">
              <div class="spinner-border text-success " hidden id="loader" role="status">
                <span class="visually-hidden">Loading...</span>
              </div>
              <div class="" id="buttons">
                <button type="submit" name="edit_course" class="btn btn-primary">Submit </button>
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
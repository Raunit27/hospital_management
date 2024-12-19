<?php
    include "include/auth_session.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Add Aesthatics </title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->

  <?php
  include "include/links.php";
  $aesthatic = $fun->fetchAesthatics();

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
      <h1>Add Aesthatics</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item ">Aesthatics</li>
          <li class="breadcrumb-item active">Add Aesthatics</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Add Aesthatic Form</h5>

          <!-- Multi Columns Form -->
          <form class="row g-3" action="form_submit.php" method="post" id="form" enctype="multipart/form-data">
            <?php
            if(isset($_GET["msg"])){

              if (isset($_GET["msg"]) && $_GET["msg"] == "Added Successfully" || $_GET["msg"] == "Updated Successfully") {
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
            }
            ?>

            
            
            <div class="col-md-6">
              <label for="name" class="form-label">Treatment Type Name</label>
              <input type="text" name="name" class="form-control" id="name">
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
                <button type="submit" name="aesthatics_submit" class="btn btn-primary">Submit </button>
                <button type="reset" class="btn btn-secondary">Reset</button>

              </div>
            </div>
          </form><!-- End Multi Columns Form -->

        </div>
      </div>
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Treatment Types</h5>

          <!-- Table with stripped rows -->
          <table class="table datatable">
            <thead>
              <tr>
                <th scope="col">#</th>
              
                <th scope="col">Name</th>
                <th scope="col">Image</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
              </tr>
            </thead>
            <tbody>
              <?php
              if (mysqli_num_rows($aesthatic) > 0) {
                $sr = 1;
                while ($row = mysqli_fetch_assoc($aesthatic)) {
                  echo "<tr>
                        <th scope='row'>$sr</th>
                       
                        <td>$row[name]</td>
                        <td> <img src='$row[image]' alt='$row[name]' width='100' height='100'></td>
                        <td><a href='edit_aesthatic.php?id=$row[id]' class='btn btn-primary'>Edit</a></td>
                        <td><a href='deleteTreatment.php?id=$row[id]' class='btn btn-danger'>Delete</a></td>
                      </tr>";
                  $sr++;
                }
              }
              ?>


            </tbody>
          </table>
          <!-- End Table with stripped rows -->

        </div>
      </div>
    </section>

  </main><!-- End #main -->

  <?php
  include "include/footer.php";
  ?>

</body>

</html>
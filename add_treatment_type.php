<?php
    include "include/auth_session.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Add Treatment Type</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  
  <?php 
    include "include/links.php";
    $treatment_types = $fun->fetchTreatmentType();

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
      <h1>Add Treatment Type</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item ">Treatment</li>
          <li class="breadcrumb-item active">Add Treatment Type</li>
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
                  <input type="text" name="name" class="form-control" id="name">
                </div>
               
                <div class="text-center">
                <div class="spinner-border text-success " hidden id="loader" role="status">
                    <span class="visually-hidden">Loading...</span>
                  </div>
                  <div class="" id="buttons">
                    <button type="submit" name="treatment_type_submit" class="btn btn-primary">Submit                  </button>
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
                    <th>Edit</th>
                    <th>Delete</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                    if(mysqli_num_rows($treatment_types) > 0){
                      $sr = 1;
                      while($row = mysqli_fetch_assoc($treatment_types)){
                        echo "<tr>
                        <th scope='row'>$sr</th>
                        <td>$row[name]</td>
                        <td><a href='edit_treatment_type.php?id=$row[id]' class='btn btn-primary'>Edit</a></td>
                        <td><a href='delete_treatment_type.php?id=$row[id]' class='btn btn-danger'>Delete</a></td>
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
<script>
  // const form =document.getElementById("form");
  // form.addEventListener("submit",async function(e){
  //   e.preventDefault();
  //   document.getElementById("loader").hidden = false;
  //   document.getElementById("buttons").hidden = true;
  //   const name = document.getElementById("name").value;
  //   const fetch = await axios.post("form_submit.php",document.querySelector('#form'),{
  //     headers:{
  //       'Content-Type':'multipart/form-data'
  //     }
  //   });
  //   if(fetch.data == 1){
      
  //     setTimeout(() => {
  //       document.querySelector('#message').textContent = 'Treatment Added';
  //       document.querySelector('.alert').removeAttribute("hidden");
  //     }, 500);
  //     document.querySelector('.alert').setAttribute("hidden",true);
  //   }
  //   console.log(fetch.data);
  //   document.getElementById("loader").hidden = true;
  //   document.getElementById("buttons").hidden = false;
  //   form.reset();
  // })
</script>
  <?php 
    include "include/footer.php";
  ?>

</body>

</html>
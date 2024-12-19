<?php
    include "include/auth_session.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>View Admitted Students </title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->

  <?php
  include "include/links.php";
  $enquiry = $fun->admittedStudents();

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
      <h1>View Students</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item ">Courses</li>
          <li class="breadcrumb-item active">View Students</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">View Students</h5>
          <?php
            if (isset($_GET["msg"]) && $_GET["msg"] == "Enquiry Admitted Successfully") {
              echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                    <i class='bi bi-check-circle me-1'></i>
                    <span id='message' >" . $_GET['msg'] . "</span>
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                  </div>";
            } 
            else if (isset($_GET["msg"]) && $_GET["msg"] == "Student Deleted Successfully") {
              echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                    <i class='bi bi-exclamation-octagon me-1'></i>
                    <span id='message' >" . $_GET['msg'] . "</span>
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                  </div>";
            }
            else if (isset($_GET["msg"]) && $_GET["msg"] == "Marked as Rescheduled") {
              echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
                    <i class='bi bi-exclamation-octagon me-1'></i>
                    <span id='message' >" . $_GET['msg'] . "</span>
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                  </div>";
            }
            ?>
          <!-- Table with stripped rows -->
          <table class="table datatable">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Age</th>
                <th scope="col">Phone</th>
                <th scope="col">Email</th>
                <th scope="col">Address</th>
                <th scope="col">Education</th>
                <th scope="col">Course</th>
                
                <th scope="col">Delete</th>
                
              </tr>
            </thead>
            <tbody>
              <?php
              if (mysqli_num_rows($enquiry) > 0) {
                $sr = 1;
                while ($row = mysqli_fetch_assoc($enquiry)) {
                    // print_r($row);
                  

                  echo "<tr>
                        <th scope='row'>$sr</th>
                        <td>$row[name]</td>
                        <td>$row[age]</td>
                        <td>$row[phone]</td>
                        <td>$row[email]</td>
                        <td>$row[address]</td>
                        <td>$row[education]</td>
                        <td>$row[course]</td>
                       
                        <td><a href='deleteStudent.php?id=$row[id]' class='btn btn-danger'>Delete</a> </td>
                        
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
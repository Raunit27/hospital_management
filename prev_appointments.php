<?php
    include "include/auth_session.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>View Previous Appointments </title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->

  <?php
  include "include/links.php";
  $appointments = $fun->fetchPrevAppointments();

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
      <h1>View Previous Appointments</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item ">Appointments</li>
          <li class="breadcrumb-item active">View Previous Appointments</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">View Previous Appointments</h5>
          <?php
            if (isset($_GET["msg"]) && $_GET["msg"] == "Marked as complete") {
              echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                    <i class='bi bi-check-circle me-1'></i>
                    <span id='message' >" . $_GET['msg'] . "</span>
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                  </div>";
            } 
            else if (isset($_GET["msg"]) && $_GET["msg"] == "Marked as Cancelled") {
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
                <th scope="col">Type</th>
                <th scope="col">Treatment</th>
                <th scope="col">Patient</th>
                <th scope="col">Phone</th>
                <th scope="col">Date</th>
                <th scope="col">Status</th>
                
              </tr>
            </thead>
            <tbody>
              <?php
              if (mysqli_num_rows($appointments) > 0) {
                $sr = 1;
                while ($row = mysqli_fetch_assoc($appointments)) {
                    // print_r($row);
                    $color = ($row["status"] == 'Cancel')?("danger"):("success");

                  echo "<tr>
                        <th scope='row'>$sr</th>
                        <td>$row[type]</td>
                        <td>$row[treat_name]</td>
                        <td>$row[app_name]</td>
                        <td>$row[phone]</td>
                        <td>$row[date]</td>
                        <td><a href='#' class='btn btn-$color'>$row[status]</a> </td>
                        
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
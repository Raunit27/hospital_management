<?php
    include "include/auth_session.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>View Appointments </title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->

  <?php
  include "include/links.php";
  $appointments = $fun->fetchAppointments();
  $aesthatic = $fun->fetchAesthaticAppointments();

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
      <h1>view Appointments</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item ">Appointments</li>
          <li class="breadcrumb-item active">View Appointments</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">View Treatment Appointments</h5>
          <?php
            if (isset($_GET["treatment"]) && $_GET["msg"] == "Marked as complete") {
              echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                    <i class='bi bi-check-circle me-1'></i>
                    <span id='message' >" . $_GET['msg'] . "</span>
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                  </div>";
            } 
            else if (isset($_GET["treatment"]) && $_GET["msg"] == "Marked as Cancelled") {
              echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                    <i class='bi bi-exclamation-octagon me-1'></i>
                    <span id='message' >" . $_GET['msg'] . "</span>
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                  </div>";
            }
            else if (isset($_GET["treatment"]) && $_GET["msg"] == "Marked as Rescheduled") {
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
                <th scope="col">Completed</th>
                <th scope="col">Reschedule</th>
                <th scope="col">Cancel</th>
              </tr>
            </thead>
            <tbody>
              <?php
              if (mysqli_num_rows($appointments) > 0) {
                $sr = 1;
                while ($row = mysqli_fetch_assoc($appointments)) {
                    //  print_r($row);
                    
                  echo "<tr>
                        <th scope='row'>$sr</th>
                        <td>$row[type]</td>
                        <td>$row[treat_name]</td>
                        <td>$row[app_name]</td>
                        <td>$row[phone]</td>
                        <td>$row[date]</td>
                        <td><a href='appointment_action.php?completed&id=$row[app_id]' class='btn btn-success'>Completed</a> </td>
                        <td><a href='reschedule.php?id=$row[app_id]' class='btn btn-primary'>Reschedule</a></td>
                        <td><a href='appointment_action.php?cancel&id=$row[app_id]' class='btn btn-danger'>Cancel</a></td>
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
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">View Aesthetic Appointments</h5>
          <?php
            if (isset($_GET["aesthatic"]) && $_GET["msg"] == "Marked as complete") {
              echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                    <i class='bi bi-check-circle me-1'></i>
                    <span id='message' >" . $_GET['msg'] . "</span>
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                  </div>";
            } 
            else if (isset($_GET["aesthatic"]) && $_GET["msg"] == "Marked as Cancelled") {
              echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                    <i class='bi bi-exclamation-octagon me-1'></i>
                    <span id='message' >" . $_GET['msg'] . "</span>
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                  </div>";
            }
            else if (isset($_GET["aesthatic"]) && $_GET["msg"] == "Marked as Rescheduled") {
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
                <th scope="col">Aesthetic</th>
                <th scope="col">Patient</th>
                <th scope="col">Phone</th>
                <th scope="col">Date</th>
                <th scope="col">Completed</th>
                <th scope="col">Reschedule</th>
                <th scope="col">Cancel</th>
              </tr>
            </thead>
            <tbody>
              <?php
              if (mysqli_num_rows($aesthatic) > 0) {
                $sr = 1;
                while ($row = mysqli_fetch_assoc($aesthatic)) {
                    //  print_r($row);
                    
                  echo "<tr>
                        <th scope='row'>$sr</th>
                      
                        <td>$row[aesthatic]</td>
                        <td>$row[name]</td>
                        <td>$row[phone]</td>
                        <td>$row[date]</td>
                        <td><a href='aesthatic_appoint_action.php?completed&id=$row[id]' class='btn btn-success'>Completed</a> </td>
                        <td><a href='aesthetic_reschedule.php?id=$row[id]' class='btn btn-primary'>Reschedule</a></td>
                        <td><a href='aesthatic_appoint_action.php?cancel&id=$row[id]' class='btn btn-danger'>Cancel</a></td>
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
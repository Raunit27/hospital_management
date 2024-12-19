<?php 
         session_start();
         include "connect/db.php";
    include "connect/fun.php";
    
    $conn = new connect();
    $fun = new fun($conn->dbconnect());
    if(isset($_POST['submit'])){
      $email = $_POST['email'];
      $password = $_POST['password'];
      [$msg, $flag] = $fun->login($email,$password);
     
      if($flag){
   
        $_SESSION['username'] = $email;
        $_SESSION['is_valid'] = true;
        header("Location: dashboard.php");
      }
      
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Login</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
  <style>
    img {
      -webkit-filter: drop-shadow(1px 1px 0 black) 
                    drop-shadow(-1px -1px 0 white);
    filter:drop-shadow(1px 1px 0 black) 
           drop-shadow(-1px -1px 0 white);
}
  </style>

</head>

<style>
  .divider:after,
  .divider:before {
    content: "";
    flex: 1;
    height: 1px;
    background: #eee;
  }
</style>
<body>
    <section class="vh-100">
      <div class="container py-5 h-100">
        <div class="row d-flex align-items-center justify-content-center h-100">
          <div class="col-md-8 col-lg-7 col-xl-6">
            <img src="./assets/img/hospital.png"
              class="img-fluid" alt="Phone image">
          </div>
          <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
            <form action="index.php" method="POST">
              <!-- Email input --> 
              <div class="form-outline mb-4">
                <input type="text" name="email" id="form1Example13" class="form-control form-control-lg" />
                <label class="form-label" for="form1Example13">User Name</label>
              </div>

              <!-- Password input -->
              <div class="form-outline mb-4">
                <input type="password" name="password" id="password" class="form-control form-control-lg" />
                <label class="form-label" for="password">Password</label>
              </div>
            <div class="form-check">
              <input class="form-check-input" name="form1Example1" type="checkbox"  id="form1Example1"  onclick="myFunction()" />
              <label class="form-check-label" for="form1Example1">Show Password </label>
            </div>
              

              <!-- Submit button -->
              <button type="submit" name="submit" class="btn btn-primary btn-lg btn-block">Sign in</button>

              

            </form>
          </div>
        </div>
      </div>
    </section>
    
    <script>
        
        function myFunction() {
                  var x = document.getElementById("password");
                  if (x.type === "password") {
                    x.type = "text";
                  } else {
                    x.type = "password";
                  }
                }
    </script>
  <!-- ======= Footer ======= -->
 <?php 
 include "include/footer.php";
 ?>

</body>

</html>
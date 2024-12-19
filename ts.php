<?php
    include "include/auth_session.php";
    if(isset($_POST["submit"])){
        
        $card_no = $_POST["card_no"];
        $title = $_POST["title"];
        $des = $_POST["des"];
        if(isset($_FILES["image"]["name"]) && !empty($_FILES["image"]["name"])){
            
            $target_dir = "../assets/img/";
            $target_file = $target_dir .basename($_FILES["image"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            $file_name = $target_dir ."card-$card_no.".$imageFileType;
             unlink($file_name);
            $imageTemp = $_FILES["image"]["tmp_name"]; 
            
            if(move_uploaded_file($imageTemp, $file_name)){
                $res= $fun->addTreatment_services($title, $des,$card_no);
                $msg = "Added Successfully";
               
                
                 header("location:ts.php?msg=$msg");
            }
            else{
                $msg= "Image not uploaded";
                $res= $fun->addTreatment_services($title, $des,$card_no);
                $msg = "Added Successfully";
                 
                 header("location:ts.php?id=$id&msg=$msg");
            }
        }
        else{
          $res= $fun->addTreatment_services($title, $des,$card_no);
          $msg = "Added Successfully";
            
            header("location:ts.php?id=$id&msg=$msg");

        }
    }
    else{
        
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Add Treatment and Services</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  
  <?php 
    include "include/links.php";
    
    
    $fetch = $fun->fetchTreatment_services();


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
      <h1>Add Treatment and Services</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item ">Frontend</li>
          <li class="breadcrumb-item active">Add Treatment and Services</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Treatment & Services Form</h5>
               
              <!-- Multi Columns Form -->
              <form class="row g-3" action="ts.php" method="POST" id="form" enctype="multipart/form-data" >
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
             
                <div class="form-floating mb-3 col-md-6">
                    <select class="form-select" name="card_no" id="floatingSelect" aria-label="Floating label select example">
                        <option value="1"  selected>1</option>
                        <option value="2"  >2</option>
                        <option value="3"  >3</option>
                        <option value="4"  >4</option>
                        
                    </select>
                    <label for="floatingSelect">Select Card no.</label>
                </div>
                <div class="col-md-6">
                  <label for="img" class="form-label">Image</label>
                  <input type="file" name="image" accept=".jpg" class="form-control" id="img">
                </div>
                <div class="col-md-6">
                  <label for="title" class="form-label">Title</label>
                  <input type="text" name="title" class="form-control" id="title" placeholder="Enter Title">
                </div>
                <div class="col-md-6">
                  <label for="des" class="form-label">Short 15 word description</label>
                  <textarea type="text" name="des" class="form-control" id="des" placeholder="Enter Short description" ></textarea>
                </div>
               
                <div class="text-center">
                <div class="spinner-border text-success " hidden id="loader" role="status">
                    <span class="visually-hidden">Loading...</span>
                  </div>
                  <div class="" id="buttons">
                    <button type="submit" name="submit" class="btn btn-primary">Submit                  </button>
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
                    <th scope="col">Description</th>
                    <th scope="col">Image</th>
                    
                  </tr>
                </thead>
                <tbody>
                <?php 
                    if(mysqli_num_rows($fetch)>0){
                        while($row = mysqli_fetch_assoc($fetch)){
                            echo "<tr>
                            <th scope='row'>$row[id]</th> 
                            <td>";
                            echo $row['title'];
                            echo "</td> <td>";
                            echo $row['des'];
                            echo "</td>
                            <td> <img src='../assets/img/card-$row[id].jpg' alt='$row[title]' width='100' height='100'> </td>";
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
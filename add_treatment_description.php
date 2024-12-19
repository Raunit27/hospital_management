<?php
    include "include/auth_session.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Add Treatment Description</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    
    <!-- Favicons -->

    <?php
    include "include/links.php";
    $treatment_types = $fun->fetchTreatmentType();
    $treatments = $fun->fetchTreatments();
    $des = $fun->fetchDescription(4);

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
            <h1>Add Treatment</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item ">Treatment</li>
                    <li class="breadcrumb-item active">Add Treatment</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Treatment Form</h5>

                    <!-- Multi Columns Form -->
                    <form class="row g-3" action="form_submit.php" method="post" id="form"
                        enctype="multipart/form-data">
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

                        <div class="form-floating mb-3 col-md-6">
                            <select class="form-select" name="treatment_type" id="type"
                                aria-label="Floating label select example">
                                <option selected>Select Treatment Type</option>
                                <?php
                                if ($treatment_types->num_rows > 0) {
                                    while ($row = $treatment_types->fetch_assoc()) {
                                        echo "<option value=" . $row['name'] . ">" . $row['name'] . "</option>";
                                    }
                                }
                                ?>
                            </select>
                            <label for="floatingSelect">Treatment type</label>
                        </div>
                        <div class="col-md-6 form-floating mb-3" >
                            <select name="treatment" id="treatment"
                                class="form-select"  aria-label="Floating label select example">
                                <option value="">Select Treatment</option>
                                
                            </select>
                            <label for="floatingSelect">Treatment type</label>

                        </div>
                        
                        <div class="card">
                <div class="card-body">
                    <h5 class="card-title">TinyMCE Editor</h5>

                    <!-- TinyMCE Editor -->
                    <textarea class="tinymce-editor" name="editor"  >
                   
              </textarea><!-- End TinyMCE Editor -->

                </div>
            </div>

                        <div class="text-center">
                            <div class="spinner-border text-success " hidden id="loader" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                            <div class="" id="buttons">
                                <button type="submit" name="treatment_submit_des" class="btn btn-primary">Submit </button>
                                <button type="reset" class="btn btn-secondary">Reset</button>

                            </div>
                        </div>
                    </form><!-- End Multi Columns Form -->

                </div>
            </div>

            <div id="des">

                
            </div>
        
        </section>

    </main><!-- End #main -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script src="./ajax-scripts.js"></script>
    <?php
    include "include/footer.php";
    ?>

</body>

</html>
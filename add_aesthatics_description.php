<?php
    include "include/auth_session.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Add Aesthatic Description </title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->

    <?php
    include "include/links.php";
 
    $treatment_types = $fun->fetchAesthatics();
    

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
            <h1>Add Aesthatic Description</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item ">Aesthatic</li>
                    <li class="breadcrumb-item active">Add Aesthatic Description</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Add Aesthatic Description Form</h5>

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

                        <div class="form-floating mb-3 col-md-12">
                            <select class="form-select" name="aesthatic" id="aesthatic"
                                aria-label="Floating label select example">
                                <option selected>Select Aesthatics</option>
                                <?php
                                if ($treatment_types->num_rows > 0) {
                                    while ($row = $treatment_types->fetch_assoc()) {
                                        echo "<option value=" . $row['id'] . ">" . $row['name'] . "</option>";
                                    }
                                }
                                ?>
                            </select>
                            <label for="aesthatic">Aesthatics </label>
                        </div>
                        <div class="card">
                <div class="card-body">
                    <h5 class="card-title">TinyMCE Editor</h5>

                    <!-- TinyMCE Editor -->
                    <textarea class="tinymce-editor" name="editor" id="editor">
                <p>Hello World!</p>
                <p>This is TinyMCE <strong>full</strong> editor</p>
              </textarea><!-- End TinyMCE Editor -->

                </div>
            </div>

                        <div class="text-center">
                            <div class="spinner-border text-success " hidden id="loader" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                            <div class="" id="buttons">
                                <button type="submit" name="aesthatic_submit_des" class="btn btn-primary">Submit </button>
                                <button type="reset" class="btn btn-secondary">Reset</button>

                            </div>
                        </div>
                    </form><!-- End Multi Columns Form -->

                </div>
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
<?php 
    session_start();
    include "include/header.php";
    include "include/navBar.php";
    
    include "connect/db.php";
    include "connect/fun.php";
    include "include/links.php";
    $connect=new connect();
    $fun=new fun($connect->dbconnect());
    $msg="";
    
    $fetch = $fun->view_doctor_details();
    ?>
<main id="main" class="main">

    <body>
        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Doctors</h5>
                            <!-- <p>Add lightweight datatables to your project with using the <a
                                    href="https://github.com/fiduswriter/Simple-DataTables" target="_blank">Simple
                                    DataTables</a> library. Just add <code>.datatable</code> class name to any table you
                                wish to conver to a datatable</p> -->

                            <!-- Table with stripped rows -->
                            <div class="table-responsive">
                                <table class="table datatable table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">Sr</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Specialty</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Number</th>
                                            <th scope="col">username</th>
                                            <th scope="col">password</th>
                                            <th scope="col">Action</th>
                                            <th scope="col">Action</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                if(mysqli_num_rows($fetch)>0){
                                $sr = 1;
                                while($res = mysqli_fetch_assoc($fetch)){
                                    ?>
                                        <tr>
                                            <th scope="row"><?php echo $sr;?></th>
                                            <td><?php echo $res['name'];?></td>
                                            <td><?php echo $res['specialty'];?></td>
                                            <td><?php echo $res['email'];?></td>
                                            <td><?php echo $res['mobile'];?></td>
                                            <td><?php echo $res['username'];?></td>
                                            <td><?php echo $res['password'];?></td>
                                            <td class="">
                                                               <a href="doctor_full_details.php?event&id=<?php echo $res['id']?>"> <button type="button"
                                                                    class="btn btn-primary">View More</button></a>
                                                            </td>
                                                            <td class="">
                                                               <a href="edit_doctor_details.php?doctor&id=<?php echo $res['id']?>"> <button type="button"
                                                                    class="btn btn-primary">Edit</button></a>
                                                            </td>
                                                            <td>
                                                                <button type="button"
                                                                    onclick="deleteDoctor(<?php echo $res['id']?>)"
                                                                    class="btn btn-danger">
                                                                    Delete
                                                                </button>
                                                            </td>

                                        </tr>
                                        <?php 
                  $sr++;
                 }
                }?>
                                    </tbody>

                                </table>
                            </div>
                            <!-- End Table with stripped rows -->

                        </div>
                    </div>

                </div>
            </div>
        </section>

        <script>
        async function deleteDoctor(id) {
        const response = await fetch(`delete.php?doctor_id=true&id=${id}`);
            const res = await response.text();
            // console.log(res);  
            window.location.reload();
        }
        </script>
</main>
</body>
<?php

include "include/footer.php";

?>
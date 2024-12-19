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
    
    $fetch = $fun->view_appointment_details();
    ?>
<main id="main" class="main">

    <body>
        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Patients</h5>
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
                                            <th scope="col">Patient Name</th>
                                            <th scope="col">Doctor Name</th>
                                            <th scope="col">Appointment Date</th>
                                            <th scope="col">Appointment Time</th>
                                            <th scope="col">Paitent Details</th>
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
                                            <td><?php echo $res['patient_name'];?></td>
                                            <td><?php echo $res['doctor_name'];?></td>
                                            <td><?php echo $res['appointment_date'];?></td>
                                            <td><?php echo $res['appointment_time'];?></td>
                                            <td class="">
                                                               <a href="patient_full_details.php?event&id=<?php echo $res['patient_id']?>"> <button type="button"
                                                                    class="btn btn-primary">view</button></a>
                                                            </td>
                                                            <td>
                                                                <button type="button"
                                                                    onclick="deleteAppointment(<?php echo $res['patient_id']?>)"
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
        async function deleteAppointment(id) {
        const response = await fetch(`delete.php?appointment=true&id=${id}`);
            const res = await response.text();
            window.location.reload();
        }
        </script>
</main>
</body>
<?php

include "include/footer.php";

?>
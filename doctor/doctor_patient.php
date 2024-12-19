<?php 
   include "auth_session.php";
   include "include/header.php";
   include "include/navBar.php";
   include "include/links.php";
  if(!isset($_SESSION["uname"])){
    header("location:index.php");
}
   $uname=$_SESSION["uname"]; 
   $fetch=$fun->view_d_details($uname);
    if(mysqli_num_rows($fetch)>0){
        $row = mysqli_fetch_assoc($fetch);
        $id =$row['id'];
        $name = $row['name'];
        $age=$row['age'];
        $gender=['gender'];
        $email = $row['email']; 
        $phone = $row['mobile'];
        $dob= $row['dob'];
        $address = $row['address'];
        $doj= $row['doj'];
        }else{     
    }
    // $fetch1=$fun->view_manager_client($id);
    // if(mysqli_num_rows($fetch1)>0){
    // }
    $fetch = $fun->view_doctor_appointment($id);
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
                                        <th scope="col">Name</th>
                                        <th scope="col">Patient ID</th>
                                        <th scope="col">Date</th>
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
                                        <td><?php echo $res['patient_id'];?></td>
                                        <td><?php echo $res['appointment_date'];?></td>
                                        <td class="">
                                                           <a href="doctor_paitent_details.php?event&id=<?php echo $res['patient_id']?>"> <button type="button"
                                                                class="btn btn-primary">View More</button></a>
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

    <!-- <script>
    async function deletecourse(id,img) {
    const response = await fetch(`delete.php?couse_id=true&course_id=${id}&img=${img}`);
        const res = await response.text();
        console.log(res);  
        window.location.reload();
    }
    </script> -->
</main>
</body>
<?php

include "include/footer.php";

?>
<?php
    include "connect/db.php";
    include "connect/fun.php";
    $connect=new connect();
    $fun=new fun($connect->dbconnect());

    if(isset($_GET['status'])){
        echo "<script>alert('Are you sure? " . $fun->update_appointment_status($_GET['id']) . "'); window.location.href = 'welcome.php';</script>";
    }
    
        // $result = $fun->update_Project_status($_GET['id']);
        // if($result){
        //     $msg = "updated";
        // }
        // else{
        //     $msg = "Something went wrong";
        // }
        // echo $msg;
        // header("location:view_student.php?msg=$msg");
    

?>
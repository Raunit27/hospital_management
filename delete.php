
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



     if(isset($_GET['doctor_id'])){
        $result = $fun->deleteDoctor($_GET['id']);
        if($result){
            $msg = "Deleted";
        }
        else{
            $msg = "Something went wrong";
        }
        echo $msg;
        // header("location:view_student.php?msg=$msg");
    }

    if(isset($_GET['patient_id'])){
        $result = $fun->deletePatient($_GET['patient_id']);
        if($result){
            $msg = "Deleted";
        }
        else{
            $msg = "Something went wrong";
        }
        echo $msg;
        // header("location:view_student.php?msg=$msg");
    }

    if(isset($_GET['appointment'])){
        $result = $fun->deleteAppointment($_GET['id']);
        if($result){
            $msg = "Deleted";
        }
        else{
            $msg = "Something went wrong";
        }
        echo $msg;
        // header("location:view_student.php?msg=$msg");
    }
    
    
    ?>
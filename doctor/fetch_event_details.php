<?php 

    include "config/db.php";
    include "config/fun.php";
    $connect=new connect();
    $fun=new fun($connect->dbconnect());
    $msg="";
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $fetch=$fun->view_start_date($id);
        if(mysqli_num_rows($fetch)>0){
            $msg = mysqli_fetch_assoc($fetch);
            print_r(json_encode($msg));
        }else{
            echo 'no details found';
        }
     
       
    }
    else{
        echo "failure";
    }
?>
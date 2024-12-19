<?php
    include "config/db.php";
    include "config/fun.php";
    $connect=new connect();
    $fun=new fun($connect->dbconnect());
    
    if(isset($_GET['delid'])){
        $delete_id=$_GET['delid'];
        $fetch3 = $fun->delete_book_staff($delete_id);
    }
    if(isset($_GET['del_client_details'])){
        $delete_id=$_GET['del_client_details'];
      $fetch= $fun-> fetch_details_to_client($delete_id);
        $row = mysqli_fetch_assoc($fetch);
        print_r($row);
           if(unlink("./assets/client_d_images/$row[image1]")&& unlink("./assets/client_d_images/$row[image2]")&& unlink("./assets/client_d_images/$row[image3]")){
            $fetch3 = $fun->delete_client_details($delete_id);
           }
        

       
        
    }
?>
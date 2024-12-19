<?php 
    include "connect/db.php";
    include "connect/fun.php";

    $conn = new connect();
    $fun = new fun($conn->dbconnect());

    if(isset($_GET['id'])){
        $id = $_GET['id'];
       
        $enquiry = $fun->fetchEnquiriesWithId($id);
        $enquiry = mysqli_fetch_array($enquiry);
       // print_r($enquiry);
       $new_id = date("Y")."0".$id;
        $sql_delete = "DELETE FROM `enquiry` WHERE `id` = '$id';";
        $sql = "INSERT INTO `student`(`id`,`course`, `name`, `age`, `phone`,`email`,`address`,`education`,`fee`,`total_fee`)
                VALUES ('$new_id','$enquiry[course_name]','$enquiry[name]','$enquiry[age]','$enquiry[phone]','$enquiry[email]','$enquiry[address]','$enquiry[education]','$enquiry[fee]','$enquiry[fee]');";
        $insert = mysqli_query($conn->dbconnect(), $sql);
        if($insert){
            $delete = mysqli_query($conn->dbconnect(), $sql_delete);
        }
       header("location:enquiries.php?msg=Enquiry Admitted Successfully");
    }

?>
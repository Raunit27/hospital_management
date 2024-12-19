<?php 
    include "./connect/db.php";
    include "./connect/fun.php";

    $con = new connect();
    $fun = new fun($con->dbconnect());


    if(isset($_GET["status"])){

        $status = $_GET["status"];
        $id = $_GET["id"];
        $update = $fun->updateCourseStatus($id, $status);
        if($update){
            echo $id.",".$status;
            echo "true";
        }
        else{
            echo "false";
        }
    }else{
        echo "false";
    }

?>
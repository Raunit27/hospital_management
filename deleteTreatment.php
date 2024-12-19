<?php 
    include "connect/db.php";
    include "connect/fun.php";

    $conn = new connect();
    $fun = new fun($conn->dbconnect());

    if(isset($_GET["id"])){
        $id = $_GET["id"];
        $fetch = $fun->fetchTreatmentWithId($id);
        $delete = $fun->deleteTreatment($id);
        if($delete){
            unlink($fetch["image"]);

        }
        header("location:add_treatment.php");
    }
    else{
        header("location:add_treatment.php");

    }

?>
<?php 
    include "connect/db.php";
    include "connect/fun.php";

    $conn = new connect();
    $fun = new fun($conn->dbconnect());

    if(isset($_GET["id"])){
        $id = $_GET["id"];
        $delete = $fun->deleteTreatmentType($id);
        
        header("location:add_treatment_type.php");
    }
    else{
        header("location:add_treatment_type.php");

    }

?>
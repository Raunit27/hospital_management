<?php
include "connect/db.php";
include "connect/fun.php";

$connect = new connect();
$fun = new fun($connect->dbconnect());

if (isset($_POST['category'])) {
    $category = $_POST['category'];
    $result = $fun->getDoctorsByCategory($category);
    
    $doctors = [];
    if ($result && mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $doctors[] = $row;
        }
    }
    
    echo json_encode($doctors);
}
?>

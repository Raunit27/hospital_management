<?php 
    
include "connect/db.php";
include "connect/fun.php";

$con = new connect();
$fun = new fun($con->dbconnect());
// Fetching state data
$type=!empty($_POST['type'])?$_POST['type']:'';
$treatment=!empty($_POST['treatment'])?$_POST['treatment']:'';
$aesthatic=!empty($_POST['aesthatic'])?$_POST['aesthatic']:'';

//  echo "<option value=''>$sub_id, $country_id </option><br>";


      if(isset($_POST["type"]) ){
              if(!empty($type))
              {
              
                $result = $fun->fetchTreatmentWithType($type);
                    
              if(mysqli_num_rows($result)>0)
              {
                echo "<option value=''>Select Treatment </option>";
                while($arr= $result->fetch_assoc())
                {
                    echo "<option value='".$arr['id']."'>".$arr['name']."</option><br>";
                    
                  }
              }
              else{
                  echo "<option value=''>No Treatment Available</option>";
              }  
            }
            else{
                echo "<option value=''>No Treatment Available</option>";
            }
      }
      if(isset($_POST["treatment"]) ){
              if(!empty($treatment))
              {
              
                $result = $fun->fetchDescriptionWithTreatment($treatment);
                $des = ($result != null)?($result["description"]):"Editor";
                $result = htmlspecialchars_decode($des);
               
              echo $result; 
            }
            else{
                echo "This is editor";
            }
      }
      if(isset($_POST["aesthatic"]) ){
              if(!empty($aesthatic))
              {
              
                $result = $fun->fetchDescriptionWithAesthetic($aesthatic);
                $des = ($result != null)?($result["description"]):"Editor";
                $result = htmlspecialchars_decode($des);
               
              echo $result; 
            }
            else{
                echo "This is editor";
            }
      }
      

?>
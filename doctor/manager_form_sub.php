<?php 
    session_start();
    include "config/db.php";
    include "config/fun.php";
    $connect=new connect();
    $fun=new fun($connect->dbconnect());
    $msg="";

   
    if(isset($_POST["book_staff"])) {
        $name = $_POST['name'];
        $category=$_POST['category'];
        $address = $_POST['address'];
        $date_of_booking = $_POST['dateofbooking'];
        $manager_id=$_POST['manager_id'];
        $staff_id=$_POST['staff_id'];
        $number=$_POST['number'];
        $time=$_POST['time'];
  
        if(empty($name) ||  empty($category) || empty($address) || empty($date_of_booking) || empty($manager_id) || empty($staff_id)|| empty($number) || empty($time)){ 
           $msg = "All fields are required";
           header("Location:book_staff.php?msg=$msg");
           
        }
        else{
        $result = $fun->insert_book_staff($name, $category, $address,$date_of_booking,$manager_id,$staff_id,$number,$time);
        if ($result) {
           header('Location: view_book_staff.php');
        }else{
           echo"error";
        }
     }
     }
    


     if(isset($_POST['checklist_submit'])){
        $client = $_POST['client'];
        $event = $_POST['event'];
        $check = $_POST['check'];
        $check=implode(",",$check);
        $client_id=$_POST['id'];
        

        $check_exist="SELECT * FROM `checklist_details` WHERE `client` = '$client' AND `event` = '$event' AND `client_id` = '$client_id'";
        $result = mysqli_query($connect->dbconnect(), $check_exist);
        if(mysqli_num_rows($result)>0){
            $result=$fun->update_checklist($client,$event,$check,$client_id); 
            
            if($result){
                header("Location:edit_checklist.php?event&id=$client_id");
            }else{
              echo 'Error';
        }
    }
        else{
        $result=$fun->insert_checklist($client,$event,$check,$client_id);
       if($result){
        header("Location:edit_checklist.php?event&id=$client_id");
       }
       else{
           echo"error";
       }
    }
     }

     if(isset($_POST['p_note_sub'])){
        $note = $_POST['content'];
        $note=htmlspecialchars($note, ENT_QUOTES, 'UTF-8');
        $manager_id=$_POST['id'];
        $check_note="SELECT * FROM `personal_note` WHERE `manager_id` = '$manager_id'";
        $res = mysqli_query($connect->dbconnect(), $check_note);
        if(mysqli_num_rows($res)>0){
            $result=$fun->update_personal_note($note,$manager_id);
            if($result){
                header("Location:personal_note.php");
            }
            else{

                echo 'Error';
            }

        }else{
       $result=$fun->insert_personal_note($note,$manager_id);
       if($result){
        header("Location:personal_note.php");
       } 
       else{
           echo"error";
       }
    }

     }


     if(isset($_POST['details_to_client_submit'])){
        $client = explode('|',$_POST['client']);
        $client_id=$client[0];
        $client_name=$client[1];
        $discription = $_POST['discription'];
        $manager_id=$_POST['manager_id'];

      
        if(isset($_FILES["image1"]["name"])&& !empty($_FILES["image1"]["name"])){

            $fileName = $client_name."-1-".time();
            $target_dir = "./assets/client_d_images/";
            $target_file = $target_dir .basename($_FILES["image1"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            $file_name = $target_dir ."$fileName.".$imageFileType;
             $newfilename=$fileName.".".$imageFileType;
            if(move_uploaded_file($_FILES["image1"]["tmp_name"], $file_name)){
                $image1=$newfilename;

                if(isset($_FILES["image2"]["name"])&& !empty($_FILES["image2"]["name"])){

                    $fileName = $client_name."-2-".time();
                    $target_dir = "./assets/client_d_images/";
                    $target_file = $target_dir .basename($_FILES["image2"]["name"]);
                    $uploadOk = 1;
                    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                    $file_name = $target_dir ."$fileName.".$imageFileType;
                     $newfilename=$fileName.".".$imageFileType;
                    if(move_uploaded_file($_FILES["image2"]["tmp_name"], $file_name)){
                        $image2=$newfilename;
             
                        if(isset($_FILES["image3"]["name"])&& !empty($_FILES["image3"]["name"])){

                            $fileName = $client_name."-3-".time();
                            $target_dir = "./assets/client_d_images/";
                            $target_file = $target_dir .basename($_FILES["image3"]["name"]);
                            $uploadOk = 1;
                            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                            $file_name = $target_dir ."$fileName.".$imageFileType;
                             $newfilename=$fileName.".".$imageFileType;
                            if(move_uploaded_file($_FILES["image3"]["tmp_name"], $file_name)){
                                $image3=$newfilename;
              

        
        $check_exist="SELECT * FROM `details_to_client` WHERE `client` = '$client_name' AND `client_id` = '$client_id'";
        $result = mysqli_query($connect->dbconnect(), $check_exist);
        if(mysqli_num_rows($result)>0){
            $result=$fun->update_details_to_client($client_id,$client_name,$image1,$image2,$image3,$discription,$manager_id);
            if($result){
                header("Location:details_to_client.php");
            }
        }
        else{
        $result=$fun->insert_details_to_client($client_id,$client_name,$image1,$image2,$image3,$discription,$manager_id);
        if($result){
        header("Location:details_to_client.php");
        }
    }
}
else{
    $msg="All images are required";
   header("Location:details_to_client.php?msg=$msg");
}
                        }
                    }
                }else{
                    $msg="All images are required";
                    header("Location:details_to_client.php?msg=$msg");
                }
            }
        }else{
            $msg="All images are required";
            header("Location:details_to_client.php?msg=$msg");
        }
     }
    

?>
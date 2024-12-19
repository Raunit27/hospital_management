<?php 
    include "connect/db.php";
    include "connect/fun.php";

    $conn = new connect();
    $fun = new fun($conn->dbconnect());


// patient form_submit.php
if (isset($_POST['register_patient'])){
    // Retrieve form data
    $name = trim($_POST['name']);
    $age = trim($_POST['age']);
    $gender = trim($_POST['gender']);
    $email = trim($_POST['email']);
    $mobile = trim($_POST['mobile']);
    $pincode = trim($_POST['pincode']);
    $address = trim($_POST['address']);
    $disease = trim($_POST['disease']);
    $date= $post['date'];
    $medication = trim($_POST['medication']);
    $allergy=trim($_POST['allergy']);
    $reason=($_POST['reason']);



    // Check if all required fields are filled
    if (empty($name) || empty($age) || empty($gender) || empty($email) || empty($mobile) || empty($pincode) || empty($address) || empty($disease)) {
        $msg = "All fields are required";
        header("Location: add_h_patient.php?msg=$msg");
        exit();
    }

    // Handle file upload
    if (isset($_FILES['report']) && $_FILES['report']['error'] == UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['report']['tmp_name'];
        $fileName = $_FILES['report']['name'];
        $fileSize = $_FILES['report']['size'];
        $fileType = $_FILES['report']['type'];
        $fileNameCmps = explode(".", $fileName);
        $fileExtension = strtolower(end($fileNameCmps));

        // Check if the file is a PDF
        if ($fileExtension === 'pdf') {
            // Set the upload directory
            $uploadFileDir = './assets/reports_upload/';
            $destFilePath = $uploadFileDir . $fileName;

            // Move the file to the destination directory
            if (move_uploaded_file($fileTmpPath, $destFilePath)) {
                // File uploaded successfully
            } else {
                $msg = 'There was an error moving the file to the upload directory.';
                header("Location: add_h_patient.php?msg=$msg");
                exit();
            }
        } else {
            $msg = 'Uploaded file is not a PDF.';
            header("Location: add_h_patient.php?msg=$msg");
            exit();
        }
    } else {
        $msg = 'No file uploaded or there was an upload error.';
        header("Location: add_h_patient.php?msg=$msg");
        exit();
    }

    // Insert patient data into the database
    // Assuming $fun is an instance of a class with an insert_patient method
    $result = $fun->insert_patient($name, $age, $gender, $email, $mobile, $pincode, $address, $disease, $fileName,$date, $medication,$allergy,$reason);

    if ($result) {
        header('Location: add_h_patient.php?msg=Patient registered successfully');
    } else {
        $msg = 'Failed to register patient.';
        header("Location: add_h_patient.php?msg=$msg");
    }
} else {
    echo 'Invalid request method.';
}





//doctor form_submit.php

if (isset($_POST['register_doctor'])) {
    // Retrieve form data
    $name = trim($_POST['name']);
    $age = trim($_POST['age']);
    $gender = trim($_POST['gender']);
    $email = trim($_POST['email']);
    $mobile = trim($_POST['mobile']);
    $address = trim($_POST['address']);
    $specialty = trim($_POST['specialty']);
    $dob = trim($_POST['dob']);
    $doj = trim($_POST['doj']);
    $qualification = trim($_POST['qualification']);
    $experience = trim($_POST['experience']);
    $username=trim($_POST['username']);
    $password=trim($_POST['password']);


    // Check if all required fields are filled
    if (empty($name) || empty($age) || empty($gender) || empty($email) || empty($mobile) || empty($address) || empty($specialty) || empty($dob) || empty($doj) || empty($qualification) || empty($experience) || empty($username) || empty($password)) {
        $msg = "All fields are required";
        header("Location: add_h_doctor.php?msg=$msg");
        exit();
    }

    // Handle file upload for CV
    $fileName = '';
    if (isset($_FILES['report']) && $_FILES['report']['error'] == UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['report']['tmp_name'];
        $fileName = $_FILES['report']['name'];
        $fileNameCmps = explode(".", $fileName);
        $fileExtension = strtolower(end($fileNameCmps));

        // Check if the file is a PDF
        if ($fileExtension === 'pdf') {
            // Set the upload directory
            $uploadFileDir = './assets/doctor_resume/';
            $destFilePath = $uploadFileDir . $fileName;

            // Move the file to the destination directory
            if (move_uploaded_file($fileTmpPath, $destFilePath)) {
                // File uploaded successfully
            } else {
                $msg = 'There was an error moving the file to the upload directory.';
                header("Location: add_h_doctor.php?msg=$msg");
                exit();
            }
        } else {
            $msg = 'Uploaded file is not a PDF.';
            header("Location: add_h_doctor.php?msg=$msg");
            exit();
        }
    } else {
        $msg = 'No CV uploaded or there was an upload error.';
        header("Location: add_h_doctor.php?msg=$msg");
        exit();
    }

    // Insert doctor data into the database
    // Assuming $fun is an instance of a class with an insert_doctor method
    $result = $fun->insert_doctor($name, $age, $gender, $email, $mobile, $address, $specialty, $dob, $doj, $qualification, $experience,$username , $password ,$fileName);

    if ($result) {
        header('Location: add_h_doctor.php?msg=Doctor registered successfully');
    } else {
        $msg = 'Failed to register doctor.';
        header("Location: add_h_doctor.php?msg=$msg");
    }
} else {
    echo 'Invalid request method.';
}

if(isset($_POST['patient_appointment_search'])){
    $patient_id=$_POST['patient_id'];
    $result=$fun->view_full_patient_details($patient_id);
    if ($result  && mysqli_num_rows($result) > 0) {
       header("Location: appointments_h.php?msg=Patient search succesfully&patient_id=$patient_id");
    } else {
        $msg = 'Failed to search patient.';
        header("Location: appointments_h.php?msg=$msg");
    }
}



if (isset($_POST['book_appointment'])) {
    // Retrieve patient ID
    $patient_id = $_POST['patient_id'];
    $paitent_name=$_POST['name'];

    // Retrieve selected doctor value (ID and name)
    $doctor_value = $_POST['doctor'];

    // Split the doctor value into ID and name
    list($doctor_id, $doctor_name) = explode('-', $doctor_value);

    // Retrieve the remaining form data
    $date = $_POST['date'];
    $time = $_POST['time'];

    // // You can now use $doctor_id and $doctor_name separately
    // // Example: Insert the appointment details into the database
    // $query = "INSERT INTO appointments (patient_id, paitent_name, doctor_id, doctor_name, appointment_date, appointment_time) 
    //           VALUES ('$patient_id','$paitent_name','$doctor_id', '$doctor_name', '$date', '$time')";
    $result=$fun->insert_appointment($patient_id, $paitent_name, $doctor_id, $doctor_name, $date, $time);

    if ($result) {
        $message = "Appointment booked successfully";
        header("Location: appointments_h.php?message=$message");
    } else {
        $message = "Failed to book appointment";
        header("Location: appointments_h.php?message=$message");
    }
}

if (isset($_POST['edit_doctor'])) {
    // Retrieve form data
    $doctor_id=$_POST['doctor_id'];
    $name = trim($_POST['name']);
    $age = trim($_POST['age']);
    $gender = trim($_POST['gender']);
    $email = trim($_POST['email']);
    $mobile = trim($_POST['mobile']);
    $address = trim($_POST['address']);
    $specialty = trim($_POST['specialty']);
    $dob = trim($_POST['dob']);
    $doj = trim($_POST['doj']);
    $qualification = trim($_POST['qualification']);
    $experience = trim($_POST['experience']);
    $username=trim($_POST['username']);
    $password=trim($_POST['password']);

     // Check if all required fields are filled
     if (empty($name) || empty($age) || empty($gender) || empty($email) || empty($mobile) || empty($address) || empty($specialty) || empty($dob) || empty($doj) || empty($qualification) || empty($experience)) {
        $msg = "All fields are required";
        header("Location: edit_doctor_details.php?msg=$msg");
        exit();
    }
    $result = $fun->update_doctor($doctor_id,$name, $age, $gender, $email, $mobile, $address, $specialty, $dob, $doj, $qualification, $experience,$username,$password);

    if ($result) {
        echo "<script>alert('Updated successfully');document.location='view_h_doctor.php' </script>";
    } else {
        $msg = 'Failed to update doctor.';
        header("Location: edit_doctor__details.php?msg=$msg");
    }
}


if (isset($_POST['edit_patient'])){
    $patient_id = $_POST['patient_id'];
    $name = $_POST['name'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $pincode = $_POST['pincode'];
    $address = $_POST['address'];
    $disease = $_POST['disease'];
    $date = $_POST['date'];
    $medication = $_POST['medication'];
    $allergy = $_POST['allergy'];
    $reason = $_POST['reason'];

    if(empty($name)||empty($age)||empty($gender)||empty($email)||empty($email)||empty($mobile)||empty($pincode)||empty($address)||empty($disease)||empty($medication)||empty($allergy)||empty($reason)){
        $msg = "All fields are required";
        header("Location: edit_patient_details.php?msg=$msg");
        exit();
    }
    $result = $fun->update_patient($patient_id,$name, $age, $gender, $email, $mobile,$pincode,$address,$disease,$date,$medication,$allergy,$reason );  
    if ($result) {
        echo "<script>alert('Updated successfully');document.location='view_h_patient.php' </script>";
    } else {
        $msg = 'Failed to update doctor.';
        header("Location: edit_doctor__details.php?msg=$msg");
    }  


}


?>


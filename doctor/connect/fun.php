<?php

class fun
{
    private $db;
    function __construct($con)
    {
        $this->db = $con;

    }

    public function login($username,$password){
        
        $query    = "SELECT * FROM `admin` WHERE `username`='$username' AND `password` = '$password'";
        $result = mysqli_query($this->db, $query);

        
        $rows = mysqli_num_rows($result);
        if ($rows == 1) {
           
            
                return ["Done",1];
            
           
            // Redirect to user dashboard page
           
             
        }
        else{
            return ["Failed",0];
        }
    }

    public function insert_patient($name, $age, $gender, $email, $mobile, $pincode, $address, $disease, $report, $date, $medication, $allergy, $reason) {
        // SQL query to insert data into the patient_details table
        $query = "INSERT INTO patient_details (name, age, gender, email, mobile, pincode, address, disease, report, dor, medication, allergy, reason) 
                  VALUES ('$name', '$age', '$gender', '$email', '$mobile', '$pincode', '$address', '$disease', '$report', '$date', '$medication', '$allergy', '$reason')";
        // Execute the query
        $result = mysqli_query($this->db, $query);

        // Return the result of the query execution
        return $result;
    }

    public function insert_doctor($name, $age, $gender, $email, $mobile, $address, $specialty, $dob, $doj, $qualification, $experience,$username,$password ,$cv) {
        // SQL query to insert data into the doctor_details table
        $query = "INSERT INTO doctor_details (name, age, gender, email, mobile, address, specialty, dob, doj, qualification, experience, cv , username, password) 
                  VALUES ('$name', '$age', '$gender', '$email', '$mobile', '$address', '$specialty', '$dob', '$doj', '$qualification', '$experience', '$cv','$username','$password')";
        
        // Execute the query
        $result = mysqli_query($this->db, $query);
    
        // Return the result of the query execution
        return $result;
    }
    
    
    public function view_doctor_details(){

        $query ="SELECT * FROM `doctor_details` ";
        $result = mysqli_query($this->db, $query);
        return $result;
      }

     public function view_full_doctor_details($id){
        $query = "SELECT * FROM `doctor_details` WHERE id = '$id'";
        $result = mysqli_query($this->db, $query);
        return $result;
     } 

     public function view_patient_details(){
        $query = "SELECT * FROM `patient_details` ORDER BY id DESC";
        $result = mysqli_query($this->db, $query);
        return $result;
     }
     
     public function view_full_patient_details($id){
        $query = "SELECT * FROM `patient_details` WHERE id = '$id'";
        $result = mysqli_query($this->db, $query);
        return $result;
     }

     public function getDoctorsByCategory($category) {
        $query = "SELECT id, name FROM doctor_details WHERE specialty = '$category'";
        return mysqli_query($this->db, $query);
    }
    
    public function insert_appointment($patient_id, $paitent_name, $doctor_id, $doctor_name, $date, $time){
        $query = "INSERT INTO appointments (patient_id, patient_name, doctor_id, doctor_name, appointment_date, appointment_time) 
             VALUES ('$patient_id','$paitent_name','$doctor_id', '$doctor_name', '$date', '$time')";
     $result = mysqli_query($this->db, $query);
     return $result;
    }
    
    public function view_doctor_appointment_details($id){
        $query = "SELECT * FROM appointments where doctor_id='$id' and status=0";
        $result = mysqli_query($this->db, $query);
        return $result;
    }

     public function view_d_details($uname){
        $query="SELECT * FROM `doctor_details` WHERE `username`='$uname'";
        $result = mysqli_query($this->db, $query);
        return $result;
    } 


    public function update_appointment_status($id){
        $query="UPDATE `appointments` SET `status`='1' WHERE `patient_id`=$id";
        $update=mysqli_query($this->db, $query);
        if($update==true){
         header("location:doctor_appointment.php");
       }else{
           echo "failure";
    }
}

public function view_doctor_appointment($id){
    $query = "SELECT * FROM `appointments` where doctor_id=$id   ORDER BY id DESC";
    $result = mysqli_query($this->db, $query);
    return $result;
 }
}
?>
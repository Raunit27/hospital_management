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
    
    public function view_appointment_details(){
        $query = "SELECT * FROM appointments ORDER BY id DESC";
        $result = mysqli_query($this->db, $query);
        return $result;
    }

    public function edit_doctor($id){

        $query ="SELECT * FROM `doctor_details` WHERE id = '$id'";
           
            $result = mysqli_query($this->db, $query);
                  return $result;
    } 

    public function update_doctor($doctor_id,$name, $age, $gender, $email, $mobile, $address, $specialty, $dob, $doj, $qualification, $experience,$username,$password){
     $query="UPDATE `doctor_details` SET `name`='$name',`age`=' $age',`gender`='$gender',`email`='$email',`mobile`=' $mobile',`address`='$address',`specialty`='$specialty',`dob`=' $dob',`doj`='$dob',`qualification`='$qualification',`experience`='$experience',`username`='$username',`password`='$password' WHERE id=$doctor_id";
     $result = mysqli_query($this->db, $query);
     return $result;
    }

    public function deleteDoctor($id){
        $sql="DELETE FROM `doctor_details` WHERE id = $id";
        $result=mysqli_query($this->db, $sql);
        return $result;
    }

    public function deletePatient($id){
        $sql="DELETE FROM `patient_details` WHERE id = $id";
        $result=mysqli_query($this->db, $sql);
        return $result;
    }
    public function edit_patient($id){
        $query ="SELECT * FROM `patient_details` WHERE id = '$id'";
            $result = mysqli_query($this->db, $query);
                  return $result;
    } 

    public function update_patient($patient_id,$name, $age, $gender, $email, $mobile,$pincode,$address,$disease,$date,$medication,$allergy,$reason ){
         $query="UPDATE `patient_details` SET `name`='$name',`age`='$age',`gender`='$gender',`email`='$email',`mobile`='$mobile',`pincode`='$pincode',`address`='$address',`disease`='$disease',`dor`='$date',`medication`='$medication',`allergy`='$allergy',`reason`='$reason' WHERE id=$patient_id";
         $result = mysqli_query($this->db, $query);
         return $result;
    }

    public function deleteAppointment($id){
        $sql="DELETE FROM `appointments` WHERE id = $id";
        $result=mysqli_query($this->db, $sql);
        return $result;
    }
}
?>
<?php

session_start();
 
$host = 'localhost';
$username = 'new_user';
$password = 'password123';
$dbname = 'TravelAgencyDB';

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
if(!$conn){
    echo'Connection Error:' . mysqli_connect_error();
}

$idNums = $_GET['ids'];

if($idNums=="none"){
    echo '<span style="color:red;">A List Must Be Generated First</span>';
}else{

    $idArray = explode(' ',$idNums);
    $status = -1;
    
    $sqlTrunc = "TRUNCATE TABLE customerlist";
    
    $truncated = $conn->query($sqlTrunc);
    
    if($truncated){
    
        foreach($idArray as $id){
            $stmt = $conn->query("SELECT * FROM priority1 WHERE id=$id");
        
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
            $customer=reset($result);
    
            $aID = $customer['id'];
            $fname = $customer['firstname'];
            $lname = $customer['lasttname'];
            $dob = $customer['date_of_birth'];
            $age = $customer['age'];
            $phone = $customer['phonenumber'];
            $email = $customer['email'];
            $checkin = $customer['checkin'];
            $checkout= $customer['checkout'];
            $hotel = $customer['hotel'];
            $rooms = $customer['rooms'];
            $pri = $customer['priority'];

            $sql = "INSERT INTO customerlist (id, firstname, lasttname, date_of_birth, age, phonenumber, email, checkin, checkout, hotel, rooms, priority)
            VALUES ('$aID','$fname','$lname','$dob', '$age', '$phone', '$email', '$checkin', '$checkout', '$hotel', '$rooms',$pri)";
            
            if ($conn->query($sql)){
                $status = 1;
            } else {
                $status = -1;
            }
                
        }
    }
    
    if($status==1){
        echo "Customer Booking Confirmed!!";
    }
}
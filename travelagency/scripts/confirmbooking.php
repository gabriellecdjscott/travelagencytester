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

$context = $_GET['context'];


if($context === "search"){

    $stmt = $conn->query("SELECT * FROM customerlist");
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if(sizeof($results) != 0)
    {
        $date = date('d-m-y');

        echo"Select a check box for the customers that have been booked for ".$date."\n";
        echo "<table id = 'Table1' border =\"1\" style='border-collapse: collapse' >";

        echo "<tr>";
        echo "<th>ID</th>";
        echo "<th>First Name</th>";
        echo "<th>Last Name</th>";
        echo "<th>Date of Birth</th>";
        echo "<th>Age</th>";
        echo "<th>Gender</th>";
        echo "<th>Phone Number</th>";
        echo "<th>Email</th>";
        echo "<th>Check-In Date</th>";
        echo "<th>Check-Out Date</th>";
        echo "<th>Hotel</th>";
        echo "<th>Rooms</th>";
        echo "<th>Priority</th>";
        echo "<th>Confirm Booking</th>";
        echo "</tr>";

        foreach ($results as $row){
            echo "<tr> \n";
            echo "<td>" .$row['id']. "</td> \n";
            echo "<td>" .$row['firstname']. "</td> \n";
            echo "<td>" .$row['lasttname']. "</td> \n";
            echo "<td>" .$row['date_of_birth']. "</td> \n";
            echo "<td>" .$row['age']. "</td> \n";
            echo "<td>" .$row['gender']. "</td> \n";
            echo "<td>" .$row['phonenumber']. "</td> \n";
            echo "<td>" .$row['email']. "</td> \n";
            echo "<td>" .$row['checkin']. "</td> \n";
            echo "<td>" .$row['checkout']. "</td> \n";
            echo "<td>" .$row['hotel']. "</td> \n";
            echo "<td>" .$row['rooms']. "</td> \n";
            echo "<td>" .$row['priority']. "</td> \n";
            echo "<td><input type= 'checkbox' id = 'check' value =" .$row['id'].",".$row['priority']."></td> \n";
            echo "</tr>";
        }
        echo "</table>";
        echo "<div class='button'><button class='add' id='add'>Confirm Booking</button></div>";
    }else{
        echo"No List has been generated";
    }
 
}


if($context=== "add"){
    $conn_pri = mysqli_connect($host , $username, $password, $dbname);
if(!$conn){
    echo'Connection Error:' . mysqli_connect_error();
}
    $appr = explode(",",$_GET['booking_approved']);
    $pri = explode(",",$_GET['priority']);
   
    for ($x = 0; $x < sizeof($pri); $x++) {
        $change= (int)$pri[$x]+1;
        $idnum = $appr[$x];
        $result=mysqli_real_escape_string($conn_pri, $change);
        $res=mysqli_real_escape_string($conn_pri, $idnum);
       
        
        $sql = "UPDATE priority1 SET priority='$result' WHERE id='$res'";
        if(mysqli_query($conn_pri,$sql)){
            echo'';
        }else{
            echo'';
        }

        $stmt = mysqli_query($conn_pri,"SELECT * FROM priority1 WHERE id = $res");
        $results_pri = mysqli_fetch_assoc($stmt);
        //mysqli_free_result($stmt);
        $fname = mysqli_real_escape_string($conn_pri,$results_pri['firstname']);
        $lname = mysqli_real_escape_string($conn_pri,$results_pri['lasttname']);
        $checkin = mysqli_real_escape_string($conn_pri,$results_pri['checkin']);
        $checkout = mysqli_real_escape_string($conn_pri,$results_pri['checkout']);

        $sql_pri = "INSERT INTO confirmed( id, firstname, lasttname, checkin, checkout) VALUES('$res','$fname', '$lname', '$checkin', '$checkout')";
        if(mysqli_query($conn_pri,$sql_pri)){
            echo'Booking had been confirmed.';
        }else{
            echo'';
        }
    
    }
      
    mysqli_close($conn_pri);            
    
}
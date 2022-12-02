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
 
$mode = $_GET['mode'];

if($mode == 'count'){
    $stmt = $conn->query("SELECT COUNT(id) FROM booking");

    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $booking = reset($results);
    $numMembers = reset($booking);
    echo $numMembers;

}elseif($mode == 'generate'){
    $amount = $_GET['amount'];

    $stmt = $conn->query("SELECT COUNT(id) FROM booking");

    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $booking = reset($results);
    $numMembers = reset($booking);

    if($amount == "" || $amount == 0){
        echo '<span style="color:red;">Please Enter the Number of Bookings to Display</span>';
    }elseif($amount > $numMembers){
        echo '<span style="color:red;">Please Enter A Number That is '.$numMembers.' or Less </span>';
    }else{

        echo "<table id=\"generatedTable\" border =\"1\" style='border-collapse: collapse'>";

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
        echo "</tr>";
        
        $x=1;
        $workingPriority = 0;

        while($x < $amount){

            $stmt = $conn->query("SELECT * FROM priority1 WHERE priority='$workingPriority'");

            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $i = $x;

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
                    echo "</tr>";

                if($i==$amount){
                    break;
                }
                $i++;
            }

            $x += count($results);
            $workingPriority++;

        }
            
        echo "</table>";
    }
    
}
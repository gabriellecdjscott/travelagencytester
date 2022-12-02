<?php 


$host = 'localhost';
$username = 'new_user';
$password = 'password123';
$dbname = 'TravelAgencyDB';

$conn = mysqli_connect($host , $username, $password, $dbname);
if(!$conn){
    echo'Connection Error:' . mysqli_connect_error();
}
$stmt=null;

$id=$_GET["id"];
$id=mysqli_real_escape_string($conn,$id);

$stmt = mysqli_query($conn,"SELECT * FROM Booking WHERE id = $id");
$results = mysqli_fetch_assoc($stmt);
//mysqli_free_result($stmt);

$cnt=$stmt->num_rows;

if ($cnt!=0){
    echo "<table border =\"1\" style='border-collapse: collapse'>";

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
    echo "</tr>";

    echo "<tr> \n";
    echo "<td>" .$results['id']. "</td> \n";
    echo "<td>" .$results['firstname']. "</td> \n";
    echo "<td>" .$results['lasttname']. "</td> \n";
    echo "<td>" .$results['date_of_birth']. "</td> \n";
    echo "<td>" .$results['age']. "</td> \n";
    echo "<td>" .$results['gender']. "</td> \n";
    echo "<td>" .$results['phonenumber']. "</td> \n";
    echo "<td>" .$results['email']. "</td> \n";
    echo "<td>" .$results['checkin']. "</td> \n";
    echo "<td>" .$results['checkout']. "</td> \n";
    echo "<td>" .$results['hotel']. "</td> \n";
    echo "<td>" .$results['rooms']. "</td> \n";
    echo "</tr>";

    echo "</table>";
    echo "<br>";

    $stmt = mysqli_query($conn,"DELETE FROM Booking WHERE id = $id");
    $stmt = mysqli_query($conn,"DELETE FROM priority1 WHERE id = $id");
    
    echo "Deleted";
    
}
else{
    echo "Booking does not exist";
}



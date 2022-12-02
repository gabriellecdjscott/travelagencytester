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

$booking = $_REQUEST['booking'];
$option = $_REQUEST['option'];
$context = $_REQUEST['context'];

if($booking != ""){
    $booking = filter_var($booking, FILTER_UNSAFE_RAW);
    $booking = trim($booking);
}

if($booking === "" && $context === "search"){
    $stmt = $conn->query("SELECT * FROM booking");
}else if($booking !== "" && $option === "firstname" && $context === "search"){
    $stmt = $conn->query("SELECT * FROM booking WHERE firstname LIKE '%$booking%'");
}else if($booking !== "" && $option === "lastname" && $context === "search"){
    $stmt = $conn->query("SELECT * FROM booking WHERE lasttname LIKE '%$booking%'");
}else if($booking !== "" && $option === "age" && $context === "search"){
    $stmt = $conn->query("SELECT * FROM booking WHERE age LIKE '%$booking%'");
}else if($booking !== "" && $option === "gender" && $context === "search"){
    $stmt = $conn->query("SELECT * FROM booking WHERE gender = '$booking';");
}else if($booking !== "" && $option === "checkin" && $context === "search"){
    $stmt = $conn->query("SELECT * FROM booking WHERE checkin = '%$booking%';");
}else if($booking !== "" && $option === "checkout" && $context === "search"){
    $stmt = $conn->query("SELECT * FROM booking WHERE checkout = '%$booking%';");
}



if($booking === "" && $context === "sort" && $option === "firstname"){
    $stmt = $conn->query("SELECT * FROM booking ORDER BY firstname ASC");
}else if($booking === "" && $context === "sort" && $option === "lastname"){
    $stmt = $conn->query("SELECT * FROM booking ORDER BY lasttname ASC");
}else if($booking === "" && $context === "sort" && $option === "age"){
    $stmt = $conn->query("SELECT * FROM booking ORDER BY age ASC");
}else if($booking === "" && $context === "sort" && $option === "gender"){
    $stmt = $conn->query("SELECT * FROM booking ORDER BY gender ASC");
}else if($booking === "" && $context === "sort" && $option === "checkin"){
    $stmt = $conn->query("SELECT * FROM booking ORDER BY checkin ASC");
}else if($booking === "" && $context === "sort" && $option === "checkout"){
    $stmt = $conn->query("SELECT * FROM booking ORDER BY checkout ASC");
}
else if($booking !== "" && $option === "firstname" && $context === "sort"){
    $stmt = $conn->query("SELECT * FROM booking WHERE firstname LIKE '%$booking%' ORDER BY firstname ASC");
}else if($booking !== "" && $option === "lastname" && $context === "sort"){
    $stmt = $conn->query("SELECT * FROM booking WHERE lasttname LIKE '%$booking%' ORDER BY lasttname ASC" );
}else if($booking !== "" && $option === "age" && $context === "sort"){
    $stmt = $conn->query("SELECT * FROM booking WHERE age LIKE '%$booking%' ORDER BY age ASC");
}else if($booking !== "" && $option === "gender" && $context === "sort"){
    $stmt = $conn->query("SELECT * FROM booking WHERE gender = '$booking' ORDER BY gender ASC;");
}else if($booking !== "" && $option === "checkin" && $context === "sort"){
    $stmt = $conn->query("SELECT * FROM booking WHERE checkin = '$booking' ORDER BY checkin ASC;");
}else if($booking !== "" && $option === "checkout" && $context === "sort"){
    $stmt = $conn->query("SELECT * FROM booking WHERE checkout = '$booking' ORDER BY checkout ASC;");
}

if($booking === "" && $context === "des" && $option === "firstname"){
    $stmt = $conn->query("SELECT * FROM booking ORDER BY firstname DESC");
}else if($booking === "" && $context === "des" && $option === "lastname"){
    $stmt = $conn->query("SELECT * FROM booking ORDER BY lasttname DESC");
}else if($booking === "" && $context === "des" && $option === "age"){
    $stmt = $conn->query("SELECT * FROM booking ORDER BY age DESC");
}else if($booking === "" && $context === "des" && $option === "gender"){
    $stmt = $conn->query("SELECT * FROM booking ORDER BY gender DESC");
}else if($booking === "" && $context === "des" && $option === "checkin"){
    $stmt = $conn->query("SELECT * FROM booking ORDER BY checkin DESC");
}else if($booking === "" && $context === "des" && $option === "checkout"){
    $stmt = $conn->query("SELECT * FROM booking ORDER BY checkout DESC");
}
else if($booking !== "" && $option === "firstname" && $context === "des"){
    $stmt = $conn->query("SELECT * FROM booking WHERE firstname LIKE '%$booking%' ORDER BY firstname DESC");
}else if($booking !== "" && $option === "lastname" && $context === "des"){
    $stmt = $conn->query("SELECT * FROM booking WHERE lasttname LIKE '%$booking%' ORDER BY lasttname DESC" );
}else if($booking !== "" && $option === "age" && $context === "des"){
    $stmt = $conn->query("SELECT * FROM booking WHERE age LIKE '%$booking%' ORDER BY age DESC");
}else if($booking !== "" && $option === "gender" && $context === "des"){
    $stmt = $conn->query("SELECT * FROM booking WHERE gender = '$booking' ORDER BY gender DESC;");
}else if($booking !== "" && $option === "checkin" && $context === "des"){
    $stmt = $conn->query("SELECT * FROM booking WHERE checkin = '%$booking%' ORDER BY checkin DESC;");
}else if($booking !== "" && $option === "checkout" && $context === "des"){
    $stmt = $conn->query("SELECT * FROM booking WHERE checkout = '%$booking%' ORDER BY checkout DESC;");
}


$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

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
    echo "</tr>";
}
echo "</table>";
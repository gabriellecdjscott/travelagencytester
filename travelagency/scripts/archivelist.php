<?php 


$host = 'localhost';
$username = 'new_user';
$password = 'password123';
$dbname = 'TravelAgencyDB';

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
if(!$conn){
    echo'Connection Error:' . mysqli_connect_error();
}

$stmt = $conn->query("SELECT * FROM booking");
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo "<table id = 'info' border =\"1\" style='border-collapse: collapse'>";

echo "<tr>";
echo "<th>ID</th>";
echo "<th>First Name</th>";
echo "<th>Last Name</th>";
echo "<th>Check-In Date</th>";
echo "<th>Check-Out Date</th>";
echo "</tr>";

foreach ($results as $row){
    echo "<tr> \n";
    echo "<td>" .$row['id']. "</td> \n";
    echo "<td>" .$row['firstname']. "</td> \n";
    echo "<td>" .$row['lasttname']. "</td> \n";
    echo "<td>" .$row['checkin']. "</td> \n";
    echo "<td>" .$row['checkout']. "</td> \n";
    echo "</tr>";
}
echo "</table>";
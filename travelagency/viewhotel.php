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

$hotels = $_REQUEST['hotels'];
$option = $_REQUEST['option'];
$context = $_REQUEST['context'];

if($hotels != ""){
    $hotels = filter_var($hotels, FILTER_UNSAFE_RAW);
    $hotels = trim($hotels);
}

if($hotels === "" && $context === "search"){
    $stmt = $conn->query("SELECT * FROM hotels");
}else if($hotels !== "" && $option === "hotel" && $context === "search"){
    $stmt = $conn->query("SELECT * FROM hotels WHERE hotel LIKE '%$hotels%'");
}else if($hotels !== "" && $option === "avail_rooms" && $context === "search"){
    $stmt = $conn->query("SELECT * FROM hotels WHERE avail_rooms LIKE '%$hotels%'");
}else if($hotels !== "" && $option === "price" && $context === "search"){
    $stmt = $conn->query("SELECT * FROM hotels WHERE price LIKE '%$hotels%'");
}else if($hotels !== "" && $option === "rating" && $context === "search"){
    $stmt = $conn->query("SELECT * FROM hotels WHERE rating = '$hotels';");
}else if($hotels !== "" && $option === "checkout" && $context === "search"){
    $stmt = $conn->query("SELECT * FROM hotels WHERE checkout = '%$hotels%';");
}



if($hotels === "" && $context === "sort" && $option === "hotel"){
    $stmt = $conn->query("SELECT * FROM hotels ORDER BY hotel ASC");
}else if($hotels === "" && $context === "sort" && $option === "avail_rooms"){
    $stmt = $conn->query("SELECT * FROM hotels ORDER BY avail_rooms ASC");
}else if($hotels === "" && $context === "sort" && $option === "price"){
    $stmt = $conn->query("SELECT * FROM hotels ORDER BY price ASC");
}else if($hotels === "" && $context === "sort" && $option === "rating"){
    $stmt = $conn->query("SELECT * FROM hotels ORDER BY rating ASC");
}else if($hotels === "" && $context === "sort" && $option === "checkout"){
    $stmt = $conn->query("SELECT * FROM hotels ORDER BY checkout ASC");
}
else if($hotels !== "" && $option === "hotel" && $context === "sort"){
    $stmt = $conn->query("SELECT * FROM hotels WHERE hotel LIKE '%$hotels%' ORDER BY hotel ASC");
}else if($hotels !== "" && $option === "avail_rooms" && $context === "sort"){
    $stmt = $conn->query("SELECT * FROM hotels WHERE avail_rooms LIKE '%$hotels%' ORDER BY avail_rooms ASC" );
}else if($hotels !== "" && $option === "price" && $context === "sort"){
    $stmt = $conn->query("SELECT * FROM hotels WHERE price LIKE '%$hotels%' ORDER BY price ASC");
}else if($hotels !== "" && $option === "rating" && $context === "sort"){
    $stmt = $conn->query("SELECT * FROM hotels WHERE rating = '$hotels' ORDER BY rating ASC;");
}else if($hotels !== "" && $option === "checkout" && $context === "sort"){
    $stmt = $conn->query("SELECT * FROM hotels WHERE checkout = '$hotels' ORDER BY checkout ASC;");
}

if($hotels === "" && $context === "des" && $option === "hotel"){
    $stmt = $conn->query("SELECT * FROM hotels ORDER BY hotel DESC");
}else if($hotels === "" && $context === "des" && $option === "avail_rooms"){
    $stmt = $conn->query("SELECT * FROM hotels ORDER BY avail_rooms DESC");
}else if($hotels === "" && $context === "des" && $option === "price"){
    $stmt = $conn->query("SELECT * FROM hotels ORDER BY price DESC");
}else if($hotels === "" && $context === "des" && $option === "rating"){
    $stmt = $conn->query("SELECT * FROM hotels ORDER BY rating DESC");
}else if($hotels === "" && $context === "des" && $option === "checkout"){
    $stmt = $conn->query("SELECT * FROM hotels ORDER BY checkout DESC");
}
else if($hotels !== "" && $option === "hotel" && $context === "des"){
    $stmt = $conn->query("SELECT * FROM hotels WHERE hotel LIKE '%$hotels%' ORDER BY hotel DESC");
}else if($hotels !== "" && $option === "avail_rooms" && $context === "des"){
    $stmt = $conn->query("SELECT * FROM hotels WHERE avail_rooms LIKE '%$hotels%' ORDER BY avail_rooms DESC" );
}else if($hotels !== "" && $option === "price" && $context === "des"){
    $stmt = $conn->query("SELECT * FROM hotels WHERE price LIKE '%$hotels%' ORDER BY price DESC");
}else if($hotels !== "" && $option === "rating" && $context === "des"){
    $stmt = $conn->query("SELECT * FROM hotels WHERE rating = '$hotels' ORDER BY rating DESC;");
}else if($hotels !== "" && $option === "checkout" && $context === "des"){
    $stmt = $conn->query("SELECT * FROM hotels WHERE checkout = '%$hotels%' ORDER BY checkout DESC;");
}


$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo "<table border =\"1\" style='border-collapse: collapse'>";

echo "<tr>";
echo "<th>Hotel Name</th>";
echo "<th>Rooms Avaliable</th>";
echo "<th>Rooms Avaliable After</th>";
echo "<th>Price</th>";
echo "<th>Rating</th>";
echo "</tr>";

foreach ($results as $row){
    echo "<tr> \n";
    echo "<td>" .$row['hotel']. "</td> \n";
    echo "<td>" .$row['avail_rooms']. "</td> \n";
    echo "<td>" .$row['checkout']. "</td> \n";;
    echo "<td>" .$row['price']. "</td> \n";
    echo "<td>" .$row['rating']. "</td> \n";
}
echo "</table>";
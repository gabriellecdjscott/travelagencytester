<?php 


$host = 'localhost';
$username = 'new_user';
$password = 'password123';
$dbname = 'TravelAgencyDB';

$conn = mysqli_connect($host , $username, $password, $dbname);
if(!$conn){
    echo'Connection Error:' . mysqli_connect_error();
}

$fname = $_GET['fname'];
$lname = $_GET['lname'];
$dob = $_GET['dob'];
$age = $_GET['age'];
$gender = $_GET['gender'];
$phonenum = $_GET['phonenum'];
$email = $_GET['email'];
$checkin = $_GET['checkin'];
$checkout = $_GET['checkout'];
$curday= new DateTime();
$today = $curday->format('Y-m-d ');

if(empty($checkin) || empty($checkout) || empty($_GET['hotel']) || empty($_GET['rooms'])){
    echo '<span style= "color: blue;"> Please select check-in and check-out dates, hotel and number of rooms.</span>';
    return;
}else{
    $hotel = $_GET['hotel'];
    $rooms = $_GET['rooms'];
}

$fname = trim(filter_var($fname, FILTER_UNSAFE_RAW));
$lname = trim(filter_var($lname, FILTER_UNSAFE_RAW));
$dob = filter_var($dob, FILTER_UNSAFE_RAW);
$age = trim(filter_var($age, FILTER_UNSAFE_RAW));
$gender = trim(filter_var($gender, FILTER_UNSAFE_RAW));
$hotel = filter_var($hotel, FILTER_UNSAFE_RAW);
$rooms = filter_var($rooms, FILTER_UNSAFE_RAW);
$phonenum= trim(filter_var($phonenum, FILTER_UNSAFE_RAW));
$checkin = filter_var($checkin, FILTER_UNSAFE_RAW);
$checkout = filter_var($checkout, FILTER_UNSAFE_RAW);


$check = date_diff(date_create($dob),date_create($today));

if($check->format("%y") == $age){
    $age= mysqli_real_escape_string($conn, $age);
    $dob= mysqli_real_escape_string($conn, $dob);
}else{
    echo '<span style= "color: red;"> The age does not correspond to the date of birth given.</span>';
    return;
}

if(empty($fname)){
    echo '<span style= "color: red;"> Please enter a value for First Name.</span>';
    return;
}else if(!preg_match('/^[a-zA-Z\s]+$/',$fname))
{
    echo '<span style= "color: red;"> First Name must be letters only.</span>';
    return;
}else{
    $fname= mysqli_real_escape_string($conn, $fname);
}

if(empty($lname)){
    echo '<span style= "color: red;"> Please enter a value for Last Name.</span>';
    return;
}else if(!preg_match('/^[a-zA-Z\s]+$/',$lname))
{
    echo '<span style= "color: red;"> Last Name must be letters only.</span>';
    return;
}else{
    $lname= mysqli_real_escape_string($conn, $lname);
}

if(empty($phonenum)){
    echo '<span style= "color: red;"> Please enter a value for Phone number.</span>';
    return;
}else if(!is_numeric($phonenum))
{
    echo '<span style= "color: red;">  Must be letters only.</span>';
    return;
}else{
    $phonenum= mysqli_real_escape_string($conn, $phonenum);
}

if(empty($email)){
    echo '<span style= "color: red;"> Please enter a value for email.</span>';
    return;
}else if(!filter_var($email,FILTER_SANITIZE_EMAIL)){
    echo '<span style= "color: red;"> Email must be a valid email address.</span>';
    return;
}else{
    $email = mysqli_real_escape_string($conn, $email);
}

if($gender === "None")
{
    echo '<span style= "color: red;"> There must be a Gender selected.</span>';
    return;
}else{
    $gender= mysqli_real_escape_string($conn, $gender);
}


$hotel = mysqli_real_escape_string($conn, $hotel);
$rooms = mysqli_real_escape_string($conn, $rooms);
$checkin = mysqli_real_escape_string($conn, $checkin);
$checkout = mysqli_real_escape_string($conn, $checkout);

$sql = "INSERT INTO booking ( firstname, lasttname, date_of_birth, age, gender, phonenumber, email, checkin, checkout, hotel, rooms) VALUES ('$fname', '$lname', '$dob', $age, '$gender', '$phonenum', '$email', '$checkin', '$checkout', '$hotel', '$rooms')";


if(mysqli_query($conn,$sql)){
    echo'Added to the database';
}else{
    echo'Didnt write to database';
}

mysqli_close($conn); 

?>
<?php 


$host = 'localhost';
$username = 'new_user';
$password = 'password123';
$dbname = 'TravelAgencyDB';

$conn = mysqli_connect($host , $username, $password, $dbname);
if(!$conn){
    echo'Connection Error:' . mysqli_connect_error();
}

$id=$_GET["id"];
$fname = $_GET['fname'];
$lname = $_GET['lname'];
$dob = $_GET['dob'];
$age = $_GET['age'];
$gender = $_GET['gender'];
$phonenum = $_GET['phonenum'];
$email = $_GET['email'];
$checkin = $_GET['checkin'];
$checkout = $_GET['checkout'];
$hotel = $_GET['hotel'];
$rooms = $_GET['rooms'];
$context=$_GET['context'];
$curday= new DateTime();
$today = $curday->format('Y-m-d ');



$fname = trim(filter_var($fname, FILTER_UNSAFE_RAW));
$lname = trim(filter_var($lname, FILTER_UNSAFE_RAW));
$dob = filter_var($dob, FILTER_UNSAFE_RAW);
$age = trim(filter_var($age, FILTER_UNSAFE_RAW));
$gender = trim(filter_var($gender, FILTER_UNSAFE_RAW));
$rooms = filter_var($rooms, FILTER_UNSAFE_RAW);
$phonenum= trim(filter_var($phonenum, FILTER_UNSAFE_RAW));
$id = trim(filter_var($id, FILTER_UNSAFE_RAW));
$checkin = filter_var($checkout, FILTER_UNSAFE_RAW);
$checkout = filter_var($checkout, FILTER_UNSAFE_RAW);


if ($context=="find"){
    $id=mysqli_real_escape_string($conn,$id);

    $stmt = mysqli_query($conn,"SELECT * FROM booking WHERE id = $id");
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

    }
    else{
        echo "Booking does not exist";
    }
} 


if($context=="edit"){
    
    $id=mysqli_real_escape_string($conn,$id);

    $stmt = mysqli_query($conn,"SELECT * FROM booking WHERE id = $id");
    $results = mysqli_fetch_assoc($stmt);
    //mysqli_free_result($stmt);
    $cnt=$stmt->num_rows;

    if ($cnt!=0){
        if (!empty($dob) && !empty($age)){
            $check = date_diff(date_create($dob),date_create($today));
        
            if($check->format("%y") == $age){
                $age= mysqli_real_escape_string($conn, $age);
                $dob= mysqli_real_escape_string($conn, $dob);

                $sql = "UPDATE booking SET age='$age' WHERE id=$id";
                if(mysqli_query($conn,$sql)){
                    echo'';
                }else{
                    echo'=';
                }

                $sql = "UPDATE booking SET date_of_birth='$dob' WHERE id=$id";
                if(mysqli_query($conn,$sql)){
                    echo'';
                }else{
                    echo'=';
                }

            }else{
                echo '<span style= "color: red;"> The age does not correspond to the date of birth given.</span>';
                return;
            }
        }

        if(!empty($fname)){
            if(!preg_match('/^[a-zA-Z\s]+$/',$fname))
            {
                echo '<span style= "color: red;"> First Name must be letters only.</span>';
                return;
            }else{
                $fname= mysqli_real_escape_string($conn, $fname);
                $sql = "UPDATE booking SET firstname='$fname'WHERE id=$id";
                if(mysqli_query($conn,$sql)){
                    echo'';
                }else{
                    echo'=';
                }
                
            }
        }
        
        if(!empty($lname)){
            if(!preg_match('/^[a-zA-Z\s]+$/',$lname))
            {
                echo '<span style= "color: red;"> Last Name must be letters only.</span>';
                return;
            }else{
                $lname= mysqli_real_escape_string($conn, $lname);
                $sql = "UPDATE booking SET lasttname='$lname'WHERE id=$id";
                if(mysqli_query($conn,$sql)){
                    echo'';
                }else{
                    echo'=';
                }
                
            }
        }
        
        if(!empty($phonenum)){
            if(!is_numeric($phonenum))
            {
                echo '<span style= "color: red;">  must be letters only.</span>';
                return;
            }else{
                $phonenum= mysqli_real_escape_string($conn, $phonenum);
                $sql = "UPDATE booking SET phonenumber=$phonenum WHERE id=$id";
                if(mysqli_query($conn,$sql)){
                    echo'';
                }else{
                    echo'=';
                }
                
            }
        }
        
        if(!empty($email)){
            if(!filter_var($email,FILTER_SANITIZE_EMAIL)){
                echo '<span style= "color: red;"> Email must be a valid email address.</span>';
                return;
            }else{
                $email = mysqli_real_escape_string($conn, $email);
                $sql = "UPDATE booking SET email='$email'WHERE id=$id";
                if(mysqli_query($conn,$sql)){
                    echo'';
                }else{
                    echo'=';
                }
                
            }
        }
        
        if($hotel != "None"){
            $hotel = mysqli_real_escape_string($conn, $hotel);
            $sql = "UPDATE booking SET hotel='$hotel'WHERE id=$id";
            if(mysqli_query($conn,$sql)){
                echo'';
            }else{
                echo'';
            }
        }
        if($rooms != "None"){
            $rooms = mysqli_real_escape_string($conn, $rooms);
            $sql = "UPDATE booking SET rooms='$rooms'WHERE id=$id";
            if(mysqli_query($conn,$sql)){
                echo'';
            }else{
                echo'';
            }
        }

        if($gender != "None")
        {
            $gender= mysqli_real_escape_string($conn, $gender);
            $sql = "UPDATE booking SET gender='$gender'WHERE id=$id";
            if(mysqli_query($conn,$sql)){
                echo'';
            }else{
                echo'';
            }
        }

        if(!empty($checkin)){
            $checkin = mysqli_real_escape_string($conn, $checkin);
            $sql = "UPDATE booking SET checkin='$checkin'WHERE id=$id";
            if(mysqli_query($conn,$sql)){
                echo'';
            }else{
                echo'';
            }
        }

        if(!empty($checkout)){
            $checkout = mysqli_real_escape_string($conn, $checkout);
            $sql = "UPDATE booking SET checkout='$checkout'WHERE id=$id";
            if(mysqli_query($conn,$sql)){
                echo'';
            }else{
                echo'';
            }
        }

        

        $id = mysqli_real_escape_string($conn, $id);
        
        $stmt = mysqli_query($conn,"SELECT * FROM booking WHERE id = $id");
        $results = mysqli_fetch_assoc($stmt);
        mysqli_free_result($stmt);
        
        echo "<table id = 'info' border =\"1\" style='border-collapse: collapse'>";

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

        echo "Booking Information Successfully Edited.";
    }   
    else{
        echo "Cannot edit a non-existent booking, try adding a new booking";
    }
}

mysqli_close($conn);

    
?>
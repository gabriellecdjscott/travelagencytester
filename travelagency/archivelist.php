<?php
session_start();

if(isset($_SESSION['username'])){
    echo "<!DOCTYPE html>
    <html lang='en'>
    <head>
        <meta charset='UTF-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <link rel='stylesheet' href='styles/bookinglist.css'>
        <link rel='stylesheet' href='styles/header.css'>
        <link rel='stylesheet' href='styles/footer.css'>
        <script src='scripts/archivelist.js'></script>
        <link href='styles/tables.css' rel='stylesheet'/>
        <title>View Archive</title>
    </head>
    
    <body>
        
        <div class='container'>
        <header>
        <img id='TravelAgencylogo' src='./img/travelagencylogo.jpeg' alt='Travel Agency Logo'>
            <h1>Travel Agency Booking Database Management System</h1>
        
            <div class='logout'>
                <img src='./img/logout.png' alt=''>
                <p id='logout_user'>Logout</p>
            </div>
        </header> 
    
            <aside class='side1'>
                <div class='asiderleft'>
                    <div class='buttonaside'>
                        <a href='add-booking.php'>Add Booking</a>
                    </div>
                    <div class='buttonaside'>
                        <a href='editbooking.php'>Edit Booking</a>
                    </div>
                    <div class='buttonaside'>
                        <a href='confirmbooking.php'>Confirm Booking</a>
                    </div>
                    <div class='buttonaside'>
                        <a href='customer-list.php'>Generate List</a>
                    </div>
                    <div class='buttonaside'>
                        <a href='bookinglist.php'>View Bookings</a>
                    </div>
                    <div class='buttonaside'>
                        <a href='archivelist.php'>View Archive</a>
                    </div>
                    <div class='buttonaside'>
                        <a href='viewhotellist.php'>View Hotel List</a>
                    </div>
                </div>
            </aside>
    
            <main>
                <div class='main'>
                <h1>Confirmed Bookings</h1>
                <p>Press the button to see an archive of the booked trips</p>
    
                    <div class='button'>
                        <button class='search' id='search'>Show Archive</button>
                    </div>
                </div>
                
                <div class='table' id='table'></div>
                
            </main>
        </div>
    
        <footer>
            <p>Copyright &copy; 2022, Group 1</p>
        </footer>
    </body>
    
    
    
    </html>";
}else{
    require 'header.html';
}

?>
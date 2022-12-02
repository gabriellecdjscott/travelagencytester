<?php
session_start();

if(isset($_SESSION['username'])){
    echo "<!DOCTYPE html>
    <html lang='en'>
    <head>
        <meta charset='UTF-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>Customer List</title>
        <link rel='stylesheet' href='styles/CustomerList.css'>
        <link rel='stylesheet' href='styles/header.css'>
        <link rel='stylesheet' href='styles/footer.css'>
        <link href='styles/tables.css' rel='stylesheet'/>
        <script src='scripts/logout.js'></script>
    </head>
    
    <header>
        <img src='./img/travelagencylogo.jpeg' alt='' id='TravelAgencylogo'>
        <h1>Travel Agency Booking Database Management System</h1>
    
        <div class='logout' id='logout'>
            <img src='./img/logout.png' alt=''>
            <p id='logout_user'>Logout</p>
        </div>
    </header>
    
    <body>
        <div class='Attendee'>
            <aside>
                <a href='add-booking.php'>Add Booking</a>
                <a href='editbooking.php'>Edit Booking</a>
                <a href='confirmbooking.php'>Confirm Booking</a>
                <a href='customer-list.php'>Generate List</a>
                <a href='bookinglist.php'>View Bookings</a>
                <a href='archivelist.php'>View Archive</a>
                <a href='viewhotellist.php'>View Hotel List</a>
            </aside>
    
            <main>
                <h1> Booking List</h1>
                <div id='booked-count'>
                    <label for='booking-count'>How many bookings do you want to view?</label>
                    <input type='text' id='booking-count' placeholder=''>
                </div>
    
                
                <div class='options'>
                    <button id='generateList'>Generate List</button>
                    <button id='confirmList'>Confirm List</button>
                </div>
                <div id='result'></div>
                <div class='table'></div>
            </main>
    
        </div>   
    </body>
    
    
    <footer>
        <p>Copyright &copy; 2022, Group 1</p>
    </footer>
    
    
    </html>";
}else{
    require 'header.html';
}

?>
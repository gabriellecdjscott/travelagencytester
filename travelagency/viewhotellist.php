<?php
session_start();

if(isset($_SESSION['username'])){
    echo "<!DOCTYPE html>
    <html lang='en'>
    <head>
        <meta charset='UTF-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <link rel='stylesheet' href='styles/viewhotel.css'> 
        <link href='styles/tables.css' rel='stylesheet'/>
        <link rel='stylesheet' href='styles/footer.css'>
        <script src='scripts/viewhotel.js'></script>
        <title>Hotel List</title>
    </head>
    
    <body>
        
        <div class='container'>
        <header>
            <img id='TravelAgencylogo' src='./img/travelagencylogo.jpeg' alt=''>
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
                <h1>Hotel List</h1>
                <form action='#' method='post' id='form'>
                    <div id = 'form-div'>
                        <input type='text' name='text' id='text' placeholder=''>
                    </div>
                </form>
    
                <form>
                    <input type='radio' id='hotel' name='f'>
                    <label for='hotel'>Hotel Name</label>

                    <input type='radio' id='checkout' name='f'>
                    <label for='checkout'>Check-Out Date</label>
    
                    <input type='radio' id='avail_rooms' name='f'>
                    <label for='avail_rooms'>Rooms Avaliable</label>
    
                    <input type='radio' id='price' name='f'>
                    <label for='price'>Price per Night</label>

                    <input type='radio' id='rating' name='f'>
                    <label for='rating'>Rating out of 5</label>
                </form>
    
                    <div class='button'>
                        <button class='search' id='search'>View Hotels</button>
                        <button class='sort' id='sort'>Sort Ascending</button>
                        <button class='sort' id='des'>Sort Descending</button>
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
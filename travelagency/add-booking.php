<?php
session_start();

if(isset($_SESSION['username'])){
    echo "<!DOCTYPE html>
    <html lang='en'>
    
    <head>
        <meta charset='UTF-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>Add Booking</title>
        <link href='styles/add-booking.css' rel='stylesheet'/>
        <link href='styles/tables.css' rel='stylesheet'/>
        <script src='scripts/add-booking.js'></script>
    </head>
    
    
    <body>
    
        <div class='container'>
    
            <header>
    
                <div class='logo'>
                    <img id='TravelAgencylogo' src='./img/travelagencylogo.jpeg' alt='Travel Agency Logo'>
                    <h1>Travel Agency Booking Database Management System</h1>
                </div>
                
                <div class='logout'>
                    <img src='./img/logout.png' alt=''>
                    <p id='logout_user'>Logout</p>
                </div>
            
            </header>
    
            <aside id='left-sidebar'>
                <div id='side'>
                    <a href='add-booking.php'>Add Booking</a>
                    <a href='editbooking.php'>Edit Booking</a>
                    <a href='confirmbooking.php'>Confirm Booking</a>
                    <a href='customer-list.php'>Generate List</a>
                    <a href='bookinglist.php'>View Bookings</a>
                    <a href='archivelist.php'>View Archive</a>
                    <a href='viewhotellist.php'>View Hotel List</a>
                </div>   
            </aside>
    
            <main>
                <form method='post' action='addbooking.php'></form>
                <div id='form-section'>
    
                    <div id='heading'><h1>Add Booking</h1></div>
                    
                    <div id='booking-name'>
    
                        <label for='fname'>First name:</label>
                        <input type='text' id='fname' name='fname' required>
    
                        <label for='lname'>Last name:</label>
                        <input type='text' id='lname' name='lname' required>
                    </div>
    
    
                    <div id='booking-dob'>
                        <label for='dob'>Date of Birth:</label>
                        <input type='date' id='dob' name='dob' required>
                    </div>
    
    
                    <div id='booking-age-gender'>
    
                        <label for='age'>Age:</label>
                        <input type='text' id='age' name='age' required>
    
                        <label for='gender'>Gender:</label>
                        
                        <select name='gender' id='gender'>
                            <option value='None'>Choose a Gender</option>
                            <option value='male'>Male</option>
                            <option value='female'>Female</option>
                        </select>
    
                    </div>
                    
    
                    <div id='contact'>
                        <label for='position'>Phone Number:</label>
                        <input type='text' id='phonenum' name='phonenum' required>
    
                        <label for='email'>Email:</label>
                        <input type='email' id='email' name='email' required>
                    </div>
    
    
                    <div id='booking-address'>
    
                        <p>Hotel Reservation:</p>

                        <div id='booking-checkin'>
                            <label for='checkin'>Check-In Date:</label>
                            <input type='date' id='checkin' name='checkin' required>
                        </div>

                        <div id='booking-checkout'>
                            <label for='checkout'>Check-Out Date:</label>
                            <input type='date' id='checkout' name='checkout' required>
                        </div>
                        
                        <div id='city-hotel'>
    
                            <label for='Hotel'>Hotel</label>
    
                            <select name='Hotel' id='hotel'>
                                <option value='None'>Choose a Hotel</option>
                                <option value='Hermitage Bay Hotel, Antigua'>Hermitage Bay Hotel, Antigua</option>
                                <option value='Fairmont Royal Pavilion, Barbados'>Fairmont Royal Pavilion, Barbados</option>
                                <option value='Sugar Beach, A Viceroy Resort, St Lucia'>Sugar Beach, A Viceroy Resort, St Lucia</option>
                                <option value='Jamaica Inn, Jamaica'>Jamaica Inn, Jamaica</option>
                                <option value='Half Moon, Jamaica'>Half Moon, Jamaica</option>
                                <option value='Jade Mountain, St Lucia'>Jade Mountain, St Lucia</option>
                                <option value='Sandals Emerald Bay,Bahamas'>Sandals Emerald Bay,Bahamas</option>
                            </select>

                            <label for='Rooms'>Rooms</label>
                            <select name='rooms' id='rooms'>
                                <option value='None'>Choose the number of rooms to book </option> 
                                <option value='1'>1</option>
                                <option value='2'>2</option>
                                <option value='3'>3</option>
                                <option value='4'>4</option>
                            </select>
    
                        </div>
                    </div>

                    <div id='button-section'>
                        <button type='submit' id = 'button' name= 'button'>Add booking</button>
                    </div>
    
                </div>
                </form>
                <div id = 'show'></div>
            </main>
    
            
    
        </div>
    
        <footer> 
            <div>
            Copyright &copy; 2022, Group 1
            </div> 
        </footer>
        
    </body>
    
    </html>";
}else{
    require 'header.html';
}
?>
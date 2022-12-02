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
        <link rel='stylesheet' href='styles/footer.css'>
        <link href='styles/tables.css' rel='stylesheet'/>
        <link rel='stylesheet' href='styles/edit-booking.css'>
        <script src='scripts/edit-booking.js'></script>
        <title>Edit Booking List</title>
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
                <h1>Edit Booking</h1>
                <p>Please enter the ID of the Booking you would like to edit:</p>
                <form action='#' method='post' id='form'>
                    <div id = 'form-div'>
                        <input type='text' name='text' id='text' placeholder=''>
                    </div>
                </form>
    
                    <div class='button'>
                        <button class='editInfo' id='editInfo'>Edit Booking</button>
                        <button class='dlt' id='dlt'>Delete Booking</button>
                    </div>
                </div>
    
                <div class='table' id='table'></div>
    
                <div id='edit'>
                    <div id='form-section'>
            
                        <label for='fname'>First name:</label>
                        <input type='text' id='fname' name='fname' required>
    
                        <label for='lname'>Last name:</label>
                        <input type='text' id='lname' name='lname' required>
                    
    
    
                    
                        <label for='dob'>Date of Birth:</label>
                        <input type='date' id='dob' name='dob' required>
    
    
                        <label for='age'>Age:</label>
                        <input type='text' id='age' name='age' required>
    
                        <label for='gender'>Gender:</label>
                        
                        <select name='gender' id='gender'>
                            <option value='None'>Choose a Gender</option>
                            <option value='male'>Male</option>
                            <option value='female'>Female</option>
                        </select>
    
                        <label for='position'>Phone Number:</label>
                        <input type='text' id='phonenum' name='phonenum'>
    
                        <label for='email'>Email:</label>
                        <input type='email' id='email' name='email'>
    
    
                        <p>Hotel Reservation:</p>

                        <label for='checkin'>Check-In Date:</label>
                        <input type='date' id='checkin' name='checkin' required>

                        <label for='checkout'>Check-Out Date: </label>
                        <input type='date' id='checkout' name='checkout' required>

                        <label for='hotel'>Hotel</label>
    
                        <select name='hotel' id='hotel'>
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
    
                        
                        
                        <div id='button-section'>
                            <button type='submit' id = 'button' name= 'button'>Edit Booking</button>
                        </div>
                        
    
                    </div>
                </div>
                
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
window.onload = function(){

    let viewDatabase = document.querySelector('#viewDatabase')
    let addbooking = document.querySelector('#addBooking')
    let editbooking = document.querySelector('#editBooking')
    let generatecustomer = document.querySelector('#generatebooking')
    let viewArchive = document.querySelector('#viewArchive')
    let confirmbooking = document.querySelector('#confirmbookings')
    let logout = document.querySelector('.logout')
    let TravelAgencylogo = document.querySelector('#TravelAgencylogo')

    logout.addEventListener("click", clicked);
    TravelAgencylogo.addEventListener("click", clicked);
    viewDatabase.addEventListener("click", onClick);
    addbooking.addEventListener("click", onClick);
    editbooking.addEventListener("click", onClick);
    generatecustomer.addEventListener("click", onClick);
    viewArchive.addEventListener("click", onClick);
    confirmbooking.addEventListener("click", onClick);

    function onClick(e){
    console.log("hello")
        if (e.target.id === "viewDatabase"){
            window.location.href = "bookinglist.php";
        }else if (e.target.id === "generatebooking"){
            window.location.href = "customer-List.php";
        }else if (e.target.id === "addBooking") {
            window.location.href = "add-booking.php";
        }else if (e.target.id === "editBooking") {
            window.location.href = "editbooking.php";
        }else if (e.target.id === "viewArchive"){
            window.location.href = "archivelist.php";
        }else if (e.target.id === "confirmbookings"){
            window.location.href = "confirmbooking.php";
        }
    }

    function clicked(e){
        if (e.target.id === "TravelAgencylogo"){
            window.location.href = "HomeScreen.php";
        }else{
            window.location.href = "logout.php";
        }
        
    }
}
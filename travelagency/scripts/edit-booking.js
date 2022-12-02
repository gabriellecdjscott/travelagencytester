window.onload=function(){

    let logout = document.querySelector('.logout')
    let TravelAgencylogo = document.querySelector('#TravelAgencylogo')

    logout.addEventListener("click", clicked);
    TravelAgencylogo.addEventListener("click", clicked);

    function clicked(e){
        if (e.target.id === "TravelAgencylogo"){
            window.location.href = "HomeScreen.php";
        }else{
            window.location.href = "logout.php";
        }
        
    }

    var btn=document.querySelector("#editInfo");
    console.log(btn);

    var btn2=document.querySelector("#button");
    console.log(btn2);

    var dlt=document.querySelector("#dlt");
    console.log(dlt);

    btn.addEventListener("click", editClick);
    numbers=/^[0-9]+$/;

    function editClick(){
        var txt=document.getElementById("text").value.trim();
        console.log(txt);

        if (!txt.match(numbers)){
            document.getElementById("text").style.borderColor="red";
            return;
        }
        else{
            document.getElementById("text").style.borderColor="black";
        }
        
        document.getElementById("edit").style.display="contents";

        const xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function(){


            if(this.readyState == 4 && this.status == 200){
                document.getElementById("table").innerHTML = this.responseText;
            }
        }
    
        xhr.open('GET', 'scripts/edit-booking.php?id='+txt+"&fname=&lname=&dob=&age=&gender=&checkin=&checkout=&hotel=&rooms=&email=&phonenum=&context=find", true);
        xhr.send();
    }

    btn2.addEventListener("click",enter);

    function enter(e){
        alpha=/^[A-Za-z]+$/ ;
        numbers=/^[0-9]+$/ ;
        alpha2=/^[0-9A-Za-z]/;
        date=/([12]\d{3}-(0[1-9]|1[0-2])-(0[1-9]|[12]\d|3[01]))/;
        emailcheck=/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
        e.preventDefault();
        var fname=document.querySelector("#fname").value.trim();
        var lname=document.querySelector("#lname").value.trim();
        var dob=document.querySelector("#dob").value;
        var age=document.querySelector("#age").value.trim();
        var gender=document.querySelector("#gender").value;
        var hotel=document.querySelector("#hotel").value;
        var email=document.querySelector('#email').value.trim();
        var phonenum=document.querySelector('#phonenum').value.trim();
        var rooms=document.querySelector("#rooms").value;
        var checkin=document.querySelector("#checkin").value;
        var checkout=document.querySelector("#checkout").value;
       
        console.log(fname,lname,dob,age,gender,checkin,checkout,hotel,rooms,email,phonenum);
        if (fname!=""){
            if (!fname.match(alpha)){
                document.querySelector("#fname").style.borderColor="red";
                return;
            }
            else{
                console.log('name worked ');
                
                document.querySelector("#fname").style.borderColor="black";
            }
        }   

        if (lname!=""){
            if (!lname.match(alpha)){
                document.querySelector("#lname").style.borderColor="red";
                return;
            }
            else{
                
                document.querySelector("#lname").style.borderColor="black";
            }
        }

        if (dob!=""){
            if (!dob.match(date)){
                document.querySelector("#dob").style.borderColor="red";
                return;
            }
            else{
                
                document.querySelector("#dob").style.borderColor="black";
            }
        }

        if (age!=""){
            if (!age.match(numbers)){
                document.querySelector("#age").style.borderColor="red";
                return;
            }
            else{
            
                document.querySelector("#age").style.borderColor="black";
            }
        }

        if (phonenum!=""){
            if (!phonenum.match(numbers)){
                document.querySelector("#phonenum").style.borderColor="red";
                return;
            }
            else{
            
                document.querySelector("#phonenum").style.borderColor="black";
            }
        }

        if (email!=""){
            if (!email.match(emailcheck)){
                document.querySelector("#email").style.borderColor="red";
                return;
            }
            else{
            
                document.querySelector("#email").style.borderColor="black";
            }
        }
        if (checkin!=""){
            if (!checkin.match(date)){
                document.querySelector("#checkin").style.borderColor="red";
                return;
            }
            else{
                
                document.querySelector("#checkin").style.borderColor="black";
            }
        }
        if (checkout!=""){
            if (!checkout.match(date)){
                document.querySelector("#checkout").style.borderColor="red";
                return;
            }
            else{
                
                document.querySelector("#checkout").style.borderColor="black";
            }
        }

        var txt=document.getElementById("text").value.trim();

        const xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function(){


            if(this.readyState == 4 && this.status == 200){
                document.getElementById("table").innerHTML = this.responseText;
            }
        }
    
        xhr.open('GET', 'scripts/edit-booking.php?id='+txt+"&fname="+ fname + "&lname=" + lname + "&dob=" + dob + "&age=" + age + "&gender=" + gender + "&checkin=" + checkin + "&checkout=" + checkout + "&hotel=" + hotel + "&rooms=" + rooms + "&email=" + email + "&phonenum=" + phonenum+"&context=edit", true);
            
        xhr.send();
    }
    
    dlt.addEventListener("click",dltClick);

    function dltClick(){
        var id=document.getElementById("text").value.trim();
        console.log(id);
        numbers=/^[0-9]+$/ ;
        
        if (!id.match(numbers)){
            document.getElementById("text").style.borderColor="red";
            return;
        }
        else{
            document.getElementById("text").style.borderColor="black";
        }

        const xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function(){


            if(this.readyState == 4 && this.status == 200){
                document.getElementById("table").innerHTML = this.responseText;
            }
        }
        xhr.open("GET", 'scripts/dlt-booking.php?id='+id, true);
        xhr.send();
    }


}
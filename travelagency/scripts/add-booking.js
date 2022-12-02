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
   
    var submit=document.querySelector("#button");
    console.log(submit);

    submit.addEventListener("click", process);
    
    function process(e){
        alpha=/^[A-Za-z]+$/ ;
        numbers=/^[0-9]+$/ ;
        alpha2=/^[0-9A-Za-z]/;
        date=/([12]\d{3}-(0[1-9]|1[0-2])-(0[1-9]|[12]\d|3[01]))/;
        emailcheck=/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
        let valid = 0;
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
        var checkin=document.querySelector('#checkin').value;
        var checkout=document.querySelector('#checkout').value;
    
       
        console.log(fname,lname,dob,age,gender,hotel,email,phonenum,rooms,checkin,checkout);

        if (!fname.match(alpha)){
            document.querySelector("#fname").style.borderColor="red";
            return;
        }
        else{
            console.log('First name worked');
            valid = valid + 1;
            document.querySelector("#fname").style.borderColor="black";
        }

        if (!lname.match(alpha)){
            document.querySelector("#lname").style.borderColor="red";
            return;
        }
        else{
            console.log('Last name worked');
            valid = valid + 1;
            document.querySelector("#lname").style.borderColor="black";
        }

        if (!dob.match(date)){
            document.querySelector("#dob").style.borderColor="red";
            return;
        }
        else{
            valid = valid + 1;
            document.querySelector("#dob").style.borderColor="black";
        }

        if (!age.match(numbers)){
            document.querySelector("#age").style.borderColor="red";
            return;
        }
        else{
            valid = valid + 1;
            document.querySelector("#age").style.borderColor="black";
        }

        if (!phonenum.match(numbers)){
            document.querySelector("#phonenum").style.borderColor="red";
            return;
        }
        else{
            console.log('Phone number worked');
            valid = valid + 1;
            document.querySelector("#phonenum").style.borderColor="black";
        }

        if (!email.match(emailcheck)){
            document.querySelector("#email").style.borderColor="red";
            return;
        }
        else{
            console.log('Email worked');
            valid = valid + 1;
            document.querySelector("#email").style.borderColor="black";
        }
        if (!checkin.match(date)){
            document.querySelector("#checkin").style.borderColor="red";
            return;
        }
        else{
            valid = valid + 1;
            document.querySelector("#checkin").style.borderColor="black";
        }
        if (!checkout.match(date)){
            document.querySelector("#checkout").style.borderColor="red";
            return;
        }
        else{
            valid = valid + 1;
            document.querySelector("#checkout").style.borderColor="black";
        }

        console.log(valid);
        if (valid == 8){
            const xhr = new XMLHttpRequest();
            console.log('Worked valid = 8');
            xhr.onreadystatechange = function(){


                if(this.readyState == 4 && this.status == 200){
                    document.getElementById("show").innerHTML = this.responseText;
                    console.log('Went to php');
                    console.log(this.responseText)
                }
                else{
                    document.getElementById("show").innerHTML="There was a problem with the request";
                }
            }
        
            xhr.open('GET', 'addbooking.php?fname='+ fname + "&lname=" + lname + "&dob=" + dob + "&age=" + age + "&gender=" + gender + "&checkin=" + checkin + "&checkout=" + checkout + "&hotel=" + hotel + "&email=" + email + "&phonenum=" + phonenum +"&rooms=" + rooms, true);
            
            xhr.send();
        }

    }

}

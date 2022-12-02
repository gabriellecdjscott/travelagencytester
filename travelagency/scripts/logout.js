window.onload = function(){

    console.log(8)

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


//------------- Customer List Script -------------

    //Requesting the number of customers currently stored in the datatbase and displays it on the webpage
    
    let tableGenerated = false;

    const htrCount = new XMLHttpRequest();

    htrCount.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            console.log(this.responseText);
            document.getElementById("booking-count").placeholder = this.responseText + " Customer currently booked";
        }
    }

    htrCount.open("GET", "generatelist.php?mode=count");
    htrCount.send();

    let table = document.querySelector(".table");

    let generateListBtn = document.getElementById("generateList");
    let confirmListBtn = document.getElementById("confirmList");

    generateListBtn.addEventListener("click", btnClicked);
    confirmListBtn.addEventListener("click", btnClicked);

    function btnClicked(e){

        if(e.target.id == "generateList"){

            tableGenerated = true;

            let mode = "generate";

            amount = document.getElementById("booking-count").value;

            if(amount==""){
                tableGenerated = false;
            }

            console.log(amount)

            const htr = new XMLHttpRequest();

            htr.onreadystatechange = function(){
                if(this.readyState == 4 && this.status == 200){
                    table.innerHTML = this.responseText;
                }
            }

            htr.open("GET", "generatelist.php?mode=" + mode + "&amount=" + amount);
            htr.send();


        }else if(e.target.id == "confirmList"){

            console.log(e.target.id + " button pressed");

            if(tableGenerated){
                ans = confirm("Are you sure you want to confirm this list of customers?");

                console.log(ans);
    
                if(ans==true){
    
                    let generatedTable = document.getElementById('generatedTable');
    
                    customerList = "";
    
                    for(i=2;i<generatedTable.rows.length;i+=2){
    
                        console.log(generatedTable.rows.item(i).cells.item(0).innerHTML);
                        id = generatedTable.rows.item(i).cells.item(0).innerHTML
                        customerList += id.toString() + " ";
                    }
    
                    console.log(customerList);
    
                    const htrID = new XMLHttpRequest();
    
                    htrID.onreadystatechange = function(){
                        if(this.readyState == 4 && this.status == 200){
    
                            table.innerHTML = this.responseText;
                        }
                    }
    
                    htrID.open("GET", "confirmlist.php?ids=" + customerList);
                    htrID.send();
                }

            }else{
                customerList="none"

                console.log("Table not generating")

                const htrID = new XMLHttpRequest();

                htrID.onreadystatechange = function(){
                    if(this.readyState == 4 && this.status == 200){

                        table.innerHTML = this.responseText;
                    }
                }

                htrID.open("GET", "confirmlist.php?ids=" + customerList);
                htrID.send();
            }
        }
    }
}
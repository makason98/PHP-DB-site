window.onscroll = function() {meniu_ascuns_sus()};

function meniu_ascuns_sus() {
       if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) 
	    {
		       if(window.innerWidth>=768)
			   {
	             document.getElementById("blacker").style.backgroundColor = "rgba(0, 0, 0, 0.9)";
			   }
		
        } else {
          
			  
				    if(window.innerWidth>=768){document.getElementById("blacker").style.backgroundColor = "rgba(0, 0, 0, 0)";}
			   
       }	  
}


window.onresize = function(){
     if(window.innerWidth<=768)
			   {
	             document.getElementById("blacker").style.backgroundColor = "rgba(0, 0, 0, 0.9)";
			   } 	
			   else {
				    if(window.innerWidth>=769){document.getElementById("blacker").style.backgroundColor = "rgba(0, 0, 0, 0)";}
			   }
}

/*Form############*/

var fost = 0, cnt = [0,0,0,0,0,0]
	var fin = [];
	var numere = /[0-9]/
function Numele() {
    
    var x = document.getElementById("nume").value;

    if (x.match(/[a-zA-Z]{3,}/)) 
	{
	   if(x.match(numere))
	   document.getElementById("nume").style.backgroundColor = "#FFA500"
	   else
        {document.getElementById("nume").style.backgroundColor = "#FFFFFF"; cnt[0] = 1; fin[0] = x;}
    } else
       document.getElementById("nume").style.backgroundColor = "#FFA500"
      
}

function Prenumele() {
    
   var x = document.getElementById("prenume").value;

    if (x.match(/[a-zA-Z]{3,}/)) 
	{
	   if(x.match(numere))
	   document.getElementById("prenume").style.backgroundColor = "#FFA500"
	   else
        {document.getElementById("prenume").style.backgroundColor = "#FFFFFF"; cnt[1] = 1; fin[1] = x;}
    } else
       document.getElementById("prenume").style.backgroundColor = "#FFA500"
}

function Adresa() {
    var x = document.getElementById("adresa").value;

    if (x.match(/[a-zA-Z]{3,}/) && x.match(numere)) {
	    if(x.match(/[@#$%^&*]/))
		 document.getElementById("adresa").style.backgroundColor = "#FFA500"
		 else
	     {document.getElementById("adresa").style.backgroundColor = "#FFFFFF"; cnt[2] = 1; fin[2] = x;}
	}
	else{
    document.getElementById("adresa").style.backgroundColor = "#FFA500"
	    }
}

function Data_nasterii() {
    var x = document.getElementById("data_n").value;
	var dre = /^(0?[1-9]|[12][0-9]|3[01])[\/](0?[1-9]|1[012])[\/\-]\d{4}$/;
	
    if (x.match(dre))
	
	{
	     if(x.match(/[a-zA-Z]/))
		 document.getElementById("data_n").style.backgroundColor = "#FFA500"
		 else
	     {document.getElementById("data_n").style.backgroundColor = "#FFFFFF"; cnt[3] = 1; fin[3] = x;}
	   
	}else
    document.getElementById("data_n").style.backgroundColor = "#FFA500"
}

function Telefon() {
    var x = document.getElementById("telefon").value;
    if (x.match(numere) && x.match(/^["+"]/) && x.length >= 13) 
	{
	     if(x.match(/[a-zA-Z]/) || x.match(/[@#$%^&*]/))
		 document.getElementById("telefon").style.backgroundColor = "#FFA500"
		 else
	     {document.getElementById("telefon").style.backgroundColor = "#FFFFFF"; cnt[4] = 1; fin[4] = x;}
	   
	}else
    document.getElementById("telefon").style.backgroundColor = "#FFA500"
}

function Email() {
    var x = document.getElementById("email").value;
	var y = document.getElementById("culor").value;
	var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	fin[6] = y;
	
    if (x.match(re) && x.length >= 10) 
	{
	     document.getElementById("email").style.backgroundColor = "#FFFFFF";
		 cnt[5] = 1; fin[5] = x;
	}else
    document.getElementById("email").style.backgroundColor = "#FFA500"
	
	
}

function Final(){
     var confirm = 0 ; 
	 
   for (i = 0; i <= 5; i++)
    {
       if(cnt[i] == 0 )
        {
          alert("Toate campurile trebuie completate");
		  confirm = 1;
		  break;  
        }
    }
	if (confirm == 0 && fost == 0){
    document.getElementById("0").innerHTML = fin[0];
	document.getElementById("1").innerHTML = fin[1];
	document.getElementById("2").innerHTML = fin[2];
	document.getElementById("3").innerHTML = fin[3];
	document.getElementById("4").innerHTML = fin[4];
	document.getElementById("5").innerHTML = fin[5];
	document.getElementById("6").innerHTML = fin[6];
	Final_form1();
	}
}

function Final_form1(){
    var x = document.getElementById("trimis");
	var y = document.getElementById("formular");
    if (x.style.display == "block") {
        x.style.display = "none";
		y.style.display = "block";
    } else {
        x.style.display = "inline-block";
		y.style.display = "none";
		fost = 1;
		
    }
}




function rese_color(){
document.getElementById("nume").style.backgroundColor = "#FFFFFF";
document.getElementById("prenume").style.backgroundColor = "#FFFFFF";
document.getElementById("adresa").style.backgroundColor = "#FFFFFF";
document.getElementById("data_n").style.backgroundColor = "#FFFFFF";
document.getElementById("telefon").style.backgroundColor = "#FFFFFF";
document.getElementById("email").style.backgroundColor = "#FFFFFF";


}


/*LOGIN ########*/


function arata(){
  var x = document.getElementById("schimba");
  if(x.type == "password")
     x.type = "text";
	 else
	 x.type = "password";
}

function verificare(){
var email = "test@gmail.com";
var parola = "123456";

var x = document.getElementById("nume").value;
var y = document.getElementById("schimba").value;

  if(x == "" && y == ""){
   alert("Nu ați completat toate campurile");
   change_background("nume");
   change_background("schimba");
   }
   else if(x ==""){
    alert("Nu ați completat toate campurile");
   change_background("nume");
   }
   else if(y ==""){
   alert("Nu ați completat toate câmpurile");
   change_background("schimba");
   }
   else if(x.match(email) && y.match(parola)){
   Final_form();
   }
   else
   alert("Valorile introduse nu sunt corecte");
   
}

function change_background(change){
document.getElementById(change).style.backgroundColor = "rgba(255, 0 ,0 ,0.7)";
}

function original(){
document.getElementById("nume").style.backgroundColor = "rgba(0, 26, 26, 0)";
document.getElementById("schimba").style.backgroundColor = "rgba(0, 26, 26, 0)";
}

function Final_form(){
    var x = document.getElementById("trimitere");
	var y = document.getElementById("login");
    if (x.style.display == "block") {
        x.style.display = "none";
		y.style.display = "block";
    } else {
        x.style.display = "inline-block";
		y.style.display = "none";
		
		
    }
}
// Create Poll

function AddOption(event){
   var a=4;


        document.getElementById("Option").innerHTML =
        ' <label for="Answer">Option:</label><br> <input type="text" id="ans4" name="ans1"><br></br>';
  
 
}



//account managment 


function ChangeAccountInfo(){

    document.getElementById("show_info").style.visibility = "visible";
    document.getElementById("change_accountBtn").style.visibility = "hidden";


}
function changePassword(event){

   
    var element = event.currentTarget;
      var oldpass = element[0].value;
    field(pass);

    var pass = element[1].value;
    passwordcheck(pass);

    var repass = element[2].value;
    passwordRcheck(repass);

    var avator = element[3].value;
    avatorcheck(avator);

    if(field(pass)==1 || passwordcheck(pass)==1 || passwordRcheck(repass)== 1){
        event.preventDefault();
    }

}

//Validate  functions 
function field(p){


    var result = true;

    if(p == null || p == "" ){
        document.getElementById("field").innerHTML="Field is empty";
		result = false;
    }
    if(result== false){
        return 1;
    }
}

function emailCheck(e){

    var emailFormat = /^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/; 
    var result = true;
    
    if(e == null || e == "" ){
        document.getElementById("email_msg").innerHTML = "Email is empty";
        result =false;
		

    } else if( emailFormat.test(e) == false){
        document.getElementById("email_msg").innerHTML ="Email is in wrong format";
        result = false; 
    } 

    if(result == true){
        document.getElementById("email_msg").innerHTML= "";
        document.getElementById("mail").style.borderBottom=" 3px solid #5AF9F1";
    }else{
        return 1;
    }

}

function usernamecheck( u){

    var usernameFormat = /^[a-zA-Z0-9_-]+$/; 
    var result = true;

    if(u == null || u == "" ){
        document.getElementById("uname_msg").innerHTML="Username is empty ";
		result = false;

    } else if( usernameFormat.test(u) == false){
        document.getElementById("uname_msg").innerHTML="No spaces or other non-word characters";
		result = false;
    }

    if(result == true){
        document.getElementById("uname_msg").innerHTML= "";
        document.getElementById("uname").style.borderBottom=" 3px solid #5AF9F1";
    }else{
        return 1;
    }
  
}


function passwordcheck(p){


    var passwordFormat = /^(\S*)?\d+(\S*)?$/; 
    var result = true;

    if(p == null || p == "" ){
        document.getElementById("pswd_msg").innerHTML="Password is empty";
		result = false;

    } else if( passwordFormat.test(p) == false ||p.length != 8){
        document.getElementById("pswd_msg").innerHTML="Must be 8 characters. At least one non-letter";
		result = false;
    }

    if(result == true){
        document.getElementById("pswd_msg").innerHTML= "";
        document.getElementById("pass").style.borderBottom=" 3px solid #5AF9F1";
    }else{
        return 1;
    }
      
}



function passwordRcheck(r){


    var passwordFormat = /^(\S*)?\d+(\S*)?$/; 
    var result = true;

    if(r == null || r == "" ){
        document.getElementById("pswdr_msg").innerHTML="Confirm Password is empty";
	    result = false;

    } else if( passwordFormat.test(r) == false ||r.length != 8){
        document.getElementById("pswdr_msg").innerHTML="Password don`t match";
	    result = false;
    }

    if(result == true){
        document.getElementById("pswdr_msg").innerHTML= "";
        document.getElementById("r_pass").style.borderBottom=" 3px solid #5AF9F1";
    }else{
        return 1;
    }

}

function avatorcheck(av){



    var option=document.getElementsByName('gender');

    if (!(option[0].checked || option[1].checked)) {
        document.getElementById("avator_msg").innerHTML="Must choose a avator";
    
    }else{
        document.getElementById("avator_msg").innerHTML="";
    }


}



function SignUpForm(event){
 
   
    var element = event.currentTarget;
    var email = element[0].value;
    emailCheck(email);

    var username = element[1].value;
    usernamecheck(username);

    var pass = element[2].value;
    passwordcheck(pass);

    var repass = element[3].value;
    passwordRcheck(repass);

    var avator = element[4].value;
    avatorcheck(avator);

    if(passwordRcheck(repass)== 1 ||emailCheck(email)==1 || usernamecheck(username)==1|| passwordcheck(pass)==1){
        event.preventDefault();
    }
}



function SignInForm(event){

  
    var element = event.currentTarget;
    
    var username = element[0].value;
    usernamecheck(username);

    var pass = element[1].value;
    passwordcheck(pass);

    if(usernamecheck(username)==1|| passwordcheck(pass)==1){
        event.preventDefault();
    }    

}


/*
function questioncheck(a){

    var result= true;

    if( a == null|| a ==""|| a.length >= 100){
        document.getElementById("quest_msg").innerHTML="*Cannot be blank and must be shooter than 100 charactors* <br>";
		result = false;
    }

    if(result == true){
        document.getElementById("quest_msg").innerHTML= "";

    }

}

function answercheck(b){

    var result= true;

    if(  b.length >= 50){
        document.getElementsByClassName("ans_msg").innerHTML="* Must be shooter than 50 charactors* <br>";
		result = false;
    }

    if(result == true){
        document.getElementsByClassName("ans_msg").innerHTML= "";

    }

}

function CreateFormF(event){

    event.preventDefault(); 

    var el = event.currentTarget;

    var question  = el[0].value;
    questioncheck(question);

  

}


function wordsCountQuestion(w){

   
    var length = 0;
    var max= 100;
    var strLength = w.value.length;
  if(strLength <max){
    
     document.getElementById("ques").innerHTML = '<span style="color:green;">' + strLength;
  }else{
    document.getElementById("ques").innerHTML = '<span style="color:red;">' + strLength + "over limit";
  }
    
}

function questionCount(event){
    var element= event.currentTarget;
    wordsCountQuestion(element);

}

function wordsCount(w){

    var length = 0;
    var max= 50;
    var strLength = w.value.length;
  if(strLength <max){
    
     document.getElementById("words").innerHTML = '<span style="color:green;"+ "font-size: 15px;">' + strLength;
  }else{
    document.getElementById("words").innerHTML = '<span style="color:red;" + "font-size: 15px;">' + strLength + "over limit";
  }
    
}


function wordCount(event){

    var element= event.currentTarget;
    wordsCount(element);


}
function wordsCountA2(w){

    var length = 0;
    var max= 50;
    var strLength = w.value.length;
  if(strLength <max){
    
     document.getElementById("words2").innerHTML = '<span style="color:green;"+ "font-size: 15px;">' + strLength;
  }else{
    document.getElementById("words2").innerHTML = '<span style="color:red;" + "font-size: 15px;">' + strLength + "over limit";
  }
    
}
function wordCount2(event){

    var element= event.currentTarget;
    wordsCountA2(element);

}
function wordsCountA3(w){

    var length = 0;
    var max= 50;
    var strLength = w.value.length;
  if(strLength <max){
    
     document.getElementById("words3").innerHTML = '<span style="color:green;"+ "font-size: 15px;">' + strLength;
  }else{
    document.getElementById("words3").innerHTML = '<span style="color:red;" + "font-size: 15px;">' + strLength + "over limit";
  }
    
}
function wordCount3(event){

    var element= event.currentTarget;
    wordsCountA3(element);


}

function wordsCountA4(w){

    var length = 0;
    var max= 50;
    var strLength = w.value.length;
  if(strLength <max){
    
     document.getElementById("words4").innerHTML = '<span style="color:green;"+ "font-size: 15px;">' + strLength;
  }else{
    document.getElementById("words4").innerHTML = '<span style="color:red;" + "font-size: 15px;">' + strLength + "over limit";
  }
    
}
function wordCount4(event){

    var element= event.currentTarget;
    wordsCountA4(element);


}
function wordsCountA5(w){

    var length = 0;
    var max= 50;
    var strLength = w.value.length;
  if(strLength <max){
    
     document.getElementById("words5").innerHTML = '<span style="color:green;"+ "font-size: 15px;">' + strLength;
  }else{
    document.getElementById("words5").innerHTML = '<span style="color:red;" + "font-size: 15px;">' + strLength + "over limit";
  }
    
}
function wordCount5(event){

    var element= event.currentTarget;
    wordsCountA5(element);


}

*/

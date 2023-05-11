<?php
session_start();
if (isset($_SESSION["User_id"]) && isset($_SESSION["User_name"]))
{
    header("Location: Account.php");
    exit();
}else{
    $validate = true;
    $reg_Email = "/^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/";
    $reg_Pswd = "/^(\S*)?\d+(\S*)?$/";
    $reg_user = "/^[a-zA-Z0-9_-]+$/";


    if (isset($_POST["submitted"]) )
    { 
        $email = trim($_POST["email"]);

        $username = trim($_POST["uname"]);
    

        $password = trim($_POST["pswd"]);
        $repass = trim($_POST["pswdr"]);
       // $avator= trim($_POST["gender"]);

        // valditing email
        $emailMatch = preg_match($reg_Email, $email);
        if($email == null || $email == "" || $emailMatch == false)
            {
                $validate = false;
            }
        // valditing username
        $userMatch = preg_match($reg_user, $username );
        if($username == null || $username == "" || $userMatch ==false){
            $validate = false;
        }   
        // valditing passowrd and repassowrd
        $pswdLen = strlen($password);
        $pswdMatch = preg_match($reg_Pswd, $password);
        if($password == null || $password == "" || $pswdLen< 8 || $pswdMatch == false)
            {
            $validate = false;
            }
        
        if($repass == null || $repass == "" || $repass !=$password)
            {
                $validate = false;
            }
        
        
        // if validate add to database
        if($validate == true){
            include 'database.php';

            $add = "INSERT INTO Users (UserName, Email, Password, Avator)
            VALUES('$username','$email',  '$password', '$avator')";
                $r2 = $conn->query($add);
            
            if ($r2 === true)
            {
                header("location: login.php");
                $conn->close();
                exit();
            }
        }
        else{
            echo  "Signup failed. Try again";
            
        
        }

    }
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="Main.css">
    <script type="text/javascript" src="main.js"> </script>
    
    <title>Sign Up</title>
</head>
<body class="signupbody">

     <div id="cont-pic"  >  
         <p class ="box data">sign up to create and vote. text textsign up to create and vote. text text
            sign up to create and vote. text text
            sign up to create and vote. text text </p> 
          <img id="singuppic" src="singuppic.png" alt="a picture">
    </div>
    
<div  id="signupForm">
    <form method="post" id="signup" action="signup.php" class="signup" >
        <h1 >Sign Up</h1><br>
        <label  class="name ">Email</label><br>
        <p class="err_msg" id="email_msg"></p>
        <input name="email" id="mail" type="username" placeholder="email@example.com" ><br>
        <label  class="name">Username</label><br>
        <p class="err_msg" id="uname_msg"></p>
        <input  name="uname"  id="uname" type="username" placeholder="Username" ><br>
        <label  class="name">Passowrd</label><br>
        <p class="err_msg" id="pswd_msg"></p>
        <input  name="pswd"  id="pass"  type="password" placeholder="Password(8 character long + 1 non letter)" ><br>
        <label class="name">Confirm Passowrd</label><br>
        <p class="err_msg" id="pswdr_msg" ></p>
        <input  name="pswdr" id="r_pass" type="password" placeholder="Password" ><br>



        <label  class="name">Avator:</label><br>
        <p class="err_msg" id="avator_msg"></p>

        <input type="radio" id="male" name="gender" value="Signupfemale.png"> <img src="Signupfemale.png">
        
        <input type="radio" id="female" name= "gender" value="Signupmale.png"><img src="Signupmale.png">
       


        <button name ="submitted" type="submit" class="submitbtn">Sign Up</button><br>
        <span class="spn">Have an account <a href="login.php">Sign In</a></span>
    </form>



</div>


<script type="text/javascript" src="Validate-Signup.js"> </script>
</body>
</html> 
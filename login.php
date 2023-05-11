
<?php
if (isset($_POST["submitted"]) )
{ 

    


    $username = trim($_POST["uname"]);
    $password = trim($_POST["pswd"]);

    if (strlen($username)>0 && strlen($password)>0){
        include 'database.php';
        $matching = "SELECT UserId, UserName FROM Users
        WHERE UserName = '$username' AND Password = '$password'";
        
        $result= $conn->query($matching);
        if($row = $result->fetch_assoc()){
        
            session_start();
            $_SESSION["User_id"] = $row["UserId"];
            $_SESSION["User_name"] = $row["UserName"];
            header("Location: Account.php");
            $conn->close();
            exit();
        } else
        {
            $error = "The email/password combination was incorrect. Login failed.";
            $conn->close();
        }

    }else
    {
        $error = "Login failed.";
    }
}

?>


<!DOCTYPE html>
<html>

<header>
    <link rel="stylesheet" href="Main.css">
    <script type="text/javascript" src="main.js"> </script>

    <title>Main</title>
</header>

<body class="signupbody">

    <div class="main-info">
       <p class="box">Login in to vote and create polls.
        Login in to vote and create polls.
        Login in to vote and create polls.
       </p> 
      
        <img id="Mainpic" src="mainpage.png" alt="a picture">
             
       
    </div>
<div  id="signForm">
    <form action="login.php" id= "signin" class="signin box" method="post" >
        <h1 class="hi">Sign In</h1><br>
        <label class="name">Username:</label><br>
        <p class="err_msg" id="uname_msg"></p>
        <input name="uname" id="uname" type="username" placeholder="Username" ><br>
        <label class="name">Passowrd:</label><br>
        <p class="err_msg" id="pswd_msg"></p>
        <input name="pswd"  id="pass" type="password" placeholder="Password" ><br>


        <button name= "submitted" type="submit" class="submitbtn">Sign In</button><br>
        <span class="spn">Don't have an account <a href="signup.php">Sign Up</a></span>
    </form>
</div>



<script type="text/javascript" src="Validate-Login.js"> </script>

</body>

</html>
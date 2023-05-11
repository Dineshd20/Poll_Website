<?php
session_start();
if (!isset($_SESSION["User_id"]) && !isset($_SESSION["User_name"]))

{echo $_SESSION;
    header("Location: login.php");
    die();
}
else 
{
    $id= $_SESSION["User_id"] ;
   
// getting info about user
    include 'database.php';
    $info = "Select * FROM Users WHERE UserId = '$id'";
                
    $r1 = $conn->query($info);

    $row = $r1->fetch_assoc();
                
        $avator= $row["Avator"];
        $email = $row["Email"];
  


// changing password 

    if (isset($_POST["submitted"]))
    { 

        $reg_Pswd = "/^(\S*)?\d+(\S*)?$/";
        $validate= true;

        $oldpass = trim($_POST["oldpass"]);

        $newpassword = trim($_POST["newpass"]);
        
        $newRpassword = trim($_POST["newRpass"]);
        $av = trim($_POST["gender"]);
       
        // valditing password

       
        
       // if($av=='Signupfemale.png' OR $av== 'Signupmale.png' )
        //{echo"Avator missing.  ";
        //    $validate =true;
        //}
        $pswdLen = strlen($newpassword);
        $pswdMatch = preg_match($reg_Pswd, $newpassword);
        if($newpassword == null || $newpassword == "" || $pswdLen< 8 || $pswdMatch == false)
            {   echo "<h4 class='err_msg'>
                Password must contain one number and be at least 8 letter long.</h4><br>";
           
            $validate = false;
            }
        
        if($newRpassword == null || $newRpassword == "" || $newRpassword !=$newpassword)
            {
                $validate = false;
            }
        
            if($validate ==true){

                include 'database.php';
                $infoo = "Select Password FROM Users WHERE UserId = '$id'";
                
                $r1 = $conn->query($infoo);
            
                $row = $r1->fetch_assoc();
                            
                    $pas= $row["Password"];
                if($pas == $newpassword){
                    $change = "UPDATE users
                    SET Password = '$newpassword', Avator = '$av'
                    WHERE  UserId  ='$id'";
     $r2 = $conn->query($change);
     echo "<h4 class='err_msg'> done </h4><br>";  
                }else{
                    echo "<h4 class='err_msg'> dont match</h4><br>";  
                }
              /*
                $change = "UPDATE users
                SET Password = '$newpassword', Avator = '$av'
                WHERE  UserId  ='$id' AND Password = '$oldpass' ";
                
               // $r2 = $conn->query($change);
                $r2 = mysqli_query($conn, $change);
                if ($r2 === true)
                {
                   
                header("location: login.php");
                $conn->close();
                    exit();
                }else{
                    echo "<h4 class='err_msg'> Try again</h4><br>";
                }*/
            }
            else{
                echo "<h4 class='err_msg'>Try again with proper inputs</h4><br>";
              
            }

    }

}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="Main.css">
    <script type="text/javascript" src="main.js"> </script>

    <title>Account</title>
</head>
<body>
    <h1 class="hi">My Account</h1>
   
    <a href="logout.php">Logout</a>

    <h3>Username:</h3><br>
    <div class= "userInfo"><?= $_SESSION["User_name"]?></div>
    <h3>Current Email:</h3><br>
    <div class= "userInfo"><?= $email;?></div>
    <h3>Current Avator:</h3> <br>
    <div class= "userInfo"><img src="<?= $avator;?>"></div><br>
    <p id="error"></p>

    <button  id="change_accountBtn"><span>Change Password and Avator </span></button><br>
 
    
    <div id="show_info">

        <h2>Change Password or Avator</h2><br>
        <form id="changepass" action="Account.php" method= "post">
                <label class="name"> Old Passowrd:</label><br>
              
                <input name="oldpass" id="field" type="password" placeholder="Old Password" ><br>

                <label class="name"> New Passowrd:</label><br>
                <p class="err_msg" id="pswd_msg"></p>
                <input name="newpass" id="pass" type="password" placeholder="New Password" ><br>

                <label class="name">Confirm New Passowrd</label><br>
                <p class="err_msg" id="pswdr_msg" ></p>
                <input name="newRpass" id="pass" type="password" placeholder="New Password" ><br>

                <label  class="name">Avator:</label><br>
                <p class="err_msg" id="avator_msg"></p><br>
        
                <input type="radio" id="male" name="gender" value="Signupmale.png"> 
                <img src="Signupmale.png">
                <input type="radio" id="female" name= "gender" value="Signupfemale.png"> 
                <img src="Signupfemale.png"><br>

                <button name= "submitted" type="submit" class="submitbtn">Update</button><br>
        </form>
        
    </div>

      
    

        <script type="text/javascript" src="Validate-Account.js"> </script>

</body>
</html>
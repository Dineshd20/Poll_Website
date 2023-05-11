<?php
// changing password 

if (isset($_POST["submitted"]))
{ 
echo "hellop";
   $reg_Pswd = "/^(\S*)?\d+(\S*)?$/";
    
   $validate = false;
   echo $validate;
    $oldpass = trim($_POST["oldpass"]);

    $newpassword = trim($_POST["newpass"]);
    
    $newRpassword = trim($_POST["newRpass"]);
 
   
    // valditing password
    $pswdLen = strlen($newpassword);
    $pswdMatch = preg_match($reg_Pswd, $newpassword);
    if($newpassword == null || $newpassword == "" || $pswdLen< 8 || $pswdMatch == false)
        {
        $validate = false;
        echo "pasword wrong";
        }
    
    if($newRpassword == null || $newRpassword == "" || $newRpassword !=$newpassword)
        {
            $validate = false;
            echo $validate;
        }
    
        if($validate =true){
            echo $validate;
            include 'database.php';
            $change = "UPDATE users
            SET Password = '$newpassword', Avator = '$av'
            WHERE Password = '$oldpass' AND UserId  ='$id'";
             echo "changed";
            $r2 = $conn->query($change);
            
           /* if ($r2 === true)
            {
             
            header("location: login.php");
            $conn->close();
                exit();
            }else{
                echo "Try again";
            }*/
        }
        else{
            echo "failed. Try again";
        }
    }
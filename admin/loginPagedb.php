<?php
session_start();
echo"Page Load";

if($_SERVER["REQUEST_METHOD"] == "POST"){
echo"inside post";
    $username=$_POST["username"];
    $password=$_POST['password'];
   
   if(isset($_POST['Login'])){
    echo"login Page";
    echo "<br>Username  : ".$username;
    echo "<br>Password : ".$password;
    if($username=="admin" && $password=="1234"){  //AIT -1
       $_SESSION[username]=$username;
        header("location: ./home.php");
    }else{
        $_SESSION['MessageAdmin']="UserId or password is incorrect";
        header("location: ./loginPage.php");
    }


   }
   if(isset($_POST['cancelbtn'])){
    header("location: ./loginPage.php");
   
    }
    if(isset($_POST['logout'])){
        unset($_SESSION[username]);
        $_SESSION['MessageAdmin']="Admin Logout Successfully.";
        header("location: ./loginPage.php");
       
        }
        
}

?>

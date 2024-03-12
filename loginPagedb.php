<?php
include("./config.php");
session_start();
echo"Page Load";

if($_SERVER["REQUEST_METHOD"] == "POST"){
echo"inside post";
    $username=$_POST["username"];
    $password=$_POST['password'];
    // echo "<br>Username  : ".$username;
    // echo "<br>Password : ".$password;


    if(isset($_POST['Login'])){
        echo"login Page";
        echo "<br>Username  : ".$username;
        echo "<br>Password : ".$password;
        
        $query1="select * from TEACHER where username= '$username'"; // Fetch all the data from the table customers
        $resultId=mysqli_query($conn,$query1);

        if ($resultId->num_rows > 0){
          $Rid=mysqli_fetch_row($resultId);
          $checkId=$Rid[5];
          $pass=$Rid[6];
          if ($checkId===$username){
            if($pass=$password){
                $_SESSION['teacherId']=$Rid[0];
                $_SESSION['teacherName']=$Rid[1];
                $_SESSION['subjectName']=$Rid[2];
                $_SESSION['subjectCode']=$Rid[10];
                $_SESSION['teacherEmail']=$Rid[3];
                $_SESSION['teacherContact']=$Rid[4];
                $_SESSION['teacherUserName']=$Rid[5];
                $_SESSION['subjectDescription']=$Rid[7];
                $_SESSION['tblName']=$Rid[8];
                $_SESSION['attendTblName']=$Rid[9];
                // $_SESSION['attendtblName']="attendence";
                // $_SESSION['tblName']="ait";
                
                header("location: ./teacher/home.php");
            }else{
                $_SESSION['MessageLogin']="UserId or password is incorrect";
                header("location: ./index.php");
            } 
        }else{
            // echo "Error" .$query1 . "<br>" . mysqli_error($conn);
        }
    
        }else{
            $_SESSION['MessageLogin']="UserId or password is incorrect";
            header("location: ./index.php");
        }
        
    }







    if(isset($_POST['LoginPp'])){
    echo"login Page";
    echo "<br>Username  : ".$username;
    echo "<br>Password : ".$password;
    if($username=="ait@123" && $password=="1234"){  //AIT -1
       $_SESSION[username]=$username;
        header("location: ./ait/home.php");
    }elseif($username=="adbms@123" && $password=="1234"){ //ADBMS-2
        $_SESSION[username]=$username;
        header("location: ./adbms/home.php");
    }elseif($username=="ot@123" && $password=="1234"){ //OT-3
        $_SESSION[username]=$username;
        header("location: ./ot/home.php");
    }elseif($username=="python@123" && $password=="1234"){ //Python -4
        $_SESSION[username]=$username;
        header("location: ./python/home.php");
    }elseif($username=="spm@123" && $password=="1234"){ //SPM-5
        $_SESSION[username]=$username;
        header("location: ./spm/home.php");
    }else{
        $_SESSION['Message']="UserId or password is incorrect";
        header("location: ./index.php");
    }




   }


   //code for Cnacel btn 
   if(isset($_POST['cancelbtn'])){
    header("location: ./index.php");
   
    }
    
}

?>

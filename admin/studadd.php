<?php
require_once "../config.php";
echo"Page Load Jhal";
session_start();
    

if($_SERVER["REQUEST_METHOD"] == "POST"){
   
    $studId = $_POST["studId"];
    $studName = $_POST["studName"];
   
        //  Start Code for Update Product
      if(isset($_POST["Update"])){
        echo "<br>Student Roll No : ".$studId;
    echo "<br>Student Name : ".$studName;
   
        if(!empty($studId)&&!empty($studName)){
          
          $query1="select RollNo from student where RollNo= $studId"; // Fetch all the data from the table customers
          $resultId=mysqli_query($conn,$query1);
  
          if ($resultId->num_rows > 0){
            $Rid=mysqli_fetch_row($resultId);
            $checkId=$Rid[0];
            if ($checkId===$studId){
              $sql = "Update student set studentName = '$studName' where RollNo= $studId";
              if(mysqli_query($conn, $sql)){
                echo "Student Data Update Successfully...!";
                $_SESSION['Message']="Student ID ".$studId." Details Update Successfully...!";

                header("location: studTable.php");
                  
                 
                // mysqli_free_result($resultLast); 
              

              }else{
                echo "Error" .$sql . "<br>" . mysqli_error($conn);
                // alert("Error" .mysqli_error($link));
                // echo '<script>alert("Error Data Already Exist")</script>'; 
                $_SESSION['Message']="Student ".$studId." Already Exist..!";
              }
            }else{
              $_SESSION['Message']="Student ".$studId." Not Found for Update.!";
            }
              
            }  
            else{
              $_SESSION['Message']="Student Id Not Found For Update...!";
            }
                  mysqli_close($conn);
        }
      }
      // END for Code for Update Product.

      if(isset($_POST["Details"])){
        $_SESSION['studId']=$studId;
        $_SESSION['studName']=$studName;

       echo " Stud Val : ".$_SESSION['studId']; 
        header("location: ./details.php");
      }

}
?>
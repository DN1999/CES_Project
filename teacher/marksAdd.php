<?php
require_once "../config.php";
echo"Page Load Jhal";
session_start();
if(isset($_SESSION['tblName'])){
  $tblName=$_SESSION['tblName'];    
  $attendTblName=$_SESSION['attendTblName'];

if($_SERVER["REQUEST_METHOD"] == "POST"){
   
    $studId = $_POST["studId"];
    $studName = $_POST["studName"];
    $convertTotal=$_POST['convertTotal'];
   

     //  Start Code for Update Attemdence Marks
  if(isset($_POST["UpdateAttendence"])){
    //variable Internal Exam
    $month1=$_POST['month1'];
    $month2=$_POST['month2'];
    $month3=$_POST['month3'];
    $month4=$_POST['month4'];

    $totalAttendence=$_POST['totalAttendence'];
    $totalAttendence=$month1+$month2+$month3+$month4;
    // $convertTotal=$_POST['convertTotal'];
    $convertTotal=($totalAttendence/83)*50;

    echo "<br>Student Roll No : ".$studId;
    echo "<br>Student Name : ".$studName;
    echo "<br>month1 : ".$month1;
    echo "<br>month2 : ".$month2;
    echo "<br>month3 : ".$month3;
    echo "<br>month4 : ".$month4;
    echo "<br>Convert Marks : ".$convertTotal;
    echo "<br>";
    if(!empty($month1)||$month1==0&&!empty($month2)||$month2==0 && !empty($month3)||$month3==0 && !empty($month4)||$month4==0){
      
      $query1="select RollNo from $attendTblName where RollNo= $studId"; // Fetch all the data from the table customers
      $resultId=mysqli_query($conn,$query1);
     echo "query1 execute"."<br>";
      if ($resultId->num_rows > 0){
        $Rid=mysqli_fetch_row($resultId);
        $checkId=$Rid[0];
        if ($checkId===$studId){
          $sql = "Update $attendTblName set  may='$month1', june='$month2', july='$month3', aug='$month4',totalAttendence='$totalAttendence',attendenceConvertM='$convertTotal' where RollNo= $studId";
           echo " Stude ID query1 execute".$studId."<br>";
         
          if(mysqli_query($conn, $sql)){
            echo "Student Data Update Successfully...!";
            $_SESSION['MessageMarks']="Student ID ".$studId." Marks Update Successfully...!";

            header("location: attendence.php");
              
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
  // END for Code for Update Attendence Marks.

   
    //  Start Code for Update Practical Viva  Marks
  if(isset($_POST["UpdatePracticalViva"])){
    //variable Internal Exam
    $practicalViva=$_POST['practicalViva'];
     
    echo "<br>Student Roll No : ".$studId;
    // echo "<br>Student Name : ".$studName;
    echo "<br>mcqment-1 : ".$practicalViva;

    if(!empty($practicalViva)||$practicalViva==0){
      
      $query1="select RollNo from $tblName where RollNo= $studId"; // Fetch all the data from the table customers
      $resultId=mysqli_query($conn,$query1);

      if ($resultId->num_rows > 0){
        $Rid=mysqli_fetch_row($resultId);
        $checkId=$Rid[0];
        if ($checkId===$studId){
          $sql = "Update $tblName set  practicalViva= '$practicalViva' where RollNo= $studId";
          if(mysqli_query($conn, $sql)){
            echo "Student Data Update Successfully...!";
            $_SESSION['MessageMarks']="Student ID ".$studId." Marks Update Successfully...!";

            header("location: practicalViva.php");
              
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
  // END for Code for Update Practical Viva  Marks.

   
 
    //  Start Code for Update Internal Exam Marks
       if(isset($_POST["UpdateInternalExam"])){
        //variable Internal Exam
        $internalEx1=$_POST['internalEx1'];
        $internalEx2=$_POST['internalEx2'];
        // $totalInternalEx=$_POST['totalInternalEx'];
        $totalInternalEx=$internalEx1+$internalEx2;
        // $convertTotal=$_POST['convertTotal'];
        $convertTotal=($totalInternalEx/100)*50;
        
        echo "<br>Student Roll No : ".$studId;
        // echo "<br>Student Name : ".$studName;
        echo "<br>mcqment-1 : ".$internalEx1;
        echo "<br>mcqment-2 : ".$internalEx2;
        echo "<br>totalmcq : ".$totalInternalEx."<br>";  
                      
        if(!empty($internalEx1)||$internalEx1==0  &&!empty($internalEx2)||$internalEx2==0){
          
          $query1="select RollNo from $tblName where RollNo= $studId"; // Fetch all the data from the table customers
          $resultId=mysqli_query($conn,$query1);
  
          if ($resultId->num_rows > 0){
            $Rid=mysqli_fetch_row($resultId);
            $checkId=$Rid[0];
            if ($checkId===$studId){
              $sql = "Update $tblName set  internalEx1= '$internalEx1', internalEx2 = '$internalEx2', internalExTotal='$totalInternalEx',
                  internalExConvertM='$convertTotal'  where RollNo= $studId";
              if(mysqli_query($conn, $sql)){
                echo "Student Data Update Successfully...!";
                $_SESSION['MessageMarks']="Student ID ".$studId." Marks Update Successfully...!";
  
                header("location: internalExam.php");
                  
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
      // END for Code for Update Internal Exam Marks.
    
    //  Start Code for Update MCQ Marks
     if(isset($_POST["UpdateMcq"])){
        $mcq1=$_POST["mcq1"];
        $mcq2=$_POST['mcq2'];
        $mcq3=$_POST['mcq3'];
        $mcq4=$_POST['mcq4'];
        $mcq5=$_POST['mcq5'];
        // $totalmcq=$_POST['total'];
        $totalmcq=$mcq1+$mcq2+$mcq3+$mcq4+$mcq5;
        // $convertTotal=$_POST['convertTotal'];
        $convertTotal=($totalmcq/50)*50;
    
      echo "<br>Student Roll No : ".$studId;
      echo "<br>Student Name : ".$studName;
      echo "<br>mcqment-1 : ".$mcq1;
      echo "<br>mcqment-2 : ".$mcq2;
      echo "<br>mcqment-3 : ".$mcq3;
      echo "<br>mcqment-4 : ".$mcq4;
      echo "<br>mcqment-5 : ".$mcq5;
      echo "<br>totalmcq : ".$totalmcq."<br>";  
                    
      if(!empty($mcq1)||$mcq1==0  &&!empty($mcq2)||$mcq2==0  && !empty($mcq3)||$mcq3==0 && !empty($mcq4)||$mcq4==0 && !empty($mcq5)||$mcq5==0){
        
        $query1="select RollNo from $tblName where RollNo= $studId"; // Fetch all the data from the table customers
        $resultId=mysqli_query($conn,$query1);

        if ($resultId->num_rows > 0){
          $Rid=mysqli_fetch_row($resultId);
          $checkId=$Rid[0];
          if ($checkId===$studId){
            $sql = "Update $tblName set  mcq1= '$mcq1', mcq2 = '$mcq2', mcq3 = '$mcq3', mcq4 ='$mcq4', mcq5= '$mcq5', mcqtotal='$totalmcq',
                mcqConvertM='$convertTotal'  where RollNo= $studId";
            if(mysqli_query($conn, $sql)){
              echo "Student Data Update Successfully...!";
              $_SESSION['MessageMarks']="Student ID ".$studId." Marks Update Successfully...!";

              header("location: mcq.php");
                
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
    // END for Code for Update MCQ.
    
    
    //  Start Code for Update mcqment
      if(isset($_POST["UpdateAssign"])){
        $assign1=$_POST["assign1"];
        $assign2=$_POST['assign2'];
        $assign3=$_POST['assign3'];
        $assign4=$_POST['assign4'];
        $assign5=$_POST['assign5'];
        // $totalAssign=$_POST['total'];
        $totalAssign=$assign1+$assign2+$assign3+$assign4+$assign5;
        // $convertTotal=$_POST['convertTotal'];
        $convertTotal=($totalAssign/25)*50;
    
     
        echo "<br>Student Roll No : ".$studId;
        echo "<br>Student Name : ".$studName;
        echo "<br>Assignment-1 : ".$assign1;
        echo "<br>Assignment-2 : ".$assign2;
        echo "<br>Assignment-3 : ".$assign3;
        echo "<br>Assignment-4 : ".$assign4;
        echo "<br>Assignment-5 : ".$assign5;
        echo "<br>totalAssign : ".$totalAssign."<br>";  
        echo "<br>Convertotal : ".$convertTotal."<br>";  
                  
        if(!empty($assign1)||$assign1==0  &&!empty($assign2)||$assign2==0  && !empty($assign3)||$assign3==0 && !empty($assign4)||$assign4==0 && !empty($assign5)||$assign5==0){
          $query1="select RollNo from $tblName where RollNo= $studId"; // Fetch all the data from the table customers
          $resultId=mysqli_query($conn,$query1);
  
          if ($resultId->num_rows > 0){
            $Rid=mysqli_fetch_row($resultId);
            $checkId=$Rid[0];
            if ($checkId===$studId){
              $sql = "Update $tblName set  assign1= '$assign1', assign2 = '$assign2', assign3 = '$assign3', assign4 ='$assign4', assign5= '$assign5', assigntotal='$totalAssign',
              assignConvertM='$convertTotal'  where RollNo= $studId";
              if(mysqli_query($conn, $sql)){
                echo "Student Data Update Successfully...!";
                $_SESSION['MessageMarks']="Student ID ".$studId." Marks Update Successfully...!";

                header("location: assignment.php");
                  
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
      
      
      if(isset($_POST["logout"])){
        $_SESSION['logout']="Logout Sucessfully..!";
        echo "Logout Sucessfully";
        header("location: ../logout.php");

      }


    }

}
?>
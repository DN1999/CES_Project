<?php
require_once "../config.php";
echo"Page Load Jhal";
session_start();
    

if($_SERVER["REQUEST_METHOD"] == "POST"){
   
    $teacherId = $_POST["teacherId"];
    $teacherName = $_POST["teacherName"];
    $subjectName = $_POST["subjectName"];
    $subjectDescription = $_POST["subjectDescription"];
    $email = $_POST["email"];
    $contactno = $_POST["contactno"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $tblName = $_POST["tblName"];
    $attendTblName = $_POST["attendTblName"];
    $subjectCode = $_POST["subjectCode"];
    
         //  Start Code for Update Product
         if(isset($_POST["AddTeacher"])){
                    echo "<br>Student Roll No : ".$teacherId;
                    echo "<br>Student Name : ".$teacherName;
            
                    if(!empty($teacherId)&&!empty($teacherName)&&!empty($email)&&!empty($contactno)&&!empty($username)&&!empty($password)){
                    
                    $query1="select tid from teacher where tid= $teacherId"; // Fetch all the data from the table customers
                    $resultId=mysqli_query($conn,$query1);
            
                    if ($resultId->num_rows > 0){
                        echo "Already exist";
                        $_SESSION['MessageTeacher']="Teacher ID ".$teacherId." Already Exist...!";
                        header("location: teacherAdd.php");
                    }else{

                        $sql = "insert into teacher(tid,tname,sname, email,contactno,username,password) values('$teacherId','$teacherName','$subjectName','$email','$contactno', '$username', '$password')";
                        if(mysqli_query($conn, $sql)){
                        echo "Teacher Data Insert Successfully...!";
                        $_SESSION['MessageTeacher']="Teacher ID ".$teacherId." Details Add Successfully...!";
        
                          header("location: teacherAdd.php");
                            
                        
                        // mysqli_free_result($resultLast); 
                        
        
                        }else{
                        echo "Error" .$sql . "<br>" . mysqli_error($conn);
                        // alert("Error" .mysqli_error($link));
                        // echo '<script>alert("Error Data Already Exist")</script>'; 
                        $_SESSION['Message']="Student ".$teacherId." Already Exist..!";
                        }    
                    
                            mysqli_close($conn); 
                     
                    }
                }
          }
          // END for Code for Add Teacher.
     
    
    
    //  Start Code for Update Teacher
      if(isset($_POST["Update"])){
        echo "<br>Student Roll No : ".$teacherId;
        echo "<br>Student Name : ".$teacherName;
        echo "Subject Code ".$subjectCode;
   
        if(!empty($teacherId)&&!empty($teacherName)&&!empty($email)&&!empty($contactno)&&!empty($username)&&!empty($password)){
         
          $query1="select tid from teacher where tid= $teacherId"; // Fetch all the data from the table teacher
          if(!mysqli_query($conn,$query1)){
            echo"success";
          }else{
            $_SESSION['MessageTeacher']="Teacher ".$username." Username already Exist...!";
            header("location: teacher.php");
             echo"Fail";
          }
          $resultId=mysqli_query($conn,$query1);
  
          if ($resultId->num_rows > 0){
            $Rid=mysqli_fetch_row($resultId);
            $checkId=$Rid[0];
            if ($checkId===$teacherId){
              
              //Fetch data From Course
              $query1 = "select * from course where subjectCode=$subjectCode";      
              $data1 = mysqli_query($conn,$query1);
              $total1 = mysqli_num_rows($data1);
              if($data1->num_rows>0){
                  $var=0;
            while($array1 = mysqli_fetch_row($data1)){
              $subjectName=$array1[1];
              $subjectDescription=$array1[2];
            }
          }
            $sql = "Update teacher set tname = '$teacherName',sname = '$subjectName', email='$email', contactno='$contactno', username='$username', 
            password='$password',description='$subjectDescription',dbtblName='$tblName',attendtblName='$attendTblName', subjectCode='$subjectCode' where tid= $teacherId";
              if(mysqli_query($conn, $sql)){
                echo "Teacher Data Update Successfully...!";
                $_SESSION['MessageTeacher']="Teacher ID ".$teacherId." Details Update Successfully...!";
                header("location: teacher.php");
                // mysqli_free_result($resultLast); 
              }else{
                // echo "Error" .$sql . "<br>" . mysqli_error($conn);
                alert("Error" .mysqli_error($link));
                // echo '<script>alert("Error Data Already Exist")</script>'; 
                $_SESSION['Message']="Student ".$teacherId." Already Exist..!";
              }
            }else{
              $_SESSION['Message']="Student ".$teacherId." Not Found for Update.!";
            }
              
            }  
            else{
              $_SESSION['Message']="Student Id Not Found For Update...!";
            }
                  mysqli_close($conn);
        }
      }
      // END for Code for Update Teacher.

      if(isset($_POST["Details"])){
        $_SESSION['teacherId']=$teacherId;
        $_SESSION['teacherName']=$teacherName;

       echo " Stud Val : ".$_SESSION['teacherId']; 
        header("location: ./details.php");
      }

      if(isset($_POST["cancelAddbtn"])){
        header("location: ./teacherAdd.php");
      }
}
?>
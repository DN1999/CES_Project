<?php
require_once "../config.php";
echo"Page Load Jhal";
session_start();
    

if($_SERVER["REQUEST_METHOD"] == "POST"){
   
    $subjectCode = $_POST["subjectCode"];
    $subjectName = $_POST["subjectName"];
    $subjectDescription = $_POST["subjectDescription"];
    $courseName = $_POST["courseName"];
    $semister = $_POST["semister"];
       
         //  Start Code for Update Product
         if(isset($_POST["AddCourse"])){
                    echo "<br>Subject ID : ".$subjectCode;
                    echo "<br>Subject Name : ".$subjectName;
            
                    if(!empty($subjectCode)&&!empty($subjectName)&&!empty($subjectDescription)&&!empty($courseName)&&!empty($semister)){
                    
                    $query1="select subjectCode from course where subjectCode= $subjectCode"; // Fetch all the data from the table Course
                    $resultId=mysqli_query($conn,$query1);
            
                    if ($resultId->num_rows > 0){
                        echo "Already exist";
                        $_SESSION['Messagesubject']="subject ID ".$subjectId." Already Exist...!";
                        header("location: subjectAdd.php");
                    }else{
                        $sql = "insert into course(subjectCode,subjectName,subjectDescription, courseName,semister) values('$subjectCode','$subjectName','$subjectDescription','$courseName','$semister')";
                        if(mysqli_query($conn, $sql)){
                        echo "subject Data Insert Successfully...!";
                        $_SESSION['MessageCourse']="Subject Code ".$subjectCode." Details Add Successfully...!";
        
                          header("location: courseAdd.php");
                            
                        
                        // mysqli_free_result($resultLast); 
                        
        
                        }else{
                        echo "Error" .$sql . "<br>" . mysqli_error($conn);
                        // alert("Error" .mysqli_error($link));
                        // echo '<script>alert("Error Data Already Exist")</script>'; 
                        $_SESSION['Message']="Subject ".$subjectId." Already Exist..!";
                        }    
                    
                            mysqli_close($conn); 
                     
                    }
                }
          }
          // END for Code for Add subject.
     
    
    
    //  Start Code for Update subject
      if(isset($_POST["Update"])){
        echo "<br>Subject Code : ".$subjectCode;
        echo "<br>Subject Name : ".$subjectName;
   
        if(!empty($subjectCode)&&!empty($subjectName)&&!empty($subjectDescription)&&!empty($courseName)&&!empty($semister)){
          
          $query1="select subjectCode from course where subjectCode= $subjectCode"; // Fetch all the data from the table customers
          if(!mysqli_query($conn,$query1)){
            echo"success";
          }else{
            $_SESSION['MessageCourse']="subject ".$subjectCode." Username already Exist...!";
            header("location: course.php");
             echo"Fail";
          }
          $resultId=mysqli_query($conn,$query1);
  
          if ($resultId->num_rows > 0){
            $Rid=mysqli_fetch_row($resultId);
            $checkId=$Rid[0];
            if ($checkId===$subjectCode){
            $sql = "Update course set subjectName = '$subjectName',subjectDescription = '$subjectDescription', courseName='$courseName', semister='$semister' where subjectCode= $subjectCode";
              if(mysqli_query($conn, $sql)){
                echo "subject Data Update Successfully...!";
                $_SESSION['MessageCourse']="Subject Code ".$subjectCode." Details Update Successfully...!";

                header("location: course.php");
                  
                 
                // mysqli_free_result($resultLast); 
              

              }else{
                // echo "Error" .$sql . "<br>" . mysqli_error($conn);
                // alert("Error" .mysqli_error($link));
                // echo '<script>alert("Error Data Already Exist")</script>'; 
                $_SESSION['Message']="Subject ".$subjectCode." Already Exist..!";
              }
            }else{
              $_SESSION['Message']="Subject ".$subjectCode." Not Found for Update.!";
            }
              
            }  
            else{
              $_SESSION['Message']="Subject Id Not Found For Update...!";
            }
                  mysqli_close($conn);
        }
      }
      // END for Code for Update subject.

      if(isset($_POST["Details"])){
        $_SESSION['subjectId']=$subjectId;
        $_SESSION['subjectName']=$subjectName;

       echo " Stud Val : ".$_SESSION['subjectId']; 
        header("location: ./details.php");
      }

     
}
?>
<?php
   session_start();
   unset($_SESSION['teacherId']);
   unset($_SESSION['teacherName']);
   unset($_SESSION['subjectName']);
   unset($_SESSION['teacherEmail']);
   unset($_SESSION['teacherContact']);
   unset($_SESSION['teacherUserName']);
   unset($_SESSION['subjectDescription']);
   // $_SESSION['tblName']=$Rid[7];
   unset($_SESSION['tblName']);
   unset($_SESSION['attendtblName']);
   
   header("location: ./index.php");
?>
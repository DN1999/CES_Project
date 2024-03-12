<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <title>Home Page</title>
</head>
<body>
   <!-- NavBar Start -->
   <?php include("./header.php");?>
   <!-- NavBar End -->

 
      <div class="container pb-5">
      <div class="row">
         <?php if(isset($_SESSION['subjectDescription'])){?>
         <h1 class="text-center m-3 text-primary"><?php echo $_SESSION['subjectDescription']; ?> (<?php echo $_SESSION['subjectName']; ?>)</h1>
                    <p class="text-center text-danger"></p>
                    <?php }?>
      </div>
      <div class="card-body bg-light">
       <div class="container col-4">
      <div class="card-body   col-12 " style="margin-left:0%">
            <h5 class="p-1 m-1"> Teacher ID : <?php echo $_SESSION['teacherId'];?></h5>
            <h5 class="p-1"> Teacher Name : <?php echo $_SESSION['teacherName']; ?></h5>
            <h5 class="p-1"> Class Name : MCA-I SEM-II</h5>
            <h5 class="p-1"> Subject Name : <?php echo $_SESSION['subjectName']; ?></h5>
            <h5 class="p-1"> Subject Code : <?php echo $_SESSION['subjectCode']; ?></h5>
            <h5 class="p-1"> Email ID :  <?php echo $_SESSION['teacherEmail']; ?></h5>
            <h5 class="p-1"> Contact No:  <?php echo $_SESSION['teacherContact']; ?></h5>
            <h5 class="p-1"> User Name : <?php echo $_SESSION['teacherUserName']; ?></h5>
            <h5 class="p-1"> Subject Description : <?php echo $_SESSION['subjectDescription']; ?></h5>
          <?php
              //  echo "<br>".$_SESSION['teacherId'];
              //  echo "<br>".$_SESSION['teacherName'];
              //  echo "<br>".$_SESSION['subjectName'];
              //  echo "<br>".$_SESSION['teacherEmail'];
              //  echo "<br>".$_SESSION['teacherUserName'];
            ?>


        </div>
        </div>
      </div>
    </div>

  <!-- Footer start -->
    <?php include("./footer.php");?>
<!-- Footer ENd -->
</body>
</html>
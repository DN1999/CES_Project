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
        <h1 class="text-center m-3 text-primary">Students Home Page</h1>
      </div>
      <div class="card-body bg-light ">
        <div class="card-body  text-center col-12 ">
          <h4 class="p-1"> Student Records MCA-I SEM-II</h4>
        </div>
        <!-- <div class=" btn col-12">
            <input class="btn btn-info m-2" type="button" value="ADBMS" onclick="adbmsBtn();" id="adbmsbtn">   
            <input class="btn btn-info m-2" type="button" value="AIT" onclick="aitBtn();" id="aitbtn">   
            <input class="btn btn-info m-2" type="button" value="OT" onclick="otBtn();" id="otbtn">   
            <input class="btn btn-info m-2" type="button" value="Python" onclick="pythonBtn();" id="adbmsbtn">   
            <input class="btn btn-info m-2" type="button" value="SPM" onclick="spmBtn();" id="aitbtn">   
        </div> -->
        <div class=" container col-6">
        <div class="row">
          <div class="col bg-light">
              <form action="./subjectMarks.php" method="post">
                    <input type="hidden" name="tblName" value="adbmsMarks">
                    <input type="hidden" name="attendTblName" value="attendence">
                    <input type="hidden" name="subjectName" value="ADBMS">
                  <button class="btn btn-info m-2" name="subjectBtn">ADBMS</button>   
              </form>
          </div>
          <div class="col-md">
            <form action="./subjectMarks.php" method="post">
                  <input type="hidden" name="tblName" value="ait">
                  <input type="hidden" name="attendTblName" value="aitattendence">
                  <input type="hidden" name="subjectName" value="AIT">
                <button class="btn btn-info m-2" name="subjectBtn">AIT</button>   
            </form>
        </div>
        <div class="col bg-light">
          <form action="./subjectMarks.php" method="post">
                <input type="hidden" name="tblName" value="ot">
                <input type="hidden" name="attendTblName" value="otattendence">
                <input type="hidden" name="subjectName" value="OT">
               <button class="btn btn-info m-2" name="subjectBtn">OT</button>   
          </form>
          </div>
          <div class="col-md">
          <form action="./subjectMarks.php" method="post">
                <input type="hidden" name="tblName" value="python">
                <input type="hidden" name="attendTblName" value="pythonattendence">
                <input type="hidden" name="subjectName" value="Python Programming">
               <button class="btn btn-info m-2" name="subjectBtn">Python</button>   
          </form>
          </div>
          <div class="col-md">
          <form action="./subjectMarks.php" method="post">
                <input type="hidden" name="tblName" value="spm">
                <input type="hidden" name="attendTblName" value="spmattendence">
                <input type="hidden" name="subjectName" value="SPM">
               <button class="btn btn-info m-2" name="subjectBtn">SPM</button>   
          </form>
          </div>
        </div>
      </div>
        
        <div class="card-body  text-center col-12 ">
        <img src="../img/college.jpeg" alt="" style="height:200;">
        </div>

      </div>
    </div>
    <script>
     function adbmsBtn(){
          window.location.href="./subAdbms.php";    
        }
      function aitBtn(){
          window.location.href="./subAit.php";    
      }
     
      function otBtn(){
          window.location.href="./subOt.php";    
        }
        function pythonBtn(){
          window.location.href="./subPython.php";    
        }
        function spmBtn(){
          window.location.href="./subSpm.php";    
        }
    </script>
<!-- footer start -->
  <?php include("./footer.php");?>  
<!-- footer end -->
</body>
</html>


<?php
session_start();
?>
<!-- NavBar Start -->
 <nav class="navbar navbar-expand-lg navbar-light bg-dark m-3 border rounded ">
  <a class="navbar-brand text-white m-2 px-2 bg-success rounded"  href="home.php"><?php if(isset($_SESSION['teacherUserName'])){echo $_SESSION['teacherUserName'];}?></a>
  <!-- <a class="navbar-brand text-white m-2 px-2 bg-success rounded"  href="#">Teacher</a> -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse " id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <a class="nav-item nav-link  text-white active" href="./home.php">Home</a>
    
       <select class="rounded mx-1 p-2" onclick="studentChange();" id="optionStudent">
         <option  class="text-success mx-3" selected>Student</option> 
         <option value="1">Assignment Marks</option> 
         <option value="2">MCQ Marks</option>
         <option value="3"> Internal Exam </option>
         <option value="4"> Practical Viva</option>
         <option value="5"> Attendence </option>
      </select>
      
      <a class="nav-item nav-link text-white" href="./mainRecord.php">Main Record</a>

      <a class="nav-item nav-link text-white" href="./about.php">About</a>
      

      <script>
        function studentChange(){
            var id= document.getElementById("optionStudent").value;
            
            if(id==1){
              // document.getElementById("MCQ").selected=1;
              window.location.href="./assignment.php";
            }
            if(id==2){
              // document.getElementById("MCQ").click();
              window.location.href="./mcq.php";
            }
            if(id==3){
              // document.getElementById("MCQ").click();
              window.location.href="./internalExam.php";
            }
            if(id==4){
              // document.getElementById("MCQ").click();
              window.location.href="./practicalViva.php";
            }
            if(id==5){
              // document.getElementById("MCQ").click();
              window.location.href="./attendence.php";
            }
            
            // alert("Value :"+id);
        }
      </script>
      <form action="marksAdd.php" method="post">
         <button class="btn  btn-default rounded nav-link text-white" name="logout">Logout</button>
      </form>
      <!-- <a class="nav-item nav-link text-white" href="../loginPage.php">Logout</a> -->
      
    </div>
  </div>
</nav>
  <!-- NavBar End -->

<?php
  session_start();
?>
<!-- NavBar Start -->
 <nav class="navbar navbar-expand-lg navbar-light bg-dark m-3 border rounded ">
  <a class="navbar-brand text-success mx-4 m-1"  href="#"><b>Admin</b></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse " id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <a class="nav-item nav-link  text-white active" href="./home.php">Home</a>
      <!-- <a class="nav-item nav-link text-white" href="./studhome.php">Student</a> -->
      <select class="rounded mx-1 p-2" onclick="studentChange();" id="optionStudent">
         <option  class="text-success mx-3" selected>Student</option> 
         <option value="1">MCA-I SEM-I</option>
         <option value="2">MCA-I SEM-II</option>
         <option value="3">MCA-II SEM-III</option>
         <option value="4">MCA-II SEM-IV</option>
      </select>
   
      <a class="nav-item nav-link text-white" href="./teacher.php">Teacher</a>
      <a class="nav-item nav-link text-white" href="./course.php">Course</a>
      
      <form action="./loginPagedb.php" method="post">
        <button class="btn text-white" name="logout">Logout</button>
      </form>
      <!-- <a class="nav-item nav-link text-white" href="../index.php">Logout</a> -->
    </div>
    <script>
        function studentChange(){
            var id= document.getElementById("optionStudent").value;
            
            if(id==1){
              // document.getElementById("MCQ").selected=1;
              window.location.href="./studhome.php";
            }
            if(id==2){
              // document.getElementById("MCQ").click();
              // window.location.href="./mcq.php";
            }
            // alert("Value :"+id);
        }
      </script>

  </div>
</nav>
  <!-- NavBar End -->

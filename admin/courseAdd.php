<?php
// session_start();
include("../config.php");
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>table</title>
  </head>
  <body>
  <!-- NavBar Start -->
  <?php include("./header.php");?>
   <!-- NavBar End -->  
    <div class="container">
        <h1 class="text-center mt-4"> Course Records  </h1>
      </div>
     

            <div class="container text-center">
              <div class="card-body">
       
              </div>                
            </div>
            <div class="container">
                <div class="card-body d-flex">
                    <div class="card-body d-inline-block">
                        <!-- <h5>Student ID : </h5>
                        <h5>Student Name : </h5>

                        <h3>AIT Marks</h3> -->
           <div class ="container col-6">
                <div class="card-body bg-light rounded p-5 text-center">
                <form action="coursedb.php" method="post">
                  <h3 class="m-3 mx-5 text-success">Add Course Details</h3>
                  <?php if(isset($_SESSION['MessageCourse'])){?>
                    <p class="text-center text-danger"><?php echo $_SESSION['MessageCourse']; ?></p>
                    <?php unset($_SESSION['MessageCourse']); }?>
                    
                  <br>
                    <p class=" container mx-3"><label for="" class="mx-2"><b>Subject Code: </b></label> <input class=" rounded mx-2" type="number" value="" style="width:50%;"  name="subjectCode" id="subjectCode" required/></p>
                    <p class=" container mx-2"><label for="" class="mx-0"><b>Subject Code: </b></label> <input class=" rounded mx-2" type="number" value="" style="width:8rem;"  name="subjectCode" id="subjectCode" required/></p>
                    <p class="container mx-5"><label for=""><b>Subject Name:</b> </label> <input class="rounded mx-2" type="text" value=""  name="subjectName" id="subjectName" required/></p>
                    <p class="container mx-2"><label for=""><b>SubjectDescription:</b></label> <input class="rounded mx-2" type="text" value="" style="width:50%;"  name="subjectDescription" id="subjectDescription" required/></p>
                     <p class="mx-5"><label for=""><b>Course Name : &nbsp&nbsp</b></label>

                     <select class="rounded mx-3 p-1" onChange="courseChange();" id="optionCourse" style="width:8rem;" required>
                       <option value="" class="text-success mx-5" selected>select</option> 
                        <option value="1">MCA-I</option>
                        <option value="2">MCA-II</option>
                    </select>
                     <input class="rounded mx-2 m-1" type="hidden" value="" style="width:12rem;"  name="courseName" id="courseName" required/>
                     
                    </p>
                    <script>
                            function courseChange(){
                            var id= document.getElementById("optionCourse").value;
                                if(id==1){
                                    document.getElementById("courseName").value="MCA-I";
                                }else if(id==2){
                                    document.getElementById("courseName").value="MCA-II";
                                }else{
                                    document.getElementById("courseName").value="";
                                }
                            }
                        </script>
                     <p class="mx-5"><label for="" class="m-1"><b>SEMISTER :</b></label> 
                     <select class="rounded mx-3 p-1" onChange="semisterChange();" id="optionSemister" style="width:6rem;" required>
                       <option  value="" class="text-success mx-3" selected>select</option> 
                        <option value="1">SEM-I</option>
                        <option value="2">SEM-II</option>
                        <option value="3">SEM-III</option>
                        <option value="4">SEM-IV</option>
                    </select>
                    <input class="rounded mx-4 m-1" type="hidden" value="" style="width:12rem;"  name="semister" id="semister" required/>
                </p>
                        <script>
                            function semisterChange(){
                            var id= document.getElementById("optionSemister").value;
                                if(id==1){
                                    document.getElementById("semister").value="SEM-I";
                                }else if(id==2){
                                    document.getElementById("semister").value="SEM-II";
                                }else if(id==3){
                                    document.getElementById("semister").value="SEM-III";
                                }else if(id==4){
                                    document.getElementById("semister").value="SEM-VI";
                                }else{
                                    document.getElementById("semister").value="";
                                }
                            }
                        </script>
                    

                    <div class=" btn col-12">
                        <button class="btn btn-primary m-2" type="loginbtn" name="AddCourse">Add</button>
                        <input class="btn btn-primary" type="button" name="cancelAddbtn" value="Cancel" onClick="Cancel();"/>
                    </div>
                    <script>
                        function Cancel(){
                            document.getElementById("optionSemister").value="";
                            document.getElementById("optionCourse").value="";
                            document.getElementById("subjectCode").value="";
                            document.getElementById("subjectName").value="";
                            document.getElementById("subjectDescription").value="";

                        }
                    </script>
                    <div class=" btn col-12">
                      <a href="./teacher.php">Back to Teacher</a>    
                    </div>
              </form>   
           
                </div>
           
          </div>
c
                    </div> 
                
            </div>
    
    <!-- footer start -->
  <?php include("./footer.php");?>  
<!-- footer end -->

          <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>
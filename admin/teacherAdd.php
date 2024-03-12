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
        <h1 class="text-center mt-4"> Teacher Records  </h1>
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
                <form action="teacherdb.php" method="post">
                  <h3 class="m-3 mx-5 text-success">Add Teacher Details</h3>
                  <?php if(isset($_SESSION['MessageTeacher'])){?>
                    <p class="text-center text-danger"><?php echo $_SESSION['MessageTeacher']; ?></p>
                    <?php unset($_SESSION['MessageTeacher']); }?>
         
                  <br>
                    <p class="mx-5"><label for="" class="mx-2"><b>Teacher ID: </b></label> <input class=" rounded mx-4" type="number" value="" style="width:10rem;"  name="teacherId"/></p>
                    <p class="mx-5"><label for=""><b>Teacher Name:</b> </label> <input class="rounded mx-2 m-1" type="text" value="" style="width:15rem;"  name="teacherName" required/></p>
                    <p class="mx-5"><label for=""><b>Subject Name(Code): </b></label> 
                    <select class="rounded mx-3 p-1" onChange="courseChange();" id="optionCourse" style="width:12rem;" required>
                       <option value="" class="text-success mx-5" selected>select</option> 
                       <?php 
                         $query = "select * from course";      
                         $data = mysqli_query($conn,$query);
                         $total = mysqli_num_rows($data);
                         if($data->num_rows>0){
                             $var=0;
                       while($array = mysqli_fetch_row($data)){
                         ?> 
                        <option value="<?php echo $array[0];?>"><?php echo $array[1]."   (".$array[0].")"; ?></option>
                        <?php }   }?>
                      </select>
                    
                     <input class="rounded mx-2 m-1" type="hidden" value="" style="width:15rem;"  name="subjectCode" id="subjectCode" required/></p>
                    
                     <!-- <p class="mx-5"><label for=""><b>Subject Name: </b></label> <input class="rounded mx-2 m-1" type="text" value="" style="width:15rem;"  name="subjectName" required/></p> -->
                    <p class="mx-5"><label for=""><b>&nbsp&nbsp&nbspEmail ID:  &nbsp</b></label> <input class="rounded mx-4 m-1" type="email" value="" style="width:15rem;"  name="email" required/></p>
                    <p class="mx-5"><label for=""><b>Contact No : &nbsp&nbsp</b></label> <input class="rounded mx-2 m-1" type="number" value="" style="width:15rem;"  name="contactno" required/></p>
                    <p class="mx-5"><label for=""><b>User Name : &nbsp&nbsp</b></label> <input class="rounded mx-2 m-1" type="text" value="" style="width:15rem;"  name="username" required/></p>
                    <p class="mx-5"><label for=""><b>Password : &nbsp&nbsp</b></label> <input class="rounded mx-2 m-1" type="password" value="" style="width:15rem;"  name="password" required/></p>
                        

                    <div class=" btn col-12">
                        <button class="btn btn-primary m-2" type="loginbtn" name="AddTeacher">Add</button>
                        <button class="btn btn-primary" type="cancelbtn" name="cancelAddbtn">Cancel</button>
                    </div>
                    <div class=" btn col-12">
                      <a href="./teacher.php">Back to Teacher</a>    
                    </div>
              </form>   
           
            </div>
           
          </div>

        </div> 
                
      </div>
    
    <!-- footer start -->
  <?php include("./footer.php");?>  
<!-- footer end -->

          <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
          <script>
            function courseChange(){
            var id= document.getElementById("optionCourse").value;
                if(id!=""){
                    document.getElementById("subjectCode").value= document.getElementById("optionCourse").value;

                }else{
                    document.getElementById("subjectCode").value="";
                }
            }

          </script>
    
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>
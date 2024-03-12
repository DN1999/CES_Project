<?php
//  session_start();
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
   <br><br><br>
    <div class="container">
        <h1 class="text-center"> Teachers Records</h1>
        <?php if(isset($_SESSION['MessageTeacher'])){?>
                    <p class="text-center text-danger"><?php echo $_SESSION['MessageTeacher']; ?></p>
                    <?php unset($_SESSION['MessageTeacher']); }?>
         </div>
           <div class ="container">
           <div class ="table-responsive bg-light">
            <table class="table datatable">
            <thead>
              <tr>
 
               <!-- <th scope="col">Sr.No</th> -->
                <th scope="col">Teacher ID</th>
                <th scope="col">Teacher Name</th>
                <th scope="col">Subject Code</th>
                <th scope="col">Subject Name</th>
                <th scope="col">Subject Description</th>
                <th scope="col">Email ID</th>
                <th scope="col">Contact No</th>
                <th scope="col">User Name</th>
                <th scope="col">Password</th>
                <th scope="col">Subject <br>Table Name</th>
                <th scope="col">Attendence <br>Table Name</th>
                <th scope="col"> <a href="./teacherAdd.php" class="btn-sm btn-info"> Add New</a></th>

              </tr>
            </thead>
            <tbody>
               <?php
                include("../config.php");
                // $query = " select * from exceltable";      
                $query = "select * from teacher";      
                $data = mysqli_query($conn,$query);
                $total = mysqli_num_rows($data);
                if($data->num_rows>0){
              while($array = mysqli_fetch_row($data)){
                ?>
                
                <form action="teacherdb.php" method="post">
                
                <tr>
                    <th scope="row"><input type="hidden" value= "<?php echo $array[0];?>" name="teacherId"/><?php echo $array[0];?></th>
                    <td><input type="text" value="<?php echo $array[1];?>" name="teacherName"/></td>
                  
                      <?php 
                         $query1 = "select * from course where subjectCode=$array[10]";      
                         $data1 = mysqli_query($conn,$query1);
                         $total1 = mysqli_num_rows($data1);
                         if($data1->num_rows>0){
                             $var=0;
                       while($array1 = mysqli_fetch_row($data1)){
                         ?> 
                    <td><input type="text" value="<?php echo $array1[0];?>" style="width:5rem;"  name="subjectCode" id="subjectCode" required/>
                    </td>
                    <td><input type="text" value="<?php echo $array1[1];?>" style="width:6rem;"  name="subjectName" readonly/></td>
                    <td><input type="text" value="<?php echo $array1[2];?>" style="width:15rem;"  name="subjectDescription" readonly/></td>
                    <?php }   }?>
                    <td><input type="email" value="<?php echo $array[3];?>" style="width:15rem;" name="email" required/></td>
                    <td><input type="number" value="<?php echo $array[4];?>" style="width:8rem;" name="contactno" required/></td>
                    <td><input type="text" value="<?php echo $array[5];?>" style="width:8rem;" name="username" required/></td>
                    <td><input type="number" value="<?php echo $array[6];?>" style="width:8rem;" name="password" required/></td>
                    <td><input type="text" value="<?php echo $array[8];?>" style="width:8rem;" name="tblName" required/></td>
                    <td><input type="text" value="<?php echo $array[9];?>" style="width:8rem;" name="attendTblName" required/></td>
                    <td><button class="btn-sm btn-success" name="Update">Update</button></td>
                    <!-- <td><button class="btn-sm btn-primary " name="Details">Details</button></td> -->

                    
                </tr>

                </form>
               
        <?php   
               
              }
              }
               
                echo "Total Record : ".$total;
                if($total != 0)
                {
                    echo "";
                }
                else
                {
                    echo"no records found";
                }
                ?>
                
            
            </tbody>
          </table>
          </div>
        </div>
<div class="container ">
    <br class="mx-5">
    <br class="mx-5">
    <br class="mx-5">

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
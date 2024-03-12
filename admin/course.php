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
        <h1 class="text-center"> Course Records</h1>
        <?php if(isset($_SESSION['MessageCourse'])){?>
                    <p class="text-center text-danger"><?php echo $_SESSION['MessageCourse']; ?></p>
                    <?php unset($_SESSION['MessageCourse']); }?>
         </div>
           <div class ="container">
           <div class ="table-responsive bg-light">
            <table class="table datatable">
            <thead>
              <tr class="text-center">
 
                <th scope="col">Sr.No</th>
                <th scope="col">Subject Code</th>
                <th scope="col">Subject Name</th>
                <th scope="col">Subject Description</th>
                <th scope="col">Course </th>
                <th scope="col">SEMISTER</th>

                <th scope="col"> <a href="./courseAdd.php" class="btn-sm btn-info"> Add New</a></th>

              </tr>
            </thead>
            <tbody>
               <?php
                include("../config.php");
                // $query = " select * from exceltable";      
                $query = "select * from course";      
                $data = mysqli_query($conn,$query);
                $total = mysqli_num_rows($data);
                if($data->num_rows>0){
                    $var=0;
              while($array = mysqli_fetch_row($data)){
                
                ?>
                
                <form action="coursedb.php" method="post">
                
                <tr>
                   
                    <th scope="row" class="text-center"><input type="hidden" value= "<?php echo $array[0];?>" name="SrNo"/><?php echo $var=$var+1;?></th>
                    <td><b><input type="text" value= "<?php echo $array[0];?>" name="subjectCode" style="width:8rem;"  class="text-center"/></b></td>
                    <td ><input type="text" value="<?php echo $array[1];?>" name="subjectName" class="text-center"/></td>
                    <td><input type="text" value="<?php echo $array[2];?>" style="width:20rem;"  name="subjectDescription" class="text-center"required/></td>
                    <td><input type="text" value="<?php echo $array[3];?>" style="width:8rem;"  name="courseName" class="text-center" required/></td>
                    <td><input type="text" value="<?php echo $array[4];?>" style="width:8rem;" name="semister" class="text-center" required/></td>
                    <!-- <td><input type="number" value="<?php echo $array[4];?>" style="width:8rem;" name="contactno" required/></td> -->
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
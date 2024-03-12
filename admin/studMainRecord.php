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
        <h1 class="text-center"> Students Marks Evaluation </h1>
      </div>
    <div class ="container col-10">
        <div class ="row m-5">
           <table class="table datatable text-center table-bordered" border="2" >
            <thead>
              <tr class="table-info">
 
               <!-- <th scope="col">Sr.No</th> -->
                <th scope="col">Roll No</th>
                <th scope="col">Student Name</th>
                <th scope="col">Attendance <br>(50M)</th>
                <th scope="col">MCQ Exam(50M)</th>
                <th scope="col">Assignment <br>(50M)</th>
                <th scope="col">Internal Exam 2<br>(50M)</th>
                <th scope="col">SGA/VIVA <br> (50M)</th>
                <th scope="col">Total<br>(250M)</th>
                <th scope="col"> Actual Marks</th>
                <!-- <th scope="col"> </th> -->

              </tr>
            </thead>
            <tbody>
               <?php
                include("../config.php");
                // $query = " select * from exceltable";      
                $query = "select student.*,aitmarks.total,adbmsmarks.assigntotal,otmarks.total,pythonmarks.total,spmmarks.total from student INNER JOIN aitmarks ON aitmarks.RollNo = student.RollNo INNER JOIN adbmsmarks ON adbmsmarks.RollNo = student.RollNo
                INNER JOIN otmarks ON otmarks.RollNo = student.RollNo INNER JOIN pythonmarks ON pythonmarks.RollNo = student.RollNo INNER JOIN spmmarks ON spmmarks.RollNo = student.RollNo";      
                $data = mysqli_query($conn,$query);
                $total = mysqli_num_rows($data);
                if($data->num_rows>0){
              while($array = mysqli_fetch_row($data)){
                ?>
             
                <form action="studadd.php" method="post">                
                <tr>
                    <th scope="row"><?php echo $array[0];?></th>
                    <td> <?php echo $array[1];?> </td>
                    <td> <?php echo $array[3];?> </td>
                    <td> <?php echo $array[4 ];?> </td>
                    <td> <?php echo $array[5];?>  </td>
                    <td> <?php echo $array[6];?>  </td>
                    <td> <?php echo $array[7];?>  </td>
                    <?php $totalMarks=$array[3]+$array[4]+$array[5]+$array[6]+$array[7];?>
                    <td>  <p class="mx-4 "><b> 250 </b></p></td>
                    <td>  <p class="mx-4 "><b> <?php echo $totalMarks;?> </b></p></td>
                    <!-- <td><button class="btn-sm btn-success" name="Update">Update</button></td> -->
                    <!-- <td><button class="btn-sm btn-primary " name="Details">Details</button></td> -->
                </tr>
                </form>
               
        <?php   
               
              }
              }
               
                echo "Total Record : ".$total;
                if($total != 0)
                {
                    echo " Students";
                }
                else
                {
                    echo"no records found";
                }
                mysqli_close($conn);
                ?>
                
            
            </tbody>
          </table>
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
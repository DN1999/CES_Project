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
   <?php include("./header.php");
      if(isset($_SESSION['tblName'])){
        $tblName=$_SESSION['tblName'];
     }else{
       header("location: ../index.php");
     }
    ?>
   <!-- NavBar End -->
   <div class="container">
   <h1 class="text-center"> <?php if(isset($_SESSION['subjectName'])){?><?php echo $_SESSION['subjectName']; }?> Internal Exam Marks Evaluation </h1>
        <?php if(isset($_SESSION['MessageMarks'])){?>
                    <p class="text-center text-danger"><?php echo $_SESSION['MessageMarks']; ?></p>
                    <?php unset($_SESSION['MessageMarks']); }?>
      </div>
           <div class ="container col-9">
           <table class="table datatable text-center">
            <thead>
              <tr>
 
               <th scope="col">Sr.No</th>
                <th scope="col">Roll No</th>
                <th scope="col">Student Name</th>
                <th scope="col">Internal Exam-1<br>(50M)</th>
                <th scope="col">Internal Exam-2<br>(50M)</th>
                <th scope="col">Total<br>(100M)</th>
                <th scope="col">Converted <br>(to 50M)</th>
                <th scope="col"> *** </th>
              </tr>
            </thead>
            <tbody>
               <?php
                include("../config.php");
                // $query = " select * from exceltable";      
                $query = "select *,student.StudentName from $tblName INNER JOIN student ON $tblName.RollNo = student.RollNo";      
                $data = mysqli_query($conn,$query);
                $total = mysqli_num_rows($data);
                if($data->num_rows>0){
              // while($array = mysqli_fetch_row($data,MYSQLI_ASSOC)){
              while($array = mysqli_fetch_array($data,MYSQLI_ASSOC)){
                ?>
                
                <form action="marksAdd.php" method="post">
                
                <tr>
                    <th scope="row"><?php echo $array['srno'];?></th>
                    <th scope="row"><input type="hidden" value= "<?php echo $array['RollNo'];?>" name="studId"/><?php echo $array['RollNo'];?></th>
                    <td><input type="hidden" value="<?php echo $array['studName'];?>" name="studName"/><?php echo $array['StudentName'];?></td>
                    <td><input type="number" value="<?php echo $array['internalEx1'];?>" style="width:60px;"  name="internalEx1"/></td>
                    <td><input type="number" value="<?php echo $array['internalEx2'];?>" style="width:60px;" name="internalEx2"/></td>
                    <td><input type="hidden" value="<?php echo $array['internalExTotal'];?>" name="totalInternalEx" id="total"><?php echo $array['internalExTotal'];?> </td>

                    <td><input type="hidden" value="<?php echo $array['internalExConvertM'];?>" name="convertTotal" id="total"><?php echo $array['internalExConvertM'];?></td>
                    <td><button class="btn btn-success" name="UpdateInternalExam">Update</button></td>
                    
                </tr>
                </form>
               
        <?php   
              }
              }
               
                echo "Total Record : ".$total;
                if($total != 0)
                {
                    echo" Student";
                }
                else
                {
                    echo"no records found";
                }
                ?>
                
            
            </tbody>
          </table>
          </div>

        <!-- Footer start-->
            <?php include("./footer.php");?>
        <!-- Footer End-->

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
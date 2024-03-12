<?php
// session_start();
include("../config.php");
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // echo"load poast";
    if(isset($_POST["Details"])){
    // echo"load btnt";
        $tblName=$_POST['tblName'];
        $attendtblName=$_POST['attendTblName'];   
        $subjectName=$_POST['subjectName']; 
        $id=$_POST['studRollNo'];
        $studRollNo=$_POST['studRollNo']; 
        $StudentName=$_POST['studName']; 
        
    }
  }else{
    header("location: ./subjectMarks.php");
  }

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://unpkg.com/xlsx/dist/xlsx.full.min.js"></script>

    <title>table</title>
  </head>
  <body>
  <!-- NavBar Start -->
  <?php include("./header.php");?>
   <!-- NavBar End -->  
    <div class="container">
        <h1 class="text-center"> Students Marks Evaluation  </h1>
      </div>
  

            <div class="container text-center">
              <div class="card-body">
                <h5>Student ID : <?php echo $studRollNo;?></h5>
                <h5>Student Name : <?php echo $StudentName;?></h5>
                <h5>Subject Name : <?php echo $subjectName;?></h5>
              </div>                
            </div>

            <div class="container col-10">
                <div class="card-body d-flex">
           <div class ="container">
                <div class="row col-4" style="margin-left:35%">
                    <div class="col-md mx-4">
                    <form action="./subjectMarks.php" method="post" style="margin-left:89%">
                        <input type="hidden" name="tblName" value="<?php echo $tblName;?>">
                        <input type="hidden" name="attendTblName" value="<?php echo $attendtblName;?>">
                        <input type="hidden" name="subjectName" value="<?php echo $subjectName;?>">
                        <button class="btn btn-info m-2" name="subjectBtn">Back</button>   
                    </form>
                        <!-- <a class="btn btn-primary" href="./subjectMarks.php" style="margin-left:89%" >Back</a> -->
                    </div>
                    <div class="col-md mx-3 my-2" >
                        <!-- <button class="btn btn-success"  id="btnExport1" onclick="fnExportToExcel('xlsx','myfirstsheet')" >Download</button> -->
                    </div>
                </div>
            <div class="container text-center">
              <div class="card-body">
                <h5>Assignment Marks</h5>
              </div>                
            </div>
     
            <div class ="table-responsive ">
           <table class="table datatable text-center" border="2">
            <thead>
              <tr>
               <th scope="col">Sr.No</th>
                <th scope="col">assig-1<br>(5M)</th>
                <th scope="col">assign-2<br>(5M)</th>
                <th scope="col">assign-3<br>(5M)</th>
                <th scope="col">assign-4<br>(5M)</th>
                <th scope="col">assign-5<br>(5M)</th>
                <th scope="col">Total<br>(25M)</th>
                <th scope="col">Converted <br>(to 50M)</th>
              </tr>
            </thead>
            <tbody>
               <?php
                // include("../config.php");
                // $tblName= $_SESSION['tblName']; 
                $query = "select * from $tblName where RollNo=$studRollNo";      
                $data = mysqli_query($conn,$query);
                // $total = mysqli_num_rows($data);
                if($data->num_rows>0){
              while($array = mysqli_fetch_array($data,MYSQLI_ASSOC)){
                ?>
                <form action="./marksAdd.php" method="post">
                <tr><b>
                    <td scope="row"><?php echo $array['srno'];?></td>
                    <td> <?php echo $array['assign1'];?> </td>
                    <td> <?php echo $array['assign2'];?> </td>
                    <td> <?php echo $array['assign3'];?> </td>
                    <td> <?php echo $array['assign4'];?> </td>
                    <td> <?php echo $array['assign5'];?> </td>
                    <td><?php echo $array['assigntotal'];?> </td>
                    <td><?php echo $array['assignConvertM'];?></b></td>
                </tr>
                </form>
            <?php   
              }
              }
                //  mysqli_close($conn);
                ?>
            </tbody>
          </table>
          </div>

          <!-- MCQ Marks code -->
          <div class="container text-center">
              <div class="card-body">
                <h5>MCQ Marks</h5>
              </div>                
            </div>
     
          <div class ="table-responsive ">
           <table class="table datatable text-center" border="2">
            <thead>
              <tr>
                <th scope="col">mcq-1<br>(5M)</th>
                <th scope="col">mcq-2<br>(5M)</th>
                <th scope="col">mcq-3<br>(5M)</th>
                <th scope="col">mcq-4<br>(5M)</th>
                <th scope="col">mcq-5<br>(5M)</th>
                <th scope="col">Total<br>(25M)</th>
                <th scope="col">Converted <br>(to 50M)</th>
              </tr>
            </thead>
            <tbody>
               <?php
                // include("../config.php");
                // $tblName= $_SESSION['tblName']; 
                $query = "select * from $tblName where RollNo=$studRollNo";      
                $data = mysqli_query($conn,$query);
                // $total = mysqli_num_rows($data);
                if($data->num_rows>0){
              while($array = mysqli_fetch_array($data,MYSQLI_ASSOC)){
                ?>
                <form action="./marksAdd.php" method="post">
                <tr><b>
                    <td scope="row"><?php echo $array['mcq1'];?></td>
                    <td> <?php echo $array['mcq2'];?> </td>
                    <td> <?php echo $array['mcq3'];?> </td>
                    <td> <?php echo $array['mcq4'];?> </td>
                    <td> <?php echo $array['mcq5'];?> </td>
                    <td><?php echo $array['mcqtotal'];?> </td>
                    <td><?php echo $array['mcqConvertM'];?></b></td>
                </tr>
                </form>
            <?php   
              }
              }
                //  mysqli_close($conn);
                ?>
            </tbody>
          </table>
          </div>
          
          <!--Internal Marks And Attendence -->
          <div class="container text-center">
              <div class="card-body">
                <h5>Internal Exam And Viva Marks</h5>
              </div>                
            </div>
     
          <div class ="table-responsive ">
           <table class="table datatable text-center" border="2">
            <thead>
              <tr>
               <!-- <th scope="col">Sr.No</th> -->
                <th scope="col">Internal Exam-I<br>(50M)</th>
                <th scope="col">Internal Exam-II<br>(50M)</th>
                <th scope="col">Total<br>(100M)</th>
                <th scope="col">Converted<br>(50M)</th>
                <th scope="col">Practical/Viva Marks<br>(50M)</th>
                <!-- <th scope="col">Total<br>(25M)</th> -->
                <!-- <th scope="col">Converted <br>(to 50M)</th> -->
              </tr>
            </thead>
            <tbody>
               <?php
                // include("../config.php");
                // $tblName= $_SESSION['tblName']; 
                $query = "select * from $tblName where RollNo=$studRollNo";      
                $data = mysqli_query($conn,$query);
                // $total = mysqli_num_rows($data);
                if($data->num_rows>0){
              while($array = mysqli_fetch_array($data,MYSQLI_ASSOC)){
                ?>
                <form action="./marksAdd.php" method="post">
                <tr>
                    <th scope="row"><?php echo $array['internalEx1'];?></th>
                    <td> <?php echo $array['internalEx2'];?> </td>
                    <td> <?php echo $array['internalExTotal'];?> </td>
                    <td><?php echo $array['internalExConvertM'];?> </td>
                    <td><?php echo $array['practicalViva'];?></td>
                </tr>
                </form>
            <?php   
              }
              }
                ?>
            </tbody>
          </table>
          </div>

            <!--Internal Marks And Attendence -->
            <div class="container text-center">
              <div class="card-body">
                <h5>Attendence  Marks</h5>
              </div>                
            </div>
     
          <div class ="table-responsive ">
           <table class="table datatable text-center" border="2">
            <thead>
              <tr>
               <!-- <th scope="col">Sr.No</th> -->
                <th scope="col">May <br>(20 Days)</th>
                <th scope="col">June <br>(22 Days)</th>
                <th scope="col">July <br>(21 Days)</th>
                <th scope="col">Aug<br>(20 Days)</th>
                <th scope="col">Total <br>(83 Days)</th>
                <th scope="col">Converted <br>(to 50M)</th>
              </tr>
            </thead>
            <tbody>
               <?php
                // include("../config.php");
                // $tblName= $_SESSION['tblName']; 
                $query = "select * from $attendtblName where RollNo=$studRollNo";      
                $data = mysqli_query($conn,$query);
                // $total = mysqli_num_rows($data);
                if($data->num_rows>0){
              while($array = mysqli_fetch_array($data,MYSQLI_ASSOC)){
                ?>
                <form action="./marksAdd.php" method="post">
                <tr>
                    <th scope="row"><?php echo $array['may'];?></th>
                    <td> <?php echo $array['june'];?> </td>
                    <td> <?php echo $array['july'];?> </td>
                    <td><?php echo $array['aug'];?> </td>
                    <td><?php echo $array['totalAttendence'];?></td>
                    <td><?php echo $array['attendenceConvertM'];?></td>
                </tr>
                </form>
            <?php   
              }
              }
                 mysqli_close($conn);
                ?>
            </tbody>
          </table>
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
      function fnExportToExcel(fileExtension,fileName){
        // alert("File Start Downloaded");
        var elt =document.getElementById("tblExport");
        var wb=XLSX.utils.table_to_book(elt,{sheet:"sheet1"});
        return XLSX.writeFile(wb,fileName+"."+fileExtension || ('MySheetName.'+(fileExtension || 'xlsx')));
      }
    </script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>
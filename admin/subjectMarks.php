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
  <?php include("./header.php");
  if($_SERVER["REQUEST_METHOD"] == "POST"){
    // echo"load poast";
    if(isset($_POST["subjectBtn"])){
    // echo"load btnt";
     $tblName=$_POST['tblName'];
      $attendtblName=$_POST['attendTblName'];   
      $subjectName=$_POST['subjectName']; 
    }
  }else{
    header("location: ./studhome.php");
  }
  

//  echo "Session Values";
// echo "Sub :".$_SESSION['adSubjectName'];
// echo "TBL :".$_SESSION['adSubTable'];
// echo "Atte :".$_SESSION['adSubAttendeceTable'];
 ?>
 <!-- NavBar End -->  
    <div class="container">
        <h1 class="text-center"> <?php echo $subjectName;?> Marks Evaluation </h1>
      </div>
    <div class ="container">
         <div class="row">
              <div class="btn-group col-1"style="margin-left:87%;">
              <button class="btn btn-success rounded" id="btnExport" onclick="fnExportToExcel('xlsx','report');">download</button>
              </div>
         </div>
         <div class ="table-responsive">
           <table class="table datatable text-center table-bordered" border="2" id="tblExport">
          <td colspan="10"> <?php echo $subjectName;?> Marks Evaluation Table</td>
           <!-- <thead> -->
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
                <th scope="col"> Actual Marks Convert<br>(to 50M)</th>
                <!-- <th scope="col"> </th> -->

              </tr>
            <!-- </thead> -->
            <tbody>
               <?php
                include("../config.php");
                // $query = " select * from exceltable";      
                try{
                  $query = "select student.*, $attendtblName.*, $tblName.* from student INNER JOIN $attendtblName ON $attendtblName.RollNo = student.RollNo 
                  INNER JOIN $tblName ON $tblName.RollNo = student.RollNo";      
                  $data = mysqli_query($conn,$query);
                  $total = mysqli_num_rows($data);
                  if($data->num_rows>0){
                  while($array = mysqli_fetch_array($data)){
                ?>
             
                <form action="marksDetails.php" method="post">                
                <tr>
                    <th scope="row"><input type="hidden" name="studRollNo" value="<?php echo $array['RollNo'];?>"><?php echo $array['RollNo'];?></th>
                    <td><input type="hidden" name="studName" value="<?php echo $array['StudentName'];?>"> <?php echo $array['StudentName'];?> </td>
                    <td> <?php echo $array['attendenceConvertM'];?> </td>
                    <td> <?php echo $array['mcqConvertM'];?> </td>
                    <td> <?php echo $array['assignConvertM'];?>  </td>
                    <td> <?php echo $array['internalExConvertM'];?>  </td>
                    <td> <?php echo $array['practicalViva'];?>  </td>
                    <?php $totalMarks=$array['attendenceConvertM'] + $array['mcqConvertM'] + $array['assignConvertM'] + $array['internalExConvertM']+$array['practicalViva'];?>
                    <td>  <p class="mx-4 "><b> 250 </b></p></td>
                    <td>  <p class="mx-4 "><b> <?php echo $totalMarks;?> </b></p></td>
                    <td>  <p class="mx-4 "><b> <?php echo ($totalMarks/250)*50;?> </b></p></td>
                    <!-- <td><button class="btn-sm btn-success" name="Update">Update</button></td> -->
                 
                     <input type="hidden" name="tblName" value="<?php echo $tblName;?>">
                     <input type="hidden" name="attendTblName" value= "<?php echo $attendtblName;?>">
                     <input type="hidden" name="subjectName" value="<?php echo $subjectName;?>">
                    <td><button class="btn-sm btn-primary " name="Details">Details</button></td>
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
                
              }
            catch(Exception $e){
                echo "Table not exist".$e->getMessage();

            }
              
                ?>
                
            
            </tbody>
          </table>
        </div>
    </div>

    
    <!-- footer start -->
  <?php include("./footer.php");?>  
<!-- footer end -->


<script>

  function fnExportToExcel(fileExtension,fileName){
       var elt=document.getElementById("tblExport");
       var wb = XLSX.utils.table_to_book(elt,{ sheet: "sheet1"});
       return XLSX.writeFile(wb,fileName+"."+fileExtension || ('MySheetName.'+(fileExtension || 'xlsx')));

  }

</script>
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
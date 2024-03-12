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
      <?php if(isset($_SESSION['studId']) && isset($_SESSION['studName'])){
            $id=$_SESSION['studId'];
            // echo "Stud id : ".$_SESSION['studId'];
            // echo "Stud id : ".$_SESSION['studName'];
            $id=$_SESSION['studId'];

        }else{
            echo "not set";
            $id=0;
            }      ?>


            <div class="container text-center">
              <div class="card-body">
                <h5>Student ID : <?php echo $_SESSION['studId'];?></h5>
                <h5>Student Name : <?php echo $_SESSION['studName'];?></h5>
              </div>                
            </div>

            <div class="container col-10">
                <div class="card-body d-flex">
           <div class ="container">
               <div class="container my-2" style="width:100%;">
                <button class="btn btn-success" style="margin-left:89%" id="btnExport1" onclick="fnExportToExcel('xlsx','myfirstsheet')" >Download</button>
              </div>
            <div class="table-responsive">
           <table class="table table-resposive bg-light text-center table-bordered" id="tblExport" border="2">
                <thead>
                      <tr>
                          <th> Student ID  </th>
                          <td> <?php echo $_SESSION['studId'];?></td>
                          <th> Student Name  </th>
                          <td colspan="3"> <?php echo $_SESSION['studName'];?></td>
                
                      </tr>
                      <tr>
                          <td colspan="7"> </td>
                        </tr>
                </thead>
                  <tr class="table-active">
                          <th scope="col">Subject</th>
                          <th scope="col">AIT(50M)</th>
                          <th scope="col">(50M)</th>
                          <th scope="col">OT(50M)</th>
                          <th scope="col">Python(50M)</th>
                          <th scope="col">SPM(50M)</th>
                          <th scope="col">Total(250M)</th>

                    </tr>
            <tbody>
               <?php
                // $query = " select * from exceltable";      
                $query = "select * from aitmarks INNER JOIN adbmsmarks ON adbmsMarks.RollNo =$id INNER JOIN otmarks ON otmarks.RollNo =$id
                 INNER JOIN pythonmarks ON pythonmarks.RollNo =$id INNER JOIN spmmarks ON spmmarks.RollNo =$id";      
                $data = mysqli_query($conn,$query);
                if($data->num_rows>0){
                 $array = mysqli_fetch_row($data)
                ?>
                
                <form action="studadd.php" method="post">
                
                <tr>
                    <th scope="row">Assignment-1</th>
                    <td><?php echo $array[2];?></td>
                    <td><?php echo $array[10];?> </td>
                    <td><?php echo $array[18];?> </td>
                    <td><?php echo $array[26];?> </td>
                    <td><?php echo $array[34];?> </td>
                </tr>
                <tr>
                    <th scope="row">Assignment-2</th>
                    <td> <?php echo $array[3 ];?></td>
                    <td> <?php echo $array[11];?> </td>
                    <td> <?php echo $array[19];?> </td>
                    <td> <?php echo $array[27];?> </td>
                    <td> <?php echo $array[35];?> </td>
                </tr>
                <tr >
                    <th scope="row">Assignment-3</th>
                    <td> <?php echo $array[4 ];?></td>
                    <td> <?php echo $array[12];?> </td>
                    <td> <?php echo $array[20];?> </td>
                    <td> <?php echo $array[28];?> </td>
                    <td> <?php echo $array[36];?> </td>
                </tr>
                <tr>
                    <th scope="row">Assignment-4</th>
                    <td> <?php echo $array[5 ];?></td>
                    <td> <?php echo $array[13];?> </td>
                    <td> <?php echo $array[21];?> </td>
                    <td> <?php echo $array[29];?> </td>
                    <td> <?php echo $array[37];?> </td>
                </tr>
                <tr>
                    <th scope="row">Assignment-5</th>
                    <td > <?php echo $array[6 ];?></td>
                    <td> <?php echo $array[14];?> </td>
                    <td> <?php echo $array[22];?> </td>
                    <td> <?php echo $array[30];?> </td>
                    <td> <?php echo $array[38];?> </td>
                </tr>
                <tr class="table">
                    <th scope="row">Total</th>
                    <td><p class="mx-3"><b><?php echo $array[7];?></b></p></td>
                    <td><p class="mx-3"><b><?php echo $array[15];?></b></p></td>
                    <td><p class="mx-3"><b><?php echo $array[23];?></b></p></td>
                    <td><p class="mx-3"><b><?php echo $array[31];?></b></p></td>
                    <td><p class="mx-3"><b><?php echo $array[39];?></b></p></td>
                    <?php $totalMarks=$array[7]+$array[15]+$array[23]+$array[31]+$array[39]; ?>
                    <td><p class="mx-3"><b><?php echo $totalMarks;?></b></p></td>
                </tr>
                </form>
        <?php   
               
              }
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
<?php
session_start();
if(isset($_SESSION['teacherUserName'])){
   header("location: ./teacher/home.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Login Page</title>
</head>
<body>
    <div class="main m-2">
    <section class="vh-100 bg-light" >

    <div class="container py-3 h-100 ">

    <form action="loginPagedb.php" method="post">

            <div class="card-body p-5">
                <h3 class="text-center text-success">    Continuos Evaluation System</h3>
                <div class="container bg-white col-4">

                <h3 class="mb-5 pt-5 text-center">Teacher Login</h3>
                <!-- code for Error Message -->
                <?php if(isset($_SESSION['MessageLogin'])){?>
                    <p class="text-center text-danger"><?php echo $_SESSION['MessageLogin']; ?></p>
                    <?php unset($_SESSION['MessageLogin']); }?>

                    <?php if(isset($_SESSION['logout'])){?>
                    <p class="text-center text-danger"><?php echo $_SESSION['logout']; ?></p>
                    <?php unset($_SESSION['logout']); }?>

                        <div class="form-group mx-5 mt-3">
                            <label class="mx-2 " for="" style="width:50px;">Email </label>
                            <input type="text" id="username" name="username" class="form-control" style="width:20rem;" placeholder="User Name"/>
                        </div>

                        <div class="form-group mx-5 mt-3">
                            <label class="mx-2" for="" style="width:50px;">Password </label>
                            <input type="password" id="password" name="password" class="form-control" style="width:20rem;" placeholder="******"/>
                        </div>

                        <!-- Checkbox -->
                        <div class="form-check d-flex justify-content-start mb-4 mt-2 mx-5">
                            <input class="form-check-input" type="checkbox" value="" id="form1Example3" />
                            <label class="form-check-label" for="form1Example3"> Remember password </label>
                        </div>
                        <!-- end checkBox -->
                        
                        <div class=" btn col-12">
                            <button class="btn btn-primary m-2" type="loginbtn" name="Login">Login</button>
                            <button class="btn btn-primary" type="cancelbtn" name="cancelbtn">Cancel</button>
                        </div>
                        <div class=" btn col-12">
                         <a href="./admin/loginPage.php">Admin Login</a>    
                        </div>
                        
                        <hr class="my-4">
                </div>        
            </div>
        </form>

    
  </div>
  </div>
</section>

    </div>





</body>
</html>
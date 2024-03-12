<?php
// To create dynamic form with all CRUD operations in PHP with MySQL(database: test,table:table1) 
$con=mysqli_connect("localhost","root","","ces") or die(mysqli_error());	  
//get data from html form
$rollno=$_POST['rollno'];
$name=$_POST['name'];
$assign1=$_POST['assign1'];
$assign2=$_POST['assign2'];
$assign3=$_POST['assign3'];
$assign4=$_POST['assign4'];
$assign5=$_POST['assign5'];
//$total=$_POST['total'];


/*function s1_total(){
   return $total;
}*/
//Insert new record 
if(isset($_POST["submit1"]))
{	
    //s1_total();
   $total=$assign1+$assign2+$assign3+$assign4+$assign5;
$query="INSERT INTO record(rollno, name, assignment1, assignment2,assignment3,assignment4,assignment5,total)  VALUES ($rollno,'$name', $assign1, $assign2, $assign3, $assign4, $assign5,$total)";
// $query="INSERT INTO record(name, assignment1,assignment2)  VALUES ('$name','$assign1','$assign2')";
if(mysqli_query($con,$query)){
    echo 'Successful put marks of student';
 }else{
    echo 'Error'.$query."<br/>".mysqli_error($con);
 }

$con->close();
}

//Delete existing record in empInfo table based on 'id' column value
if(isset($_POST["submit4"]))
{	
$query="delete from record where rollno='$rollno'";
/*mysqli_query($con,$query);
echo 'Record Deleted based on Rollno';*/
if(mysqli_query($con,$query)){
echo 'Record Deleted based on Rollno';
}else{
    echo 'Error'.$query."<br/>".mysqli_error($con);
}
$con->close();
}

//Update existing record in empInfo table1 of "test" database of 'name' column based on 'id' column value
if(isset($_POST["submit2"]))
{	
$query="update record set name='$name' where rollno='$rollno'";
/*mysqli_query($con,$query);
echo 'Name Record updated based on assignment';*/
if(mysqli_query($con,$query)){
    echo 'Name Record updated based on assignment';
 }else{
    echo 'Error'.$query."<br/>".mysqli_error($con);
 }
$con->close();
}

//Display all the existing records in empInfo "table1" of "test" database
if(isset($_POST["submit5"]))
{	
$query="select * from record";
$dis= mysqli_query($con,$query);
echo "<table border=1>";
echo "<tr>";
echo "<th>"; echo "Rollno:"; echo "</th>";
echo "<th>"; echo "Name:"; echo "</th>";
echo "<th>"; echo "Assign1"; echo "</th>";
echo "<th>"; echo "Assign2"; echo "</th>";
echo "<th>"; echo "Assign3"; echo "</th>";
echo "<th>"; echo "Assign4"; echo "</th>";
echo "<th>"; echo "Assign5"; echo "</th>";
echo "<th>"; echo "Total"; echo "</th>";
echo "</tr>";
while($row=mysqli_fetch_array($dis))
{
	echo "<tr>";
	echo "<td>"; echo $row["rollno"]; echo "</td>";
    echo "<td>"; echo $row["name"]; echo "</td>";
	echo "<td>"; echo $row["assignment1"]; echo "</td>";
	echo "<td>"; echo $row["assignment2"]; echo "</td>";
    echo "<td>"; echo $row["assignment3"]; echo "</td>";
    echo "<td>"; echo $row["assignment4"]; echo "</td>";
    echo "<td>"; echo $row["assignment5"]; echo "</td>";
    echo "<td>"; echo $row["total"]; echo "</td>";
    echo "</tr>";
}
echo "</table>";
$con->close();
}

//Search existing record in empInfo table1 of "test" database of 'name' column based on 'id' column value
if(isset($_POST["submit3"]))
{	
$query="select * from record where rollno='$rollno'";
$dis= mysqli_query($con,$query);
echo "<table border=1>";
echo "<tr>";
echo "<th>"; echo "Rollno"; echo "</th>";
echo "<th>"; echo "Name"; echo "</th>";
echo "<th>"; echo "Assign1"; echo "</th>";
echo "<th>"; echo "Assign2"; echo "</th>";
echo "<th>"; echo "Assign3"; echo "</th>";
echo "<th>"; echo "Assign4"; echo "</th>";
echo "<th>"; echo "Assign5"; echo "</th>";
echo "<th>"; echo "Total"; echo "</th>";

echo "</tr>";
while($row=mysqli_fetch_array($dis))
{
	echo "<tr>";
	echo "<td>"; echo $row["rollno"]; echo "</td>";
    echo "<td>"; echo $row["name"]; echo "</td>";
    echo "<td>"; echo $row["assignment1"]; echo "</td>";
	echo "<td>"; echo $row["assignment2"]; echo "</td>";
    echo "<td>"; echo $row["assignment3"]; echo "</td>";
    echo "<td>"; echo $row["assignment4"]; echo "</td>";
    echo "<td>"; echo $row["assignment5"]; echo "</td>";
    echo "<td>"; echo $row["total"]; echo "</td>";

    echo "</tr>";
}
echo "</table>";
$con->close();
}									

?>
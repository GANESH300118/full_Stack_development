<?php
$servername="localhost";
$username="root";
$password="";
$con=mysqli_connect($servername,$username,$password);
$query="CREATE DATABASE RobocouplerInternship";
$result=mysqli_query($con,$query);
if($result){
    echo "Database successfully created";
}
else{
    echo "Database not created";
}
mysqli_close($con);
?>
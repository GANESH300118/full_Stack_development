<?php
$servername="localhost";
$username="root";
$password="";
$database="project";
$con=mysqli_connect($servername,$username,$password,$database);
if ($con){
    echo "";
}
else{
    echo "Database not connected";
}
?>
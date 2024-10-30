<?php
$SRoll=$_POST['SRoll'];
$name=$_POST['fname'];
$age=$_POST['age'];
$email=$_POST['email'];
$phoneno=$_POST['phoneno'];
$gender=$_POST['Gender'];
$cb1=$_POST['cb1'];
$language=implode(", ",$cb1);
include('connectdb.php');
$query="Insert into StudentDetails(SRoll,fname,Age,Email,PhoneNo,Gender,Language)values('$SRoll','$name','$age','$email','$phoneno','$gender','$language')";
$result=mysqli_query($con,$query);
if($result){
    echo "<br>"."Insertion into table successful";
}
else{
    echo "<br>"."Insertion unsuccessful";
}
include('selection.php');
mysqli_close($con);
?>
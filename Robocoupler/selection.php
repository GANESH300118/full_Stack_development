<?php
include('connectdb.php');
$query="SELECT * FROM StudentDetails";
$result=mysqli_query($con,$query);
if ($result){
    if(mysqli_num_rows($result)>0){
        echo "<table>";
        echo "<tr><th>SRoll</th><th>Name</th><th>Age</th><th>Email</th><th>PhoneNo</th><th>Gender</th><th>Language</th></tr>";
        while($row=mysqli_fetch_assoc($result)){
            echo "<tr>";
            echo "<td>".$row['SRoll']."</td>";
            echo "<td>".$row['Name']."</td>";
            echo "<td>".$row['Age']."</td>";
            echo "<td>".$row['Email']."</td>";
            echo "<td>".$row['PhoneNo']."</td>";
            echo "<td>".$row['Gender']."</td>";
            echo "<td>".$row['Language']."</td>";
            echo"</tr>";    
        }
        echo "</table>";
    }
    else{
        echo "no data in table";
    }
}
else{
    echo "data is not displayed";
}
?>

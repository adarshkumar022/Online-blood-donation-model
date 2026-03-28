<?php
include("db.php");
$r=mysqli_query($conn,"SELECT * FROM admin WHERE username='$_POST[username]' AND password='$_POST[password]'");
if(mysqli_num_rows($r)){
header("Location: ../admin_dashboard.php");
}else{
echo "Wrong Login";
}
?>
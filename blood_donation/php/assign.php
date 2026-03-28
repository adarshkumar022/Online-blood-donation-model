<?php
include("db.php");

$id = $_GET['rid'];
$name = $_GET['dname'];

mysqli_query($conn,"UPDATE requests 
SET status='Assigned', donor_assigned='$name' 
WHERE id='$id'");

header("Location: ../admin_dashboard.php");
?>
<?php
include("db.php");

$id = $_GET['rid'];

mysqli_query($conn,"UPDATE requests 
SET status='Pending', donor_assigned=NULL 
WHERE id='$id'");

header("Location: ../admin_dashboard.php");
?>
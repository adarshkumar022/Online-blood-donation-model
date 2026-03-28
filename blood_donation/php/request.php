<?php
include("db.php");
mysqli_query($conn,"INSERT INTO requests(name,blood_group,city,contact,status) VALUES('$_POST[name]','$_POST[blood_group]','$_POST[city]','$_POST[contact]','Pending')");
echo "Request Submitted!";
?>
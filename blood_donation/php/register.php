<?php
include("db.php");
mysqli_query($conn,"INSERT INTO donors VALUES('','$_POST[name]','$_POST[age]','$_POST[blood_group]','$_POST[city]','$_POST[contact]')");
echo "Registered!";
?>
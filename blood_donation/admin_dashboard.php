<?php include("php/db.php"); ?>

<!DOCTYPE html>
<html>
<head>
<title>Admin Dashboard</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body>

<h2 style="text-align:center; color:white;">Admin Dashboard</h2>

<?php
$totalDonors = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM donors"));
$totalRequests = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM requests"));
$assigned = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM requests WHERE status='Assigned'"));
?>

<!-- 🔥 Dashboard Cards -->
<div class="dashboard-cards">

<div class="dashboard-card">
    <h2><?php echo $totalDonors; ?></h2>
    <p>Donors</p>
</div>

<div class="dashboard-card">
    <h2><?php echo $totalRequests; ?></h2>
    <p>Requests</p>
</div>

<div class="dashboard-card">
    <h2><?php echo $assigned; ?></h2>
    <p>Assigned</p>
</div>

</div>

<!-- 🔥 Donors Cards -->
<h2>All Donors</h2>

<div class="data-container">
<?php
$d = mysqli_query($conn,"SELECT * FROM donors");

while($row=mysqli_fetch_assoc($d)){
echo "
<div class='data-card'>
<h3>{$row['name']}</h3>
<p><b>Blood:</b> {$row['blood_group']}</p>
<p><b>City:</b> {$row['city']}</p>
<p><b>Contact:</b> {$row['contact']}</p>
</div>
";
}
?>
</div>

<!-- 🔥 Requests Cards -->
<h2>Blood Requests</h2>

<div class="data-container">
<?php
$r = mysqli_query($conn,"SELECT * FROM requests");

while($req=mysqli_fetch_assoc($r)){

$cardClass = ($req['status']=="Assigned") ? "data-card assigned-card" : "data-card pending-card";

echo "<div class='$cardClass'>";

echo "<h3>{$req['name']}</h3>";
echo "<p><b>Blood:</b> {$req['blood_group']}</p>";
echo "<p><b>City:</b> {$req['city']}</p>";

if($req['status']=="Assigned"){
    echo "<span class='badge badge-green'>Assigned</span><br><br>";
    echo "<p><b>Donor:</b> {$req['donor_assigned']}</p>";
    echo "<a class='btn red' href='php/reject.php?rid=".$req['id']."'>Make Pending</a>";
}
else{
    echo "<span class='badge badge-orange'>Pending</span><br><br>";

    $m = mysqli_query($conn,"SELECT * FROM donors 
    WHERE blood_group='".$req['blood_group']."'");

    if(mysqli_num_rows($m)==0){
        echo "❌ No donor available";
    }

    while($don=mysqli_fetch_assoc($m)){
        echo "<a class='btn green' href='php/assign.php?rid=".$req['id']."&dname=".$don['name']."'>
        Assign ".$don['name']."</a><br><br>";
    }
}

echo "</div>";
}
?>
</div>

</body>
</html>
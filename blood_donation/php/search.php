<?php
include("db.php");

$blood = $_POST['blood_group'];

$result = mysqli_query($conn, "SELECT * FROM donors WHERE blood_group='$blood'");

echo "<link rel='stylesheet' href='../css/style.css'>";

echo "<div class='container'>";
echo "<h1>Search Result</h1>";
echo "<div class='data-container'>";

while($row = mysqli_fetch_assoc($result)){

echo "
<div class='data-card'>
<h3>{$row['name']}</h3>
<p><b>Blood:</b> {$row['blood_group']}</p>
<p><b>City:</b> {$row['city']}</p>
<p><b>Contact:</b> {$row['contact']}</p>
</div>
";
}

echo "</div></div>";
?>
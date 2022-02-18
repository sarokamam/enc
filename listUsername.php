<?php 
include 'auth.php';
$data = mysqli_query($conn,"select * from register");
$jumlah = mysqli_num_rows($data);
echo "jumlah=";
echo "\"".$jumlah."\"";

echo "\n";
echo "username={";
while($d = mysqli_fetch_array($data)){
echo "\"".$d['username']."\"";
echo ",";
}
echo "}";

?>
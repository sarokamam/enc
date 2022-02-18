<?php 

$dbhost = 'localhost';
$dbuser = 'plexusc2_token'; //username
$dbpass = '***'; //password
$db = 'plexusc2_token'; //database name
$conn = mysqli_connect($dbhost, $dbuser, $dbpass , $db) or die($conn); 

date_default_timezone_set('Asia/Jakarta');

if (mysqli_connect_error()){
	echo "Koneksi database gagal :". mysqli_connect_error();
}

/* --------------------------------- ABOUT -------------------------------------
Original Author: UpLUK
Website: https://plexuscheat.my.id
Telegram: https://t.me/bacodluamsu
Telegram Channel: https://t.me/PLEXUSCH
----------------------------------------------------------------------------- */
?>
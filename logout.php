<?php 

include 'auth.php';

//GET POST
$username = $_POST['username'];

$query=mysqli_query($conn,"select * from register where username='$username'");
$cek=mysqli_num_rows($query);

do{

if($username == NULL){
	break;
}

//username validator
if($username == NULL){
    echo "Username invalid";
	break;
}

//check username
if($cek < 1){
	echo "Username not registered";
	break;
}

//update process
$sql_update=mysqli_query($conn,"UPDATE register SET uuid='' WHERE username='$username'");
if (!$sql_update){
    echo "Logout failed";
    break;
 }

echo "Logout success";


}while(0);

/* --------------------------------- ABOUT -------------------------------------
Original Author: UpLUK
Website: https://plexuscheat.my.id
Telegram: https://t.me/bacodluamsu
Telegram Channel: https://t.me/PLEXUSCH
----------------------------------------------------------------------------- */
?>
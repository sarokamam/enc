<?php 

include 'auth.php';

$username= $_POST['username'];
$password= $_POST['password'];
$uuid= $_POST['uuid'];

$login = mysqli_query($conn,"select * from register where username='$username'");

do{
	
if($username == NULL & $password == NULL){
	break;
}

//username validator
if($username == NULL){
    echo "Username invalid";
	break;
}

//password validator
if($password == NULL){
    echo "Password invalid";
	break;
}

//check username
$cek = mysqli_num_rows($login);
if($cek < 1){
echo "Username not registered";
break;
}

$data = mysqli_fetch_assoc($login);

//password validator
if($data["password"] != $password){
echo "Password invalid";
break;
}

//user type check
if($data["userType"] != "membership"){
$delete=mysqli_query($conn,"DELETE FROM register WHERE username = '$username'");
echo "Login success";
break;
}

//uuid validator
if($data["uuid"] == NULL){
$query = $conn->query("UPDATE register SET uuid= '$uuid', expDate= '".$data["expDate"]."' WHERE username='$username'");
}else if($data["uuid"] != $uuid){
echo "UUID invalid";
break;
}

//expired validator
$timenow = time();
$EXPIRE = date('Y-m-d H:i:s');
$EXPIREDDAYS = date("Y-m-d H:i:s", strtotime($data["expType"], $timenow));

if($data["expDate"] == "0000-00-00 00:00:00"){
$query = $conn->query("UPDATE register SET expDate= '$EXPIREDDAYS' WHERE username='$username'");
}else if($EXPIRE > $data["expDate"]){
echo "Username expired";
break;
}

//data login fetch
$login = mysqli_query($conn,"select * from register where username='$username'");
$data = mysqli_fetch_assoc($login);

echo "Login success";
$EXPIREDSTRING = number_format(strtotime($data["expDate"])*1000, 0, '.', '');
echo "\nUsername=".$data["username"].";";
echo "\nExpired=".$EXPIREDSTRING.";";
echo "\nUUID=".$data["uuid"].";";

}while(0);


/* --------------------------------- ABOUT -------------------------------------
Original Author: UpLUK
Website: https://plexuscheat.my.id
Telegram: https://t.me/bacodluamsu
Telegram Channel: https://t.me/PLEXUSCH
----------------------------------------------------------------------------- */
?>
<?php 
include "../koneksi.php";
session_start();

if(isset($_POST['username'])){
 
$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM user WHERE username='" . $username . "' AND password='" . openssl_encrypt($password, "AES-128-ECB", "test") . "';";
$stmt = $con->query($sql);
$result = $stmt->fetch_assoc();
print_r ($result);
 
$params = array(
        ":username" => $username,
        ":password" => $password
		);
if ($result ){
	$_SESSION["iduser"] =  $result["id"];
	$_SESSION['data'] = $result;
	header ("Location: http://localhost/spkrinaldy/admin/index.php?modul=dashboard");
	//var_dump($result["id"]);
}else{
	header ("Location: http://localhost/spkrinaldy");
}

}
?>
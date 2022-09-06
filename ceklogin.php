<?php 

session_start();
 

include 'config.php';
 

$username = $_POST['username'];
$password = md5($_POST['password']);
 
 

$login = mysqli_query($conn,"SELECT * FROM users WHERE username='$username' AND password='$password'");

$cek = mysqli_num_rows($login);
 

if($cek > 0){
 
	$data = mysqli_fetch_assoc($login);
 

	if($data['level']=="1"){
 
	
		$_SESSION['username'] = $username;
		$_SESSION['level'] = "1";
	
		header("location:home.php");
 
	
	}else if($data['level']=="2"){
		
		$_SESSION['username'] = $username;
		$_SESSION['level'] = "2";
		
		header("home.php");
 
	
	}else{
 
		// alihkan ke halaman login kembali
		header("location:index.php?pesan=gagal");
	}	
}else{
	header("location:index.php?pesan=gagal");
}
 
?>
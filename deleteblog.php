<?php 
	session_start();
	if($_SESSION["login"] == 0){
		echo "<script type='text/javascript'>location.href='login.php';</script>";
	}
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		$id=$_POST["id"];
		$server = "localhost";
		$username = "joker";
		$password = "djoker";
		$db = "project";
		$conn = new mysqli($server,$username,$password,$db);
		if($conn->connect_error){
			die ("Connection failed:".$conn->connect_error);
		}
		$sql = "delete from blog where id = '$id'";
		if($conn->query($sql) == TRUE){
			echo "<script type='text/javascript'>location.href = 'myblogs.php';</script>";
		}
		else{
			$cnf_err =$conn->error;
		}
		$conn -> close();
	}
?>
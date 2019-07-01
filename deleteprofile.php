<?php
	session_start();
?>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="style.css">
		<script type="text/javascript">
			function show(){
				var val = document.getElementById("option").style;
				if(val.display == "block"){
				document.getElementById("option").style.display="none";
				}
				else{
					document.getElementById("option").style.display="block";
				}
			}
			function hide(){
				var val = document.getElementById("option").style;
				if(val.display == "block"){
				document.getElementById("option").style.display="none";
				}
				else{
				}
			}
		</script>
	</head>
	<body onscroll="hide()"> 
		<?php 
			if($_SESSION["login"] == 0){
				echo "<script type='text/javascript'>location.href='login.php';</script>";
			}
			$error = 0; 
			$pass = "";
			$email = $_SESSION["email"];
			$pass_err = $cnf_err = "";
			
			function test_input($input){
				$input = trim($input);
				$input = stripslashes($input);
				$input = htmlspecialchars($input);
				return $input;
			}
			if($_SERVER["REQUEST_METHOD"] == "POST"){
				if(empty($_POST["pass"])){
					$pass_err = "password is required";
					$error = 1;
				}
				$pass = md5($_POST["pass"]);
				
				if($error == 0){
					$server = "10.5.0.63";
					$username = "root";
					$password = "passwd@123";
					$db = "project";
					$conn = new mysqli($server,$username,$password,$db);
					if($conn->connect_error){
						die ("Connection failed:".$conn->connect_error);
					}
					$sql = "select firstname,lastname,email,contact from user where email = '$email' and password = '$pass'";
					$result = $conn->query($sql);
					if($result -> num_rows > 0){
						$sql = "delete from blog where email = '$email';";
						$sql .= "delete from user where email = '$email'";
						$conn->multi_query($sql);
						$_SESSION["login"]=0;
						echo "<script type='text/javascript'>location.href='login.php';</script>";
					}
					else{
						$cnf_err ="password not correct";
					}
					$conn -> close();
				}
			}
		?>
		<div id="container">
			<div id = "header">
				<div id="logo" onclick="location.href='index.php';"><img src="logo.png"></div>
				<div id="menu">
					<ul>
						<li><a href="index.php">HOME</a></li>
						<li><a href="index.php#blog">BLOG</a></li>
						<li><a href="about.php">ABOUT</a></li>
						<li style="border-right: none;"><a href="contact.php ">CONTACT</a></li>
					</ul>
				</div>
				<div id="header_right">
					<img onclick="show()" id ="optionimage" src="option.png"></img>
					<div id = "option">
						<ul>
							<strong>
							<li><a href="profile.php">My Profile</a></li>
							<li><a href="blog.php">New Blog</a></li>
							<li><a href="myblogs.php">My Blogs</a></li>
							<li><a href="logout.php">Log Out</a></li></strong>
						</ul>
					</div>
					<span id="name" onclick="location.href='profile.php';"><?php echo $_SESSION["fname"]." ".$_SESSION["lname"]?></span>
<!-- 					<span id="name"><?php echo $_SESSION["fname"]." ".$_SESSION["lname"]?></span>
 -->				</div>	
			</div>
			<div id="body" onclick="hide()">
				<div id = "form">
					<h1>Are you sure?</h1><br>
					<h1 class="error" style="font-size: 1.2vw;">!!!All your blogs and details will be deleted.</h1><br>
					<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
						<span class = "error"><?php echo $cnf_err?><br>* required fields</span><br>
						<input type="text" id="fname" value="<?php echo $_SESSION['fname']?>" disabled="true"><br>
						<input type="text" id="lname" value="<?php echo $_SESSION['lname']?>" disabled><br>
						<input type="email" id="profileemail" name="email" value="<?php echo $_SESSION["email"]?>" disabled><br>
						<input type="text" id="contact" value="<?php echo $_SESSION["contact"]?>" disabled><br>
						<input type="password" name="pass" oncopy="return false" onpaste="return false" placeholder="password"><span class="error">*<?php echo "$pass_err";?></span><br>
						<input type="submit" id="reset" value="Confirm Profile Delete" style="background-color: rgba(255,0,0,0); padding:2% 1.25%;">
						<input type="button" id="reset" onclick="location.href='profile.php';" value="Cancel" style="background-color: rgba(0,100,0,0);  padding:2% 1.25%;"><br>
					</form>
				</div>		
			</div>
			<div id="footer">
				<ul>
						<li><a href="index.php"><span id="footerlive">LiveBlog</span></a></li>
						<li><a href="index.php">Home</a></li>
						<li><a href="about.php">About</a></li>
						<li><a href="contact.php">Contact</a></li><!-- 
						<li style="border-right: none;"><a href="feedback.php">Feedback</a></li> -->
						<li style="border-right: none;">&copy;Copyright</li>
					</ul>
			</div>		
		</div>	
	</body>
</html>

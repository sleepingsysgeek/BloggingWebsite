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
			$fname = $lname = $contact = $pass = $email ="";
			$fname_err = $lname_err = $contact_err =$pass_err = $cnf_err = "";
			
			function test_input($input){
				$input = trim($input);
				$input = stripslashes($input);
				$input = htmlspecialchars($input);
				return $input;
			}
			if($_SERVER["REQUEST_METHOD"] == "POST"){
				if(empty($_POST["fname"])){
					$fname_err = "first name is required";
					$error = 1;
				}
				$fname = test_input($_POST["fname"]);
				
				if(empty($_POST["lname"])){
					$lname_err = "last name is required";
					$error = 1;
				}
				$lname = test_input($_POST["lname"]);

				$email = $_POST["email"];
				
				if(empty($_POST["contact"])){
					$contact_err = "phone no. is required";
					$error = 1;
				}
				$contact = test_input($_POST["contact"]);

				if(empty($_POST["pass"])){
					$pass_err = "password is required";
					$error = 1;
				}
				$pass = md5($_POST["pass"]);
				
				if($error == 0){
					$server = "localhost";
					$username = "joker";
					$password = "djoker";
					$db = "project";
					$conn = new mysqli($server,$username,$password,$db);
					if($conn->connect_error){
						die ("Connection failed:".$conn->connect_error);
					}
					$sql = "update user set firstname = '$fname', lastname = '$lname', contact = '$contact' where email = '$email' and password = '$pass'";
					if($conn->query($sql) == TRUE){
						$sql = "select firstname,lastname,email,contact from user where email = '$email' and password = '$pass'";
						$result = $conn->query($sql);
						if($result -> num_rows > 0){
							while($row = $result -> fetch_assoc()){
								$_SESSION["fname"] = $row["firstname"];
								$_SESSION["lname"] = $row["lastname"];
								$_SESSION["contact"] = $row["contact"];
								$_SESSION["email"] = $row["email"];
								$_SESSION["login"] = 1;
							}
							echo "<script type='text/javascript'>location.href='profile.php';</script>";
						}
						else{
							$cnf_err ="password not correct";
						}
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
<!-- 					<span id="name" ><?php echo $_SESSION["fname"]." ".$_SESSION["lname"]?></span>
 -->				</div>	
			</div>
			<div id="body" onclick="hide()">
				<div id = "form">
					<h1>Update Details</h1><br>
					<h1 style="font-size: 1.5vw;">Email: <?php echo $_SESSION["email"]?></h1><br>
					<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
						<span class = "error"><?php echo $cnf_err?><br>* required fields</span><br>
						<input type="text" autofocus="TRUE" name="fname" value="<?php echo $_SESSION['fname']?>"><span class="error">*<?php echo "$fname_err";?></span><br>
						<input type="text" name="lname" value="<?php echo $_SESSION['lname']?>"><span class="error">*<?php echo "$lname_err";?></span><br>
						<input type="hidden" name="email" name="email" value="<?php echo $_SESSION["email"]?>">
						<input type="text" name="contact" value="<?php echo $_SESSION["contact"]?>" ><span class="error">*<?php echo "$fname_err";?></span><br>
						<input type="password" name="pass" oncopy="return false" onpaste="return false" placeholder="password"><span class="error">*<?php echo "$pass_err";?></span><br>
						<input type="submit" id="submit" value="Update" style="background-color: rgba(0,100,0,0);">
						<input type="button" id="reset" onclick="location.href='profile.php';" value="Cancel" style="background-color: rgba(0,100,0,0);"><br>
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
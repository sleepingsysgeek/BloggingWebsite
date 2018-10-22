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
	<body> 
		<?php 
			if($_SESSION["login"] == 0){
				echo "<script type='text/javascript'>location.href='login.php';</script>";
			}
		?> 
		<div id="container">
			<div id = "header">
				<div id="logo" onclick="location.href='index.php';"><img src="logo.png"></div>
				<div id="menu">
					<ul>
						<li><a href="index.php">HOME</a></li>
						<li><a href="index.php#blog">BLOGS</a></li>
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
					<span id="name"><?php echo $_SESSION["fname"]." ".$_SESSION["lname"]?></span>
				</div>	
			</div>
			<div id="body" onclick="hide()">
				<div id = "form">
					<h1>About</h1>
					<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
						<input type="text" id="fname" value="<?php echo $_SESSION['fname']?>" disabled="true"><br>
						<input type="text" id="lname" value="<?php echo $_SESSION['lname']?>" disabled><br>
						<input type="email" id="profileemail" name="email" value="<?php echo $_SESSION["email"]?>" disabled><br>
						<input type="text" id="contact" value="<?php echo $_SESSION["contact"]?>" disabled><br>
						<input type="hidden" id="pass" oncopy="return false" onpaste="return false" placeholder="Enter password"><br>
						<input type="button" id="reset" onclick="location.href='editprofile.php';" value="Edit profile" style="background-color: rgba(0,100,0,0.9);">
						<input type="button" id="reset" onclick="location.href='logout.php';" value="    LogOut    " style="background-color: rgba(0,100,0,0.9);"><br>
						<input type="button" id="reset" onclick="location.href='deleteprofile.php';" value="Delete Profile" style="background-color: rgba(255,0,0,0.9); margin-left: 15%">
					</form>
				</div>		
			</div>
			<div id="footer">
				<ul>
						<li><a href="index.php"><span id="footerlive">LiveBlog</span></a></li>
						<li><a href="index.php">Home</a></li>
						<li><a href="about.php">About</a></li>
						<li><a href="contact.php">Contact</a></li>
						<li style="border-right: none;"><a href="feedback.php">Feedback</a></li>
						<li style="border-right: none;">&copy;Copyright</li>
					</ul>
			</div>		
		</div>	
	</body>
</html>
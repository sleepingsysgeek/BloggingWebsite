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
		<div id="container" >
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
					<?php 
						if($_SESSION["login"] == 0){
						echo '<button class="header_button" onclick="location.href=\'register.php\';" id="signup">SignUp</button>
							<button class="header_button" style="border-right:1px solid grey" onclick="location.href=\'login.php\';" id="login">Login</button>';
						}
						else{
							echo '<span id ="tohover"><img onclick="show()" id ="optionimage" src="option.png"></img>
								<div id = "option">
								<ul>
									<strong>
									<li><a href="profile.php">My Profile</a></li>
									<li><a href="blog.php">New Blog</a></li>
									<li><a href="myblogs.php">My Blogs</a></li>
									<li><a href="logout.php">Log Out</a></li></strong>
								</ul>
								</div></span>
							<span id="name" onclick="location.href=\'profile.php\';">'.$_SESSION["fname"]." ".$_SESSION["lname"].'</span>';
						}
					?>
					
				</div>	
			</div>
			<div id="body" onclick="hide()">
				<div id = "form">
					<h1><u>AboutUs</u></h1>
					<form style=" margin-left: 28%; margin-top: 7%;" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
					<span style="font-size: 2vw; text-align: center; text-transform: capitalize;">
						Vision:<br><span class = "detail"><strong>
						Providing a platform to share thoughts and experiences. All that we serve is quality and we service all with excellence.</strong></span> <br><br>
						<!-- Email: &nbsp;&ensp;&ensp;<span class="detail"></span><br> -->
						Developer:<br><br><span class = "detail">Praveen Mishra<br>Poonam Verma<br>Gautam Prasad Gupta<br>Ashutosh Choudhary<br>Shravan Kumar</span><br>
					</span>
						<input type="hidden" id="pass" oncopy="return false" onpaste="return false" placeholder="Enter password"><br>
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
						<li style="border-right: none; ">&copy;Copyright</li>
					</ul>
			</div>	
		</div>
		<a name="end"></a>
	</body>
</html>
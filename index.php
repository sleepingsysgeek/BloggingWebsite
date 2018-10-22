<?php
	session_start();
	if(!(isset($_SESSION["login"]))){
		$_SESSION["login"] = 0;
	}
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
		<a name="top"></a>
		<?php
			$server = "localhost";
			$username = "joker";
			$password = "djoker";
			$db = "project";
			$conn = new mysqli($server,$username,$password,$db);
			if($conn->connect_error){
				die ("Connection failed:".$conn->connect_error);
			}
			$sql = "select user.firstname,user.lastname,user.email,blog.title,blog.blog from user, blog where user.email = blog.email order by id desc";
		?>
		<div id="container" >
			<div id = "header">
				<div id="logo" onclick="location.href='index.php';"><img src="logo.png"></div>
				<div id="menu">
					<ul>
						<li><a href="index.php">HOME</a></li>
						<li><a href="#blog">BLOGS</a></li>
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
									<li><a href="logout.php">LogOut</a></li></strong>
								</ul>
								</div></span>
							<span id="name" onclick="location.href=\'profile.php\';">'.$_SESSION["fname"]." ".$_SESSION["lname"].'</span>';
						}
					?>
					
				</div>	
			</div>
			
			<div id="quotes" onclick="hide()">
				<button id="createblogbutton" onclick="location.href='blog.php';">Create Your Blog</button>
			</div>
			
			<?php
				$result = $conn->query($sql);
				if($result -> num_rows > 0){
					while($row = $result -> fetch_assoc()){
						$name = $row["firstname"]." ".$row["lastname"];
						$email = $row["email"];
						$title = $row["title"];
						$blog = $row["blog"];
						echo 
						'<div id="blogcontainer" onclick="hide()">
						<div id="detail">
							<div class = "blog">
								<span id="name1">'.$name.'</span><br>
								<span id="email">'.$email.'</span><br><br>
							</div>
						</div>
						<div id="blog">
							<button id="floatbutton" onclick="location.href=\'#top\';">Top</button>
							<div class="blog">
								<br><br><br><span id="title"><strong>Title: </strong></span><span id="titletext">'.$title.'</span>
								<p>'.$blog.'</p>
							</div>
						</div></div>'	;
					}		
				}
				else{
					echo '<div id="container">NO BLOGS YET</div>';
				}
					$conn -> close();
				?>	
			<div id="footermargin"></div>	
			<div id="footer">
				<ul>
						<li><a href="index.php"><span id="footerlive">LiveBlog</span></a></li>
						<li><a href="index.php">Home</a></li>
						<li><a href="about.php">About</a></li>
						<li><a href="contact.php">Contact</a></li>
						<li style="border-right: none;"><a href="feedback.php">Feedback</a></li>
						<li style="border-right: none; ">&copy;Copyright</li>
					</ul>
			</div>	
		</div>
		<a name="end"></a>
	</body>
</html>
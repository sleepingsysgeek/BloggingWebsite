<?php
	session_start();
?>
<html>
	<head>
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
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<body onscroll="hide()"> 
		<?php 
			if($_SESSION["login"] == 0){
				echo "<script type='text/javascript'>location.href='login.php';</script>";
			}
			$server = "localhost";
			$username = "joker";
			$password = "djoker";
			$db = "project";
			$conn = new mysqli($server,$username,$password,$db);
			if($conn->connect_error){
				die ("Connection failed:".$conn->connect_error);
			}
			$mail=$_SESSION["email"];
			$sql = "select id,email,title,blog from blog where email='$mail' order by id desc";
		?>
		<div id="container">
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
				</div>	
			</div>
			<div id="quotes" onclick="hide()">
				<span> <p style="color: white; text-align: center; font-size: 2vw; margin: 0; padding-top: 10%; text-transform: uppercase; ">WELCOME <?php echo $_SESSION["fname"]." ".$_SESSION["lname"];?>!! &nbsp; GOOD TO SEE YOU.<br><br> SCROLL DOWN TO SEE YOUR BLOGS OR CREATE A NEW ONE.</p></span>
				<button id="createblogbutton" onclick="location.href='blog.php';">Create New Blog</button>
			</div>
			<?php
				$name = $_SESSION["fname"]." ".$_SESSION["lname"];
				$email = $_SESSION["email"];
				$result = $conn->query($sql);
				if($result -> num_rows > 0){
					while($row = $result -> fetch_assoc()){
						$title = $row["title"];
						$blog = $row["blog"];
						$id = $row["id"];
						echo 
						'<div id="blogcontainer" onclick="hide()">
						<div id="detail">
							<div class = "blog">
								<span id="name1">'.$name.'</span><br>
								<span id="email">'.$email.'</span><br><br>
							</div>
						</div>
						<div id="blog">
							<button id="floatbutton" onclick="location.href=\'#top\';">TOP</button>
							<div class="blog">
								<br><br><br><span id="title"><strong>Title: </strong></span><span id="titletext">'.$title.'</span>
								<p>'.$blog.'</p>
								<form method="post" action="deleteblog.php">
									<input type="hidden" name="id" value="'.$id.'">
									<input type="submit" style="float:right; padding:5px; margin-right:15%; color:#bbb; width:auto;" value="Delete Blog">
								</form>
							</div>
						</div></div>'	;
					}	
				}
				else{
					echo '<div id="blogcontainer">NO BLOGS BY YOU</div>';
				}
					$conn -> close();
				?>		
			<div id="footermargin"></div>	
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
	</body>
</html>
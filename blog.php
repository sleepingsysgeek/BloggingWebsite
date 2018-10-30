<?php
	session_start();
?>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="style.css">
		<script type="text/javascript" src="http://js.nicedit.com/nicEdit-latest.js"></script> <script type="text/javascript">
    //<![CDATA[
            bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
      //]]>
      </script>
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
			$blog = $title = $title_err = $blog_err="";
			if($_SERVER["REQUEST_METHOD"] == "POST"){
				if(empty($_POST["title"])){
					$title_err = "title is required";
					$error = 1;
				}
				$title = htmlspecialchars($_POST["title"]);
				
				if(empty($_POST["blog"])){
					$blog_err = "Blog is empty";
					$error = 1;
				}
				$blog = $_POST["blog"];
				if($error == 0){
					$server = "localhost";
					$username = "joker";
					$password = "djoker";
					$db = "project";
					$conn = new mysqli($server,$username,$password,$db);
					if($conn->connect_error){
						die ("Connection failed:".$conn->connect_error);
					}
					$mail = $_SESSION["email"];
					$stmt = $conn ->prepare("insert into blog(blog,email,title) values(?,?,?)");
					$stmt->bind_param("sss",$blog,$mail,$title);
					$stmt->execute();
					header("location:index.php");
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
							echo '<img onclick="show()" id ="optionimage" src="option.png"></img>
								<div id = "option">
								<ul>
									<strong>
									<li><a href="profile.php">My Profile</a></li>
									<li><a href="blog.php">New Blog</a></li>
									<li><a href="myblogs.php">My Blogs</a></li>
									<li><a href="logout.php">Log Out</a></li></strong>
								</ul>
								</div>
							<span id="name" onclick="location.href=\'profile.php\';">'.$_SESSION["fname"]." ".$_SESSION["lname"].'</span>';
						}
					?>
					
				</div>	
			</div>
			<div id = "body" onclick="hide()" style="background-color:#555; height: auto;border-top: 1px solid gray;">
				<div id = "form" style="margin: 0 auto; width: 80%; position: relative;top:0;">
					<h1>Create Blog</h1>
					<form method="post" style="margin: 0 auto;" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
						<span class="error">* required field</span><br>
						<input type="text" style="padding: 1%; float: left; width:40%; margin-left:30%;";value = "<?php echo $title ?>" placeholder="Title" name="title"><span class="error">*<?php echo $title_err?></span><br>
						
						<textarea name="blog" style="width: 100%; height: 80%;  border:2px solid gray;" placeholder="Enter your blog here">Create your blog<?php echo $blog ?></textarea><span class="error">*<?php echo $blog_err?></span><br>
						<input type="submit" style="margin-left: 40%; padding: 1%; width: 20%;" id="submit" value="Create Blog">
					</form>
				</div>
			</div>	
			<div id="footermargin" style="background-color: #555; opacity: 1;"></div>	
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
		</div>	
	</body>
</html>
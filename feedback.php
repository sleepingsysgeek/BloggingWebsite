<?php
	session_start();
	if(!(isset($_SESSION["login"]))){
		echo "<script type='text/javascript'>location.href='index.php';</script>";
			}
?>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="style.css">
		<script type = "text/javascript">
			var phoneno = /^\d{10}$/;
			function match_phone(inputtxt){
	 			if((inputtxt.value.match(phoneno)){
	 				return true;	
	 			}	
	 		}
	 	</script>
	</head>
	<body onscroll="hide()">
		<?php
			if($_SESSION["login"] == 1){
				echo "<script type='text/javascript'>location.href='profile.php';</script>";
			}
			$error = 0; 
			$fname = $lname = $email = $contact = $pass = $question = $answer = "";
			$fname_err = $ques_err = $ans_err = $lname_err = $email_err = $contact_err = $pass_err = $cnf_err = "";
			
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
				
				$lname = test_input($_POST["lname"]);
				
				if($_POST["question"] == "Select your question"){
					$ques_err = "select a question";
					$error = 1;
				}
				$question = test_input($_POST["question"]);
				
				if(empty($_POST["answer"])){
					$ans_err = "answer is required";
					$error = 1;
				}
				$answer = test_input($_POST["answer"]);
				
				
				if(empty($_POST["email"])){
					$email_err = "email is required";
					$error = 1;
				}
				$email = test_input($_POST["email"]);
			
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
				
				if(empty($_POST["cnfpass"])){
					$cnf_err = "";
					$error = 1;
				}
				if($error == 0){
					$server = "localhost";
					$username = "joker";
					$password = "djoker";
					$db = "project";
					$conn = new mysqli($server,$username,$password,$db);
					if($conn->connect_error){
						die ("Connection failed:".$conn->connect_error);
					}
					$sql = "insert into user values('$fname','$email','$contact','$pass','$lname','$question','$answer')";
					if($conn->query($sql) == TRUE){
						echo "<script type='text/javascript'>location.href = 'login.php';</script>";
					}
					else{
						$cnf_err =$conn->error;
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
						<li><a href="index.php#blog">BLOGS</a></li>
						<li><a href="about.php">ABOUT</a></li>
						<li style="border-right: none;"><a href="contact.php ">CONTACT</a></li>
					</ul>
				</div>
				<div id="header_right">
					<button class="header_button" onclick="location.href='login.php';">Login</button>
				</div>
			</div>
			<div id="body" style="height: auto">
				<div id = "form">
					<h1>SignUp</h1>
					<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
						<span class = "error"><?php echo $cnf_err?><br>* required fields</span><br>
						<input type="text" name="fname" value="<?php echo "$fname"?>" placeholder="First Name" pattern="[a-zA-Z]{3,30}"><span class="error">*<?php echo "$fname_err";?></span><br>
						<input type="text" name="lname" value="<?php echo "$lname"?>" placeholder="Last Name" pattern="[a-zA-Z]{3,30}"><br>
						<input type="email" name="email" value="<?php echo "$email"?>" placeholder="email"><span class="error">*<?php echo "$email_err";?></span><br>
						<input type="text" name="contact" pattern="[0-9]{10}" value="<?php echo "$contact"?>" placeholder="Contact Number" maxlength="10"><span class="error">*<?php echo "$contact_err";?></span><br>
						<select id="select" style="font-size: 1.3vw;
													font-family: arial;
													padding: 2% 4%;
													width:60%;
													border: 2px solid white;
													border-radius: 5px;
													text-align: center;
													margin: 1%;
													background-color: transparent;
													color: #aaa;" name = "question">
							<option>Select your security question</option>
							<option>What was your first pet name</option>
							<option>Who was your first crush</option>
							<option>What is your favourite dish</option>
							<option>What is your favourite colour</option>
							<option>what do you call you girlfriend</option>
						</select><span class="error">*<?php echo "$ques_err";?></span><br>
						<input type="text" name="answer" value="<?php echo "$answer"?>" placeholder="Answer" pattern="[a-zA-Z]{3,30}"><span class="error">*<?php echo "$ans_err";?></span><br>
						<input type="password" name="pass" id="password" oncopy="return false" placeholder="Password"><span class="error">*<?php echo "$pass_err";?></span><br>
						<input type="password" id="cnfpassword" name="cnfpass" onpaste="return false"  placeholder="Confirm Password" onkeyup="check()"><span class="error">*</span><span id="message"></span><br>
						<script>
							function check() {
								if(document.getElementById("password").value == document.getElementById("cnfpassword").value){
					    			document.getElementById("message").style.color = "green";
					    			document.getElementById("message").innerHTML = "password matched";
					    		}
						    	else{
						    		document.getElementById("message").style.color = "red";
						    		document.getElementById("message").innerHTML = "password not matched";
						    	}
						    }
						</script>
						<input type="submit" id="submit" value="SignUp">
						<input type="button" id="reset" onclick="location.href='login.php';" value="Reset"><br><br>
						<span id="belowbutton">Already have an account ? <a href="login.php">Login</a></span>
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
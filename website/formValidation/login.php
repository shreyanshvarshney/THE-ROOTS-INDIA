<?php
	$NameError = "";
	$EmailError = "";
	$GenderError = "";
	$WebsiteError = "";
	$NamePattern = "/^[a-zA-Z .]+$/";
	$EmailPattern = "/^[a-zA-Z0-9._-]{3,}@[a-zA-Z0-9._-]{3,}[.]{1}[a-zA-Z0-9._-]{2,}$/";
	$WebsitePattern = "/(https:|ftp:)\/\/+[a-zA-Z0-9._\-\/?\$=&#~`!]+[.]{1}[a-zA-Z0-9._\-\/?\$=&#~`!]*/";
	if(isset($_POST['Submit'])){
		if(empty($_POST["Name"])){
			$NameError = "*Name is required";
		}
		else{
			$Name = User_Input($_POST['Name']);
			if(!preg_match($NamePattern,$Name)){
				$NameError = "*Only alphabets and white spaces are allowed.";
			}
		}
		if(empty($_POST["Email"])){
			$EmailError = "*Email is required";
		}
		else{
			$Email = User_Input($_POST['Email']);
			if(!preg_match($EmailPattern,$Email)){
				$EmailError = "*Invalid Email format.";
			}
		}
		if(empty($_POST["Gender"])){
			$GenderError = "*Gender is required";
		}
		else{
			$Gender = User_Input($_POST['Gender']);
		}
		if(empty($_POST["Website"])){
			$WebsiteError = "*Website is required";
		}
		else{
			$Website = User_Input($_POST['Website']);
			if(!preg_match($WebsitePattern,$Website)){
				$WebsiteError = "*Invalid Website address format.";
			}
		}
	}

	if(!empty($_POST['Name']) && !empty($_POST['Email'] && !empty($_POST['Gender']) && !empty($_POST['Website']))){
		if((preg_match($NamePattern,$_POST['Name']) == true) && (preg_match($EmailPattern,$_POST['Email']) == true) && (preg_match($WebsitePattern,$_POST['Website']) == true)){
			
			echo "<h2>You Submit Details</h2><br>";
			echo "Name: ".strtolower($_POST['Name'])."<br>";
			echo "Email: ".strtolower($_POST['Email'])."<br>";
			echo "Gender: ".strtolower($_POST['Gender'])."<br>";
			echo "Website: ".$_POST['Website']."<br>";
			echo "Comment: ".strtolower($_POST['Comment'])."<br>";

			$subject = "Submitted details";
			$message = "Name: ".$_POST['Name'].", "."Email: ".$_POST['Email'].", "."Gender: ".$_POST['Gender'].", "."Website: ".$_POST['Website'].", "."Comment: ".$_POST['Comment']." ";
		}
		else{
			echo "Enter the correct form details to proceed.";
		}
	}

	function User_Input($data){
		return $data;
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<center><h1 style="border:2px black solid;width:50%;text-align:center;">Form with validation</h1></center>
	
	<fieldset>
		<legend class="legend">Please fill the required fields.</legend>
		<form action="login.php" method="POST">
			<label for="Name">Name*:</label>
			<input type="text" id="Name" name="Name"><span class="error"><?php echo $NameError; ?></span><br><br>
			<label for="Email">Email*:</label>
			<input type="Email" id="Email" name="Email"><span class="error"><?php echo $EmailError; ?></span><br><br>
			Gender*:
			<label for="Male">Male</label>
			<input type="radio" id="Male" value="Male" name="Gender">
			<label for="Female">Female</label>
			<input type="radio" id="Female" value="Female" name="Gender"><span class="error"><?php echo $GenderError; ?></span><br><br>
			<label for="Website">Website*:</label>
			<input type="text" id="Website" name="Website"><span class="error"><?php echo $WebsiteError; ?></span><br><br>
			<label for="Comment">Comment:</label>
			<textarea name="Comment" id="Comment" cols="20" rows="5"></textarea><br><br>

			<input type="Submit" name="Submit">
		</form>
	</fieldset>
</body>
</html>
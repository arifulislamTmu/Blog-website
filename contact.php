
	<?php
	 require_once('header.php');
	?>
	<?php

		if($_SERVER['REQUEST_METHOD']=='POST'){
			$firstname = $fm->validation($_POST['firstname']);
			$lastname = $fm->validation($_POST['lastname']);
			$email = $fm->validation($_POST['email']);
			$body = $fm->validation($_POST['body']);
		
			$firstname = mysqli_real_escape_string($db->link, $firstname);
			$lastname = mysqli_real_escape_string($db->link, $lastname);
			$email = mysqli_real_escape_string($db->link, $email);
			$body = mysqli_real_escape_string($db->link, $body);
		$error="";
		if(empty($firstname)){
			$error="First name Feild Must Not be Empty";
		}elseif(empty($lastname)){
			$error="Last name Feild Must Not be Empty";
		}elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
			$error="Invalid Email Address !!";
		}elseif(empty($body)){
			$error="Message Feild Must Not be Empty";
		}
		else{
			$msg="";
			$query = "INSERT INTO tbl_contact(firstname,lastname,email,body) VALUES('$firstname','$lastname','$email','$body')";
			$inserted_rows = $db->insert($query);
			if ($inserted_rows) {
			$msg="<span class='success'>Message Sent Successfully.
			</span>";
			}else {
			$msg= "<span class='error'>Page Not Created !</span>";
			}
		}
		}
?>

	<div class="contentsection contemplete clear">
		<div class="maincontent clear">
			<div class="about">
			<h2>Contact us</h2>
			<?PHP if(isset($error)) { echo "<span style='color:red'> $error</span>"; }?>
			<?PHP if(isset($msg)) { echo "<span style='color:green'> $msg</span>"; }?>
		
			<form action="" method="post">
				<table>
				<tr>
					<td>Your First Name:</td>
					<td>
					<input type="text" name="firstname" placeholder="Enter first name" />
					</td>
				</tr>
				<tr>
					<td>Your Last Name:</td>
					<td>
					<input type="text" name="lastname" placeholder="Enter Last name" />
					</td>
				</tr>
				
				<tr>
					<td>Your Email Address:</td>
					<td>
					<input type="email" name="email" placeholder="Enter Email Address"/>
					</td>
				</tr>
				<tr>
					<td>Your Message:</td>
					<td>
				    	<textarea name="body"></textarea>
					</td>
				</tr>
				<tr>
					<td></td>
					<td>
					<input type="submit" name="submit" value="Sent"/>
					</td>
				</tr>
		</table>
	<form>				
 </div>
 </div>

	<?php
	 require_once('sidebar.php');
	?>
	<?php
	 require_once('footer.php');
	?>
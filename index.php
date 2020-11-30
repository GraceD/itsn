<?php
session_start();
if (isset($_POST['submit']))
{
	$conn = mysqli_connect("localhost","root","password","ITSN");
if(!$conn){  
	echo "<script type='text/javascript'>alert('Database failed');</script>";
  	die('Could not connect: '.mysqli_connect_error());  
}
$email=$_POST['email'];
$pw=$_POST['pw'];
$sql = "SELECT * FROM user WHERE email = '$email' AND passwrd = '$pw';";
$sql_result = mysqli_query ($conn, $sql) or die ('request "Could not execute SQL query" '.$sql);
		$user = mysqli_fetch_assoc($sql_result);
		if(!empty($user)){
			$_SESSION['user_info'] = $user['email'];
			$message='Logged in successfully';
			echo "<script> window.location.assign('account.php'); </script>";
		}
		else{
			$message = 'Wrong email or password.';
		}
	echo "<script type='text/javascript'>alert('$message');</script>";
}
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.1.1">
    <title>ITSN Login</title>

<link href="css/bootstrap.min.css" rel="stylesheet">
    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    
    <link href="css/signin.css" rel="stylesheet">
  </head>

  <script type="text/javascript">
	function validate()	{
		var EmailId=document.getElementById("email");
		var atpos = EmailId.value.indexOf("@");
    	var dotpos = EmailId.value.lastIndexOf(".");
		var pw=document.getElementById("pw");
		if (atpos<1 || dotpos<atpos+2 || dotpos+2>=EmailId.value.length) 
		{
        	alert("Enter valid email-ID");
			EmailId.focus();
        	return false;
   		}
   		if(pw.value.length< 8)
		{
			alert("Password consists of atleast 8 characters");
			pw.focus();
			return false;
		}
		return true;
	}
</script>

<body>
<div class="card-body text-center mx-auto bg-white mt-0 shadow col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
	<div id="loginarea" class="text-center">
  <form id="login" action="index.php" onsubmit="return validate()" method="post" name="login">
  <img class="mb-4" src="images/ITSNNoText.png" alt="" width="72" height="72">
  <h1 id="logintext" class="h3 mb-3 font-weight-normal">Sign in</h1>
	<table>
		<tr><td><div class="data">E-Mail:</div></td><td><input type="text" id="email" size="30" maxlength="30" name="email"/></td></tr>
		<tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>
		<tr><td><div class="data">Password:</div></td><td><input type="password" id="pw" size="30" maxlength="30" name="pw"/></td></tr>
		<tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>
	</table>
	<br>
	<INPUT TYPE="Submit" value="Submit" name="submit" id="submit" class="btn btn-lg btn-primary btn-block">
</div>
	<p class="mt-5 mb-3 text-muted">&copy; 2017-2020</p>
  </form></div>
  <br><br><br>
</div>

</body>
</html>
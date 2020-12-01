<?php 
// starts session
session_start();
// checks to see if user is logged in, if not, throws errors, redirects to login page
	if(empty($_SESSION['user_info'])){
    echo "<script type='text/javascript'>alert('Please login before proceeding further!');</script>";
    echo "<script> window.location.assign('index.php'); </script>";
	}
// connects to database
$conn = mysqli_connect("localhost","root","password","ITSN");
if(!$conn){  
	echo "<script type='text/javascript'>alert('Database failed');</script>";
  	die('Could not connect: '.mysqli_connect_error());  
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Cancel a Reservation</title>
// makes sure a room has been selected off the form
	<script type="text/javascript">
		function validate()	{
			var rooms=document.getElementById("rooms");
			if(rooms.selectedIndex==0)
			{
				alert("Please select a reservation");
				rooms.focus();
				return false;		
			}
		}
	</script>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<link rel="stylesheet" href="css/styles.css" >
<!------ Include the above in your HEAD tag ---------->
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>

<!--Navbar -->
<nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark">

  <a class="navbar-brand" href="index.php">
  <img src="images/ITSNNoText.png" width="40" height="40" alt=""> ITSN</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarText">
    
    <span class="navbar-text ml-auto">
	<a class="navbar-brand" > <?php echo $_SESSION['user_info']; ?> </a>
    <a class="navbar-brand" href="bookit.php"> Book a Room </a>
     <a class="navbar-brand" href="account.php"> Account </a>
     <a class="navbar-brand" href="logout.php" id="signOut"> Sign Out </a>
    </span>
  </div>
</nav>

<div style="height: 625px;" class="container-fluid bg-gradient p-5">
      <div class="row m-auto text-center w-75">
      <div class="card-body text-center mx-auto bg-white mt-0 shadow col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">

      <div class="container">
			<div class="row">
				<div class="span10">
					<?php
					//makes sure the form has been submitted, a room has been chosen, deletes chosen room from bookings table
						if(isset($_POST['formSubmit'])) 
						{
							if(isset($_POST['formRoom']))
								$aRoom = $_POST['formRoom'];
							
							if(empty($aRoom)) 
						    {
								echo("<div class='alert alert-error'>You didn't select any room.</div>\n");
							} 
						    else 
						    {
						        $N = count($aRoom);
								for($i=0; $i < $N; $i++)
								{
									$query = "delete from bookings where confirmation_number = '" . $aRoom[$i] . "'";
									$result = $conn->query($query);
								}
								echo "<div class='alert alert-success'>Your room(s) is(are) cancelled. You will be automatically redirected after 5 seconds.</div>";
								header("refresh: 5; account.php");
							}   
						}
					?>
				</div>
			</div>
		</div>
      
<!-- Footer -->
</div>
</div>
</div>
<footer class="footer bottom footer-expand-lg footer-dark bg-dark">

  <!-- Copyright -->
  <div style="color: gray" class="footer-copyright text-center py-3">© 2020 Copyright:
    <a href="#"> Titan Technology</a>
  </div>
  <!-- Copyright -->

</footer>
<!-- Footer -->
<!------ END Body Gradient Container ##################################################################### ---------->
	
	
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	</body>
	</html>

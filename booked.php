<?php 
session_start();
	if(empty($_SESSION['user_info'])){
    echo "<script type='text/javascript'>alert('Please login before proceeding further!');</script>";
    echo "<script> window.location.assign('index.php'); </script>";
	}
$conn = mysqli_connect("localhost","root","password","ITSN");
if(!$conn){  
	echo "<script type='text/javascript'>alert('Database failed');</script>";
  	die('Could not connect: '.mysqli_connect_error());  
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Make a Reservation</title>

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

<?php 
if (!isset($_POST['formRoom'])) {
    header('Location: account.php'); exit;
}
	
// get the posted data
$date = strip_tags( utf8_decode( $_POST['datepicker'] ) );
$name = strip_tags( utf8_decode( $_POST['namePersonClassroom'] ) );
$numPeo = strip_tags( utf8_decode( $_POST['NumberOfPeople'] ) );
$roomSize = strip_tags( utf8_decode( $_POST['select'] ) );
$userid = strip_tags( utf8_decode( $_SESSION['user_info']) );
	
// check that name was entered
if (empty($name))
    $error = 'You must enter your name.';

// check that address was entered
if (empty($date))
    $error = 'You must enter a date.';

// check that mobile number was entered
if (empty($numPeo))
    $error = 'You must enter number of people.';

// check that user id was entered
if (empty($roomSize))
    $error = 'You must enter your room size.';



// check if an error was found - if there was, send the user back to the form
if (isset($error)) {
    header('Location: book.php?e='.urlencode($error)); exit;
}


$roomNumber = NULL;

for($i=1; $i<11; $i++)
{
	$chparam = "ch" . strval($i);
	if( !empty($_POST[$chparam]) )
	{
		$query = "INSERT INTO bookings(username, confirmation_number, firstName, date, numberOfPeople, roomID) VALUES ('". $userid ."', '" . intval($i) . "', '". $name ."', '". $date ."', '". $numPeo ."', '". $roomSize."')";
//		$results = mysql_real_escape_string($query);
		$results = $conn->query($query);
		if (!$results)
		{
			die ("Could not confirm booking: <br />". mysql_error());
		}
	}
}


header('Location: account.php?s='.urlencode('Your room is booked.')); exit;

?>
      
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
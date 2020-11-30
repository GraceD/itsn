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
	<title>Cancel a Reservation</title>

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
						$query = "select * from bookings";
						$result = $conn->query($query);
						if ( mysqli_num_rows($result) == 0 )
						{
							echo "You have not booked any rooms.";
						}
						else
						{
							echo "<form action='cancelled.php' method='POST' onsubmit='return validateCheckBox();'>";
								echo "<table align='center' class='table table-hover table-bordered table-striped span6' align='center'>";
									echo "<thead>";
										echo "<tr>";
											echo "<th>Select</th>";
											echo "<th>Room Number</th>";
											echo "<th>Confirmation Number</th>";
											echo "<th>Date</th>";
										echo "</tr>";
									echo "</thead>";
									echo "<tbody>";
								
									while($row = mysqli_fetch_array($result))
									{
										echo "<tr>";
											echo "<td><input type='checkbox' name='formRoom[]' value='".$row['confirmation_number']."'/></td>";
											echo "<td>". $row['roomID'] ."</td>";
											echo "<td>". $row['confirmation_number'] ."</td>";
											echo "<td>". $row['date'] ."</td>";
										echo "</tr>";				
									}
									echo "<tr>";
										echo "<td>";
										echo "</td>";
										echo "<td>";
											echo '<button type="submit" name="formSubmit" class="btn btn-info">';
												echo '<i class="icon-ok icon-white"></i> Submit';
											echo '</button>';
										echo "</td>";
										echo "<td>";
											echo '<button type="reset" class="btn btn-info">';
												echo '<i class="icon-refresh icon-black"></i> Clear';
											echo '</button>';
										echo "</td>";
										echo "<td>";
										echo "</td>";
									echo "</tr>";
									echo "</tbody>";
								echo "</table>";
							echo "</form>";
						}
					?>
				</div>
			</div>
		</div>
		<script src="http://code.jquery.com/jquery-latest.min.js"></script>
		<script>window.jQuery || document.write('<script src="js/jquery-latest.min.js">\x3C/script>')</script>
		<script type="text/javascript" src="js/bootstrap.js"></script>
		<script type="text/javascript">
			function validateCheckBox()
			{
				var c = document.getElementsByTagName('input');
				for (var i = 0; i < c.length; i++)
				{
					if (c[i].type == 'checkbox')
					{
						if (c[i].checked) 
						{
							return true;
						}
					}
				}
				alert('Please select at least 1 room.');
				return false;
			}
		</script>

    </div>
    </div>
    </div>
<!-- Footer -->

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
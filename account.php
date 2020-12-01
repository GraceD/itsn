<?php 
// start session
session_start();
// if no user logged in, throw error and send back to login page
	if(empty($_SESSION['user_info'])){
		echo "<script type='text/javascript'>alert('Please login before proceeding further!');</script>";
		echo "<script> window.location.assign('index.php'); </script>";
	}
// connect to database
$conn = mysqli_connect("localhost","root","password","ITSN");
if(!$conn){  
	echo "<script type='text/javascript'>alert('Database failed');</script>";
  	die('Could not connect: '.mysqli_connect_error());  
}
?>

<!DOCTYPE html>
<html>
<head>

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



<div style="height: 950px;" class="container-fluid bg-gradient p-5">
      <div class="row m-auto text-center w-75">
        
<!------ My Bookings ##################################################################### ---------->
        <div class="container-fluid col-sm-3 booking-item lightblue">
          <div class="pricing-divider ">
              
            <h1 class="my-0  text-light font-weight-normal mb-3">Bookings </h1>
			
             <svg class='pricing-divider-img' enable-background='new 0 0 300 100' height='100px' id='Layer_1' preserveAspectRatio='none' version='1.1' viewBox='0 0 300 100' width='300px' x='0px' xml:space='preserve' xmlns:xlink='http://www.w3.org/1999/xlink' xmlns='http://www.w3.org/2000/svg' y='0px'>
          <path class='deco-layer deco-layer--1' d='M30.913,43.944c0,0,42.911-34.464,87.51-14.191c77.31,35.14,113.304-1.952,146.638-4.729
	c48.654-4.056,69.94,16.218,69.94,16.218v54.396H30.913V43.944z' fill='#FFFFFF' opacity='0.6'></path>
          <path class='deco-layer deco-layer--2' d='M-35.667,44.628c0,0,42.91-34.463,87.51-14.191c77.31,35.141,113.304-1.952,146.639-4.729
	c48.653-4.055,69.939,16.218,69.939,16.218v54.396H-35.667V44.628z' fill='#FFFFFF' opacity='0.6'></path>
          <path class='deco-layer deco-layer--3' d='M43.415,98.342c0,0,48.283-68.927,109.133-68.927c65.886,0,97.983,67.914,97.983,67.914v3.716
	H42.401L43.415,98.342z' fill='#FFFFFF' opacity='0.7'></path>
          <path class='deco-layer deco-layer--4' d='M-34.667,62.998c0,0,56-45.667,120.316-27.839C167.484,57.842,197,41.332,232.286,30.428
	c53.07-16.399,104.047,36.903,104.047,36.903l1.333,36.667l-372-2.954L-34.667,62.998z' fill='#FFFFFF'></path>
        </svg>
          </div>
          <div class="card-body bg-white mt-0 shadow">
            <ul class="list-unstyled mb-5 position-relative">
            <?php
                          $servername = "localhost";
                          $username = "root";
                          $password = "password";
                          $dbname = "ITSN";

                          // Create connection
                          $conn = new mysqli($servername, $username, $password, $dbname);
                          // Check connection
                          if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                          }
		// print booking history to page
                          $sql = "SELECT confirmation_number, roomID, date, time FROM bookings";
                          $result = $conn->query($sql);

                          if ($result->num_rows > 0) {
                            echo "<table><tr><th>RoomID</th><th>Date</th></tr>";
                            // output data of each row
                            while($row = $result->fetch_assoc()) {
                              echo "<tr><td>".$row["roomID"]."</td><td>".$row["date"]."</td></tr>";
                            }
                            echo "</table>";
                          } else {
                            echo "no bookings";
                          }
                          $conn->close();
                          ?>
              </br></br></br>
            </ul>

	        </div>
        </div>
 <!------ END My Boookings ##################################################################### ---------->
			
<!------ Account Info ##################################################################### ---------->
        <div class="container-fluid col-sm-3 booking-item lightblue">
          <div class="pricing-divider ">
              
            <h1 class="my-0  text-light font-weight-normal mb-3"> Info </h1>
			
             <svg class='pricing-divider-img' enable-background='new 0 0 300 100' height='100px' id='Layer_1' preserveAspectRatio='none' version='1.1' viewBox='0 0 300 100' width='300px' x='0px' xml:space='preserve' xmlns:xlink='http://www.w3.org/1999/xlink' xmlns='http://www.w3.org/2000/svg' y='0px'>
          <path class='deco-layer deco-layer--1' d='M30.913,43.944c0,0,42.911-34.464,87.51-14.191c77.31,35.14,113.304-1.952,146.638-4.729
	c48.654-4.056,69.94,16.218,69.94,16.218v54.396H30.913V43.944z' fill='#FFFFFF' opacity='0.6'></path>
          <path class='deco-layer deco-layer--2' d='M-35.667,44.628c0,0,42.91-34.463,87.51-14.191c77.31,35.141,113.304-1.952,146.639-4.729
	c48.653-4.055,69.939,16.218,69.939,16.218v54.396H-35.667V44.628z' fill='#FFFFFF' opacity='0.6'></path>
          <path class='deco-layer deco-layer--3' d='M43.415,98.342c0,0,48.283-68.927,109.133-68.927c65.886,0,97.983,67.914,97.983,67.914v3.716
	H42.401L43.415,98.342z' fill='#FFFFFF' opacity='0.7'></path>
          <path class='deco-layer deco-layer--4' d='M-34.667,62.998c0,0,56-45.667,120.316-27.839C167.484,57.842,197,41.332,232.286,30.428
	c53.07-16.399,104.047,36.903,104.047,36.903l1.333,36.667l-372-2.954L-34.667,62.998z' fill='#FFFFFF'></path>
        </svg>
          </div>
          <div class="card-body bg-white mt-0 shadow">
            <ul class="list-unstyled mb-5 position-relative">
            <?php
                          $servername = "localhost";
                          $username = "root";
                          $password = "password";
                          $dbname = "ITSN";

                          // Create connection
                          $conn = new mysqli($servername, $username, $password, $dbname);
                          // Check connection
                          if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                          }
			// get info from database
                          $sql = "SELECT username, studentID, email, name FROM user";
                          $result = $conn->query($sql);
			// print user information to account page
                          if ($result->num_rows > 0) {
                            echo "<table><tr><th>StudentID</th><th>Name</th></tr>";
                            // output data of each row
                            while($row = $result->fetch_assoc()) {
                              echo "<tr><td>".$row["studentID"]."</td><td>".$row["name"]."</td></tr>";
                            }
                            echo "</table>";
                          } else {
                            echo "error";
                          }
                          $conn->close();
                          ?>
              </br>
              </br>
              </br>
              </br>
       
            </ul>

	        </div>
        </div>
	
<!------ END Second Card ##################################################################### ---------->




<!------ Support Info ##################################################################### ---------->
        <div class="container-fluid col-sm-3 booking-item lightblue">
          <div class="pricing-divider ">
              
            <h1 class="my-0  text-light font-weight-normal mb-3">Support</h1>
			
             <svg class='pricing-divider-img' enable-background='new 0 0 300 100' height='100px' id='Layer_1' preserveAspectRatio='none' version='1.1' viewBox='0 0 300 100' width='300px' x='0px' xml:space='preserve' xmlns:xlink='http://www.w3.org/1999/xlink' xmlns='http://www.w3.org/2000/svg' y='0px'>
          <path class='deco-layer deco-layer--1' d='M30.913,43.944c0,0,42.911-34.464,87.51-14.191c77.31,35.14,113.304-1.952,146.638-4.729
	c48.654-4.056,69.94,16.218,69.94,16.218v54.396H30.913V43.944z' fill='#FFFFFF' opacity='0.6'></path>
          <path class='deco-layer deco-layer--2' d='M-35.667,44.628c0,0,42.91-34.463,87.51-14.191c77.31,35.141,113.304-1.952,146.639-4.729
	c48.653-4.055,69.939,16.218,69.939,16.218v54.396H-35.667V44.628z' fill='#FFFFFF' opacity='0.6'></path>
          <path class='deco-layer deco-layer--3' d='M43.415,98.342c0,0,48.283-68.927,109.133-68.927c65.886,0,97.983,67.914,97.983,67.914v3.716
	H42.401L43.415,98.342z' fill='#FFFFFF' opacity='0.7'></path>
          <path class='deco-layer deco-layer--4' d='M-34.667,62.998c0,0,56-45.667,120.316-27.839C167.484,57.842,197,41.332,232.286,30.428
	c53.07-16.399,104.047,36.903,104.047,36.903l1.333,36.667l-372-2.954L-34.667,62.998z' fill='#FFFFFF'></path>
        </svg>
          </div>
          <div class="card-body bg-white mt-0 shadow">
            <ul class="list-unstyled mb-5 position-relative">
              <li><b> Call 479-968-0646 for support!</b> </li>
			  <button type="button" class="btn btn-link" id="cancelReservation" ><a  href="cancel.php">Cancel Reservation</> </a></li>
        </br>
        </br>
        </br>
            </ul>
            </div>
      </div>
	
<!------ END Second Card ##################################################################### ---------->


<!-- Footer -->

<footer class="footer fixed-bottom footer-expand-lg footer-dark bg-dark">

  <!-- Copyright -->
  <div style="color: gray" class="footer-copyright text-center py-3">© 2020 Copyright:
    <a href="#"> Titan Technology</a>
  </div>
</footer>
<!------ END Body Gradient Container ##################################################################### ---------->



	 <script src="roomFunctions.js"></script>
	
	
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	
    </div>
</div>
	</body>

	</html>

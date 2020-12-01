<?php 
//start session
session_start();
// if no one is logged in, throw error, redirect to login page
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
	<title>Book a Room</title>
	// confirm that a room has been selected from the form
	<script type="text/javascript">
		function validate()	{
			var rooms=document.getElementById("rooms");
			if(rooms.selectedIndex==0)
			{
				alert("Please select your room");
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

<div class="container-fluid bg-gradient p-5">
      <div class="row m-auto text-center w-75">
        
<!------ Begin First "Room Tab" ##################################################################### ---------->
        <div class="container-fluid col-sm-6 booking-item lightblue">
          <div class="pricing-divider ">
              <h3 class="text-light">Classroom</h3>
            <h4 class="my-0 display-2 text-light font-weight-normal mb-3">25-90 <span class="h5"></span></h4>
			<span class="h3 text-light">Occupants</span>
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
              <li><b>15x25 and 30x45 sized rooms available</b> </li>
              <li><b>2 Hour maximum rental time</b> </li>
              <li><b>Wifi+White Board+Projector</b></li>
            </ul>
			

			
			
	<!-- Button trigger modal-->
	<button type="button" class="btn btn-lg btn-block  btn-custom" data-toggle="modal" data-target="#classroomModal" id = "bookit1">Book-it-Now</button>


<!-- Modal -->
<div class="modal fade" id="classroomModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Reserve Your Room</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="content">
		
<div class="container">
    	<div class="row">
	
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb30 text-center">
                        <h2>Classroom Booking</h2>
                        </div>
                        </div>
	<div class="row">
	// form to pick a classroom
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb30">
                        <div class="tour-booking-form">
						<form action='booked.php' method='POST' name="formRoom" onsubmit="return validate()">
                                <div class="row">
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                        <h4 class="tour-form-title">Fill out what room and what time</h4>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                                        <div class="form-group">
                                            <label class="control-label required" for="select" id = "classroomSize">Room Size</label>
                                            <div class="select">
                                                <select id="select" name="select" class="form-control">
                                                    <option value="">What Room Would You Like?</option>
                                                    <option value="25" id="15by25">15 x 25</option>
                                                    <option value="90" id="30by45">30 x 45</option>
                                                   
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                                        <div class="form-group">
                                            <label class="control-label" for="datepicker">What Day?</label>
                                            <div class="input-group">
                                                <input id="datepickerClassroom" name="datepicker" type="date" placeholder="Date" class="form-control" required>
                                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span> </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                                        <div class="form-group">
                                            <label class="control-label required" for="select">Number of Persons:</label>
                                            <input id="classroomPeopleNum" type="number" placeholder="NumberOfPeople" class="form-control" required min="1" max="50">
                                        </div>
                                    </div>
                                    
                              
                                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                                        <div class="form-group">
                                            <label class="control-label" for="name" id="namePersonClassroom">Name on Reservation</label>
                                            <input id="name" type="text" placeholder="First Name" class="form-control" required>
                                        </div>
                                    </div>
                                    
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                        <button type="submit" name="singlebutton" class="btn btn-primary" id="bookItClassroom">Book IT!</button>
                                    </div>
                                </div>
                                </form>
							</div>
                        
						</div>
					</div>
				</div>
			</div>
		</div>
	<div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        
				</div>
			</div>
		</div>
	</div>
	<!--- END OF MODAL --->


	</div>
 </div>
 <!------ END First "Room Tab" ##################################################################### --------

<!------ Begin Second "Room Tab" ##################################################################### ---------->  
        <div class="container-fluid col-sm-6 booking-item green">
          <div class="pricing-divider ">
              <h3 class="text-light">Auditorium</h3>
            <h4 class="my-0 display-2 text-light font-weight-normal mb-3">165-260 <span class="h5"></span></h4>
			<span class="h3 text-light">Occupants</span>
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
              <li><b>45x55 and 60x65sized rooms available </b> </li>
              <li><b>2 Hour maximum rental time</b> </li>
              <li><b>Wifi+White Board+Projector </b></li>
            </ul>
            <!-- Button trigger modal-->
	<button type="button" class="btn btn-lg btn-block  btn-custom" data-toggle="modal" data-target="#auditoriumModal" id = "bookit1">Book-it-Now</button>


<!-- Modal -->
<div class="modal fade" id="auditoriumModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Reserve Your Room</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="content">
		
<div class="container">
    	<div class="row">
	
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb30 text-center">
                        <h2>Auditorium Booking</h2>
                        </div>
                        </div>
	<div class="row">
	// form to pick auditorium room
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb30">
                        <div class="tour-booking-form">
						<form action='account.php' method='POST' name="audrooms" onsubmit="return validate()">
                                <div class="row">
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                        <h4 class="tour-form-title">Fill out what room and what time</h4>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                                        <div class="form-group">
                                            <label class="control-label required" for="select">Room Number</label>
                                            <div class="select">
                                                <select id="select" name="select" class="form-control">
                                                    <option value="">What Room Would You Like?</option>
                                                    <option value="45x55" id="45x55">45 x 55</option>
                                                    <option value="60x65" id="60x65">60 x 65</option>
                                                    
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                                        <div class="form-group">
                                            <label class="control-label" for="datepicker">What Day?</label>
                                            <div class="input-group">
                                                <input id="datepickerAud" name="datepicker" type="date" placeholder="Date" class="form-control" required>
                                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span> </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                                        <div class="form-group">
                                            <label class="control-label required" for="select">Number of Persons:</label>
                                            <input id="audPeopleNum" type="number" placeholder="NumberOfPeople" class="form-control" required min="1" max="50">
                                        </div>
                                    </div>
                                    
                              
                                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                                        <div class="form-group">
                                            <label class="control-label" for="name">Name on Reservation</label>
                                            <input id="namePersonAud" type="text" placeholder="First Name" class="form-control" required>
                                        </div>
                                    </div>
                                    
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                        <button type="submit" name="singlebutton" class="btn btn-primary" id="bookItAud">Book IT!</button>
                                    </div>
                                </div>
                                </form>
							</div>
                        
						</div>
					</div>
				</div>
			</div>
		</div>
	<div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        
				</div>
			</div>
		</div>
	</div>
	<!--- END OF MODAL --->

        
        
      </div>
    </div>
	
<!------ END Third "Room Tab" ##################################################################### ---------->

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

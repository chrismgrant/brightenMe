<!doctype html>
<html lang="en">
	<head>
	<title>brighten.me | class</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="stylesheets/css/bootstrap.css">
	<script src="js/jquery-1.7.1.min.js"></script>
	<script src="js/bootstrap-modal.js"></script>
    <script src="js/bootstrap-alerts.js"></script>
    <script src="js/bootstrap-twipsy.js"></script>
    <script src="js/bootstrap-popover.js"></script>
    <script src="js/bootstrap-dropdown.js"></script>
    <script src="js/bootstrap-scrollspy.js"></script>
    <script src="js/bootstrap-tabs.js"></script>
    <script src="js/bootstrap-buttons.js"></script>
	<link rel="shortcut icon" type= "image/x-icon" href="assets/ico/favicon.ico" />
	<style>
		footer {padding-bottom: 40px;}
	</style>
		<?php
			require_once("connectvars.php");
			$username = $_COOKIE['usernameCookie'];
			$userid = $_COOKIE['userIdCookie'];
			$query = "SELECT * FROM user_info WHERE username = '$username'";
			$data = mysqli_query($dbc, $query)
								or die("Error querying database.");
			$row = mysqli_fetch_array($data);
			$username = $row['username'];
			$name = $row['name'];
			$email = $row['email'];
			$major = $row['major'];
			$class = $row['class'];
			$college = $row['college'];
			$phone = $row['phone'];
			
			$classnumPOST = $_POST['class'];
			$classQuery = "SELECT * FROM classes WHERE classnum = '$classnumPOST'";
			$data = mysqli_query($dbc, $classQuery)
								or die("Error getting class info.");
			$row = mysqli_fetch_array($data);
			$classnamePOST = $row['classname'];
			
		?>
	</head>
	
	<body>
	
		  <div class="topbar-wrapper" style="z-index: 5;">
			<div class="topbar" data-dropdown="dropdown" >
			  <div class="topbar-inner">
				<div class="container-fluid">
				  <ul class="nav">
					<li><a href="profile.php">Profile</a></li>
					<li><a></a></li>
					<li><a href="classes.php">Classes</a></li>
					<li><a></a></li><li><a></a></li><li><a></a></li><li><a></a></li><li><a></a></li>
					<li><a></a></li><li><a></a></li><li><a></a></li><li><a></a></li><li><a></a></li>
					<li><a></a></li><li><a></a></li><li><a></a></li><li><a></a></li><li><a></a></li>
					<li><a></a></li><li><a></a></li><li><a></a></li><li><a></a></li><li><a></a></li>
					<li><a></a></li><li><a></a></li><li><a></a></li><li><a></a></li><li><a></a></li>
					<li><a></a></li><li><a></a></li><li><a></a></li><li><a></a></li><li><a></a></li>
					<li><a></a></li><li><a></a></li><li><a></a></li><li><a></a></li><li><a></a></li>
					<li><a></a></li><li><a></a></li><li><a></a></li><li><a></a></li><li><a></a></li>
					<li><a></a></li><li><a></a></li><li><a></a></li><li><a></a></li><li><a></a></li>
					<li><a></a></li><li><a></a></li><li><a></a></li><li><a></a></li><li><a></a></li>
					<li><a></a></li><li><a></a></li><li><a></a></li><li><a></a></li><li><a></a></li>
					<li><a></a></li><li><a></a></li><li><a></a></li><li><a></a></li><li><a></a></li>
					<li><a></a></li><li><a></a></li><li><a></a></li>
				  <ul class="nav secondary-nav">
					<li class="dropdown">
					<?php echo"
					  <a href='profile.php' class='dropdown-toggle'>$name</a>
					  <ul class='dropdown-menu'>
					  	<li><a href='editprofile.php'>Edit Profile</a></li>
						<li class='divider'></li>
						<li><a href='index.html'>Logout</a></li>
					";?>
					  </ul>
					</li>
					</ul>
				</div>
			  </div><!-- "topbar-inner" -->
			</div><!-- "topbar" -->
		  </div><!-- "topbar-wrapper" -->
		  
		
		<div class="container-fluid">
			<div class="sidebar-left">
				<div class="well">
					<h3>Tutors & Tutees:</h3>
					<dl>
					<dt>Tutors:</dt>
					<?php 
						$tutorBoolean = false;
						$tutorBooleanTwo = false;
						$classQuery = "SELECT * FROM classes WHERE classnum = '$classnumPOST' AND tutorstatus = '1'";
						$data = mysqli_query($dbc, $classQuery)
											or die("Error getting classes.");
						while ($row = mysqli_fetch_array($data)) {
							$classUserID = $row['classes_user_id'];
							$classQueryNext = "SELECT name FROM user_info WHERE user_id = '$classUserID'";
							$dataTwo = mysqli_query($dbc, $classQueryNext)
												or die("Error.");
							while ($rowTwo = mysqli_fetch_array($dataTwo)) {
								$nameClass = $rowTwo['name'];
								if ($nameClass == $name) {
									$tutorBoolean = true;
									$tutorBooleanTwo = true;
								}
								if (!$tutorBoolean) {
									echo "<form action='profilePage.php' method='POST'>";
									echo "<dd><button class='btn primary' type='submit' name='class' value='$nameClass'>$nameClass</button></dd>";
									echo "</form>";
								}
								else {
									echo "<dd><button class='btn primary disabled' type='submit' name='class' value='$nameClass'>$nameClass</button></dd></br>";
								}
								$tutorBoolean = false;
							}
						}
					?>
					</dl>
					<dl>
					<dt>Tutees:</dt>
					<?php 
						$tuteeBoolean = false;
						$tuteeBooleanTwo = false;
						$classQuery = "SELECT * FROM classes WHERE classnum = '$classnumPOST' AND tutorstatus = '0'";
						$data = mysqli_query($dbc, $classQuery)
											or die("Error getting classes.");
						while ($row = mysqli_fetch_array($data)) {
							$classUserID = $row['classes_user_id'];
							$classQueryNext = "SELECT name FROM user_info WHERE user_id = '$classUserID'";
							$dataTwo = mysqli_query($dbc, $classQueryNext)
												or die("Error.");
							while ($rowTwo = mysqli_fetch_array($dataTwo)) {
								$nameClass = $rowTwo['name'];
								if ($nameClass == $name) {
									$tuteeBoolean = true;
									$tuteeBooleanTwo = true;
								}
								if (!$tuteeBoolean) {
									echo "<form action='profilePage.php' method='POST'>";
									echo "<dd><button class='btn primary' type='submit' name='class' value='$nameClass'>$nameClass</button></dd>";
									echo "</form>";
								}
								else {
									echo "<dd><button class='btn primary disabled' type='submit' name='class' value='$nameClass'>$nameClass</button></dd></br>";
								}
								$tuteeBoolean = false;
							}
						}
					?>
					</dl>
				</div>
			</div><!-- "sidebar" -->
			
			<div class="content">
				<div class="hero-unit">
				<?php echo"
					<h2>$classnamePOST</h2>
					<h3>$classnumPOST</h3>
				";?>
				
				<?php
					if ($tutorBooleanTwo) {
						echo "<h4>You are currently a TUTOR in this class.</h4>";
					}
					else if ($tuteeBooleanTwo) {
						echo "<h4>You are currently a TUTEE in this class.</h4>";
					}
					else {
						echo "<h4>Do you want to be a tutor or tutee?</h4>";
						echo "<h5>Add this class to your profile now:</h5></br>";
						echo "<form action='classPageAddTutor.php' method='POST'>";
						echo "<button class='btn small primary' type='submit' name='class' value='$classnumPOST'>TUTOR</button>";
						echo "</form>";
						echo "<form action='classPageAddTutee.php' method='POST'>";
						echo "<button class='btn small primary' type='submit' name='class' value='$classnumPOST'>TUTEE</button>";
						echo "</form>";
					}
				?>
					</br>
					<form action="classes.php">
						<button type="submit" class="btn large info">BACK</button>
					</form>
				</div>
			</div>
		
			<footer>
				<div class="pull-right">
					<small><a href="contact.html">contact us</a></small>
					<span class="divider">/</span>
				   <a href="about.html"><small>about us</small></a>
				</div>
			</footer>
		</div>
	</body>
</html>
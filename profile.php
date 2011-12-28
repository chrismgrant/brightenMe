<!doctype html>
<html lang="en">
	<head>
	<title>brighten.me | profile</title>
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
			
		?>
	</head>
	
	<body>
	
		  <div class="topbar-wrapper" style="z-index: 5;">
			<div class="topbar" data-dropdown="dropdown" >
			  <div class="topbar-inner">
				<div class="container-fluid">
				  <ul class="nav">
					<li class="active"><a href="profile.php">Profile</a></li>
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
					<h3>Basic Info:</h3>
					<dl>
					<?php echo "
						<dt>Name:</dt>
						<dd>$name</dd>
						<dt>E-Mail Address:</dt>
						<dd>$email</dd>
						<dt>College:</dt>
						<dd>$college</dd>
						<dt>Major:</dt>
						<dd>$major</dd>
						<dt>Class:</dt>
						<dd>$class</dd>
						<dt>Phone Number:</dt>
						<dd>$phone</dd>
					";?>
					</dl>
				</div>
				<div class="well">
					<h3>Add Classes:</h3>
					<form action="add_class_tutor.html">
						<button type="submit" class="btn large info">Tutor</button>
					</form>
					<form action="add_class_tutee.html">
						<button type="submit" class="btn large info">Tutee</button>
					</form>
				</div>
			</div><!-- "sidebar" -->
			
			<div class="content">
				<div class="hero-unit">
					<h2>Classes:</h2>
					<h3>Classes you tutor:</h3>
					<dl>
						<?php
						$classes_query = "SELECT * FROM classes WHERE classes_user_id = '$userid' AND tutorstatus = '1'";
						$data = mysqli_query($dbc, $classes_query)
											or die("Error getting classes");
						if (!$data) {
							echo "No classes yet.";
						}
						else {
							while ($row = mysqli_fetch_array($data)) {
								$classname = $row['classname'];
								$classnum = $row['classnum'];
								$prof = $row['prof'];
								$creds = $row['creds'];
								echo "<dt>$classnum: $classname</dt>";
								echo "<dd><strong>Professor:</strong> $prof</dd>";
								echo "<dd>$creds</dd>";
							}
						}
						?>
					</dl>
					<h3>Classes you need help in:</h3>
					<dl>
						<?php
						$classes_query = "SELECT * FROM classes WHERE classes_user_id = '$userid' AND tutorstatus = '0'";
						$data = mysqli_query($dbc, $classes_query)
											or die("Error getting classes");
						if (!$data) {
							echo "No classes yet.";
						}
						else {
							while ($row = mysqli_fetch_array($data)) {
								$classname = $row['classname'];
								$classnum = $row['classnum'];
								$prof = $row['prof'];
								echo "<dt>$classnum: $classname</dt>";
								echo "<dd><strong>Professor:</strong> $prof</dd>";
							}
						}
						?>
					</dl>
				</div>
				<div class="hero-unit">
					<h2>Availability:</h2>
					<p>
						<?php
							$aQuery = "SELECT availability FROM user_info WHERE user_id = '$userid'";
							$data = mysqli_query($dbc, $aQuery)
												or die("Error getting availability.");
							if (!$data) {
								echo "No availability entered yet.";
							}
							else {
								$row = mysqli_fetch_array($data);
								$aval = $row['availability'];
								echo "$aval";
							}
						?>
					</p>
					<form action="update_availability.php" method="POST">
						Update your availability here:</br>
						<input type="text" name="availability" size="70"/>
						<button type="submit" class="btn large primary">Update Availability</button>
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
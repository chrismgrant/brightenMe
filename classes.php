<!doctype html>
<html lang="en">
	<head>
	<title>brighten.me | classes</title>
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
					<li><a href="profile.php">Profile</a></li>
					<li><a></a></li>
					<li class="active"><a href="classes.php">Classes</a></li>
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
					<h3>Total List of Classes:</h3>
					<dl>
					<?php 
						$classQuery = "SELECT DISTINCT classnum FROM classes";
						$data = mysqli_query($dbc, $classQuery)
											or die("Error getting classes.");
						while ($row = mysqli_fetch_array($data)) {
							$classnum = $row['classnum'];
							$query = "SELECT classname FROM classes WHERE classnum = '$classnum'";
							$dataTwo = mysqli_query($dbc, $query);
							$rowTwo = mysqli_fetch_array($dataTwo);
							$classname = $rowTwo['classname'];
							echo "<dt>$classnum:</dt>";
							echo "<dd>$classname</dd>";
						}
					?>
					</dl>
				</div>
			</div><!-- "sidebar" -->
			
			<div class="content">
				<div class="hero-unit">
					<h2>Classes:</h2>
					<h3>Click the Class Number button to view that class page.</h3>
						<?php
						$classQuery = "SELECT DISTINCT classnum FROM classes";
						$data = mysqli_query($dbc, $classQuery)
											or die("Error getting classes.");
						while ($row = mysqli_fetch_array($data)) {
							$classnum = $row['classnum'];
							$query = "SELECT classname FROM classes WHERE classnum = '$classnum'";
							$dataTwo = mysqli_query($dbc, $query);
							$rowTwo = mysqli_fetch_array($dataTwo);
							$classname = $rowTwo['classname'];
							echo "<form action='classPage.php' method='POST'>";
							echo "<dl>";
							echo "<dt>$classname</dt>";
							echo "<dd><button class='btn primary' type='submit' name='class' value='$classnum'>$classnum</button></dd>";
							echo "</dl>";
							echo "</form>";
						}
						?>
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
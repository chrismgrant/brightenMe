<!doctype html>
<html>
	<head>
	<title>brighten.me | email</title>
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
			
			$emailTo = $_POST['email'];
			$query = "SELECT * FROM user_info WHERE email = '$emailTo'";
			$data = mysqli_query($dbc, $query);
			$row = mysqli_fetch_array($data);
			$nameTo = $row['name'];
			
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
		  
	    <div class= "container-fluid">
	        <div class = "sidebar-left">
	            <h1>
	                E-Mail a user:
	                <br>
					<?php echo "
	                <em>$nameTo</em>
					";?>
	            </h1>
	        </div>
	        <div class = "content">
	            <div class = "hero-unit">
                <form id="registerForm" class="form-stacked" action="try_email.php" method="POST">
                    <span class="label important">Important</span>
                    <p>All forms are required:</p>
                    <label for="email">Send E-Mail To:</label>
					<?php echo "
                    <input type='text' name='email' value='$emailTo'/><br>
					";?>
					<label for="subject">Subject:</label>
					<input type="text" name="subject"/><br>
                    <label for="message">Message Body:</label>
                    <textarea rows="15" cols="60" id="subject" name="message"></textarea><br>
                    <input class= "btn success large" type="submit" id="submit" value="Send E-Mail" name="submit"/>
                </form>
                </div>
                <footer>
                    <div class = "pull-right">
                        <small><a href="contact.html">contact us</a></small>
                        <span class="divider">/</span>
                       <a href="about.html"><small>about us</small></a>
                    </div>
                </footer>
             </div>
        </div>
	</body>
</html>
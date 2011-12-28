<!doctype html>
<html>
	<head>
	<title>brighten.me | edit profile</title>
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
	                Edit your profile.
	                <br>
	                <em> Fill out all.</em>
	            </h1>
	        </div>
	        <div class = "content">
	            <div class = "hero-unit">
                <form id="registerForm" class="form-stacked" action="try_editprofile.php" method="POST">
                    <span class="label important">Important</span>
                    <p>All forms are required to update:</p>
					<?php echo "
                    <label for='name'>Full Name:</label>
                    <input type='text' id='name' name='name' value='$name'/><br>
                    <label for='username'>Username:</label>
                    <input type='text' id='username' name='username' autofocus='autofocus' value='$username'/><br>
                    <label for='password'>Password:</label>
                    <input type='password' id='password' name='password'/><br>
                    <label for='repassword'>Confirm Password:</label>
                    <input type='password' id='repassword' name='repassword'/><br>
                    <label for='email'>Email:</label>
                    <input type='email' id='email' name='email' value='$email'/><br>
                    <label for='reemail'>Confirm email:</label>
                    <input type='email' id='reemail' name='reemail'/><br>
					";?>
                    <label for="college">Home College:</label>
                    <select name="college" id="college">
                        <option value="Carnegie Institute of Technology">Carnegie Institute of Technology</option>
                        <option value="College of Fine Arts">College of Fine Arts</option>
                        <option value="Dietrich College of Humanities & Social Sciences">Dietrich College of Humanities & Social Sciences</option>
                        <option value="Tepper School of Business">Tepper School of Business</option>
                        <option value="H. John Heinz III College">H. John Heinz III College</option>
                        <option value="Mellon College of Science">Mellon College of Science</option>
                        <option value="School of Computer Science">School of Computer Science</option>
                    </select><br>
                    <label for="major">Major:</label>
					<?php echo "
                    <input type='text' id='major' name='major' value='$major'/><br>
					";?>
                    <label for="class">Class Year:</label>
                    <select name="class" id="class">
                        <option value="2012">2012</option>
                        <option value="2013">2013</option>
                        <option value="2014">2014</option>
                        <option value="2015">2015</option>
                    </select><br>
                    <label for="phone">Phone Number: ex: 123-436-7890</label>
					<?php echo "
                    <input type='text' id='phone' name='phone' value='$phone'/><br>
					";?>
                    <input class= "btn success large" type="submit" id="submit" value="Update Your Account" name="submit"/>
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
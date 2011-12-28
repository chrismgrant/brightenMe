<!doctype html>
<html>
	<head>
	<title>Brighten.Me</title>
	<meta charset="utf-8">
	</head>
	<body>
		<?php
			require_once("connectvars.php");
			$userid = $_COOKIE['userIdCookie'];
			$query = "SELECT * FROM classes WHERE classes_user_id = '$userIdCookie'"; 
			$data = mysqli_query($dbc, $query)
								or die("Error querying database.");
			$row = mysqli_fetch_array($data);
			$classname = $row['classname'];
			$classnum = $row['classnum'];
			$prof = $row['prof'];
			$creds = $row['creds'];
		?>
		<div id="search">
			<p>Search for classes: </p>
			<form action="edit_classes.php" method="GET">
				Class Name:
				<input type="radio" name="searchby" value="classname"/><br>
				Class Number:
				<input type="radio" name="searchby" value="classnum"/><br>
				<input type="text" name="class"/><br>
				<input type="submit" name="submit" value="Search"/>
			</form>
		</div>
		<div id="searchClasses">
			
		</div>
	</body>
</html>
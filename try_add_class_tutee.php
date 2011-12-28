<!doctype html>
<html>
<head>
<meta charset="utf-8">
<?php
	require_once("connectvars.php");
		$userid = $_COOKIE['userIdCookie'];
		// get variables from POST superglobal
		$classname = $_POST['classname'];
		$classnum = $_POST['classnum'];
		$prof = $_POST['prof'];
		$creds = "";
		$tutorstatus = 0;
		// query database - insert new class
		$query = "INSERT INTO classes SET classes_user_id = '$userid',
										classname = '$classname',
										classnum = '$classnum',
										prof = '$prof',
										creds = '$creds',
										tutorstatus = '$tutorstatus'";
		mysqli_query($dbc, $query)
			or die("Error adding class.");
		echo "<script>
				window.location = 'profile.php';
			</script>";
?>
</head>
<body>
</body>
</html>
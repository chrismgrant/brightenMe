<!doctype html>
<html>
<head>
<meta charset="utf-8">
<?php
	require_once("connectvars.php");
	if (isset($_POST['username'])) {
		// get variables from POST superglobal
		$userid = $_COOKIE['userIdCookie'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		$name = $_POST['name'];
		$email = $_POST['email'];
		$major = $_POST['major'];
		$college = $_POST['college'];
		$class = $_POST['class'];
		$phone = $_POST['phone'];
		// query database - insert new user
		$query = "UPDATE user_info SET username = '$username',
										password = '$password',
										name = '$name',
										email = '$email',
										major = '$major',
										college = '$college',
										class = '$class',
										phone = '$phone'
				WHERE user_id = '$userid'";
		mysqli_query($dbc, $query)
			or die("Error adding new user.");
		$query = "SELECT user_id FROM user_info WHERE username = '$username'";
		$data = mysqli_query($dbc, $query)
							or die("Error getting userid.");
		$row = mysqli_fetch_array($data);
		$userid = $row['user_id'];
		setcookie("usernameCookie", "$username");
		setcookie("userIdCookie", "$userid");
		echo "<script>
				window.location = 'profile.php';
			</script>";
	}
?>
</head>
<body>
</body>
</html>
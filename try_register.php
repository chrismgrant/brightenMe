<!doctype html>
<html>
<head>
<meta charset="utf-8">
<?php
	require_once("connectvars.php");
	if (isset($_POST['username']) && isset($_POST['password']) && 
		isset($_POST['repassword']) && isset($_POST['email']) && 
		isset($_POST['reemail']) && isset($_POST['major']) && 
		isset($_POST['college']) && isset($_POST['class']) && 
		isset($_POST['phone']) && isset($_POST['name']) &&
		$_POST['password'] == $_POST['repassword'] &&
		$_POST['email'] == $_POST['reemail'] &&
		$_POST['username'] != "" && $_POST['password'] != "" &&
		$_POST['repassword'] != "" && $_POST['name'] != "" &&
		$_POST['email'] != "" && $_POST['reemail'] != "" &&
		$_POST['major'] != "" && $_POST['phone'] != "") {
		// get variables from POST superglobal
		$username = $_POST['username'];
		$password = $_POST['password'];
		$name = $_POST['name'];
		$email = $_POST['email'];
		$major = $_POST['major'];
		$college = $_POST['college'];
		$class = $_POST['class'];
		$phone = $_POST['phone'];
		// query database - insert new user
		$query = "INSERT INTO user_info SET username = '$username',
										password = '$password',
										name = '$name',
										email = '$email',
										major = '$major',
										college = '$college',
										class = '$class',
										phone = '$phone'";
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
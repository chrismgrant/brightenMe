<!doctype html>
<html>
<head>
<meta charset="utf-8">
<?php
	require_once("connectvars.php");
		$userid = $_COOKIE['userIdCookie'];
		// get variables from POST superglobal
		$email = $_POST['email'];
		$subject = $_POST['subject'];
		$message = $_POST['message'];
		$query = "SELECT * FROM user_info WHERE user_id = '$userid'";
		$data = mysqli_query($dbc, $query)
			or die("Error.");
		$row = mysqli_fetch_array($data);
		$returnEmail = $row['email'];
		$headers = "From: $returnEmail";
		mail($email, $subject, $message, $headers);
		echo "<script>
				window.location = 'profile.php';
			</script>";
?>
</head>
<body>
</body>
</html>
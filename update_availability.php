<!doctype html>
<html>
<head>
<meta charset="utf-8">
<?php
	$availability = $_POST['availability'];
	require_once("connectvars.php");
			$userid = $_COOKIE['userIdCookie'];
	$query = "UPDATE user_info SET availability = '$availability' WHERE user_id = '$userid'";
	if (!$availability == "") {
		mysqli_query($dbc, $query);
	}
	echo "<script>
			window.location = 'profile.php';
  		</script>";
?>
</head>
<body>
</body>
</html>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<?php
	require_once("connectvars.php");
	if (isset($_POST['username']) && isset($_POST['password'])) {
		$username = $_POST['username'];
		$password = $_POST['password'];
		if ($username == "" || $password == "") {
			echo "<script>
						window.alert('Please enter a valid username and password.');
						window.location = 'index.html';
				</script>";
		}
		else {
			$query = "SELECT * FROM user_info";
			$data = mysqli_query($dbc, $query)
								or die("Error querying database.");
			$validUser = false;
			while ($row = mysqli_fetch_array($data)) {
				$arrayUser = $row['username'];
				$arrayPass = $row['password'];
				if ($username == $arrayUser && $password == $arrayPass) {
					$userid = $row['user_id'];
					setcookie("usernameCookie", "$arrayUser");
					setcookie("userIdCookie", "$userid");
					$validUser = true;
				}
			}
			if (!$validUser) {
				echo "<script>
						window.alert('Please enter a valid username and password.');
						window.location = 'index.html';
					</script>";
				}
			else {
				echo "<script>
						window.location = 'profile.php';
					</script>";
			}
		}
	}
?>
</head>
<body></body>
</html>
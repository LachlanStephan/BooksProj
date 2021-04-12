<?php
	session_start();
	//echo ISSET($_SESSION['userID'])."something";
	if (ISSET($_SESSION['userID'])) {
			unset($_SESSION['userID']);
			session_destroy();
	}

		
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="view/style.css">
	<?php require('model/dbConnection.php')?>
</head>
<body>
	<div class="sampleFormBox">
		<form action="controller/processLog.php" method="POST">
			
		<legend>Admin login</legend>	
			<label for="uname">Username:</label>
			<input type="text" name="adminUser">
	
			<label for="upass">Password:</label>
			<input type="text" name="password">

			<input type="submit">
	

		</form>

  </div>
</body>
</html>
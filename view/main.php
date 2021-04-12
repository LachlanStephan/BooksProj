<?php
session_start();
//echo ISSET($_SESSION['userID'])."something";
//echo $_SESSION['userID']."hellothere";
if ((!ISSET($_SESSION['userID']))) {
	header('Location:../index.php');

	require('../../model/dbConnection.php');


}


?>


<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>DB project</title>
	<link rel="stylesheet" type="text/css" href="style.css">

</head>

<body>
<?php
	require('./pages/header.php');
	require('./pages/body.php');
	require('./pages/footer.php');

?>

</body>

</html>

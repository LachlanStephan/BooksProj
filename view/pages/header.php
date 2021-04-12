

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
<header>
		<h1>Books database project</h1>
		<div class="loginWrapper">
			<li><a href="../index.php">Logout</a></li>
			<?php
					 echo $_SESSION['role'];
								if(ISSET($_SESSION['role'])) {
								if($_SESSION['role'] == "Admin") {
								echo '<div class="loginWrapper"><li><a href="./regForm.html">Add new user</a></li></div>';
							}
					}
				?>	
		</div>
	</header>
  
</body>
</html>
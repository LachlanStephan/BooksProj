<?php 
	require('../model/dbConnection.php');
	require('../model/dbFunctions.php');

	session_start();
	if (!isset($_SESSION['userID'])) {
		header('Location../index.php');
	}

	?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title></title>
	<link rel="stylesheet" href="./style.css" media="all">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>

		<div class="sampleFormBox">
			<form action="../controller/processBookAuthorAdd.php" method="POST"> 
				<fieldset>

					<legend>New book</legend>
					<br>
					<label for="bookT">Book title</label>
					<input type="text" name="bookTitle" required>

					<label for="bookOT">Original book title</label>
					<input type="text" name="bookOT">

					<label for="yop">Year of publicaton</label>
					<input type="text" name="yop">

					<label for="genre">Genre</label>
					<input type="text" name="genre">

					<label for="sold">How many millions were sold?</label>
					<input type="text" name="sold">

					<label for="bookL">Language written</label>
					<input type="text" name="bookL">

					<label for="author">Author</label>
					<select name="author" value=0>
					<option value=0>--</option>
			
					<?php 
						$author = selectAllAuthors();
						foreach($author as $row) {
							echo "<option value=".$row['AuthorID'].">".$row['Name'].",".$row['Surname']."</option>";
							}
					?>
					</select> 
					<br>

					<legend>New Author</legend>
					<br>
					<label for="name">First name</label>
					<input type="text" name="name">

					<label for="surname">Surname</label>
					<input type="text" name="surname">

					<label for="nation">Nationality</label>
					<input type="text" name="nation">

					<label for="birthYear">Birth year</label>
					<input type="text" name="birthYear">

					<label for="deathYear">Death Year</label>
					<input type="text" name="deathYear">

					<br>

					<input type="submit">
					<br>
					<a href="./main.php">Home</a>

				</fieldset>
			</form>
		</div>
</body>

</html>
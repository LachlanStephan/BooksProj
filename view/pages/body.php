<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
	<?php
  require('../model/dbConnection.php');
  require('../model/dbFunctions.php');
 ?>
</head>
<body>

<div class="mainWrapper">
		<aside>
			<ul class="eventsWrapper">
				<li><a href="./addBookAuthor.php">Add new book and author</a></li>
				<li><a href="./addImage.php">Add a cover image to the folder</a></li>
			</ul>
			
		</aside>

			
		<main>
		<?php
			selectAllBooks();

			deleteBook($bookID);
		?>
		</main>


	</div>
</body>
</html>
<?php
	mysql_connect("localhost","root","");
	mysql_select_db("wt19913230");
	$query="SELECT distinct title, bookid
	from book";
	$result=mysql_query($query);
?>

<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
		<meta name="author" content="Sonali Marasini">
		<title>itBooks | Edit</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>
	
	<body>
	
		<div class="header">
			<div class="inner">
		
				<div class="logo">
					<h1>it<span>BOOKS</span></h1>
				</div>
				
				<ul class="menu">
					<a href="index.html"><li>Home</li></a>
					<a href="books.php"><li>Books</li></a>
					<a href="review.php"><li>Review</li></a>
					<a href="about.html"><li>About</li></a>
				</ul>
				
			</div>
		</div>
		
		<div class="editbooksname">
			<h2>Edit Book's Name</h2>
			<table cellspacing="0">
					<tr>
						<th>BooksName</th>
						<th>UpdatedName</th>
					</tr>
					<?php
					while($rows=mysql_fetch_assoc($result))
					{
					?>
					<tr>
						<td><?php echo "$rows[title]";?></td>
						<td><form action="update.php" method=post>
						<input type="text" name="updatedname">
						<input type="hidden" name="id" value="<?php echo "$rows[bookid]"?> ">
						<input type="submit" value="Update"></form></td>
					</tr>
					<?php
					}
					?>
			</table>
		</div>
	
	<footer>
		<p>SonM, Copyright &copy; 2019</p>
	</footer>
	
</html>
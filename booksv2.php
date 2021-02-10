<?php
	mysql_connect("localhost","root","");
	mysql_select_db("wt19913230");
	$query="SELECT r.bookid,b.title ,r.rating,r.reviewdate,r.reviewerid,w.reviewername
			FROM Report r, Reviewer w, Book b
			WHERE r.reviewerId=w.reviewerid
			AND b.bookId=r.bookId";
	$result=mysql_query($query);
	$queryoption="select distinct title from book order by 1";
	$resultoption=mysql_query($queryoption);
	$opt="<select name='booksoption' onchange=submit();> <option>All</option>";
	while ($row=mysql_fetch_assoc($resultoption)){
		$opt .= "<option values='{$row['title']}'>{$row['title']}</option>";
	}
	$opt.="</select>";
?>

<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
		<meta name="author" content="Sonali Marasini">
		<title>itBooks | Books</title>
		<link rel="stylesheet" type="text/css" href="css/style1.css">
	</head>
	
	<body>
	
		<div class="header">
			<div class="inner">
		
				<div class="logo">
					<h1>it<span>BOOKS</span></h1>
				</div>
				
				<ul class="menu">
					<a href="indexv2.html"><li>Home</li></a>
					<a href="booksv2.php"><li>Books</li></a>
					<a href="reviewv2.php"><li>Review</li></a>
					<a href="aboutv2.html"><li>About</li></a>
				</ul>
				
			</div>
		</div>
		
		<div class="link">
			<a href="editv2.php">Click here to edit book's name</a>
		</div>
		
		
		<div class="reviewform">
			<h2>Select a book to read the review</h2>
			<label>Books list</label>
			<form method="post" action="booksv2.php">
				
				<?php echo $opt;?>
				<label><input type="submit" name="submitoption" value="Submit" class="button" onclick="submit();"></label>
				
			</form>
		</div>
		
		
		
		<?php 
		
		$optionvalue = false;
		if(isset($_POST['booksoption'])){
		$optionvalue = $_POST['booksoption'];
		} 
		
		$queryindi="SELECT r.bookid,b.title ,r.rating,r.reviewdate,r.reviewerid,w.reviewername
				FROM Report r, Reviewer w, Book b
				WHERE r.reviewerId=w.reviewerid
				AND b.bookId=r.bookId
				and b.title='$optionvalue'";
				$resultindi=mysql_query($queryindi);
		
		if ($optionvalue!=null){
		
		switch ($optionvalue){
			case "All":
		?>
		
		<article>
			<table cellspacing="0">
				<tr>
					<th>BookID</th>
					<th>Title</th>
					<th>Rating</th>
					<th>ReviewDate</th>
					<th>ReviewerID</th>
					<th>ReviewerName</th>
				</tr>
				<?php
					while($rows=mysql_fetch_assoc($result))
					{
				?>
				<tr>
					<td><?php echo $rows["bookid"];?></td>
					<td><?php echo $rows["title"];?></td>
					<td><?php echo $rows["rating"];?></td>
					<td><?php echo $rows["reviewdate"];?></td>
					<td><?php echo $rows["reviewerid"];?></td>
					<td><?php echo $rows["reviewername"];?></td>
				</tr>
				<?php
					}
				?>
			</table>
		</article>
		<?php 
		break;
		default:?>
		<article>
			<table cellspacing="0">
				<tr>
					<th>BookID</th>
					<th>Title</th>
					<th>Rating</th>
					<th>ReviewDate</th>
					<th>ReviewerID</th>
					<th>ReviewerName</th>
				</tr>
				<?php
					while($rows=mysql_fetch_assoc($resultindi))
					{
				?>
				<tr>
					<td><?php echo $rows["bookid"];?></td>
					<td><?php echo $rows["title"];?></td>
					<td><?php echo $rows["rating"];?></td>
					<td><?php echo $rows["reviewdate"];?></td>
					<td><?php echo $rows["reviewerid"];?></td>
					<td><?php echo $rows["reviewername"];?></td>
				</tr>
				<?php
					}
				?>
			</table>
		</article>
		<?php
		}}
		?>
		
	</body>
	
	<footer>
		<p>SonM, Copyright &copy; 2019</p>
	</footer>
	
</html>
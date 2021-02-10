<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
		<meta name="author" content="Sonali Marasini">
		<title>itBooks | Review</title>
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
		
		
		<div class="reviewform">
			<h2>Write a Review</h2>
			<form method="post" action="review.php">
				<label>BookID: <input type="text" name="bookid" placeholder="Enter BookID" class="formoption"></label>
				<label>Title: <input type="text" name="title" placeholder="Enter Title" class="formoption"></label>
				<label>Rating: <input type="text" name="rating" placeholder="Enter Rating" class="formoption"></label>
				<label>Review Date: <input type="date" name="reviewdate" placeholder="0000-00-00 00:00:00" class="formoption"></label>
				<label>ReviewerID: <input type="text" name="reviewerid" placeholder="Enter Rating" class="formoption"></label>
				<label>ReviewerName: <input type="text" name="reviewername" placeholder="Enter Reviewer Name" class="formoption"></label>
				<label><input type="submit" name="submit" value="Submit" class="button" onClick="alert('Are you sure?');"></label>
				<label><input type="reset" name="reset" value="Clear" class="button"></label>
			</form>
		</div>
		
		<?php
			if (isset($_POST['submit'])){
				$conn=mysqli_connect('localhost','root','','wt19913230');
					
				$bookid=$_POST['bookid'];
				$title=$_POST['title'];
				$rating=$_POST['rating'];
				$reviewdate=$_POST['reviewdate'];
				$reviewerid=$_POST['reviewerid'];
				$reviewername=$_POST['reviewername'];
				
				$sql1="insert into report (bookid,rating,reviewdate,reviewerid) values ('$bookid','$rating','$reviewdate','$reviewerid')";
			
				$query1=mysqli_query($conn,$sql1);
				
				if($query1){
					$sql2="insert into book (title,bookid) values ('$title','$bookid')";
					$query2=mysqli_query($conn,$sql2);
				}
				
				if($query2){
					$sql3="insert into reviewer (reviewerid,reviewername) values ('$reviewerid','$reviewername')";
					$query3=mysqli_query($conn,$sql3);
					echo "Your form was successfully submitted";
				}
			}
			
		?>
		
	</body>
	
	<footer>
		<p>SonM, Copyright &copy; 2019</p>
	</footer>
	
</html>
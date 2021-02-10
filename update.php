<?php
	mysql_connect("localhost","root","");
	mysql_select_db("wt19913230");
	$newname = $_POST['updatedname'];
	$id=$_POST['id'];
	$query="update book set title='$newname'
	where bookid='$id'";
	if (mysql_query($query)){
		echo "updated";
		header("refresh:1; url=edit.php");
	}
	else 
	{		echo "not updated";}
?>
<?php
	include_once('database/connection.php');
	if($_SERVER['REQUEST_METHOD']=='POST'){
		foreach ($_POST as $key => $value) {
			$query = "delete from events where id='".$key."'";
			$dbh->query($query);
		}
		
	
		
		
	}else{
		echo 'Bad request';
	}

	

?>

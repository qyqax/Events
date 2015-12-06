<?php
	include_once('database/connection.php');
	include_once('core.php');

	if($_SERVER['REQUEST_METHOD']=='POST'){
	
		foreach ($_POST as $key => $value) {
			$query = "insert into user_event('event_id','user_id') values('".$key."','".$_SESSION['user_id']."')";
			$dbh->query($query);

		}
		
	
		
		
	}else{
		echo 'Bad request';
	}

	

?>
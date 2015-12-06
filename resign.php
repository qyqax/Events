<?php
	include_once('database/connection.php');
	include_once('core.php');

	if($_SERVER['REQUEST_METHOD']=='POST'){
	
		foreach ($_POST as $key => $value) {

			$query = "delete from user_event where event_id ='".$key."' AND user_id= '".$_SESSION['user_id']."'";
		


			$dbh->query($query);

		}
		
	
		
		
	}else{
		echo 'Bad request';
	}

	

?>
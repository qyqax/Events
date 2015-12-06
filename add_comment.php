<?php
	include_once('database/connection.php');
	include_once('core.php');
	
	if($_SERVER['REQUEST_METHOD']=='POST'){
		
	if(isset($_POST['content'])){

		$content = $_POST['content'];
		$event_id = $_POST['event_id'];
		
		
	$id = generateUniqueId();
	$query = "insert into comments('id','content','event_id','author_id','date')
	 values('".$id."','".$content."','".$event_id."','".$_SESSION['user_id']."','".date('Y-m-d')."')";
	$dbh->query($query);
	
	header("Location:details.php?id=".$event_id);


	}else{
		echo '<script>You cannot add empty comment</script>';
	}
		
	}else{
		echo 'Bad request';
	}

	

?>
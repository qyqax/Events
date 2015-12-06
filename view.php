<?php

include_once('database/connection.php'); 
 include ('templates/header.php');

 try {

  } catch (PDOException $e) {
    die($e->getMessage());
  }

if(!loggedin()){
	header('Location: login.php');
}else{


if(isset($_GET['id'])){

	$query = "SELECT * FROM events WHERE id='".$_GET['id']."' AND owner_id='".$_SESSION['user_id']."'";
       // $user = $dbh->prepare($query);
        $event = $dbh->query($query, PDO::FETCH_ASSOC);//execute();
        $event = $event->fetch();

     
	
}else{
	echo 'there is no such event';
}

}
?>

							
<?php
echo '
		
<div class="view_panel">
<div>
<a class="action_btn update" href="update.php?id='.$event['id'].'">UPDATE</a>
<button class="action_btn delete" id='.$event['id'].'>DELETE</button>
							
</div>
	<h2>'.$event['name'].'</h2>

	<div style="float:left;	"><img style="width:100%;height:100%" src="images/'.$event['id'].'"></div>
	<div class="details" style="float:left">
		<div>
			'.$event['description'].'
		</div>
		<div>Date: '.$event['date'].'</div>
		<div>Created at:'.$event['created_at'].'</div>
		<div>Updated at:'.$event['updated_at'].'</div>
	</div>

</div>

';

?>
<div style="clear: both"></div>
<?php
  include ('templates/footer.php');
?>
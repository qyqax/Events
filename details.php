<?php

include_once('database/connection.php'); 
 include ('templates/header.php');

 try {

  } catch (PDOException $e) {
    die($e->getMessage());
  }



if(isset($_GET['id'])){

	$query = "SELECT * FROM events WHERE id='".$_GET['id']."'";
       // $user = $dbh->prepare($query);
        $event = $dbh->query($query, PDO::FETCH_ASSOC);//execute();
        $event = $event->fetch();

        $peoples_enrolled =0 ;

        $query = "SELECT count(*) FROM user_event WHERE event_id='".$_GET['id']."'";
        $query =  $dbh->prepare($query);
        $query->execute();



        $peoples_enrolled= $query->fetchColumn();

        if(empty($peoples_enrolled)){
          $peoples_enrolled = 0;
        }
     
	
}else{
	echo 'there is no such event';
}


?>

<?php
$content ='';
if(loggedin()){
$id= "'".$event['id']."'";
  $query = "SELECT count(*) FROM user_event WHERE event_id=".$id." and user_id='".$_SESSION['user_id']."'";
    $query =  $dbh->prepare($query);
  $query->execute();

  if($query->fetchColumn()!=0){
    $content = '<button class="action_btn delete" onclick="resign('.$id.')">RESIGN</button>';
  }else{

    $content = '<button class="action_btn update" onclick="participate('.$id.')">PARTICIPATE!</button>';
  }

  
}else{
  $content = '<a class="action_btn view" href="login.php">LOG IN TO PARTICIPATE</a>';
}
echo '
    
<div class="view_panel" >
<div>
  '.$content.'

</div>
  <h2>'.$event['name'].'</h2>

  <div style="float:left"><img  style="width:100%;height:100%" src="images/'.$event['id'].'"></div>
  <div class="details" style="float:left">
    <div style="height:145px;overflow:hidden;color:#76A3F9;display:block">
      '.$event['description'].'
    </div>
    <div style="background-color:#90F9B7">
    <div>Date: '.$event['date'].'</div>
    
    </div>
  </div>

</div>
<div style="clear: both"></div>
<div class="view_panel"> '.$peoples_enrolled.' people participate</div>


';

?>
<?php if(loggedin()){
  echo '
<button id="add_comment" style="margin-left: 450px" class="action_btn view view_panel" >ADD COMMENT</button>
<div id="content" class="view_panel" style="display: none">
  <form style="width: auto" action="add_comment.php" method="POST" id="comment">

      <input type="hidden" name="event_id" value=<?=$event["id"]?>>
      <textarea class="comment" name="content" form="comment"></textarea>
      <button style="margin-left: 5px" type="submit" class="action_btn update view_panel" >PUBLISH</button>
    
  </form>
</div>    ';} ?>  

<div  class="view_panel">

<h3>Comments:</h3>

<?php 
//$dbh->query("delete from comments where 1");
  foreach ($dbh->query("select * from comments where event_id='".$event['id']."'") as $key => $comment) {

    $sql= "select name from users where id='".$comment['author_id']."'";
    $authour = $dbh->query($sql);
    $authour= $authour->fetchColumn();
    echo '
    <div class="comment_content">
      <div>'.$comment['content'].'</div>
      <div>Author: '.$authour.' </div>
      <div>Date: '.$comment['date'].' </div>
    </div>

    '; 
  }

?>
</div>
<?php
  include ('templates/footer.php');
?>
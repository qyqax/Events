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


}


?>




<a href="create.php" class="action_btn create">Create new Event</a>
<h2 style="text-align: center;color:#5FAB5D">Here you can manage your events</h2>
<table>
	<tr>
		<th>#</th>
		<th></th>
		<th>Name</th>
		<th>Description</th>
		<th>Date</th>
		<th>Actions</th>
	</tr>
<?php

					foreach ($dbh->query("Select * from Events ") as $key=> $row) {  
					$index = $key+1; 
						echo '<tr>
							<td style="width:5px;">'.$index.'</td>
							<td valign="middle" align="center"><img width="200" src="images/'.$row['id'].'"></td>
							<td style="width:80px;">'.$row['name'].'</td>
							<td style="width:400px;">'.$row['description'].'</td>
							<td style="width:100px;margin:0">'.$row['date'].'</td>
							<td style="width:350px;margin:0">
								<a class="action_btn view" href="view.php?id='.$row['id'].'">VIEW</a>
								<a class="action_btn update" href="update.php?id='.$row['id'].'">UPDATE</a>
								<button class="action_btn delete deleteEvent" id='.$row['id'].'>DELETE</button>
							
							</td>
							</tr>';			      
				    }

?>
</table>
<div>

</div>
 
<?php
  include ('templates/footer.php');
?>
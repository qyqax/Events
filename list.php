<?php

include_once('database/connection.php'); 
 include ('templates/header.php');

 try {

  } catch (PDOException $e) {
    die($e->getMessage());
  }
  	if (isset($_POST['query'])) {
  		$q=$_POST['query'];
  	}else{
  		$q='';
  	}
	
 $query = "SELECT * FROM events WHERE name like '%".$q."%' OR description like '%".$q."%'";
       // $user = $dbh->prepare($query);
       // $events = $dbh->query($query, PDO::FETCH_ASSOC);//execute();
        //$events = $events->fetch();

 ?>

<table>
	<tr>
		<th>#</th>
		<th></th>
		<th>Name</th>
		<th>Description</th>
		<th>Date</th>
		<th>Action</th>
	</tr>
<?php

					foreach ($dbh->query($query) as $key=> $row) {  
					$index = $key+1; 
						echo '<tr>
							<td style="width:5px;">'.$index.'</td>
							<td  valign="middle" align="center"><img width="400" src="images/'.$row['id'].'"></td>
							<td style="width:80px;">'.$row['name'].'</td>
							<td style="width:200px;">'.$row['description'].'</td>
							<td style="width:70px;margin:0">'.$row['date'].'</td>
							<td style="width:250px;margin:0">
								<a class="action_btn view" href="details.php?id='.$row['id'].'">SEE MORE</a>
							
							</td>
							</tr>';			      
				    }

?>
</table>
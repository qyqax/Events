<?php
  include_once('database/connection.php'); 

   try {

  } catch (PDOException $e) {
    die($e->getMessage());
  }

  $sql = 'select * from events';


  

  include ('templates/header.php'); ?>
		
	

		

 

  <h4 >Welcome on Feup Events, place where you can invite your friends for your awesome events!</h4>
 
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

 $query = "SELECT * FROM events ";
          foreach ($dbh->query($query) as $key=> $row) {  
          $index = $key+1; 
            echo '<tr>
              <td style="width:5px;">'.$index.'</td>
              <td valign="middle" align="center"><img width="400" src="images/'.$row['id'].'"></td>
              <td style="width:80px;">'.$row['name'].'</td>
              <td style="width:200px;">'.$row['description'].'</td>
              <td style="width:100px;margin:0">'.$row['date'].'</td>
              <td style="width:250px;margin:0">
                <a class="action_btn view" href="details.php?id='.$row['id'].'">SEE MORE</a>
              
              </td>
              </tr>';           
            }

?>
</table>

<?php
  include ('templates/footer.php');
?>
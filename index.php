<?php
  include_once('database/connection.php'); 

   try {

  } catch (PDOException $e) {
    die($e->getMessage());
  }

  $sql = 'select * from events';


  

  include ('templates/header.php'); ?>
		
		<div>Hello</div>

		

  <?php 
  	foreach ($dbh->query($sql) as $row) {
  		echo $row;
  	}
  ?>


<?php
  include ('templates/footer.php');
?>
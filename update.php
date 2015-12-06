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
}
     
    




	if(isset($_POST['name'])&& isset($_POST['description'])&& isset($_POST['type'])&& isset($_POST['date']))
    	{   

           
    		
    		$name= $_POST['name'];
     	 	$description= $_POST['description'];
         	$type_id= $_POST['type'];
         	$date= $_POST['date'];
            $id=$_POST['id'];
         	
         	$updated_at= date('Y-m-d');
         	$visibility=1;
         	
         	


         	

         	if($_FILES['image']['name']==''){
         	
         	}else{

         		$image_name = $event['id'];
         		$image_type = $_FILES['image']['type'];
         		$image_size = $_FILES['image']['size'];
         		$image_tmp_name = $_FILES['image']['tmp_name'];

         		move_uploaded_file($image_tmp_name,"images/".$image_name);
         		
         	}




         	$image = 'images/'.$id;

         	$query = "UPDATE events  set 'name' ='".$name."' , 'description'  ='".$description."' , 'image'='".$image."' , 'type_id'='".$type_id."', 'visibility' ='".$visibility."' ,  'date' ='".$date."' ,'updated_at' ='".$updated_at."'  where id='".$id."'";

$dbh->query($query);

header("Location: view.php?id=".$id."");
         	
    				
    	}else{echo "";
            // echo " | All fields are requiered!";
         }
      

}


?>

<div class="cu">
	<form action="<?php echo $current_file; ?>" method="POST" enctype="multipart/form-data">
    <input type='hidden' name='id' value=<?=$event['id']?> >
		<div class='inputfield'>
			<label>Event name</label>
			<input type='text' name='name' value=<?=$event['name']?>>
			<div style="clear:both"></div>
		</div>
		<div class='inputfield'>
			<label>Description</label>
			<input type='text' name='description' value=<?=$event['description']?>>
			<div style="clear:both"></div>
		</div>
		<div class='inputfield'>
			<label>Date</label>
			<input type='date' name='date' style="margin-left:130px" value=<?=$event['date']?>>
			<div style="clear:both"></div>
		</div>
		<div class='inputfield'>
			<label>Image</label>
			<input type='file' name='image' accept="image/*" style="margin-left:120px" value=<?=$event['id']?> >
			<div style="clear:both"></div>
		</div>
		<div class='inputfield'>
			<label>Type</label>
			<select name='type' style="margin-left:129px" selected=<?=$event['type_id']?>>
				<?php
					foreach ($dbh->query('select * from types') as $row) {      
				      echo "<option value='".$row['id']."'>".$row['name']."</option>";
				    }

				?>
			 
			</select>

			
			<div style="clear:both"></div>
		</div>
				
           
            <input style='margin-left:100px' class="action_btn create" type="submit" value="Create">
		
	</form>
</div>

 
<?php
  include ('templates/footer.php');
?>
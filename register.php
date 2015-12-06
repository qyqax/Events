<?php

include_once('database/connection.php'); 
 include ('templates/header.php');

 try {

  } catch (PDOException $e) {
    die($e->getMessage());
  }



if(loggedin()){
    echo $_SESSION['user'];
    echo ' , you are logged in! <a href="logout.php">Logout</a>';
}
if(!loggedin()){
    
    if(
        isset($_POST['username'])
        && isset($_POST['password'])
        && isset($_POST['password_again'])
        && isset($_POST['email'])
       ){
         
         $username= $_POST['username'];
     	 $password= $_POST['password'];
         $password_again= $_POST['password_again'];
         $email= $_POST['email'];
         $created_at= date('Y-m-d');
         $password_hash= md5($password);
         $gender = $_POST['gender'];
         $birthdate = $_POST['birthdate'];


         
         if(!empty($username)&& !empty($password)&& !empty($password_again)&& !empty($email))  
         {
             if($password!=$password_again){
                 echo "";
                 echo " | Please insert same passwords!";
             }else{
                 $query = "SELECT name FROM users WHERE name = '".$username."' ";

                 $user = $dbh->prepare($query);
                 $user->execute();
                 $count= $user->rowCount();

                
                 
                
                 if(($count)==1){
                     echo "";
                     echo " | Nick '.$username.' already exists, please choose different one.";
                 }else{
                    $id = generateUniqueId();
                    
                    
                   
                    $query= "INSERT INTO users(id,name,password,email,created_at,birthdate,gender) 
                    VALUES ('".$id."','".$username."','"
                        .$password_hash."','"
                        .$email."','"                       
                        .$created_at."','"
                        .$birthdate."','"
                        .$gender."')";
                   
                    if($dbh->query($query)){
                        $_SESSION['username']=$username;
                        $_SESSION['user_id']=$id;
                        header('Location: index.php');
                    }else{echo "";
                        echo " | Sorry, error occurs, try again later.";
                    }
                 }
             }

         }else{echo "";
             echo " | All fields are requiered!";
         }
    }

}else if(loggedin()){
    echo "";
    echo ' | You are already singed in!';
}
?>

<div class="register">
        <p>For creating new account please fill every field and press register</p>
    
    <form action="register.php" method="POST">
        <div class='inputfield'>
            <label>Username:</label> 
            <input type="text" name="username" >
            <div style="clear:both"></div>
        </div>
        <div class='inputfield'>
            <label>Password:</label>
            <input style="margin-left:83px" type="password" name="password" >
            <div style="clear:both"></div>
        </div>

        <div class='inputfield'>
            <label>Repeat password:</label>
            <input style="margin-left:33px" type="password" name="password_again" >

        <div>
            <label>Repeat it:</label><input type="password" name="password_again" >

            <div style="clear:both"></div>
        </div>
        <div class='inputfield'>
            <label>Email:</label>
            <input style="margin-left:110px" type="text" name="email">
            <div style="clear:both"></div>
        </div>
        <div class='inputfield'>
            <label>Date of birth:</label>
            <input style="margin-left:63px" type="text" name="birthdate"  >
            <div style="clear:both"></div>
        </div>
        <div class='inputfield'>
            <label>Gender:</label>
            <input style="margin-left:100px" type="text" name="gender"  >
            <div style="clear:both"></div>       
        </div>
        
        
        
        
     
        
        

    <input style="margin-left: 110px" class="action_btn create" type="submit" width="20em" value="Register">
</form>

    




</div>

<?php
  include ('templates/footer.php');
?>

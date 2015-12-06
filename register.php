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
}else{echo "Please log in.";}
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

<div>
        <p>For creating new account please fill every field and press register</p>
    
    <form action="register.php" method="POST">
        <div id='inputfield'>
            <label>Username:</label> <input type="text" name="username" >
            <div style="clear:both"></div>
        </div>
        <div>
            <label>Password:</label><input type="password" name="password" >
            <div style="clear:both"></div>
        </div>
        <div>
            <label>Repeat it:</label><input type="password" name="password_again" >
            <div style="clear:both"></div>
        </div>
        <div>
            <label>Email:</label><input type="text" name="email">
            <div style="clear:both"></div>
        </div>
        <div>
            <label>Date of birth:</label><input type="text" name="birthdate"  >
            <div style="clear:both"></div>
        </div>
        <div>
            <label>Gender:</label><input type="text" name="gender"  >
            <div style="clear:both"></div>       
        </div>
        
        
        
        
     
        
        

    <input type="submit" width="20em" value="Register">
</form>

    




</div>

<?php
  include ('templates/footer.php');
?>

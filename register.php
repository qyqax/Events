<?php
include_once('database/connection.php'); 
include_once('core.php');

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
         
         if(!empty($username)&& !empty($password)&& !empty($password_again)&& !empty($email))  
         {
             if($password!=$password_again){
                 echo "";
                 echo " | Please insert same passwords!";
             }else{
                 $query = "SELECT username FROM users WHERE username = '$username' ";

                 $user = $dbh->prepare($query);
                 $user->execute();
                 $count= $user->rowCount();

                
                 
                
                 if(($count)==1){
                     echo "";
                     echo " | Nick '.$username.' already exists, please choose different one.";
                 }else{
                    $id = generateUniqueId();
                    $picture = '';
                    $birthdate = '';
                    $gender='';
                    $query= "INSERT INTO users(id,name,password,email,picture,created_at,birthdate,gender) 
                    VALUES ('".$id."','".mysql_real_escape_string($username)."','"
                        .mysql_real_escape_string($password_hash)."','"
                        .mysql_real_escape_string($email)."','"
                        .mysql_real_escape_string($picture).","
                        .mysql_real_escape_string($created_at).","
                        .mysql_real_escape_string($birthdate).","
                        .mysql_real_escape_string($gender)."')";
                    if($dbh->query($query)){
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
<?php include ('templates/header.php'); ?>
<div>
        <p>For creating new account please fill every field and press register</p>
    <form action="register.php" method="POST">
        Username:<br><input type="text" name="username" ><br><br>
        Password:<br><input type="password" name="password" ><br><br>
        Repeat password:<br><input type="password" name="password_again" ><br><br>
        Email:<br><input type="text" name="email"><br><br>
        Picture:<br><input type="text" name="picture"  ><br><br>
        Date of birth:<br><input type="text" name="birthdate"  ><br><br>
        Gender:<br><input type="text" name="gender"  ><br><br>

    <input type="submit" width="20em" value="Registrate">
</form>

    
</form>


</div>

<?php
  include ('templates/footer.php');
?>
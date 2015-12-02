<?php
<<<<<<< HEAD
include_once('database/connection.php'); 
include_once('core.php');

 try {

  } catch (PDOException $e) {
    die($e->getMessage());
  }

=======
require 'core.php';
require 'connect.php';
>>>>>>> origin/master
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
<<<<<<< HEAD
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
=======
<!DOCTYPE html>
<html>
    <head>

        <meta charset="utf-8">
        <meta name="description" content="Feup web project">
        <meta name="author" content="Robert Greso, Roman Behul, Tomasz Kaczmarek">

        <title>FEUP Events</title>
        <link rel="stylesheet" href="c.css">

    </head>


    <body>

         <header>
             <h1 id="mainTitle">FEUP Events</h1>
             <nav id="navigationBar">

                <ul id="menu">
                   <li><a href="login.php">  Log In</a></li>
                    <li><a href="registration.php">  Registration</a></li>
                    <li><a href="showEvents.php">  Show Events</a></li>
                    <li class="aktualny"><a href="createEvent.php">  Create Event</a></li>
                </ul> 

             </nav>

        </header>
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
>>>>>>> origin/master

    <input type="submit" width="20em" value="Registrate">
</form>

    
</form>


<<<<<<< HEAD
</div>

<?php
  include ('templates/footer.php');
?>
=======
        </div>
  
       <footer>
            <p>Created by <a href="kontakt.php">Robert Greso</a></p>
       </footer>

  
    </body>

</html>
>>>>>>> origin/master

<?php
include_once('database/connection.php'); 

if(loggedin()){
    echo $_SESSION['user'];
    echo ' , you are logged in! <a href="logout.php">Logout</a>';
}else{echo "Please log in.";}
if(!loggedin()){
    
    if(isset($_POST['username'])&& isset($_POST['password'])&& isset($_POST['password_again'])&& isset($_POST['firstname'])&&  isset($_POST['surname'])){
         
         $username= $_POST['username'];
     	 $password= $_POST['password'];
         $password_again= $_POST['password_again'];
         $firstname= $_POST['firstname'];
         $surname= $_POST['surname'];
         $password_hash= md5($password);
         
         if(!empty($username)&& !empty($password)&& !empty($password_again)&& !empty($firstname)&& !empty($surname))  
         {
             if($password!=$password_again){
                 echo "";
                 echo " | Please insert same passwords!";
             }else{
                 $query = "SELECT username FROM users WHERE username = '$username' ";
                 $query_run=mysql_query($query);
                
                 if((mysql_num_rows($query_run))==1){
                     echo "";
                     echo " | Nick '.$username.' already exists, please choose different one.";
                 }else{
                    $query= "INSERT INTO users VALUES ('','".mysql_real_escape_string($username)."','".mysql_real_escape_string($password_hash)."','".mysql_real_escape_string($firstname)."','".mysql_real_escape_string($surname)."')";
                    if( $query_run = mysql_query($query)){
                        header('Location: prihlasenie.php');
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
<!DOCTYPE html>
<html>
    <head>

	    <meta charset="utf-8">
	    <meta name="description" content="Feup web project">
	    <meta name="author" content="Robert Greso">

        <title>Anti-Radar</title>
	    <link rel="stylesheet" href="c.css">

    </head>


    <body>

         <header>
             <h1 id="hlavnyNadpis">Feup web project</h1>
             <nav id="navigacia">

                <ul id="menu">
	               <li><a href="uvod.php">Uvod</a></li>
	                <li><a href="hra.php">Pridaj</a></li>
	                <li><a href="prihlasenie.php">LogIn</a></li>
                    <li class="aktualny"><a href="register.php">Reg</a></li>
	                <li><a href="tabulka.php">Anti-Radar</a></li>
 		            <li><a href="help.html">Help</a></li>
                    <li><a href="kontakt.php">Kontakt</a></li>
                </ul> 

             </nav>

        </header>
        <div>
        <p>For creating new account please fill every field and press register</p>
            <form action="register.php" method="POST">
    Username:<br><input type="text" name="username" value="<?php echo $username; ?>"><br><br>
    Password:<br><input type="password" name="password" ><br><br>
    Repeat password:<br><input type="password" name="password_again" ><br><br>
    Name:<br><input type="text" name="firstname" value="<?php echo $username; ?>"><br><br>
    Surname:<br><input type="text" name="surname" value="<?php echo $username; ?>" ><br><br>
    <input type="submit" width="20em" value="Registruj">
</form>

    
</form>


        </div>
  
       <footer>
	        <p>Created by <a href="kontakt.php">Robert Greso</a></p>
       </footer>

  
    </body>

</html>



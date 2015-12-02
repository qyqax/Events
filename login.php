<?php
require 'core.php';
require 'connect.php';
if(loggedin()){
    echo $_SESSION['user'];
    echo ' , you are logged in! <a href="logout.php">Logout</a>';
}else{echo "Please log in.";}
if(isset($_POST['username']) && isset($_POST['password'])){
    $username= $_POST['username'];
    $password= $_POST['password'];

    $password_hash= md5($password);
    if(!empty($username) && !empty($password)){
        
        $query = "SELECT id FROM users WHERE username='$username' AND password='$password_hash'";
        if ($query_run = mysql_query($query)) {
     
          $query_num_rows = mysql_num_rows($query_run);  
           
          if($query_num_rows==0){

              echo " | wrong name or password";

          }else if($query_num_rows==1){
              $_SESSION['user']=$username;
              $user_id=mysql_result($query_run,0,'id');
              $_SESSION['user_id']=$user_id;
              header('Location: hra.php');
          }
        }
       

    }else{
        echo ' | Insert name and password';
    }

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
             <h1 id="hlavnyNadpis">Feup web page</h1>
             <nav id="navigacia">

                <ul id="menu">
	                <li><a href="uvod.php">Uvod</a></li>
	                <li><a href="hra.php">Pridaj</a></li>
	                <li class="aktualny"><a href="prihlasenie.php">LogIn</a></li>
                    <li><a href="register.php">Reg</a></li>
	                <li><a href="tabulka.php">Anti-Radar</a></li>
 		            <li><a href="help.html">Help</a></li>
                    <li><a href="kontakt.php">Kontakt</a></li>
                </ul> 

             </nav>

        </header>
        <div>
            <p>For log in please insert your name and password:</p>
            <form action="<?php echo $current_file; ?>" method="POST">
            Meno:<br> <input type="text" name="username"><br><br>
            Heslo: <br><input type="password" name="password"><br><br>
            <input type="submit" value="Log in">
            

    
</form>


        </div>
  
       <footer>
	        <p>Created by <a href="kontakt.php">Robert Greso</a></p>
       </footer>

  
    </body>

</html>

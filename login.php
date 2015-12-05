<?php
include_once('database/connection.php'); 
 include ('templates/header.php');

if(loggedin()){
    echo $_SESSION['username'];
    echo ' , you are logged in! <a href="logout.php">Logout</a>';
}else{echo "Please log in.";}
if(isset($_POST['username']) && isset($_POST['password'])){
    $username= $_POST['username'];
    $password= $_POST['password'];

    $password_hash= md5($password);
    if(!empty($username) && !empty($password)){
        
        $query = "SELECT id FROM users WHERE name='".$username."' AND password='".$password_hash."'";
        $user = $dbh->prepare($query);
        $user->execute();
      var_dump($user);
        

     
          $query_num_rows =$user->rowCount();   
           
          if($query_num_rows==0){

              echo " | wrong name or password";

          }else if($query_num_rows==1){
              $_SESSION['username']=$username;
              //$user_id=mysql_result($query_run,0,'id');
              $_SESSION['user_id']=$user_id;
              header('Location: hra.php');
          }
        
       

    }else{
        echo ' | Insert name and password';
    }

}
?>
        <div>
            <p>For log in please insert your name and password:</p>
            <form action="<?php echo $current_file; ?>" method="POST">
            Meno:<br> <input type="text" name="username"><br><br>
            Heslo: <br><input type="password" name="password"><br><br>
            <input type="submit" value="Log in">
            

    
</form>


        </div>
  
<?php
  include ('templates/footer.php');
?>

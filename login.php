<?php
include_once('database/connection.php'); 
 include ('templates/header.php');

if(loggedin()){
    echo $_SESSION['username'];
    echo ' , you are logged in! <a href="logout.php">Logout</a>';
}
if(isset($_POST['username']) && isset($_POST['password'])){
    $username= $_POST['username'];
    $password= $_POST['password'];

    $password_hash= md5($password);
    if(!empty($username) && !empty($password)){
        
        $query = "SELECT * FROM users WHERE name='".$username."' AND password='".$password_hash."'";
       // $user = $dbh->prepare($query);
        $user = $dbh->query($query, PDO::FETCH_ASSOC);//execute();
        $user = $user->fetch();
      
     
        if(isset($user['id'])){
            $user_id = $user['id'];
          }else{
            $user_id = null;
          }
      
     
            
           
          if($user_id==null){

              echo " | wrong name or password";

          }else{
              $_SESSION['username']=$username;
              //$user_id=mysql_result($query_run,0,'id');
              $_SESSION['user_id']=$user['id'];
             
              header('Location: index.php');
          }
        
       

    }else{
        echo ' | Insert name and password';
    }

}
?>
        <div class='login'>
            <p>For log in please insert your name and password:</p>

            <form action="<?php echo $current_file; ?>" method="POST">
            <div class="inputfield">
              <label>User name:</label>
              <input type="text" name="username">
            </div>
            <div class="inputfield">
              <label>Password: </label>
              <input style="margin-left: 88px" type="password" name="password">
            </div>
             
            
            <input type="submit" value="Log in" class="action_btn create" style='margin-left:90px '>
            

    
            </form>
 

        </div>
  
<?php
  include ('templates/footer.php');
?>

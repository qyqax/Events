<?php include_once('core.php');?>
<!DOCTYPE html>
<html>
    <head>

        <meta charset="utf-8">
        <meta name="description" content="Feup web project">
        <meta name="author" content="Robert Greso, Roman Behul, Tomasz Kaczmarek">

        <title>FEUP Events</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="scripts/script.js"></script>

    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    <header>
      <a href="index.php"> <h1 id="mainTitle">FEUP Events</h1></a>
             <nav id="navigationBar">

                <ul id="menu">
                <?php 
                  if(loggedin()){
                    echo '  <li><a href="myevents.php">  My Events</a></li>
                    <li class="aktualny"><a href="create.php">  Create Event</a></li>
                    <li >Hello, '.$_SESSION['username'].'<a href="logout.php">Log out</a> </li>
                    ';
                  }else{
                    echo '<li><a href="login.php">  Log In</a></li>
                    <li><a href="register.php">  Registration</a></li>';
                  }
                ?>
                   
                  
                </ul> 

             </nav>

             <div class ='search' id='searchClick'>LOOK FOR AN EVENT &#128270; </div>

             <div class='search' id='searchBox' style="display: none">
                <form style="width: auto" action="list.php" method="POST">
                  <input type='text' name='query' >
                  <button style="" type='submit' class="action_btn update" >SEARCH</button>
                </form>
             
             </div>
              
    </header>

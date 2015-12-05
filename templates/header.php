<?php include_once('core.php');?>
<!DOCTYPE html>
<html>
    <head>

        <meta charset="utf-8">
        <meta name="description" content="Feup web project">
        <meta name="author" content="Robert Greso, Roman Behul, Tomasz Kaczmarek">

        <title>FEUP Events</title>

    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    <header>
       <h1 id="mainTitle">FEUP Events</h1>
             <nav id="navigationBar">

                <ul id="menu">
                   <li><a href="login.php">  Log In</a></li>
                    <li><a href="register.php">  Registration</a></li>
                    <li><a href="showEvents.php">  Show Events</a></li>
                    <li class="aktualny"><a href="createEvent.php">  Create Event</a></li>
                </ul> 

             </nav>
              
              <div>Hello,<?=$_SESSION['username']?></div>
    </header>

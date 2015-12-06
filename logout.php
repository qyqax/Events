<?php

include ('templates/header.php');
	unset($_SESSION['username']);
	unset($_SESSION['user_id']);

//echo '<p>You have been logged out!</p>';
header('Location: index.php');
include ('templates/footer.php');


?>
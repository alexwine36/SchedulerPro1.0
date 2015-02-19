<?php

//include config
//require_once('includes/config.php');
//check if already logged in move to home page
//if logged in redirect to members page
/*
  if($user->is_logged_in() ){
  header('Location: memberpage.php');
  }
 */

//include_once 'Search/xml_update.php';
session_start();




if ($_SESSION['username']) {
    
    $page_title = 'Hello ' . $_SESSION['username'] . "!";
}
 else {
    header('location: login.php');
}
include_once 'header.php';
?>



<?php

include_once 'footer.php';
?>
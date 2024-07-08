<?php
  session_start();

  if(isset($_SESSION['username'])){
    echo '<h1>SUCCESFULL LOGIN WELCOME '. $_SESSION['username'] . '</h1>' ;
    echo "<a href='/PHPpractice/logout.php'>logout</a>";
  }
  else{
    echo '<h1>WELCOME GUEST</h1>';
    echo "<a href='/PHPpractice/index.php'>login</a>";
  }
 
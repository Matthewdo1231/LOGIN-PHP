<?php 
  session_start();

  if(isset($_POST['submit'])){
  $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

   if($username == 'matthewdo1231' && $password == '123'){
      $_SESSION['username'] = $username;
      header('Location: /PHPpractice/dashboard.php');
   }
   else{
     echo ("INCORRECT LOGIN");
   }
  
   }

 ?>

<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST"> 
    <div>
       <label>Name:</label>
       <input type="text" name="username">
    </div>
    <div>
    <label>Password:</label>
    <input type="text" name="password">  
     </div>
     <input type="submit" value="submit" name="submit">
     <div>
     <a href = '/PHPpractice/dashboard.php'>GO TO DASHBOARD</a>
     </div>
 </form>
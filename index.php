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

  if(isset($_POST['image_submit'])) {
    $allowedExt = array('img','png','jpg');
      if(!empty($_FILES['image'])){
         $file_name = $_FILES['image']['name'];
         $file_size = $_FILES['image']['size'];
         $file_tmp =  $_FILES['image']['tmp_name'];
         $target_directory = "./uploads/$file_name";
          //check file extension
          $file_name = explode('.', $file_name);
          $file_name = strtolower(end($file_name));
          if(in_array($file_name,$allowedExt)){
             if($file_size <= 10000000){
                 move_uploaded_file($file_tmp,$target_directory);
                 $message =  "<h3 style='color:green;'>Successfully uploaded</h3>";
             }
             else{
               $message =   "<h3 style='color:red;'>File exceed to 10MB</h3>";
             }
          }
         else{
          $message = "<h3 style='color:red;'>File not allowed</h3>";
         }
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

   <?php echo $message ?? null  ?>

 <form action = "<?php echo $_SERVER['PHP_SELF'];?>" method="POST" enctype="multipart/form-data">
      <div>
        <div>Select Image to Upload</div>
        <div><input type="file" name="image"> </div>
        <input type="submit" value="Upload Image" name="image_submit">
      </div>
  </form>
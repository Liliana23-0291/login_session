<?php
   ob_start();
   session_start();
?>
<html lang = "en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="loginstyle.css">
   <title>Login</title>
</head>
<body style="background-color: #D3D3D3;">
   <h2 style="margin-left:20px; margin-top:20px; color:purple;">Enter Username and Password</h2> 
   <?php
      $msg = '';
      $users = ['user'=>"test", "manager"=>"secret", "guest"=>"abc123"];

      if (isset($_POST['login']) && !empty($_POST['username']) 
      && !empty($_POST['password'])) {
         $user=$_POST['username'];                  
         if (array_key_exists($user, $users)){
            if ($users[$_POST['username']]==$_POST['password']){
               $_SESSION['valid'] = true;
               $_SESSION['timeout'] = time();
               $_SESSION['username'] = $_POST['username'];
               $msg = "You have entered correct username and password";
            }
            else {
               $msg = "You have entered wrong Password";
            }
         }
         else {
            $msg = "You have entered wrong user name";
         }
      }
   ?>

   <h4 style="margin-left:60px; color:red;"><?php echo $msg; ?></h4>

   <form style="border:3px solid #702963;  
                margin: 50px;
                padding:25px;
                width: 180px;
                height: 150px;" action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
     
      <div>
         <label for="username">Username:</label>
         <input type="text" name="username" id="name">
      </div>
      <br>
      <div>
         <label for="password">Password:</label>
         <input type="password" name="password" id="password">
      </div>
      <section style="margin-left:60px;"><br>
         <button style="color:white; background-color: black;" type="submit" name="login">Login</button>
      </section>

   </form>

   <p style="margin-left: 2rem;"> 
      <a href = "logout.php" tite = "Logout">Click here to clean Session.</a>
   </p>
   </div> 
   <img style="display: inline-block; margin: 0 auto;" src="image.jpg" alt="Meme">
</body>
</html>
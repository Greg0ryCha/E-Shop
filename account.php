<?php

 include 'config.php';
 session_start();
 $user_id = $_SESSION['user_id'];

 if(!isset($user_id)){
   header('location:login.php');
 };

 if(isset($_GET['logout'])){
   unset($user_id);
   session_destroy();
   header('location:login.php');
 };

 $select_user = mysqli_query($conn, "SELECT * FROM `user_form` WHERE id = '$user_id'") or die('query failed');
 if(mysqli_num_rows($select_user) > 0){
    $fetch_user = mysqli_fetch_assoc($select_user);
 };

?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="logo.png" type="image/x-icon">
    <link rel="shortcut icon" type="x-icon" href="logo.png">
    <title>Your Account</title>
    <link rel="stylesheet" href="stylephp.css">
    <link rel="stylesheet" href="style.css">

    


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
        

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<header>

 <a href="Untitled-.php" class="logo"><img src="logo.png" alt=""></a>

  <ul class="navmenu">
      <li><a href="Untitled-.php">home </a></li>
      <li><a href="#cardsproducts" class="smooth-scroll">shop </a></li>
      <li><a href="index.php">products </a></li>
      <li><a href="articles.php">Articles</a></li>
      <li><a href="contactus.php">Contact Us</a></li>
  </ul> 
  
 <div class="nav-icon">

 

 <a href="cart.php">
  <button >
    <div class="svg-wrapper-1">
      <div class="svg-wrapper">
       <svg xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 24 24"
            width="30"
            height="30"
            class="icon">
          <path d="M1 4H2v2h2.3l3.521 7.683A2.004 2.004 0 0 0 9.7 17H18v-2H9.7l-.728-2H18c.4 0 .762-.238.919-.106l3-7A.998.998 0 0 0 21 zM4.949 8h14.102l-2.24 5H4.189l-2.24-5z"/>
            <circle cx="10.5" cy="19.5" r="1.5"/>
            <circle cx="16.5" cy="19.5" r="1.5"/>      
       </svg>   
      </div>
    </div>
      <span>Cart</span>
  </button>
 </a> 

 <div class="user-profile">
 <a href="account.php">
  <button id="btn-message" class="button-message">
    <div class="content-avatar">
      <div class="status-user"></div>
        <div class="avatar">
          <svg class="user-img" viewBox="0 0 24 24"><path d="M12,12.5c-3.04,0-5.5,1.73-5.5,3.5s2.46,3.5,5.5,3.5,5.5-1.73,5.5-3.5-2.46-3.5-5.5-3.5Zm0-.5c1.66,0,3-1.34,3-3s-1.34-3-3-3-3,1.34-3,3,1.34,3,3,3Z"></path></svg>
        </div>
    </div>
    <div class="notice-content">
      <div class="username"><?php echo $fetch_user['name'] ?> </div>
      <div class="lable-message">Your Account</div>
      <div class="user-id"><?php echo $fetch_user['email'] ?> </div>
    </div>
  </button>
 </a>
 </div>

 </div>
</header>


 <style>
     .imagee img {
  max-width: 90%;
  height: 60px; 
  display: block; 
  margin: auto; 
     }
 </style>


<body>
   
<?php
 if(isset($message)){
   foreach($message as $message){
      echo '<div class="message" onclick="this.remove();">'.$message.'</div>';
   }
 }
?>



<br>
<br>
<br>
<br>
<br>
<br>


<div class="container">
 <div class="user-profile">

   <?php
      $select_user = mysqli_query($conn, "SELECT * FROM `user_form` WHERE id = '$user_id'") or die('query failed');
      if(mysqli_num_rows($select_user) > 0){
         $fetch_user = mysqli_fetch_assoc($select_user);
      };
   ?>
   <p> <b>Your Account</b></p>
   <p> username : <span><?php echo $fetch_user['name']; ?></span> </p>
   <p> email : <span><?php echo $fetch_user['email']; ?></span> </p>
   <div class="flex">
      <a href="index.php?logout=<?php echo $user_id; ?>" onclick="return confirm('are your sure you want to logout?');" class="delete-btn">logout</a>
   </div>
</div>




<footer>
  <p align="center">&copy; 2024 E-Shop. All rights reserved.</p>
</footer>


</body>
</html>
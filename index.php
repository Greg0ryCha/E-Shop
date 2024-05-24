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

if(isset($_POST['add_to_cart']))
{  
   $product_name = $_POST['product_name'];
   $product_price = $_POST['product_price'];
   $product_image = $_POST['product_image'];
   $product_quantity = $_POST['product_quantity'];

   $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE id = '$id'  AND user_id = '$user_id'") or die('query failed');

   if(mysqli_num_rows($select_cart) > 0){
      $message[] = 'product already added to cart!';
   }else{
      mysqli_query($conn, "INSERT INTO `cart`(user_id, name, price, image, quantity) VALUES('$user_id', '$product_name', '$product_price', '$product_image', '$product_quantity')") or die('query failed');
      $message[] = 'product added to cart!';
   }
};

if(isset($_POST['update_cart'])){
   $update_quantity = $_POST['cart_quantity'];
   $update_id = $_POST['cart_id'];
   mysqli_query($conn, "UPDATE `cart` SET quantity = '$update_quantity' WHERE id = '$update_id'") or die('query failed');
   $message[] = 'cart quantity updated successfully!';
}

if(isset($_GET['remove'])){
   $remove_id = $_GET['remove'];
   mysqli_query($conn, "DELETE FROM `cart` WHERE id = '$remove_id'") or die('query failed');
   header('location:index.php');
}
  
if(isset($_GET['delete_all'])){
   mysqli_query($conn, "DELETE FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
   header('location:index.php');
}

?>

<!DOCTYPE html>
<html>
<head>
  
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="logo.png" type="image/x-icon">
    <link rel="shortcut icon" type="x-icon" href="logo.png">
    <title>Products</title>
    <link rel="stylesheet" href="stylephp.css">
    
    


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
        

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>


<style>



    /*search*/

 .container {
    position: relative;
    --size-button: 40px;
    color: white;
  }
  
  .input {
    padding-left: var(--size-button);
    height: var(--size-button);
    font-size: 15px;
    border: none;
    color: #fff;
    outline: none;
    width: var(--size-button);
    transition: all ease 0.3s;
    background-color: #000000;
    box-shadow: 1.5px 1.5px 3px #000000, -1.5px -1.5px 3px rgb(95 94 94 / 25%), inset 0px 0px 0px #0e0e0e, inset 0px -0px 0px #5f5e5e;
    border-radius: 50px;
    cursor: pointer;
  }
  
  .input:focus,
  .input:not(:invalid) {
    width: 200px;
    cursor: text;
    box-shadow: 0px 0px 0px #0e0e0e, 0px 0px 0px rgb(95 94 94 / 25%), inset 1.5px 1.5px 3px #0e0e0e, inset -1.5px -1.5px 3px #5f5e5e;
  }
  
  .input:focus + .icon,
  .input:not(:invalid) + .icon {
    pointer-events: all;
    cursor: pointer;
  }
  
  .container .icon {
    position: absolute;
    width: var(--size-button);
    height: var(--size-button);
    top: 0;
    left: 0;
    padding: 8px;
    pointer-events: none;
  }
  
  .container .icon svg {
    width: 100%;
    height: 100%;
  }
  
 *{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    scroll-behavior: smooth;
    font-family: 'Jost', sans-serif;
    list-style: none;
    text-decoration: none;
 }
 header{
    position: fixed;
    width: 100%;
    top: 0;
    right: 0;
    z-index: 1000;
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 20px 5%;
 }
 .logo img{
    max-width: 120px;
    height: auto;
 }
 .navmenu{
    display: flex;
 }
 .navmenu a{
    color: #2c2c2c;
    font-size: 18px;
    text-transform: capitalize;
    padding: 10px 25px;
    font-weight: 80px;
    transform: all .42s ease;
 }
 .navmenu a:hover{
    color:aqua;
 }
 .nav-icon{
    display: flex;
    align-items: center;

 }
 .nav-icon i:hover{
    transform: scale(1.1);
    color:aqua;
 }
 /*acc*/
  #btn-message {
  --text-color: rgb(255, 255, 255);
  --bg-color-sup: #5e5e5e;
  --bg-color: #2b2b2b;
  --bg-hover-color: #161616;
  --online-status: #00da00;
  --font-size: 16px;
  --btn-transition: all 0.2s ease-out;
 }

 .button-message {
  display: flex;
  justify-content: center;
  align-items: center;
  font: 400 var(--font-size) Helvetica Neue, sans-serif;
  box-shadow: 0 0 2.17382px rgba(0,0,0,.049),0 1.75px 6.01034px rgba(0,0,0,.07),0 3.63px 14.4706px rgba(0,0,0,.091),0 22px 48px rgba(0,0,0,.14);
  background-color: var(--bg-color);
  border-radius: 68px;
  cursor: pointer;
  padding: 6px 10px 6px 6px;
  width: fit-content;
  height: 40px;
  border: 0;
  overflow: hidden;
  position: relative;
  transition: var(--btn-transition);
 }

 .button-message:hover {
  height: 56px;
  padding: 8px 20px 8px 8px;
  background-color: var(--bg-hover-color);
  transition: var(--btn-transition);
 }

 .button-message:active {
  transform: scale(0.99);
 }

 .content-avatar {
  width: 30px;
  height: 30px;
  margin: 0;
  transition: var(--btn-transition);
  position: relative;
 }

 .button-message:hover .content-avatar {
  width: 40px;
  height: 40px;
 }

 .avatar {
  width: 100%;
  height: 100%;
  border-radius: 50%;
  overflow: hidden;
  background-color: var(--bg-color-sup);
 }

 .user-img {
  width: 100%;
  height: 100%;
  object-fit: cover;
 }

 .status-user {
  position: absolute;
  width: 6px;
  height: 6px;
  right: 1px;
  bottom: 1px;
  border-radius: 50%;
  outline: solid 2px var(--bg-color);
  background-color: var(--online-status);
  transition: var(--btn-transition);
  animation: active-status 2s ease-in-out infinite;
 }

 .button-message:hover .status-user {
  width: 10px;
  height: 10px;
  right: 1px;
  bottom: 1px;
  outline: solid 3px var(--bg-hover-color);
 }

 .notice-content {
  display: flex;
  flex-direction: column;
  align-items: flex-start;
  justify-content: center;
  padding-left: 8px;
  text-align: initial;
  color: var(--text-color);
 }

 .username {
  letter-spacing: -6px;
  height: 0;
  opacity: 0;
  transform: translateY(-20px);
  transition: var(--btn-transition);
 }

 .user-id {
  font-size: 12px;
  letter-spacing: -6px;
  height: 0;
  opacity: 0;
  transform: translateY(10px);
  transition: var(--btn-transition);
 }

 .lable-message {
  display: flex;
  align-items: center;
  opacity: 1;
  transform: scaleY(1);
  transition: var(--btn-transition);
 }

 .button-message:hover .username {
  height: auto;
  letter-spacing: normal;
  opacity: 1;
  transform: translateY(0);
  transition: var(--btn-transition);
 }

 .button-message:hover .user-id {
  height: auto;
  letter-spacing: normal;
  opacity: 1;
  transform: translateY(0);
  transition: var(--btn-transition);
 }

 .button-message:hover .lable-message {
  height: 0;
  transform: scaleY(0);
  transition: var(--btn-transition);
 }

 .lable-message, .username {
  font-weight: 600;
 }

 .number-message {
  display: flex;
  justify-content: center;
  align-items: center;
  text-align: center;
  margin-left: 8px;
  font-size: 12px;
  width: 16px;
  height: 16px;
  background-color: var(--bg-color-sup);
  border-radius: 20px;
 }

 /*==============================================*/
 @keyframes active-status {
  0% {
    background-color: var(--online-status);
  }

  33.33% {
    background-color: #93e200;
  }

  66.33% {
    background-color: #93e200;
  }

  100% {
    background-color: var(--online-status);
  }
 }


 /*cart*/
  button {
    font-family: inherit;
    font-size: 7px;
    background: #000000;
    color: white;
    fill: rgb(155, 153, 153);
    padding: 0.7em 1em;
    padding-left: 0.9em;
    display: flex;
    align-items: center;
    cursor: pointer;
    border: none;
    border-radius: 200px;
    font-weight: 1000;
    
  }
  
  button span {
    display: block;
    margin-left: 0.3em;
    transition: all 0.3s ease-in-out;
  }
  
  button svg {
    display: block;
    transform-origin: center center;
    transition: transform 0.3s ease-in-out;
  }
  
  button:hover {
    background: #000;
  }
  
  button:hover .svg-wrapper {
    transform: scale(1.25);
    transition: 0.5s linear;
  }
  
  button:hover svg {
    transform: translateX(1.2em) scale(1.1);
    fill: #fff;
  }
  
  button:hover span {
    opacity: 0;
    transition: 0.5s linear;
  }
  
  button:active {
    transform: scale(0.95);
 }



 /*image*/
  .imagee img {
  max-width: 90%;
  height: 60px; 
  display: block; 
  margin: auto; 
 }

 /*social*/
 .social_icon i:hover{
  
 color: #000;
 margin-left: 10px;
 font-size: 20px;
 transition: all .42s;
 } 
 .social_icon i:hover{
 transform: scale(1.3);
 }
 .contact{
    background-color: aqua;
 }
 .contact-info{
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(150px,auto));
    gap: 3rem;
 }
 .first-info img{
    width: 140px;
    height: auto;
 }
 .contact-info h4{
    counter-reset: #212529;
    font-size: 14px;
    text-transform: uppercase;
    margin-bottom: 10px;
 }
 .contact-info p{
    color: #212529;
    font-size: 14px;
    font-weight: 400;
    text-transform: capitalize;
    line-height: 1.5;
    margin-bottom: 10px;
    cursor: pointer;
    transition: all .42s;
 }
 .contact-info p:hover{
    color: #ee1c47;
 }
 /*play store*/
 .playstore-button {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    border: 2px solid #000;
    border-radius: 9999px;
    background-color: rgba(0, 0, 0, 1);
    padding: 0.625rem 1.5rem;
    text-align: center;
    color: rgba(255, 255, 255, 1);
    outline: 0;
    transition: all  .2s ease;
    text-decoration: none;
  }
  
  .playstore-button:hover {
    background-color: transparent;
    color: rgba(0, 0, 0, 1);
  }
  
  .icon {
    height: 2rem;
    width: 2rem;
  }
  
  .texts {
    margin-left: 1rem;
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    line-height: 1;
  }
  
  .text-1 {
    margin-bottom: 0.25rem;
    font-size: 0.75rem;
    line-height: 1rem;
  }
  
  .text-2 {
    font-weight: 600;
  }

  .aplestore-button {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    border: 2px solid #000;
    border-radius: 9999px;
    background-color: rgba(0, 0, 0, 1);
    padding: 0.625rem 1.5rem;
    text-align: center;
    color: rgba(255, 255, 255, 1);
    outline: 0;
    transition: all  .2s ease;
    text-decoration: none;
  }
  
  .aplestore-button:hover {
    background-color: transparent;
    color: rgba(0, 0, 0, 1);
  }
  
  .icon {
    height: 1.5rem;
    width: 1.5rem;
  }
  
  .texts {
    margin-left: 1rem;
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    line-height: 1;
  }
  
  .text-1 {
    margin-bottom: 0.25rem;
    font-size: 0.75rem;
    line-height: 1rem;
  }
  
  .text-2 {
    font-weight: 600;
 }


</style> 



<body>

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

      <br>
      <br>
      <br>

     <div class="products" id="ski-jacket">
            <h1 class="heading">Χιονοδρομικά Jackets.</h1>
            <div class="box-container">
                <?php
                    $select_product = mysqli_query($conn, "SELECT * FROM `products` WHERE name='ski-jacket'") or die('query failed');
                    if(mysqli_num_rows($select_product) > 0){
                        while($fetch_product = mysqli_fetch_assoc($select_product)){
                ?>
                    <form method="post" class="box" action="">
                        <img src="images/<?php echo $fetch_product['image']; ?>" alt="">
                        <div class="name"><?php echo $fetch_product['name']; ?></div>
                        <div class="price"><?php echo $fetch_product['price']; ?>€</div>
                        <input type="number" min="1" name="product_quantity" value="1">
                        <input type="hidden" name="product_image" value="<?php echo $fetch_product['image']; ?>">
                        <input type="hidden" name="product_name" value="<?php echo $fetch_product['name']; ?>">
                        <input type="hidden" name="product_price" value="<?php echo $fetch_product['price']; ?>">
                        <input type="submit" value="add to cart" name="add_to_cart" class="btn">
                    </form>
                <?php
                        }
                    }
                ?>
            </div>
       </div>



      <br>
      <br>
      <br>


     <div class="products" id="ski-pants">
            <h1 class="heading">Χιονοδρομικά Παντελονια.</h1>
            <div class="box-container">
                <?php
                    $select_product = mysqli_query($conn, "SELECT * FROM `products` WHERE name='ski-pants'") or die('query failed');
                    if(mysqli_num_rows($select_product) > 0){
                        while($fetch_product = mysqli_fetch_assoc($select_product)){
                ?>
                    <form method="post" class="box" action="">
                        <img src="images/<?php echo $fetch_product['image']; ?>" alt="">
                        <div class="name"><?php echo $fetch_product['name']; ?></div>
                        <div class="price"><?php echo $fetch_product['price']; ?>€</div>
                        <input type="number" min="1" name="product_quantity" value="1">
                        <input type="hidden" name="product_image" value="<?php echo $fetch_product['image']; ?>">
                        <input type="hidden" name="product_name" value="<?php echo $fetch_product['name']; ?>">
                        <input type="hidden" name="product_price" value="<?php echo $fetch_product['price']; ?>">
                        <input type="submit" value="add to cart" name="add_to_cart" class="btn">
                    </form>
                <?php
                        }
                    }
                ?>
            </div>
       </div>


      <br>
      <br>
      <br>




   <div class="products" id="ski-gloves">
            <h1 class="heading">Χιονοδρομικά Γαντια.</h1>
            <div class="box-container">
                <?php
                    $select_product = mysqli_query($conn, "SELECT * FROM `products` WHERE name='ski-gloves'") or die('query failed');
                    if(mysqli_num_rows($select_product) > 0){
                        while($fetch_product = mysqli_fetch_assoc($select_product)){
                ?>
                    <form method="post" class="box" action="">
                        <img src="images/<?php echo $fetch_product['image']; ?>" alt="">
                        <div class="name"><?php echo $fetch_product['name']; ?></div>
                        <div class="price"><?php echo $fetch_product['price']; ?>€</div>
                        <input type="number" min="1" name="product_quantity" value="1">
                        <input type="hidden" name="product_image" value="<?php echo $fetch_product['image']; ?>">
                        <input type="hidden" name="product_name" value="<?php echo $fetch_product['name']; ?>">
                        <input type="hidden" name="product_price" value="<?php echo $fetch_product['price']; ?>">
                        <input type="submit" value="add to cart" name="add_to_cart" class="btn">
                    </form>
                <?php
                        }
                    }
                ?>
            </div>
       </div>


      <br>
      <br>
      <br>

      


     <div class="products" id="ski-boots&right_hand">
            <h1 class="heading">Μπότες & Δέστρες.</h1>
            <div class="box-container">
                <?php
                    $select_product = mysqli_query($conn, "SELECT * FROM `products` WHERE name='ski-boots&right_hand'") or die('query failed');
                    if(mysqli_num_rows($select_product) > 0){
                        while($fetch_product = mysqli_fetch_assoc($select_product)){
                ?>
                    <form method="post" class="box" action="">
                        <img src="images/<?php echo $fetch_product['image']; ?>" alt="">
                        <div class="name"><?php echo $fetch_product['name']; ?></div>
                        <div class="price"><?php echo $fetch_product['price']; ?>€</div>
                        <input type="number" min="1" name="product_quantity" value="1">
                        <input type="hidden" name="product_image" value="<?php echo $fetch_product['image']; ?>">
                        <input type="hidden" name="product_name" value="<?php echo $fetch_product['name']; ?>">
                        <input type="hidden" name="product_price" value="<?php echo $fetch_product['price']; ?>">
                        <input type="submit" value="add to cart" name="add_to_cart" class="btn">
                    </form>
                <?php
                        }
                    }
                ?>
            </div>
       </div>


      <br>
      <br>
      <br>


     <div class="products" id="ski-masks&and&glasses">
            <h1 class="heading">Μασκεσ & Γυαλιά.</h1>
            <div class="box-container">
                <?php
                    $select_product = mysqli_query($conn, "SELECT * FROM `products` WHERE name='ski-masks&and&glasses'") or die('query failed');
                    if(mysqli_num_rows($select_product) > 0){
                        while($fetch_product = mysqli_fetch_assoc($select_product)){
                ?>
                    <form method="post" class="box" action="">
                        <img src="images/<?php echo $fetch_product['image']; ?>" alt="">
                        <div class="name"><?php echo $fetch_product['name']; ?></div>
                        <div class="price"><?php echo $fetch_product['price']; ?>€</div>
                        <input type="number" min="1" name="product_quantity" value="1">
                        <input type="hidden" name="product_image" value="<?php echo $fetch_product['image']; ?>">
                        <input type="hidden" name="product_name" value="<?php echo $fetch_product['name']; ?>">
                        <input type="hidden" name="product_price" value="<?php echo $fetch_product['price']; ?>">
                        <input type="submit" value="add to cart" name="add_to_cart" class="btn">
                    </form>
                <?php
                        }
                    }
                ?>
            </div>
       </div>


</div>


<section class="contact">

        <div class="contact-info">
            <div class="first-info">
                <a href="Untitled-.php"><img src="logo.png" alt=""></a>
                <p>32 Grant Srteet Longview, <br> TX united kindom 75633</p>
                <p>85273595</p>
                <p>email@gmail.com</p>          
          <div class="social_icon">
            <a href="https://www.instagram.com/"><i class='bx bxl-instagram-alt'></i></a>
            <a href="https://www.facebook.com/"><i class='bx bxl-facebook-circle'></i></a>
            <a href="https://twitter.com/?lang=el"><i class='bx bxl-twitter'></i></a>
            <a href="https://www.tiktok.com/"><i class='bx bxl-tiktok' ></i></a>
            <a href="https://www.youtube.com/"><i class='bx bxl-youtube' ></i></a>
            <a href="https://gr.pinterest.com/"><i class='bx bxl-pinterest' ></i></a>
          </div> 
          

          
        </div>
    

            <div class="thrid-info">
                <h4>ΥΠΟΣΤΗΡΙΞΗ</h4>
                <p>Κατάσταση παραγγελίας</p>
                <p>Αποστολή και παράδοση</p>
                <p>Επιστροφές</p>
                <p>Επιλογές πληρωμής</p>
                <p>Ζήτησε βοήθεια</p>
            </div>
    
            <div class="fourth-info">
                <h4>ΕΤΑΙΡΕΙΑ</h4>
                <p>Σχετικά με  εμάς</p>
                <p>Νέα</p>
                <p>Ευκαιρίες απασχόλησης</p>
                <p>Επενδυτές</p>
                <p>Βιωσιμότητα</p>
                <p>Σκοπός</p>
            </div>
            


            <div class="five">
              <h4>Δωρεάν μεταφορικά<br> για αγορές άνω των 69€</h4>
                <div class="imagee">    
                  <img src="elta.png">
                  <br>
                  <img src="acs.png">
                  <br>
                  <img src="gt.png"> 
                           
                </div>
            </div>

            <div class="six">
              <h4>Άτοκες δόσεις για <br>αγορές άνω τον 200€</h4>
                <div class="imagee">    
                  <img src="mastercard.png"> 
                  <br>
                  <img src="visa.png">
                  <br>
                  <img src="paypall.png">
                </div>
            </div>

            <div class="download">
                <table>
                  <tr><td><a href="https://www.apple.com/app-store/" class="aplestore-button">
                    <span class="icon">
                      <svg
                        fill="currentcolor"
                        viewBox="-52.01 0 560.035 560.035"
                        xmlns="http://www.w3.org/2000/svg"
                        stroke="#ffffff">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier"stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier"><path d="M380.844 297.529c.787 84.752 74.349 112.955 75.164 113.314-.622 1.988-11.754 40.191-38.756 79.652-23.343 34.117-47.568 68.107-85.731 68.811-37.499.691-49.557-22.236-92.429-22.236-42.859 0-56.256 21.533-91.753 22.928-36.837 1.395-64.889-36.891-88.424-70.883-48.093-69.53-84.846-196.475-35.496-282.165 24.516-42.554 68.328-69.501 115.882-70.192 36.173-.69 70.315 24.336 92.429 24.336 22.1 0 63.59-30.096 107.208-25.676 18.26.76 69.517 7.376 102.429 55.552-2.652 1.644-61.159 35.704-60.523 106.559M310.369 89.418C329.926 65.745 343.089 32.79 339.498 0 311.308 1.133 277.22 18.785 257 42.445c-18.121 20.952-33.991 54.487-29.709 86.628 31.421 2.431 63.52-15.967 83.078-39.655"></path></g>
                      </svg>
                    </span>
                    <span class="texts">
                    <span class="text-1">Download </span>
                    <span class="text-2">App store</span>
                    </span>
                  </a></td></tr>

                  <tr><td><a href="https://play.google.com/store/games?device=windows&pli=1" class="playstore-button">
                    <span class="icon">
                      <svg
                        fill="currentcolor"
                        viewBox="-52.01 0 560.035 560.035"
                        xmlns="http://www.w3.org/2000/svg"
                        stroke="#ffffff">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                      <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                      <g id="SVGRepo_iconCarrier">
                      <path d="M99.617 8.057a50.191 50.191 0 00-38.815-6.713l230.932 230.933 74.846-74.846L99.617 8.057zM32.139 20.116c-6.441 8.563-10.148 19.077-10.148 30.199v411.358c0 11.123 3.708 21.636 10.148 30.199l235.877-235.877L32.139 20.116zM464.261 212.087l-67.266-37.637-81.544 81.544 81.548 81.548 67.273-37.64c16.117-9.03 25.738-25.442 25.738-43.908s-9.621-34.877-25.749-43.907zM291.733 279.711L60.815 510.629c3.786.891 7.639 1.371 11.492 1.371a50.275 50.275 0 0027.31-8.07l266.965-149.372-74.849-74.847z"></path></g>
                      </svg>
                    </span>
                    <span class="texts">
                    <span class="text-1">GET IT ON </span>
                    <span class="text-2">Google Play</span>
                    </span>
                  </a></td></tr>
                </table>  
              </div>
          </div>   
</section>


<footer>
  <p align="center">&copy; 2024 E-Shop. All rights reserved.</p>
</footer>


</body>
</html>
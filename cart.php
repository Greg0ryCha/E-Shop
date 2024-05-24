


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

 if(isset($_GET['remove'])){
   $remove_id = $_GET['remove'];
   mysqli_query($conn, "DELETE FROM `cart` WHERE id = '$remove_id'") or die('query failed');
   header('location:index.php');
 }
  
 if(isset($_GET['delete_all'])){
   mysqli_query($conn, "DELETE FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
   header('location:index.php');
 }
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
    <title>Shopping Cart</title>
    <link rel="stylesheet" href="stylephp.css">
    <link rel="stylesheet" href="style.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
        

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  
</head>

<style>
 .imagee img {
  max-width: 90%;
  height: 60px; 
  display: block; 
  margin: auto; 
  }

 /* pay btn*/
 .Btn {
  width: 130px;
  height: 45px;
  display: flex;
  align-items: center;
  justify-content: center;
  background-color: rgb(15, 15, 15);
  border: none;
  color: white;
  font-weight: 800;
  gap: 10px;
  cursor: pointer;
  box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.103);
  position: relative;
  overflow: hidden;
  transition-duration: .3s;
  border-radius: 1%;
 }

 .svgIcon {
  width: 24px;
 }

 .svgIcon path {
  fill: white;
 }

 .Btn::before {
  width: 130px;
  height: 130px;
  position: absolute;
  content: "";
  background-color: white;
  border-radius: 50%;
  left: -100%;
  top: 0;
  transition-duration: .3s;
  mix-blend-mode:darken;
 }

 .Btn:hover::before {
  transition-duration: .3s;
  transform: translate(100%,-50%);
  border-radius: 0;
 }

 .Btn:active {
  transform: translate(5px,5px);
  transition-duration: .3s;
 }
 .centered_btn_pay {
    display: flex;
    justify-content: center;
    align-items: center; 
 }



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



</style>



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



<body>

<br>
<br>
<br>
<br>
<br>



<?php
 if(isset($message)){
   foreach($message as $message){
      echo '<div class="message" onclick="this.remove();">'.$message.'</div>';
   }
 } 
?>

<div class="container">

 <div class="shopping-cart">

   <h1 class="heading">shopping cart</h1>

   <table>
      <thead>
         <th>image</th>
         <th>name</th>
         <th>price</th>
         <th>quantity</th>
         <th>total price</th>
         <th>action</th>
      </thead>
      <tbody>
      <?php
         $cart_query = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
         $grand_total = 0;
         if(mysqli_num_rows($cart_query) > 0){
            while($fetch_cart = mysqli_fetch_assoc($cart_query)){
      ?>




         <tr>
            <td><img src="images/<?php echo $fetch_cart['image']; ?>" height="100" alt=""></td>
            <td><?php echo $fetch_cart['name']; ?></td>
            <td>$<?php echo $fetch_cart['price']; ?>/-</td>
            <td>
               <form action="" method="post">
                  <input type="number" min="1" name="cart_quantity" value="<?php echo $fetch_cart['quantity']; ?>">          
               </form>
            </td>

            <td>$<?php echo $sub_total = ($fetch_cart['price'] * $fetch_cart['quantity']); ?>/-</td>

            <td><div class="cart-btn">  
                  <a href="index.php?remove=<?php echo $fetch_cart['id']; ?>"class="Btn" onclick="return confirm('remove item from cart?');">
                     <button>
                        <h1>Remove</h1>
                        <svg class="svgIcon" viewBox="0 0 100 100">
                           <path xmlns="http://www.w3.org/2000/svg" d="m78.41,31.27H21.59c-2.75,0-4.76,2.24-4.48,4.97l5.53,52.39c.29,2.73,2.77,4.97,5.52,4.97h43.66c2.75,0,5.24-2.24,5.52-4.97l5.53-52.39c.29-2.73-1.73-4.97-4.48-4.97Zm-42.76,50.08s-.1,0-.15,0c-.76,0-1.42-.58-1.49-1.35l-3.55-36.61c-.08-.82.52-1.56,1.35-1.64.81-.08,1.56.52,1.64,1.35l3.55,36.61c.08.82-.52,1.56-1.35,1.64Zm15.85-1.49c0,.83-.67,1.5-1.5,1.5s-1.5-.67-1.5-1.5v-36.61c0-.83.67-1.5,1.5-1.5s1.5.67,1.5,1.5v36.61Zm14.49.15c-.08.78-.73,1.35-1.49,1.35-.05,0-.1,0-.15,0-.83-.08-1.43-.81-1.35-1.64l3.55-36.61c.08-.83.83-1.43,1.64-1.35.83.08,1.43.81,1.35,1.64l-3.55,36.61Z"/>                           
                           <path xmlns="http://www.w3.org/2000/svg" d="m81.8,13.5h-25.96v-1.25c0-2.87-2.24-5.2-5-5.2h-1.67c-2.76,0-5,2.33-5,5.2v1.25h-25.96c-2.75,0-5,2.25-5,5v2c0,2.75,2.25,5,5,5h63.59c2.75,0,5-2.25,5-5v-2c0-2.75-2.25-5-5-5Z"/>
                        </svg>
                     </button>
                  </a>
               </div>
            </td>
         </tr>




      <?php
         $grand_total += $sub_total;
            }
         }else{
            echo '<tr><td style="padding:20px; text-transform:capitalize;" colspan="6">no item added</td></tr>';
         }
      ?>
      <tr class="table-bottom">
         <td colspan="4">Grand total :</td>
         <td>$<?php echo $grand_total; ?>/-</td>
         <td><div class="cart-btn">  
                  <a href="index.php?delete_all" onclick="return confirm('delete all from cart?');" class="Btn"<?php echo ($grand_total > 1)?'':'disabled'; ?>>
                     <button>
                        <h1>Delete all</h1>
                        <svg class="svgIcon" viewBox="0 0 100 100">
                           <path xmlns="http://www.w3.org/2000/svg" d="m78.41,31.27H21.59c-2.75,0-4.76,2.24-4.48,4.97l5.53,52.39c.29,2.73,2.77,4.97,5.52,4.97h43.66c2.75,0,5.24-2.24,5.52-4.97l5.53-52.39c.29-2.73-1.73-4.97-4.48-4.97Zm-42.76,50.08s-.1,0-.15,0c-.76,0-1.42-.58-1.49-1.35l-3.55-36.61c-.08-.82.52-1.56,1.35-1.64.81-.08,1.56.52,1.64,1.35l3.55,36.61c.08.82-.52,1.56-1.35,1.64Zm15.85-1.49c0,.83-.67,1.5-1.5,1.5s-1.5-.67-1.5-1.5v-36.61c0-.83.67-1.5,1.5-1.5s1.5.67,1.5,1.5v36.61Zm14.49.15c-.08.78-.73,1.35-1.49,1.35-.05,0-.1,0-.15,0-.83-.08-1.43-.81-1.35-1.64l3.55-36.61c.08-.83.83-1.43,1.64-1.35.83.08,1.43.81,1.35,1.64l-3.55,36.61Z"/>                           
                           <path xmlns="http://www.w3.org/2000/svg" d="m81.8,13.5h-25.96v-1.25c0-2.87-2.24-5.2-5-5.2h-1.67c-2.76,0-5,2.33-5,5.2v1.25h-25.96c-2.75,0-5,2.25-5,5v2c0,2.75,2.25,5,5,5h63.59c2.75,0,5-2.25,5-5v-2c0-2.75-2.25-5-5-5Z"/>
                        </svg>
                     </button>
                  </a>
            </div>
         </td>
      </tr>
   </tbody>
   </table>

   <div class="centered_btn_pay">
      <div class="cart-btn">  
         <a href="checkout.php" <?php echo ($grand_total > 1)?'':'disabled'; ?>>
            <button class="Btn">
               <h1>Pay</h1>
               <svg class="svgIcon" viewBox="0 0 576 512"><path d="M512 80c8.8 0 16 7.2 16 16v32H48V96c0-8.8 7.2-16 16-16H512zm16 144V416c0 8.8-7.2 16-16 16H64c-8.8 0-16-7.2-16-16V224H528zM64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H512c35.3 0 64-28.7 64-64V96c0-35.3-28.7-64-64-64H64zm56 304c-13.3 0-24 10.7-24 24s10.7 24 24 24h48c13.3 0 24-10.7 24-24s-10.7-24-24-24H120zm128 0c-13.3 0-24 10.7-24 24s10.7 24 24 24H360c13.3 0 24-10.7 24-24s-10.7-24-24-24H248z"></path></svg>
            </button>
         </a>
      </div>
      
   </div>
</div>
















<footer>
   <p align="center">&copy; 2024 E-Shop. All rights reserved.</p>
</footer>

</body>
</html>
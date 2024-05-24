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
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, intial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="logo.png" type="image/x-icon">
    <link rel="shortcut icon" type="x-icon" href="logo.png">

    <title>E-shope</title>

    <link rel="stylesheet" href="articles.css">
    <link rel="stylesheet" href="blog.css">


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet"
    href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">


<style>
      .imagee img {
        max-width: 90%;
        height: 60px; 
        display: block; 
        margin: auto; 
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


</head>

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

 <div class="container">
    <input type="text" name="text" class="input" required="" placeholder="Type to search...">
        <div class="icon">
          <svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512">
              <title>Search</title>
              <path d="M221.09 64a157.09 157.09 0 10157.09 157.09A157.1 157.1 0 00221.09 64z" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32"></path>
              <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="32" d="M338.29 338.29L448 448"></path>
          </svg>
      </div>
 </div>  

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



   
    <br>
    <br>
    <br>
    <br>
    <br>
    


    


    
<div class="blogs">
    <div class="blog-heading">
    <span>My Recent Posts</span>
    <h3>My Blog</h3>
    </div>
    
    <div class="blog-container">
        <table>
        <tr><t><div class="blog-box">
            <div class="blog-img">
                <img src="How-To-Store-your-skis.png" alt="Blog">
            </div>
        </div>
        <div class="blog-text">
            <span> 3 july 2024 </span>
            <a href="https://www.skimag.com/gear/ski-gear-storage/" class="blog-title"> How-To-Store-your-skis</a>
            <p>7 Steps to Storing Ski Gear the Right Way During the Off-Season</p>
            <a href="https://www.skimag.com/gear/ski-gear-storage/">Read More </a>
        </div></t></tr>



        <tr><t><div class="blog-box">
            <div class="blog-img">
                <img src="Runway 2024-04-14T15_35_55.527Z Expand Image.jpg" alt="Blog">
            </div>
        </div>
        <div class="blog-text">
            <span> 16 july 2022 </span>
            <a href="https://www.aniliopark.gr/oreivatiko-ski/" class="blog-title"> Alpine skiing</a>
            <p>A FEW WORDS ABOUT SKI MOUNTAINEERING</p>
            <a href="https://www.aniliopark.gr/oreivatiko-ski/">Read More </a>
        </div></t></tr>



        <tr><td><div class="blog-box">
            <div class="blog-img">
                <img src="ski-instructors-talking-lillie-d.png" alt="Blog">
            </div>
        </div>
        <div class="blog-text">
            <span> 27 july 2021 </span>
            <a href="https://www.aniliopark.gr/" class="blog-title"> The charm of winteron the welcoming slopes</a>
            <p>Raised to the top, with the comparative advantage of easy and direct access via Egnatia Odos </p>
            <a href="https://www.aniliopark.gr/">Read More </a>
        </div></td></tr>  
    </table>
    </div>
        
</div>

<br>
<br>



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

    <script src="java.js"></script>  
</body>
</html>
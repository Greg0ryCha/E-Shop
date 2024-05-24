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
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="logo.png" type="image/x-icon">
    <link rel="shortcut icon" type="x-icon" href="logo.png">
    <title>E-shope</title>
    <link rel="stylesheet" href="style.css">

    


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
        

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
<style>

 /*reviw*/

 *{
    margin: 0px;
    padding: 0px;
    font-family: poppins;
    box-sizing: border-box;
 }
 a{
    text-decoration: none;
 }
 #testimonials{
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    width:100%;
 } 
 .testimonial-heading{
    letter-spacing: 1px;
    margin: 15px 0px;
    padding: 1px 20px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
 }
 .testimonial-heading h1{
    font-size: 2.2rem;
    font-weight: 500;
    background-color: ;
    color: #black;
    padding: 1px 20px;
 }
 .testimonial-heading span{
    font-size: 1.3rem;
    color: #252525;
    margin-bottom: 1px;
    letter-spacing: 2px;
    text-transform: uppercase;
 } 
 .testimonial-box-container{
    display: flex;
    justify-content: center;
    align-items: center;
    flex-wrap: wrap;
    width:100%;
 }
 .testimonial-box{
    width:500px;
    box-shadow: 2px 2px 30px rgba(0,0,0,0.1);
    background-color: #ffffff;
    padding: 20px;
    margin: 15px;
    cursor: pointer;
 }
 .profile-img{
    width:50px;
    height: 50px;
    border-radius: 50%;
    overflow: hidden;
    margin-right: 10px;
 }
 .profile-img img{
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: center;
 }
 .profile{
    display: flex;
    align-items: center;
 }
 .name-user{
    display: flex;
    flex-direction: column;
 }
 .name-user strong{
    color: #3d3d3d;
    font-size: 1.1rem;
    letter-spacing: 0.5px;
 }
 .name-user span{
    color: #979797;
    font-size: 0.8rem;
 }
 .reviews{
    color: #f9d71c;
 }
 .box-top{
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 20px;
 }
 .client-comment p{
    font-size: 0.9rem;
    color: #4b4b4b;
 }
 .testimonial-box:hover{
    transform: translateY(-10px);
    transition: all ease 0.3s;
 }
 
 @media(max-width:1060px){
    .testimonial-box{
        width:45%;
        padding: 10px;
    }
 }
 @media(max-width:790px){
    .testimonial-box{
        width:100%;
    }
    .testimonial-heading h1{
        font-size: 1.4rem;
    }
 }
 @media(max-width:340px){
    .box-top{
        flex-wrap: wrap;
        margin-bottom: 10px;
    }
    .reviews{
        margin-top: 10px;
    }
 }
 ::selection{
    color: #ffffff;
    background-color: #252525;
 } 

 .testimonial-box-container {
    display: flex;
    justify-content: center;
 }

 .testimonial-window {
    max-height: 400px; 
    overflow-y: scroll;
    width: 740px;
    border: 1px solid #ddd;
    padding: 20px;
    box-shadow: 0 0 20px rgba(0,0,0,0.1);
 }

 .testimonial-box {
    margin-bottom: 20px;
 }


 .empty-cell {
    width: 200px; 
  }

 .client-reviews {
  float: left; 
  margin-right: 2000px; 
 }
  /*image*/
  .img img {
  max-width: 100%;
  height: auto; 
  display: block; 
  margin: auto; 
  }
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

  html {
    scroll-behavior: smooth;
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

 <script>

  $(document).ready(function(){
    $('.main-btn').click(function(){
    $('html, body').animate({
      scrollTop: $('#cardsproducts').offset().top
      }, 800);
    });
  });

  $(document).ready(function(){
    $('.smooth-scroll').click(function(e){
        e.preventDefault();
        var target = $(this).attr('href');
    $('html, body').animate({
        scrollTop: $(target).offset().top
      }, 800);
    });
  });

 </script>

 <script src="java.js"></script>

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
    


      <section class="main-home">
        <div class="main-text">
            <h5>Winnter Collection</h5>
            <h1>New Winder <br>Collection</h1>
            <p>There's Nothing like Trend</p>
            <a href="#cardsproducts" class="main-btn">shop now <i class='bx bx-right-arrow-alt'></i></a>
        </div>


        <div class="down-aroow">
            <a href="#cardsproducts" class="down"><i class='bx bx-down-arrow-alt'></i></a>
        </div>
      </section>


    <hr>
    <hr>

  <div class="cardsproducts" id='cardsproducts'>
    <table>
      <td><div class="card">       
            <div class="container-image">
              <svg class="image-circle" xmlns="http://www.w3.org/2000/svg" xml:space="preserve" version="1.1" style="shape-rendering:geometricPrecision; text-rendering:geometricPrecision; image-rendering:optimizeQuality; fill-rule:evenodd; clip-rule:evenodd" viewBox="6 10 50 50" xmlns:xlink="http://www.w3.org/1999/xlink">
                <defs></defs>
                <g xmlns="http://www.w3.org/2000/svg">
                  <path d="M45,42L45,47.741L38.686,42.216L37.314,43.784L45,50.509L45,52L33.042,52L33.042,42L45,42ZM30.958,42L30.958,52L19,52L19,50.509L26.686,43.784L25.314,42.216L19,47.741L19,42L30.958,42ZM7.31,39.646L15.395,42.88L14.865,46.386L6.88,43.725C6.88,43.725 6.892,42.109 7.31,39.646ZM56.609,39.678C56.84,40.986 57.02,42.332 57.159,43.712L49.209,46.362L48.978,45.203L48.537,42.907L56.609,39.678ZM41.673,18.96L44.562,19C50.934,23.277 54.494,29.706 56.174,37.609L48.137,40.823C47.692,38.478 47.171,36.119 46.435,34.129C46.18,33.439 45,30 45,30L33.042,29.958L33.042,27.437L41.673,18.96ZM22.485,18.958L30.958,27.431L30.958,29.958L19,29.958C18.899,30.004 17.6,33.02 17.28,34.141C16.845,35.664 16.16,38.297 15.74,40.774L7.69,37.554C8.869,31.956 11.882,23.865 19.457,19L22.485,18.958ZM30.958,40L19,40L19,36L30.958,36L30.958,40ZM45,40L33.042,40L33.042,36L45,36L45,40ZM19,32L30.958,32L30.958,34L19,34L19,32ZM45,32L45,34L33.042,34L33.042,32L45,32ZM42.367,15.358L33.042,24.517L33.042,21.5L41.086,12.724L42.367,15.358ZM30.958,21.5L30.958,24.485L21.737,15.263L22.962,12.782L30.958,21.5ZM32,20.373L25.023,12L38.977,12L32,20.373"></path>
                </g>
              </svg>
            </div>
                <div class="content">
                    <div class="detail">
                        <span><br> Χιονοδρομικά Jackets.</span><br>
                        <p>Από 199€</p>
                        <a href="index.php#ski-jacket"><button>Buy Here</button></a>
                    </div>
                        <div class="product-image">
                            <div class="box-image">
                                <img src="jacket-unscreen.gif" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </td>


      <td><div class="card">
            <div class="container-image">
              <svg class="image-circle" xmlns="http://www.w3.org/2000/svg" xml:space="preserve" version="1.1" style="shape-rendering:geometricPrecision; text-rendering:geometricPrecision; image-rendering:optimizeQuality; fill-rule:evenodd; clip-rule:evenodd" viewBox="1 1 90 90" xmlns:xlink="http://www.w3.org/1999/xlink"><defs></defs><g xmlns="http://www.w3.org/2000/svg">
              <path d="m69.039 75.5-0.91797 15.5h-12.121v-4.0898z"/>
              <path d="m44 86.73v4.2695h-12.121l-0.92969-15.629 12.73 11.129c0.10156 0.089844 0.21094 0.17188 0.32031 0.23047z"/>
              <path d="m71.52 33.898-2.1602 36.211c-0.23828 0.078125-0.46875 0.21094-0.67969 0.39062l-12.68 11.09v-26.352l6.8906-3.4492c0.67969-0.33984 1.1094-1.0273 1.1094-1.7891v-16c0-4.4102-3.5898-8-8-8h-12c-4.4102 0-8 3.5898-8 8v16c0 0.76172 0.42969 1.4492 1.1094 1.7891l6.8906 3.4492v26.23l-13.379-11.707-2.1406-35.863c-0.30078-5.0312 0.64062-10.059 2.7188-14.559l1.082-2.3398h35.441l1.0781 2.3398c2.0781 4.5 3.0195 9.5312 2.7188 14.559z"/>
              <path d="m60 34v14.762l-4 2v-11.762c0-3.3086-2.6914-6-6-6s-6 2.6914-6 6v11.762l-4-2v-14.762c0-2.2109 1.7891-4 4-4h12c2.2109 0 4 1.7891 4 4z"/>
              <path d="m33 9h34v4h-34z"/>
              <path d="m52 39v52h-4v-52c0-1.1016 0.89844-2 2-2s2 0.89844 2 2z"/>
              </svg>
            </div>
            <div class="content">
              <div class="detail">
                <span><br> Χιονοδρομικά Παντελονια.</span><br>
                  <p>Από 140€</p>
                  <a href="index.php#ski-pants"><button>Buy Here</button></a>
              </div>
                <div class="product-image">
                  <div class="box-image">
                    <img src="panteloni.gif" alt="">
                  </div>
                </div>
            </div>
          </div>
        </td>

      <td><div class="card">
            <div class="container-image">  
            <svg class="image-circle" xmlns="http://www.w3.org/2000/svg" xml:space="preserve" version="1.1" style="shape-rendering:geometricPrecision; text-rendering:geometricPrecision; image-rendering:optimizeQuality; fill-rule:evenodd; clip-rule:evenodd" viewBox="10 8 80 90" xmlns:xlink="http://www.w3.org/1999/xlink"><defs></defs><path xmlns="http://www.w3.org/2000/svg" d="M77.6799927,71.2299805h-0.3300171l-0.9400024-5.1300049l1.9100342-8.2699585  c0.4299927-2.1600342,0.6499634-4.3600464,0.6499634-6.5599976V20.9099731c0-3.5699463-2.8899536-6.4499512-6.4599609-6.4499512  c-1.4000244,0-2.7600098,0.4599609-3.8800049,1.2999878c-2.3300171-1.7800293-5.5700073-1.7399902-7.8400269,0.1099854  c-0.6199951-3.4799805-3.9499512-5.8099976-7.4299927-5.1900024c-1.1900024,0.210022-2.2999878,0.75-3.1900024,1.5700073  c-1.2199707-3.3400269-4.9099731-5.0700073-8.25-3.8599854c-2.5499878,0.9299927-4.25,3.3499756-4.2399902,6.0599976v2.6199951  C36.5700073,16.210022,35.210022,15.75,33.8099976,15.7399902c-3.5700073,0.0100098-6.4500122,2.8900146-6.460022,6.460022  v20.1099854l-1.8399658-1.8499756c-0.960022-0.960022-2.25-1.4900513-3.6000366-1.4900513h-2.3799438  c-2.8000488,0-5.0800171,2.2800293-5.0800171,5.0800171v3.3099976c0,1.6000366,0.6499634,3.1300049,1.789978,4.2600098  l16.1699829,14.9100342l-0.8499756,4.6999512h-0.3300171c-2.1399536,0-3.8800049,1.7300415-3.8800049,3.8699951v3.8699951  c0.0100098,1.6400146,1.0400391,3.0900269,2.5900269,3.6300049v4.1100464c0,0.7199707,0.5700073,1.289978,1.289978,1.289978  h46.4500122c0.710022,0,1.289978-0.5700073,1.289978-1.289978v-4.1100464  c1.5400391-0.539978,2.5700073-1.9899902,2.5800171-3.6300049v-3.8699951  C81.5499878,72.960022,79.8200073,71.2299805,77.6799927,71.2299805z M50.5800171,17.0300293  c0-2.1300049,1.7299805-3.8700562,3.8699951-3.8700562s3.8699951,1.7400513,3.8699951,3.8700562v25.8099976h-7.7399902V17.0300293z   M40.2600098,14.4500122c0-2.1300049,1.7299805-3.8699951,3.8699951-3.8699951S48,12.3200073,48,14.4500122v28.3900146h-7.7399902  V14.4500122z M29.9400024,78.9699707v-3.8699951c0-0.7099609,0.5700073-1.289978,1.289978-1.289978h16.1199951  c1.7900391,0,3.2300415,1.4400024,3.2300415,3.2299805c0,1.7800293-1.4400024,3.2200317-3.2300415,3.2200317H31.2299805  C30.5100098,80.2600098,29.9400024,79.6799927,29.9400024,78.9699707z M34.1799927,71.2299805l0.7000122-3.8699951h31.4000244  l0.6999512,3.8699951H48v0.0599976c-0.210022-0.0299683-0.4299927-0.0499878-0.6500244-0.0599976H34.1799927z   M68.6500244,85.4199829H32.5200195v-2.5799561h14.8299561C47.5700073,82.8300171,47.789978,82.8099976,48,82.7800293v0.0599976  h20.6500244V85.4199829z M68.6500244,51.2700195c0,2.0199585-0.2000122,4.0299683-0.6000366,6.0100098l-1.7299805,7.5H34.3099976  L18.0300293,49.75c-0.6400146-0.6300049-1-1.4899902-1-2.3900146v-3.3099976c0-1.3800049,1.1199951-2.5,2.5-2.5h2.3799438  c0.6700439,0,1.3000488,0.2600098,1.7700195,0.7300415l4.0499878,4.0499878c0.5100098,0.5100098,1.3200073,0.5100098,1.8300171,0  c0.2399902-0.2399902,0.3800049-0.5700073,0.3800049-0.9100342V22.2000122c0-2.1400146,1.7299805-3.8800049,3.8699951-3.8800049  c2.1300049,0,3.8699951,1.7399902,3.8699951,3.8800049v20.6400146h-2.5800171v2.5799561h33.5500488V51.2700195z   M68.6500244,42.8400269h-7.75V20.9099731c0-2.1399536,1.7399902-3.8799438,3.8699951-3.8799438  c2.1399536,0,3.8800049,1.7399902,3.8800049,3.8799438V42.8400269z M68.9000244,67.3599854h5.1199951l0.7099609,3.8699951  h-5.1300049L68.9000244,67.3599854z M76.3900146,85.4199829h-5.1600342v-2.5799561h5.1600342V85.4199829z"/></svg>
          </div>
              <div class="content">
                <div class="detail">
                  <span><br> Χιονοδρομικά Γαντια.</span><br>
                  <p>Από 40€</p>
                  <a href="index.php#ski-gloves"><button>Buy Here</button></a>
                  </div>
                    <div class="product-image">
                      <div class="box-image">
                        <img src="gantia-unscreen.gif" alt="">
                      </div>
                    </div>
                </div>
              </div>
        </td>

      <td><div class="card">
            <div class="container-image">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="-29 -18 140 140" x="0px" y="0px"><title>boots</title><g data-name="1">
                <path d="M51.72,36.88v5H27.29a2.53,2.53,0,0,1,0-5ZM24.77,23.4a2.53,2.53,0,0,0,2.52,2.53H51.72V20.88H27.29A2.52,2.52,0,0,0,24.77,23.4ZM39.32,61.71a2,2,0,0,1,1.22.41l12,9.22L85,71.69V64.78a6,6,0,0,0-3.64-5.51L52.94,47.12a2,2,0,0,1-1.1-1.19H27.29a6.53,6.53,0,0,1,0-13H51.72v-3H27.29a6.53,6.53,0,0,1,0-13H51.72v-3.8a6,6,0,0,0-6-6H17a6,6,0,0,0-6,6V61.71ZM51.78,75.33a2,2,0,0,1-1.2-.41L38.64,65.71H11V82.92a6,6,0,0,0,6,6H33.5a6,6,0,0,0,6-5.49l4.59,4a6,6,0,0,0,4,1.48H79a6,6,0,0,0,6-6V75.69Z"/></g></svg><defs></defs><g xmlns="http://www.w3.org/2000/svg" data-name="1">
            </div>
              <div class="content">
                <div class="detail">
                  <span><br> Μπότες & Δέστρες.</span><br>
                  <p>Από 249€</p>
                  <a href="index.php#ski-boots&right_hand"><button>Buy Here</button></a>
                </div>
                  <div class="product-image">
                    <div class="box-image">
                      <img src="snowboard-bindings-gif-unscreen.gif" alt="">
                    </div>
                  </div>
            </div>
          </td>

      <td><div class="card">
              <div class="container-image">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="-19 -17 100 100" x="0px" y="0px"><title>boots</title><g data-name="1">
                  <g xmlns="http://www.w3.org/2000/svg" data-name="ski googles"><path d="M49,22H15a3.00328,3.00328,0,0,0-3,3V39a3.00328,3.00328,0,0,0,3,3H25.05371a3.01219,3.01219,0,0,0,2.5918-1.48828L32,33.0459l4.35547,7.46582A3.00939,3.00939,0,0,0,38.94629,42H49a3.00328,3.00328,0,0,0,3-3V25A3.00328,3.00328,0,0,0,49,22ZM15,40a1,1,0,1,1,1-1A1,1,0,0,1,15,40Zm0-4a1,1,0,1,1,1-1A1,1,0,0,1,15,36Zm0-4a1,1,0,1,1,1-1A1,1,0,0,1,15,32Zm34,0a1,1,0,1,1,1-1A1,1,0,0,1,49,32Zm1-5a1,1,0,0,1-2,0V26H44a1,1,0,0,1,0-2h5a.99943.99943,0,0,1,1,1Z"/><path d="M59,24H55.9201A7.00552,7.00552,0,0,0,49,18H15a7.00552,7.00552,0,0,0-6.9201,6H5a3.00328,3.00328,0,0,0-3,3V37a3.00328,3.00328,0,0,0,3,3H8.0799A7.00552,7.00552,0,0,0,15,46H25.05371a7.02647,7.02647,0,0,0,6.04688-3.47266L32,40.98438l.90039,1.543A7.02366,7.02366,0,0,0,38.94629,46H49a7.00552,7.00552,0,0,0,6.9201-6H59a3.00328,3.00328,0,0,0,3-3V27A3.00328,3.00328,0,0,0,59,24ZM54,39a5.00588,5.00588,0,0,1-5,5H38.94629a5.01549,5.01549,0,0,1-4.31836-2.48047l-1.76367-3.02344a1.00088,1.00088,0,0,0-1.72852,0l-1.76269,3.02344A5.0183,5.0183,0,0,1,25.05371,44H15a5.00588,5.00588,0,0,1-5-5V25a5.00588,5.00588,0,0,1,5-5H49a5.00588,5.00588,0,0,1,5,5Z"/></g></g></svg><defs></defs><g xmlns="http://www.w3.org/2000/svg" data-name="1">
              </div>
                <div class="content">
                  <div class="detail">
                    <span><br> Μασκεσ & Γυαλιά.</span><br>
                    <p> Από 70€</p>
                    <a href="index.php#ski-masks&and&glasses"><button>Buy Here</button></a>
                  </div>
                    <div class="product-image">
                      <div class="box-image">
                        <img src="gialia-unscreen.gif" alt="">
                      </div>
                </div>
              </div>
          </td>
    </table>
  </div>

    <hr>
    <hr>

    <div class="img">    
    <img src="imagee.png">       
    </div>

    <hr>
    <hr>

    <section class="Ekptosi-10" style="text-align: center;">
          <h2>Πάρε -10% δώρο</h2>
          <p>Κάνε εγγραφή στο <b><i>newsletter</b></i> μας και πάρε δώρο -10% για την επόμενη αγορά<br>
            σου, πρόσβαση σε αποκλειστικές προσφορές και πολλά άλλα!</p>  
            <br>
            <br>    
            <a href="register.php" class="main-btn">shop now <i class='bx bx-right-arrow-alt'></i></a>                             
    </section>

    <hr>
    <hr>    



<table >
 <td class="empty-cell"></td>
 <td>
  <div style="text-align: center;">
    <div class="testimonial-heading">
      <h2>You Will Find Us </h2>
    </div>



  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3067.611583398892!2d21.22835317651809!3d39.74837499604575!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x135964e738d40f25%3A0x3128d77baca35bf7!2zzqfOuc6_zr3Ov860z4HOv868zrnOus-MIM6azq3Ovc-Ez4HOvyDOkc69zrfOu86vzr_PhSAtIEFuaWxpbyBQYXJr!5e0!3m2!1sel!2sgr!4v1715855785454!5m2!1sel!2sgr" width="800" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>    
    </td>
    <td class="empty-cell"></td>
    <td>
    <section id="testimonials">
    <div class="testimonial-heading">
        <h2>Clients Says</h2>
    </div>
    <div class="testimonial-box-container">
        <div class="testimonial-window">
            <div class="testimonial-box">
                <div class="box-top">
                    <div class="profile">
                        <div class="profile-img">
                            <img src="portreta1.png" />
                        </div>
                        <div class="name-user">
                            <strong>Γιώργος Παπαδόπουλος</strong>
                            <span>@skiaddict</span>
                        </div>
                    </div>
                    <div class="reviews">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                    </div>
                </div>

                <div class="client-comment">
                    <p>Επισκέφθηκα το κατάστημα και έμεινα ενθουσιασμένος με την εξυπηρέτηση και τη γκάμα των προϊόντων. Το προσωπικό ήταν εξαιρετικά φιλικό και γνώστες του χιονοδρομικού εξοπλισμού. Τα είδη ήταν υψηλής ποιότητας και είχαν μεγάλη ποικιλία. Σίγουρα θα ξαναεπισκεφθώ αυτό το κατάστημα!</p>
                </div>
            </div>
 
            <div class="testimonial-box">
                <div class="box-top">
                    <div class="profile">
                        <div class="profile-img">
                            <img src="portreta3.png" />
                        </div>
                        <div class="name-user">
                            <strong>Αναστασία Καραγιάννη</strong>
                            <span>@snowlover</span>
                        </div>
                    </div>
                    <div class="reviews">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                </div>              
                <div class="client-comment">
                    <p>Με εξέπληξε ευχάριστα η ευρεία γκάμα προϊόντων και η επαγγελματική συμβουλή του προσωπικού. Βρήκα ακριβώς αυτό που έψαχνα για την επόμενη εξόρμησή μου στα χιονοδρομικά κέντρα. Η εξυπηρέτηση ήταν άψογη και το κατάστημα είχε μια πολύ ευχάριστη ατμόσφαιρα.</p>
                </div>
            </div>

            <div class="testimonial-box">
                <div class="box-top">
                    <div class="profile">
                        <div class="profile-img">
                            <img src="portreta2.png" />
                        </div>
                        <div class="name-user">
                            <strong>Νίκος Αθανασίου</strong>
                            <span>@outdoorlover</span>
                        </div>
                    </div>
                    <div class="reviews">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                    </div>
                </div>
                <div class="client-comment">
                    <p>Πρόσφατα ανακάλυψα αυτό το κατάστημα και δεν θα μπορούσα να είμαι πιο ευχαριστημένος. Το προσωπικό ήταν εξαιρετικά γνώστες και με βοήθησαν να επιλέξω τον κατάλληλο εξοπλισμό για την επόμενη εξόρμησή μου στα βουνά. Τα προϊόντα ήταν υψηλής ποιότητας και η εξυπηρέτηση ήταν εξαιρετική. Σίγουρα θα το συστήσω σε φίλους!</p>
                </div>
            </div>
            <div class="testimonial-box">
                <div class="box-top">
                    <div class="profile">
                        <div class="profile-img">
                            <img src="portreta4.png" />
                        </div>
                        <div class="name-user">
                            <strong>Μαρία Παπαδοπούλου</strong>
                            <span> @mountaingirl</span>
                        </div>
                    </div>
                    <div class="reviews">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                    </div>
                </div>
                <div class="client-comment">
                    <p>Από τη στιγμή που μπήκα στο κατάστημα, ένιωσα ότι βρέθηκα στο σωστό μέρος. Η ευγενική συμβουλή του προσωπικού με βοήθησε να επιλέξω τον ιδανικό εξοπλισμό για την επόμενη εξόρμησή μου στα βουνά. Οι τιμές ήταν επίσης πολύ λογικές σε σχέση με την ποιότητα των προϊόντων. Συνολικά, μια εξαιρετική εμπειρία αγορών που σίγουρα θα επαναλάβω στο μέλλον!</p>
                </div>
            </div>
        </div>
    </div>
   </section>
  </td>
  <td class="empty-cell"></td>
</table>

<hr>
<hr>
    

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
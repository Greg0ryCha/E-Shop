const header = document.querySelector("header");

window.addEventListener ("scroll", function(){
    Header.classList.toggle ("stickly", this.window.scrollY > 0 );
})

let menu = document.querySelector('#menu-btn');
let navbar = document.querySelector('.header .navbar');

menu.onclick = () =>{
   menu.classList.toggle('fa-times');
   navbar.classList.toggle('active');
};

window.onscroll = () =>{
   menu.classList.remove('fa-times');
   navbar.classList.remove('active');
};


document.querySelector('#close-edit').onclick = () =>{
   document.querySelector('.edit-form-container').style.display = 'none';
   window.location.href = 'admin.php';
};


/*cards down scrol*/
$(document).ready(function(){
    $('.down').click(function(){
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


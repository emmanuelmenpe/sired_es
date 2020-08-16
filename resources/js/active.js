
$('navbar-nav').on('click','li', function(){
    $('navbar-nav li-active').addClass('active').siblings().removeClass('active')
})  
/*
$(function() {
  
    // elementos de la lista
    var menues = $(".navbar-nav li"); 
  
    // manejador de click sobre todos los elementos
    menues.click(function() {
       // eliminamos active de todos los elementos
       menues.removeClass("active");
       // activamos el elemento clicado.
       $(this).addClass("nav-item active");
    });
  
  });
  */
/*$('a.nav-link').click(function(){
    $('a.nav-link').removeClass("active");
    $(this).addClass("active");
});*/
/*$(function(){
    $('a[href*="#"]').on('click', function(e) {
        e.preventDefault()
    	
       $('body, main').animate(
            {
            scrollTop: $($(this).attr('href')).offset().top,
            },
            500,
            'linear'
        )
        oldObjChild=$('.active > a'); //gets active nav-item child nav-link
        oldObj = $('.active'); //gets the active nav-item
        oldObj.removeClass('active'); //remove active from old nav-item
        oldObjChild.css('background-color','transparent'); //clear old active nav-item and nav-link style for bg color
        $(this).parent().addClass('active'); //set the active class on the nav-item that called the function
        $(this).css('background-color','red'); //set active clas background to red
      });
});*/
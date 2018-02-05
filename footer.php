<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Pixfly
 */

?>

	<footer class="footer-bottom">
    <div class="container">
      <div class="row text-center"> 
        
        <!--footer logos-->
        <div class="col-md-12 footer-logos"> <a href="#" class="company-logo"> <img src="img/logo-b.png" class="logo"></a> <span class="company-name">Pixfly</span> </div>
        <!--/footer logos--> 
        
        <!--footer nav-->
        <div class="col-md-12 footer-nav">
          <ul>
            <li><a href="#">About us</a></li>
            <li><a href="#">Blog</a></li>
            <li><a href="#">Contact</a></li>
          </ul>
        </div>
        <!--/footer nav--> 
        
        <!--footer social-->
        <div class="col-md-12 footer-social">
          <ul>
            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
            <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
            <li><a href="#"><i class="fa fa-youtube"></i></a></li>
            <li><a href="#"><i class="fa fa-behance"></i></a></li>
            <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
          </ul>
        </div>
        <!--/footer social--> 
        
        <!--footer copyright-->
        <div class="col-md-12 footer-copyright">
          <p>© Copyright 2017. All rights reserved. </p>
        </div>
        <!--/footer copyright--> 
        
      </div>
    </div>
  </footer>
</div>
<?php wp_footer(); ?>

<!-- top menu
    ================================================== --> 

<script>
function openNav() {
    document.getElementById("mySidenav").style.width = "320px";
    document.getElementById("main-block").style.marginRight = "320px";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    document.getElementById("main-block").style.marginRight= "0";
}

</script> 
<script>


/*====================================
wow
======================================*/
			 new WOW().init();
</script> 
<script>
  // Bind as an event handler
jQuery(document).on('click', '[data-lightbox]', lity);;
</script> 
<script>
new WOW().init();

</script> 
<script>
// Bind as an event handler
jQuery(document).on('click', '[data-lightbox]', lity);
</script>
</body>
</html>

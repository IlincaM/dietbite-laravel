<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package aThemes
 */
?>
<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet"> 
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</div>
<!-- #main --></div>
<?php
get_sidebar('footer');
?>
<div class="footer-style">
<footer class="container-fluid no-padding-style">
    <div class="footer footer-color" id="footer">
        <div class="container">
            <div class="row row-footer">
                <div class="offset-md-3 col-md-6">
                    <h3 class="h3-footer right-h3-footer"> About Diet Bite</h3>
                    <p class="text-footer text-footer-position" align="right"> Lorem ipsum dolor sit amet, blandit tincidunt laoreet lacus. Lacus accumsan, arcu eu dictum dui. Et placerat, posuere est enim nibh, netus mauris pede metus turpis mauris. Veritatis laoreet. Penatibus</p>
                </div>
                <div class="offset-md-3 col-md-6">
                    <h3 class="h3-footer left-h3-footer"> Take your dose of diet biting </h3>
                    <ul>
                        <li>
                            <div class="">
                                <input type="text" class=" text-center input-height" placeholder="Enter your email adress ">
                                <button class="btn-style" type="button">subscribe</button>
                            </div>
                        </li>
                    </ul>

                </div>
            </div>
            <!--/.row--> 
            <div class="copyright-footer">
                <p>Copyright &copy; 2016 DietBite.com.All rights reserved. </p>
            </div>
        </div>
        <!--/.container--> 
    </div>
    <!--/.footer-->
    <div class="footer-bottom container-fluid">
        <div class="footer-height-social">
            <ul class="social-footer">
                <li> <a href="#"> <i class=" fa fa-facebook">   </i> </a> </li>
                <li> <a href="#"> <i class="fa fa-twitter">   </i> </a> </li>
                <li> <a href="#"> <i class="fa fa-instagram">   </i> </a> </li>
                <li> <a href="#"> <i class="fa fa-pinterest-p">   </i> </a> </li>
                <li> <a href="#"> <i class="fa fa-youtube">   </i> </a> </li>
            </ul>
        </div>
    </div>

</footer>
<footer id="colophon" class="site-footer-style container-fluid" role="contentinfo">
    <div class="clearfix containe-fluid">
        <nav id="main-navigation-blog" class="main-navigation-blog" role="navigation">

            <?php
            wp_nav_menu(array('container_class' => 'clearfix sf-menu-b blog menu-footer', 'before' => '<span class="underline">',
                'after' => '</span>', 'theme_location' => 'footer-menu'));
            ?>
        </nav>
    </div>
    <!-- #colophon --></footer>
<?php wp_footer(); ?>
</div>
</body>
</html>
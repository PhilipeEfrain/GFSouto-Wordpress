<?php get_header(); ?>

<nav class="navbar px-md-0 navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand" href="index.html"><?php _e( 'Legalcare', 'modelo_gfsouto' ); ?> <span><?php _e( 'A Law Firm Agency', 'modelo_gfsouto' ); ?></span></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> 
            <?php _e( 'Menu', 'modelo_gfsouto' ); ?>
        </button>
        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a href="index.html" class="nav-link"><?php _e( 'Home', 'modelo_gfsouto' ); ?></a>
                </li>
                <li class="nav-item">
                    <a href="about.html" class="nav-link"><?php _e( 'About', 'modelo_gfsouto' ); ?></a>
                </li>
                <li class="nav-item">
                    <a href="attorneys.html" class="nav-link"><?php _e( 'Attorneys', 'modelo_gfsouto' ); ?></a>
                </li>
                <li class="nav-item active">
                    <a href="practice-areas.html" class="nav-link"><?php _e( 'Practice Areas', 'modelo_gfsouto' ); ?></a>
                </li>
                <li class="nav-item">
                    <a href="case.html" class="nav-link"><?php _e( 'Case Studies', 'modelo_gfsouto' ); ?></a>
                </li>
                <li class="nav-item">
                    <a href="blog.html" class="nav-link"><?php _e( 'Blog', 'modelo_gfsouto' ); ?></a>
                </li>
                <li class="nav-item">
                    <a href="contact.html" class="nav-link"><?php _e( 'Contact', 'modelo_gfsouto' ); ?></a>
                </li>
                <li class="nav-item cta">
                    <a href="#" class="nav-link"><?php _e( 'Free Consultation', 'modelo_gfsouto' ); ?></a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- END nav -->
<section class="hero-wrap hero-wrap-2" style="background-image: url('<?php echo esc_url( get_template_directory_uri() ); ?>/images/bg_1.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-center">
            <div class="col-md-9 ftco-animate pb-5 text-center">
                <h1 class="mb-3 bread"><?php _e( 'Practice Areas', 'modelo_gfsouto' ); ?></h1>
                <p class="breadcrumbs"><span class="mr-2"><a href="index.html"><?php _e( 'Home', 'modelo_gfsouto' ); ?> <i class="ion-ios-arrow-forward"></i></a></span> <span><?php _e( 'Practice Areas', 'modelo_gfsouto' ); ?> <i class="ion-ios-arrow-forward"></i></span></p>
            </div>
        </div>
    </div>
</section>
<section class="ftco-section">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-md-3 text-center">
                <div class="practice-area ftco-animate">
                    <div class="icon d-flex justify-content-center align-items-center">
                        <span class="flaticon-family"></span>
                    </div>
                    <h3><a href="practice-single.html"><?php _e( 'Family Law', 'modelo_gfsouto' ); ?></a></h3>
                    <p><?php _e( 'A small river named Duden flows by their place and supplies it with the necessary regelialia.', 'modelo_gfsouto' ); ?></p>
                    <a href="#" class="btn-custom d-flex align-items-center justify-content-center"><span class="ion-ios-arrow-round-forward"></span></a>
                </div>
            </div>
            <div class="col-md-3 text-center">
                <div class="practice-area ftco-animate">
                    <div class="icon d-flex justify-content-center align-items-center">
                        <span class="flaticon-auction"></span>
                    </div>
                    <h3><a href="practice-single.html"><?php _e( 'Business Law', 'modelo_gfsouto' ); ?></a></h3>
                    <p><?php _e( 'A small river named Duden flows by their place and supplies it with the necessary regelialia.', 'modelo_gfsouto' ); ?></p>
                    <a href="#" class="btn-custom d-flex align-items-center justify-content-center"><span class="ion-ios-arrow-round-forward"></span></a>
                </div>
            </div>
            <div class="col-md-3 text-center">
                <div class="practice-area ftco-animate">
                    <div class="icon d-flex justify-content-center align-items-center">
                        <span class="flaticon-shield"></span>
                    </div>
                    <h3><a href="practice-single.html"><?php _e( 'Insurance Law', 'modelo_gfsouto' ); ?></a></h3>
                    <p><?php _e( 'A small river named Duden flows by their place and supplies it with the necessary regelialia.', 'modelo_gfsouto' ); ?></p>
                    <a href="#" class="btn-custom d-flex align-items-center justify-content-center"><span class="ion-ios-arrow-round-forward"></span></a>
                </div>
            </div>
            <div class="col-md-3 text-center">
                <div class="practice-area ftco-animate">
                    <div class="icon d-flex justify-content-center align-items-center">
                        <span class="flaticon-handcuffs"></span>
                    </div>
                    <h3><a href="practice-single.html"><?php _e( 'Criminal Law', 'modelo_gfsouto' ); ?></a></h3>
                    <p><?php _e( 'A small river named Duden flows by their place and supplies it with the necessary regelialia.', 'modelo_gfsouto' ); ?></p>
                    <a href="#" class="btn-custom d-flex align-items-center justify-content-center"><span class="ion-ios-arrow-round-forward"></span></a>
                </div>
            </div>
            <div class="col-md-3 text-center">
                <div class="practice-area ftco-animate">
                    <div class="icon d-flex justify-content-center align-items-center">
                        <span class="flaticon-house"></span>
                    </div>
                    <h3><a href="practice-single.html"><?php _e( 'Property Law', 'modelo_gfsouto' ); ?></a></h3>
                    <p><?php _e( 'A small river named Duden flows by their place and supplies it with the necessary regelialia.', 'modelo_gfsouto' ); ?></p>
                    <a href="#" class="btn-custom d-flex align-items-center justify-content-center"><span class="ion-ios-arrow-round-forward"></span></a>
                </div>
            </div>
            <div class="col-md-3 text-center">
                <div class="practice-area ftco-animate">
                    <div class="icon d-flex justify-content-center align-items-center">
                        <span class="flaticon-employee"></span>
                    </div>
                    <h3><a href="practice-single.html"><?php _e( 'Employment Law', 'modelo_gfsouto' ); ?></a></h3>
                    <p><?php _e( 'A small river named Duden flows by their place and supplies it with the necessary regelialia.', 'modelo_gfsouto' ); ?></p>
                    <a href="#" class="btn-custom d-flex align-items-center justify-content-center"><span class="ion-ios-arrow-round-forward"></span></a>
                </div>
            </div>
            <div class="col-md-3 text-center">
                <div class="practice-area ftco-animate">
                    <div class="icon d-flex justify-content-center align-items-center">
                        <span class="flaticon-fire"></span>
                    </div>
                    <h3><a href="practice-single.html"><?php _e( 'Fire Accident', 'modelo_gfsouto' ); ?></a></h3>
                    <p><?php _e( 'A small river named Duden flows by their place and supplies it with the necessary regelialia.', 'modelo_gfsouto' ); ?></p>
                    <a href="#" class="btn-custom d-flex align-items-center justify-content-center"><span class="ion-ios-arrow-round-forward"></span></a>
                </div>
            </div>
            <div class="col-md-3 text-center">
                <div class="practice-area ftco-animate">
                    <div class="icon d-flex justify-content-center align-items-center">
                        <span class="flaticon-money"></span>
                    </div>
                    <h3><a href="practice-single.html"><?php _e( 'Financial Law', 'modelo_gfsouto' ); ?></a></h3>
                    <p><?php _e( 'A small river named Duden flows by their place and supplies it with the necessary regelialia.', 'modelo_gfsouto' ); ?></p>
                    <a href="#" class="btn-custom d-flex align-items-center justify-content-center"><span class="ion-ios-arrow-round-forward"></span></a>
                </div>
            </div>
            <div class="col-md-3 text-center">
                <div class="practice-area ftco-animate">
                    <div class="icon d-flex justify-content-center align-items-center">
                        <span class="flaticon-medicine"></span>
                    </div>
                    <h3><a href="practice-single.html"><?php _e( 'Drug Offenses', 'modelo_gfsouto' ); ?></a></h3>
                    <p><?php _e( 'A small river named Duden flows by their place and supplies it with the necessary regelialia.', 'modelo_gfsouto' ); ?></p>
                    <a href="#" class="btn-custom d-flex align-items-center justify-content-center"><span class="ion-ios-arrow-round-forward"></span></a>
                </div>
            </div>
            <div class="col-md-3 text-center">
                <div class="practice-area ftco-animate">
                    <div class="icon d-flex justify-content-center align-items-center">
                        <span class="flaticon-handcuffs"></span>
                    </div>
                    <h3><a href="practice-single.html"><?php _e( 'Sexual Offenses', 'modelo_gfsouto' ); ?></a></h3>
                    <p><?php _e( 'A small river named Duden flows by their place and supplies it with the necessary regelialia.', 'modelo_gfsouto' ); ?></p>
                    <a href="#" class="btn-custom d-flex align-items-center justify-content-center"><span class="ion-ios-arrow-round-forward"></span></a>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="ftco-section ftco-no-pt ftco-no-pb">
    <div class="container">
        <div class="row d-flex justify-content-end">
            <div class="col-md-8 py-4 px-md-4 bg-primary">
                <div class="row">
                    <div class="col-md-6 ftco-animate d-flex align-items-center">
                        <h2 class="mb-0" style="color:white; font-size: 24px;"><?php _e( 'Subcribe to our Newsletter', 'modelo_gfsouto' ); ?></h2>
                    </div>
                    <div class="col-md-6 d-flex align-items-center">
                        <form action="<?php echo esc_url( get_template_directory_uri() ); ?>/#" class="subscribe-form">
                            <div class="form-group d-flex">
                                <input type="text" class="form-control" placeholder="Enter email address">
                                <input type="submit" value="Subscribe" class="submit px-3">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<footer class="ftco-footer ftco-bg-dark ftco-section">
    <div class="container">
        <div class="row mb-5">
            <div class="col-md">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="logo"><a href="#"><?php _e( 'Legalcare', 'modelo_gfsouto' ); ?> <span><?php _e( 'A Law Firm Agency', 'modelo_gfsouto' ); ?></span></a></h2>
                    <p><?php _e( 'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.', 'modelo_gfsouto' ); ?></p>
                    <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                        <li class="ftco-animate">
                            <a href="#"><span class="icon-twitter"></span></a>
                        </li>
                        <li class="ftco-animate">
                            <a href="#"><span class="icon-facebook"></span></a>
                        </li>
                        <li class="ftco-animate">
                            <a href="#"><span class="icon-instagram"></span></a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md">
                <div class="ftco-footer-widget mb-4 ml-md-5">
                    <h2 class="ftco-heading-2"><?php _e( 'Practice Areas', 'modelo_gfsouto' ); ?></h2>
                    <ul class="list-unstyled">
                        <li>
                            <a href="#" class="py-1 d-block"><span class="ion-ios-arrow-forward mr-3"></span><?php _e( 'Family Law', 'modelo_gfsouto' ); ?></a>
                        </li>
                        <li>
                            <a href="#" class="py-1 d-block"><span class="ion-ios-arrow-forward mr-3"></span><?php _e( 'Business Law', 'modelo_gfsouto' ); ?></a>
                        </li>
                        <li>
                            <a href="#" class="py-1 d-block"><span class="ion-ios-arrow-forward mr-3"></span><?php _e( 'Insurance Law', 'modelo_gfsouto' ); ?></a>
                        </li>
                        <li>
                            <a href="#" class="py-1 d-block"><span class="ion-ios-arrow-forward mr-3"></span><?php _e( 'Criminal Law', 'modelo_gfsouto' ); ?></a>
                        </li>
                        <li>
                            <a href="#" class="py-1 d-block"><span class="ion-ios-arrow-forward mr-3"></span><?php _e( 'Drug Offenses', 'modelo_gfsouto' ); ?></a>
                        </li>
                        <li>
                            <a href="#" class="py-1 d-block"><span class="ion-ios-arrow-forward mr-3"></span><?php _e( 'Fire Accident', 'modelo_gfsouto' ); ?></a>
                        </li>
                        <li>
                            <a href="#" class="py-1 d-block"><span class="ion-ios-arrow-forward mr-3"></span><?php _e( 'Employment Law', 'modelo_gfsouto' ); ?></a>
                        </li>
                        <li>
                            <a href="#" class="py-1 d-block"><span class="ion-ios-arrow-forward mr-3"></span><?php _e( 'Property Law', 'modelo_gfsouto' ); ?></a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2"><?php _e( 'Have a Questions?', 'modelo_gfsouto' ); ?></h2>
                    <div class="block-23 mb-3">
                        <ul>
                            <li>
                                <span class="icon icon-map-marker"></span>
                                <span class="text"><?php _e( '203 Fake St. Mountain View, San Francisco, California, USA', 'modelo_gfsouto' ); ?></span>
                            </li>
                            <li>
                                <a href="#"><span class="icon icon-phone"></span><span class="text"><?php _e( '+2 392 3929 210', 'modelo_gfsouto' ); ?></span></a>
                            </li>
                            <li>
                                <a href="#"><span class="icon icon-envelope"></span><span class="text"><?php _e( 'info@yourdomain.com', 'modelo_gfsouto' ); ?></span></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2"><?php _e( 'Business Hours', 'modelo_gfsouto' ); ?></h2>
                    <div class="opening-hours">
                        <h4><?php _e( 'Opening Days:', 'modelo_gfsouto' ); ?></h4>
                        <p class="pl-3"> <span><?php _e( 'Monday – Friday : 9am to 20 pm', 'modelo_gfsouto' ); ?></span> <span><?php _e( 'Saturday : 9am to 17 pm', 'modelo_gfsouto' ); ?></span> </p>
                        <h4><?php _e( 'Vacations:', 'modelo_gfsouto' ); ?></h4>
                        <p class="pl-3"> <span><?php _e( 'All Sunday Days', 'modelo_gfsouto' ); ?></span> <span><?php _e( 'All Official Holidays', 'modelo_gfsouto' ); ?></span> </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center">
                <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --> <?php _e( 'Copyright &copy;', 'modelo_gfsouto' ); ?> <?php _e( 'All rights reserved | This template is made with', 'modelo_gfsouto' ); ?> <i class="icon-heart color-danger" aria-hidden="true"></i> <?php _e( 'by', 'modelo_gfsouto' ); ?> <a href="https://colorlib.com" target="_blank"><?php _e( 'Colorlib', 'modelo_gfsouto' ); ?></a> <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
            </div>
        </div>
    </div>
</footer>
<!-- loader -->
<div id="ftco-loader" class="show fullscreen">
    <svg class="circular" width="48px" height="48px">
        <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/>
        <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/>
    </svg>
</div>        

<?php get_footer(); ?>
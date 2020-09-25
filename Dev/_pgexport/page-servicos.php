<?php get_header(); ?>

        <!-- END nav -->
        <section class="hero-wrap hero-wrap-2" style="background-image: url('<?php echo esc_url( get_template_directory_uri() ); ?>/images/bg_1.jpg');" data-stellar-background-ratio="0.5">
            <div class="overlay"></div>
            <div class="container">
                <div class="row no-gutters slider-text align-items-end justify-content-center">
                    <div class="col-md-9 ftco-animate pb-5 text-center">
                        <h1 class="mb-3 bread"><?php _e( 'Portaria Virtual', 'modelo_gfsouto' ); ?></h1>
                        <p class="breadcrumbs"><span class="mr-2"><a href="index.html"><?php _e( 'Home', 'modelo_gfsouto' ); ?> <i class="ion-ios-arrow-forward"></i></a></span> <span><?php _e( 'Portaria Virutal&nbsp;', 'modelo_gfsouto' ); ?><i class="ion-ios-arrow-forward"></i></span></p>
                    </div>
                </div>
            </div>
        </section>
        <section class="ftco-section ftco-no-pt ftco-no-pb">
            <div class="container">
</div>
        </section>
        <!-- loader -->
        <div id="ftco-loader" class="show fullscreen">
            <svg class="circular" width="48px" height="48px">
                <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/>
                <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/>
            </svg>
        </div>        

<?php get_footer(); ?>
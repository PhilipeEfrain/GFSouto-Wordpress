<?php get_header(); ?>

<section class="hero-wrap hero-wrap-2" style="background-image: url('<?php echo esc_url( get_template_directory_uri() ); ?>/images/bg_1.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-center">
            <div class="col-md-9 ftco-animate pb-5 text-center">
                <h1 class="mb-3 bread"><?php _e( 'Blog', 'modelo_gfsouto' ); ?></h1>
                <p class="breadcrumbs"><span class="mr-2"><a href="index.html"><?php _e( 'Home', 'modelo_gfsouto' ); ?> <i class="ion-ios-arrow-forward"></i></a></span> <span><?php _e( 'Blog', 'modelo_gfsouto' ); ?> <i class="ion-ios-arrow-forward"></i></span></p>
            </div>
        </div>
    </div>
</section>
<section class="ftco-section bg-light">
    <div class="container">
        <div class="row d-flex">
            <?php
                $post_query_args = array(
                    'post_type' => 'post',
                    'posts_per_page' => 9,
                    'paged' => get_query_var( 'paged' ) ?: 1,
                    'order' => 'ASC',
                    'orderby' => 'date'
                )
            ?>
            <?php $post_query = new WP_Query( $post_query_args ); ?>
            <?php if ( $post_query->have_posts() ) : ?>
                <?php while ( $post_query->have_posts() ) : $post_query->the_post(); ?>
                    <?php PG_Helper::rememberShownPost(); ?>
                    <div <?php post_class( 'col-md-4 d-flex ftco-animate' ); ?> id="post-<?php the_ID(); ?>">
                        <div class="blog-entry justify-content-end">
                            <div class="text px-4 py-4">
                                <?php if ( is_singular() ) : ?>
                                    <h3 class="heading mb-0"><a href="#"><?php the_title(); ?></a></h3>
                                <?php else : ?>
                                    <h3 class="heading mb-0"><a href="<?php echo esc_url( get_permalink() ); ?>"><?php the_title(); ?></a></h3>
                                <?php endif; ?>
                            </div>
                            <?php if ( !is_singular() ) : ?>
                                <?php echo PG_Image::getPostImage( null, 'large', array(
                                        'class' => 'block-20'
                                ), null, null ) ?>
                            <?php endif; ?>
                            <div class="text p-4 float-right d-block">
                                <div class="topper d-flex align-items-center">
                                    <div class="one py-2 pl-3 pr-1 align-self-stretch">
                                        <span class="day"><?php the_modified_date( 'j' ); ?></span>
                                    </div>
                                    <div class="two pl-0 pr-3 py-2 align-self-stretch">
                                        <span class="yr"><?php the_modified_date( 'Y' ); ?></span>
                                        <span class="mos"><?php the_modified_date( 'F' ); ?></span>
                                    </div>
                                </div>
                                <?php the_excerpt( ); ?>
                                <p><a href="<?php echo esc_url( get_permalink() ); ?>" class="btn btn-primary"><?php _e( 'Leia Mais', 'modelo_gfsouto' ); ?></a></p>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
            <?php else : ?>
                <p><?php _e( 'Sorry, no posts matched your criteria.', 'modelo_gfsouto' ); ?></p>
            <?php endif; ?>
        </div>
    </div>
</section>
<section class="ftco-section bg-light">
    <div class="container">
        <div class="row mt-5">
            <div class="col text-center">
                <?php if ( PG_Pagination::isPaginated() ) : ?>
                    <div class="block-27">
                        <ul>
                            <li>
                                <a <?php echo PG_Pagination::getPreviousHrefAttribute(); ?>>&lt;</a>
                            </li>
                            <li class="active">
                                <span><?php echo PG_Pagination::getCurrentPage(); ?></span>
                            </li>
                            <li>
                                <a href="#"><?php _e( '2', 'modelo_gfsouto' ); ?></a>
                            </li>
                            <li>
                                <a href="#"><?php _e( '3', 'modelo_gfsouto' ); ?></a>
                            </li>
                            <li>
                                <a href="#"><?php _e( '4', 'modelo_gfsouto' ); ?></a>
                            </li>
                            <li>
                                <a href="#"><?php _e( '5', 'modelo_gfsouto' ); ?></a>
                            </li>
                            <li>
                                <a <?php echo PG_Pagination::getNextHrefAttribute(); ?>>&gt;</a>
                            </li>
                        </ul>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
<section class="ftco-section ftco-no-pt ftco-no-pb bg-light">
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

<?php get_footer(); ?>
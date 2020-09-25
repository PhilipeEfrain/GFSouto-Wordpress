<?php get_header(); ?>

<section class="hero-wrap hero-wrap-2" data-stellar-background-ratio="0.5" style="background-image: url('<?php echo esc_url( get_template_directory_uri() ); ?>/../images/img/D__Arquivos%20BDE_GFSouto%20site%20novo_Site%20novo_images_01.jpg');background-image:<?php echo 'url('.PG_Image::getUrl( get_theme_mod( 'blog_imagem' ), 'large' ).')' ?>;">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-center">
            <div class="col-md-9 ftco-animate pb-5 text-center">
                <h1 class="mb-3 bread"><?php bloginfo( 'name' ); ?></h1>
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
                    'posts_per_page' => 999,
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
                                    <h3 class="heading mb-0"><a href="http://gf-souto.local/hello-world/"><?php the_title(); ?></a></h3>
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
                                <p class="text-justify" style="text-align: justify !important;"><?php echo get_the_excerpt(); ?></p>
                                <p><a href="<?php echo esc_url( get_permalink() ); ?>" class="btn btn-primary"><?php _e( 'Leia Mais', 'gfnovo' ); ?></a></p>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
            <?php else : ?>
                <p><?php _e( 'Sorry, no posts matched your criteria.', 'gfnovo' ); ?></p>
            <?php endif; ?>
        </div>
    </div>
</section>            

<?php get_footer(); ?>
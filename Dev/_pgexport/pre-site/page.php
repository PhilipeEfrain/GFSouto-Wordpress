<?php get_header(); ?>

<!-- END nav -->
<section class="hero-wrap hero-wrap-2" style="background-image: url('<?php echo esc_url( get_template_directory_uri() ); ?>/images/bg_1.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-center">
            <div class="col-md-9 ftco-animate pb-5 text-center">
                <h1 class="mb-3 bread"><?php bloginfo( 'name' ); ?></h1>
                <p class="breadcrumbs"><?php wp_title(); ?></p>
            </div>
        </div>
    </div>
</section>
<section class="ftco-section ftco-degree-bg">
    <div class="container">
        <div class="row">
            <?php if ( have_posts() ) : ?>
                <?php while ( have_posts() ) : the_post(); ?>
                    <?php PG_Helper::rememberShownPost(); ?>
                    <div class="col-lg-8 ftco-animate">
                        <p> <?php echo PG_Image::getPostImage( null, 'large', array(
                                    'class' => 'img-fluid'
                            ), 'both', null ) ?> </p>
                        <h2 class="mb-3"><?php the_title(); ?></h2>
                        <?php the_content(); ?>
                        <div class="tag-widget post-tag-container mb-5 mt-5">
                            <div class="tagcloud">
                                <?php $terms = get_the_terms( get_the_ID(), 'post_tag' ) ?>
                                <?php if( !empty( $terms ) ) : ?>
                                    <?php foreach( $terms as $term ) : ?>
                                        <a href="<?php echo esc_url( get_term_link( $term, 'post_tag' ) ) ?>" class="tag-cloud-link"><?php echo $term->name; ?></a>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php else : ?>
                <p><?php _e( 'Sorry, no posts matched your criteria.', 'modelo_gfsouto' ); ?></p>
            <?php endif; ?> 
            <!-- .col-md-8 -->
            <div class="col-lg-4 sidebar pl-lg-5 ftco-animate">
                <?php if ( is_active_sidebar( 'barra_lateral_categorias' ) ) : ?>
                    <div class="sidebar-box ftco-animate">
                        <?php dynamic_sidebar( 'barra_lateral_categorias' ); ?>
                    </div>
                <?php endif; ?>
                <?php if ( is_active_sidebar( 'barra_lateral_blog' ) ) : ?>
                    <div class="sidebar-box ftco-animate">
                        <?php dynamic_sidebar( 'barra_lateral_blog' ); ?>
                    </div>
                <?php endif; ?>
                <?php if ( is_active_sidebar( 'barra_lateral_tags' ) ) : ?>
                    <div class="sidebar-box ftco-animate">
                        <?php dynamic_sidebar( 'barra_lateral_tags' ); ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>        

<?php get_footer(); ?>
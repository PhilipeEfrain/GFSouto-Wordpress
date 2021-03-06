<?php get_header(); ?>

<!-- END nav -->
<?php $image_attributes = !empty( get_the_ID() ) ? wp_get_attachment_image_src( PG_Image::isPostImage() ? get_the_ID() : get_post_thumbnail_id( get_the_ID() ), 'large' ) : null; ?>
<section class="hero-wrap hero-wrap-2" style="background-image: url('<?php echo esc_url( get_template_directory_uri() ); ?>/images/bg_1.jpg');<?php if($image_attributes) echo 'background-image:url(\''.$image_attributes[0].'\')' ?>" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-center">
            <div class="col-md-9 ftco-animate pb-5 text-center">
                <h1 class="mb-3 bread"><?php the_title(); ?></h1>
            </div>
        </div>
    </div>
</section>
<section class="ftco-section ftco-degree-bg">
    <div class="container">
        <div class="col-lg-12 ftco-animate">
            <h2 class="mb-3"><?php the_title(); ?></h2>
            <?php the_content(); ?>
        </div>
    </div>
</section>        

<?php get_footer(); ?>
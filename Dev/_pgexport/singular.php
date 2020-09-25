<?php get_header(); ?>

<!-- END nav -->
<nav class="navbar px-md-0 navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/img/logo.png" alt="Logo" class="img-fluid" width="10%">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> 
            <?php _e( 'Menu', 'modelo_gfsouto' ); ?>
        </button>
        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a href="index.html" class="nav-link"><?php _e( 'Home', 'modelo_gfsouto' ); ?></a>
                </li>
                <li class="nav-item">
                    <a href="about.html" class="nav-link"><?php _e( 'Sobre', 'modelo_gfsouto' ); ?></a>
                </li>
                <li class="nav-item">
                    <a href="attorneys.html" class="nav-link"><?php _e( 'Serviços', 'modelo_gfsouto' ); ?></a>
                </li>
                <li class="nav-item">
                    <a href="practice-areas.html" class="nav-link"><?php _e( 'Parceiros', 'modelo_gfsouto' ); ?></a>
                </li>
                <li class="nav-item">
                    <a href="blog.html" class="nav-link"><?php _e( 'Blog', 'modelo_gfsouto' ); ?></a>
                </li>
                <li class="nav-item">
                    <a href="contact.html" class="nav-link"><?php _e( 'Contato', 'modelo_gfsouto' ); ?></a>
                </li>
                <li class="nav-item cta" style="margin-right: 7px;">
                    <a href="#" class="nav-link"><?php _e( 'Portaria Virtual', 'modelo_gfsouto' ); ?></a>
                </li>
                <li class="nav-item cta">
                    <a href="#" class="nav-link"><?php _e( 'Área do Cliente', 'modelo_gfsouto' ); ?></a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<section class="hero-wrap hero-wrap-2" style="background-image: url('<?php echo esc_url( get_template_directory_uri() ); ?>/images/bg_1.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-center">
            <div class="col-md-9 ftco-animate pb-5 text-center">
                <h1 class="mb-3 bread"><?php bloginfo( 'name' ); ?></h1>
                <?php wp_title( '<i class="ion-ios-arrow-forward"></i>' ); ?>
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
<!-- .section -->
<footer class="ftco-footer ftco-bg-dark ftco-section">
    <div class="container">
        <div class="row mb-5">
            <div class="col-md">
                <img src="<?php echo PG_Image::getUrl( get_theme_mod( 'rodape_logo', esc_url( get_template_directory_uri() . '/images/img/logo.png' ) ), 'large' ) ?>" alt="Logo" class="img-fluid" width="auto">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="logo"><a href="#"></a></h2>
                    <p><?php echo get_theme_mod( 'rodape_sub-texto', 'Quando você precisa,<br>nós estamos aqui.' ); ?></p>
                    <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                        <li class="ftco-animate">
                            <a href="<?php echo get_theme_mod( 'rodape_youtube', '#' ); ?>"><span class="icon-youtube"></span></a>
                        </li>
                        <li class="ftco-animate">
                            <a href="<?php echo get_theme_mod( 'rodape_facebook', '#' ); ?>"><span class="icon-facebook"></span></a>
                        </li>
                        <li class="ftco-animate">
                            <a href="<?php echo get_theme_mod( 'rodape_instagram', '#' ); ?>"><span class="icon-instagram"></span></a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-3 ">
                <div class="ftco-footer-widget mb-4 ml-md-5">
                    <h2 class="ftco-heading-2"><?php echo get_theme_mod( 'rodape_menu', __( 'Menu', 'modelo_gfsouto' ) ); ?></h2>
                    <?php if ( has_nav_menu( 'primary' ) ) : ?>
                        <?php
                            PG_Smart_Walker_Nav_Menu::$options['template'] = '<li id="{ID}" class="{CLASSES}">
                                                        <a class="py-1 d-block" {ATTRS}><span class="ion-ios-arrow-forward mr-3"></span>{TITLE}</a>
                                                    </li>';
                            wp_nav_menu( array(
                                'container' => '',
                                'theme_location' => 'primary',
                                'items_wrap' => '<ul class="%2$s list-unstyled" id="%1$s">%3$s</ul>',
                                'walker' => new PG_Smart_Walker_Nav_Menu()
                        ) ); ?>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-md-4">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2"><?php echo get_theme_mod( 'rodape_duvida', __( 'Alguma duvida?', 'modelo_gfsouto' ) ); ?></h2>
                    <div class="block-23 mb-3">
                        <ul>
                            <li>
                                <span class="icon-map-marker icon"></span>
                                <span class="text"><?php echo get_theme_mod( 'rodape_endereco', 'Rua Amaro Duarte, 241, Nova BetâniaCEP 59.603.030<br>Mossoró / RN' ); ?></span>
                            </li>
                            <li>
                                <a href="#"><span class="icon icon-phone"></span><span class="text"><?php echo get_theme_mod( 'rodape_telefone', '(84) 3323 - 1250' ); ?></span></a>
                            </li>
                            <li>
                                <a href="#"><span class="icon icon-envelope"></span><span class="text"><?php echo get_theme_mod( 'rodape_email', __( 'contato@gfsouto.com.br', 'modelo_gfsouto' ) ); ?></span></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="ftco-footer-widget mb-4">
                    <div class="opening-hours">
                        <h4><?php echo get_theme_mod( 'rodape', __( 'Escritório: Segunda a sexta-feira', 'modelo_gfsouto' ) ); ?></h4>
                        <p class="pl-3"><?php echo get_theme_mod( 'rodape_hora', __( '9h as 18h', 'modelo_gfsouto' ) ); ?></p>
                        <h4><?php echo get_theme_mod( 'rodape_emergencia', __( 'Emergências:&nbsp;', 'modelo_gfsouto' ) ); ?></h4>
                        <p class="pl-3"><?php echo get_theme_mod( 'rodape_horario_emergencia', __( 'Atendimento 24h', 'modelo_gfsouto' ) ); ?></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center">
                <p><?php echo get_theme_mod( 'rodape_copy', '<!-- Link back to Colorlib can\'t be removed. Template is licensed under CC BY 3.0. --> Copyright ©<script>document.write(new Date().getFullYear());</script> Todos os direitos reservados a GF Souto Administradora de Condomínios<!-- Link back to Colorlib can\'t be removed. Template is licensed under CC BY 3.0. -->' ); ?></p>
            </div>
        </div>
    </div>
</footer>        

<?php get_footer(); ?>
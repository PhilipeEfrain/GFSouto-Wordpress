<!DOCTYPE html>
<!--  Converted from HTML to WordPress with Pinegrow Web Editor. https://pinegrow.com  -->
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
        <meta content="Pinegrow Web Editor" name="generator">
        <?php wp_head(); ?>
    </head>
    <body class="<?php echo implode(' ', get_body_class()); ?>">
        <?php if( function_exists( 'wp_body_open' ) ) wp_body_open(); ?>
        <!-- END nav -->
        <nav class="navbar px-md-0 navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
            <div class="container">
                <img src="<?php echo PG_Image::getUrl( get_theme_mod( 'logo_imagem', esc_url( get_template_directory_uri() . '/images/img/logo.png' ) ), 'large' ) ?>" alt="Logo" class="img-fluid" width="10%" href="<?php echo esc_url( home_url() ); ?>">
                <button type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler">
                    <i class="fa fa-navicon fa-2x"></i>
                </button>
                <div class="collapse navbar-collapse" id="ftco-nav">
                    <?php if ( has_nav_menu( 'primary' ) ) : ?>
                        <?php
                            PG_Smart_Walker_Nav_Menu::$options['template'] = '<li class="nav-item {CLASSES}" id="{ID}">
                                                        <a class="nav-link" {ATTRS}>{TITLE}</a>
                                                    </li>';
                            PG_Smart_Walker_Nav_Menu::$options['current_class'] = 'active';
                            wp_nav_menu( array(
                                'container' => '',
                                'theme_location' => 'primary',
                                'items_wrap' => '<ul class="%2$s ml-auto navbar-nav" id="%1$s">%3$s</ul>',
                                'walker' => new PG_Smart_Walker_Nav_Menu()
                        ) ); ?>
                    <?php endif; ?>
                    <button class="btn btn-primary mr-md-4 py-2 px-4 text-left" type="button" href="<?php echo get_theme_mod( 'menu_especial_portaria_link' ); ?>">
                        <?php echo get_theme_mod( 'menu_especial_portaria' ); ?>
                    </button>
                    <button class="btn btn-primary mr-md-4 py-2 px-4 text-left" type="button" href="<?php echo get_theme_mod( 'menu_especial_cliente_link' ); ?>">
                        <?php echo get_theme_mod( 'menu_especial_cliente' ); ?>
                    </button>
                </div>
            </div>
        </nav>
        <section>
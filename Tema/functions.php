<?php
if ( ! function_exists( 'gfnovo_setup' ) ) :

function gfnovo_setup() {

    /*
     * Make theme available for translation.
     * Translations can be filed in the /languages/ directory.
     */
    /* Pinegrow generated Load Text Domain Begin */
    load_theme_textdomain( 'gfnovo', get_template_directory() . '/languages' );
    /* Pinegrow generated Load Text Domain End */

    // Add default posts and comments RSS feed links to head.
    add_theme_support( 'automatic-feed-links' );

    /*
     * Let WordPress manage the document title.
     */
    add_theme_support( 'title-tag' );
    
    /*
     * Enable support for Post Thumbnails on posts and pages.
     */
    add_theme_support( 'post-thumbnails' );

    // Add menus.
    register_nav_menus( array(
        'primary' => __( 'Primary Menu', 'gfnovo' ),
        'social'  => __( 'Social Links Menu', 'gfnovo' ),
    ) );

/*
     * Register custom menu locations
     */
    /* Pinegrow generated Register Menus Begin */

    /* Pinegrow generated Register Menus End */
    
/*
    * Set image sizes
     */
    /* Pinegrow generated Image sizes Begin */

    /* Pinegrow generated Image sizes End */
    
    /*
     * Switch default core markup for search form, comment form, and comments
     * to output valid HTML5.
     */
    add_theme_support( 'html5', array(
        'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
    ) );

    /*
     * Enable support for Post Formats.
     */
    add_theme_support( 'post-formats', array(
        'aside', 'image', 'video', 'quote', 'link', 'gallery', 'status', 'audio', 'chat'
    ) );

    /*
     * Enable support for Page excerpts.
     */
     add_post_type_support( 'page', 'excerpt' );
}
endif; // gfnovo_setup

add_action( 'after_setup_theme', 'gfnovo_setup' );


if ( ! function_exists( 'gfnovo_init' ) ) :

function gfnovo_init() {

    
    // Use categories and tags with attachments
    register_taxonomy_for_object_type( 'category', 'attachment' );
    register_taxonomy_for_object_type( 'post_tag', 'attachment' );

    /*
     * Register custom post types. You can also move this code to a plugin.
     */
    /* Pinegrow generated Custom Post Types Begin */

    /* Pinegrow generated Custom Post Types End */
    
    /*
     * Register custom taxonomies. You can also move this code to a plugin.
     */
    /* Pinegrow generated Taxonomies Begin */

    /* Pinegrow generated Taxonomies End */

}
endif; // gfnovo_setup

add_action( 'init', 'gfnovo_init' );


if ( ! function_exists( 'gfnovo_custom_image_sizes_names' ) ) :

function gfnovo_custom_image_sizes_names( $sizes ) {

    /*
     * Add names of custom image sizes.
     */
    /* Pinegrow generated Image Sizes Names Begin*/
    /* This code will be replaced by returning names of custom image sizes. */
    /* Pinegrow generated Image Sizes Names End */
    return $sizes;
}
add_action( 'image_size_names_choose', 'gfnovo_custom_image_sizes_names' );
endif;// gfnovo_custom_image_sizes_names



if ( ! function_exists( 'gfnovo_widgets_init' ) ) :

function gfnovo_widgets_init() {

    /*
     * Register widget areas.
     */
    /* Pinegrow generated Register Sidebars Begin */

    register_sidebar( array(
        'name' => __( 'Contato', 'gfnovo' ),
        'id' => 'contato',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widgettitle">',
        'after_title' => '</h3>'
    ) );

    /* Pinegrow generated Register Sidebars End */
}
add_action( 'widgets_init', 'gfnovo_widgets_init' );
endif;// gfnovo_widgets_init



if ( ! function_exists( 'gfnovo_customize_register' ) ) :

function gfnovo_customize_register( $wp_customize ) {
    // Do stuff with $wp_customize, the WP_Customize_Manager object.

    /* Pinegrow generated Customizer Controls Begin */

    $wp_customize->add_section( 'botao_chamada', array(
        'title' => __( 'Botão topo', 'gfnovo' )
    ));

    $wp_customize->add_section( 'blog', array(
        'title' => __( 'Blog', 'gfnovo' )
    ));

    $wp_customize->add_section( 'footer', array(
        'title' => __( 'Footer', 'gfnovo' )
    ));

    $wp_customize->add_section( 'home', array(
        'title' => __( 'Home', 'gfnovo' )
    ));

    $wp_customize->add_section( 'servicos', array(
        'title' => __( 'Serviços', 'gfnovo' )
    ));

    $wp_customize->add_section( 'servicos', array(
        'title' => __( 'Serviços', 'gfnovo' )
    ));

    $wp_customize->add_section( 'a_gfsouto', array(
        'title' => __( 'A GF Souto', 'gfnovo' )
    ));

    $wp_customize->add_section( 'contato', array(
        'title' => __( 'Contato', 'gfnovo' )
    ));

    $wp_customize->add_section( 'blog', array(
        'title' => __( 'Blog', 'gfnovo' )
    ));

    $wp_customize->add_section( 'blog', array(
        'title' => __( 'Blog', 'gfnovo' )
    ));

    $wp_customize->add_section( 'virtual_home', array(
        'title' => __( 'Virtual Home', 'gfnovo' )
    ));

    $wp_customize->add_section( 'portaria_virtual', array(
        'title' => __( 'Portaria virtual', 'gfnovo' )
    ));

    $wp_customize->add_section( 'portaria_virtual', array(
        'title' => __( 'Portaria virtual', 'gfnovo' )
    ));

    $wp_customize->add_section( 'servicos_virtual', array(
        'title' => __( 'Serviços', 'gfnovo' )
    ));

    $wp_customize->add_section( 'blog', array(
        'title' => __( 'Blog', 'gfnovo' )
    ));
    $pgwp_sanitize = function_exists('pgwp_sanitize_placeholder') ? 'pgwp_sanitize_placeholder' : null;

    $wp_customize->add_setting( 'botao_chamada_principal', array(
        'type' => 'theme_mod',
        'default' => __( 'Free Consultation', 'gfnovo' ),
        'sanitize_callback' => $pgwp_sanitize
    ));

    $wp_customize->add_control( 'botao_chamada_principal', array(
        'label' => __( 'Botão', 'gfnovo' ),
        'type' => 'text',
        'section' => 'botao_chamada'
    ));

    $wp_customize->add_setting( 'botao_chamada_link', array(
        'type' => 'theme_mod',
        'sanitize_callback' => $pgwp_sanitize
    ));

    $wp_customize->add_control( 'botao_chamada_link', array(
        'label' => __( 'Link do Botão', 'gfnovo' ),
        'type' => 'url',
        'section' => 'botao_chamada'
    ));

    $wp_customize->add_setting( 'footer_logo', array(
        'type' => 'theme_mod',
        'sanitize_callback' => $pgwp_sanitize
    ));

    $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'footer_logo', array(
        'label' => __( 'Logo', 'gfnovo' ),
        'type' => 'media',
        'mime_type' => 'image',
        'section' => 'footer'
    ) ) );

    $wp_customize->add_setting( 'footer_slogan', array(
        'type' => 'theme_mod',
        'default' => __( 'Quando você precisar, nós estamos aqui.', 'gfnovo' ),
        'sanitize_callback' => $pgwp_sanitize
    ));

    $wp_customize->add_control( 'footer_slogan', array(
        'label' => __( 'Slogan', 'gfnovo' ),
        'type' => 'textarea',
        'section' => 'footer'
    ));

    $wp_customize->add_setting( 'footer_duvida', array(
        'type' => 'theme_mod',
        'sanitize_callback' => $pgwp_sanitize
    ));

    $wp_customize->add_control( 'footer_duvida', array(
        'label' => __( 'Duvidas', 'gfnovo' ),
        'type' => 'textarea',
        'section' => 'footer'
    ));

    $wp_customize->add_setting( 'footer_horário', array(
        'type' => 'theme_mod',
        'sanitize_callback' => $pgwp_sanitize
    ));

    $wp_customize->add_control( 'footer_horário', array(
        'label' => __( 'Horários', 'gfnovo' ),
        'type' => 'textarea',
        'section' => 'footer'
    ));

    $wp_customize->add_setting( 'footer_direitos', array(
        'type' => 'theme_mod',
        'default' => '<!-- Link back to Colorlib can\'t be removed. Template is licensed under CC BY 3.0. --> Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart color-danger" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a> <!-- Link back to Colorlib can\'t be removed. Template is licensed under CC BY 3.0. -->',
        'sanitize_callback' => $pgwp_sanitize
    ));

    $wp_customize->add_control( 'footer_direitos', array(
        'label' => __( 'Direitos', 'gfnovo' ),
        'type' => 'textarea',
        'section' => 'footer'
    ));

    $wp_customize->add_setting( 'home_img_fundo', array(
        'type' => 'theme_mod',
        'sanitize_callback' => $pgwp_sanitize
    ));

    $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'home_img_fundo', array(
        'label' => __( 'Funto da Home', 'gfnovo' ),
        'type' => 'media',
        'mime_type' => 'image',
        'section' => 'home'
    ) ) );

    $wp_customize->add_setting( 'home_bem_vindo', array(
        'type' => 'theme_mod',
        'default' => __( 'Bem vindo a GFSouto', 'gfnovo' ),
        'sanitize_callback' => $pgwp_sanitize
    ));

    $wp_customize->add_control( 'home_bem_vindo', array(
        'label' => __( 'Bem Vindo', 'gfnovo' ),
        'type' => 'text',
        'section' => 'home'
    ));

    $wp_customize->add_setting( 'home_principal', array(
        'type' => 'theme_mod',
        'default' => 'Administrando condomónios<br> com <span class="txt-rotate" data-period="2000" data-rotate=\'[ "responsabilidade.", "seriedade.", "harmonia.", "honestidade." ]\'></span>',
        'sanitize_callback' => $pgwp_sanitize
    ));

    $wp_customize->add_control( 'home_principal', array(
        'label' => __( 'Chamada Principal', 'gfnovo' ),
        'type' => 'textarea',
        'section' => 'home'
    ));

    $wp_customize->add_setting( 'home_sug_chamada', array(
        'type' => 'theme_mod',
        'default' => __( '"A solidez e a liderança absoluta no mercado de Mossoró são frutos do trabalho de uma equipe comprometida em atender seus clientes com transparência, ética e honestidade"', 'gfnovo' ),
        'sanitize_callback' => $pgwp_sanitize
    ));

    $wp_customize->add_control( 'home_sug_chamada', array(
        'label' => __( 'Sug Chamada', 'gfnovo' ),
        'type' => 'textarea',
        'section' => 'home'
    ));

    $wp_customize->add_setting( 'home_botao', array(
        'type' => 'theme_mod',
        'default' => 'Nossa História <span class="ion-ios-arrow-forward"></span>',
        'sanitize_callback' => $pgwp_sanitize
    ));

    $wp_customize->add_control( 'home_botao', array(
        'label' => __( 'Botão Home', 'gfnovo' ),
        'type' => 'text',
        'section' => 'home'
    ));

    $wp_customize->add_setting( 'home_botao_link', array(
        'type' => 'theme_mod',
        'sanitize_callback' => $pgwp_sanitize
    ));

    $wp_customize->add_control( 'home_botao_link', array(
        'label' => __( 'Link do Botão Home', 'gfnovo' ),
        'type' => 'url',
        'section' => 'home'
    ));

    $wp_customize->add_setting( 'servicos_sub', array(
        'type' => 'theme_mod',
        'default' => __( 'Pioneiros no mercado!', 'gfnovo' ),
        'sanitize_callback' => $pgwp_sanitize
    ));

    $wp_customize->add_control( 'servicos_sub', array(
        'label' => __( 'Sub Títulos', 'gfnovo' ),
        'type' => 'text',
        'section' => 'servicos'
    ));

    $wp_customize->add_setting( 'servicos_titulo', array(
        'type' => 'theme_mod',
        'default' => __( 'Portaria Virtual', 'gfnovo' ),
        'sanitize_callback' => $pgwp_sanitize
    ));

    $wp_customize->add_control( 'servicos_titulo', array(
        'label' => __( 'Título', 'gfnovo' ),
        'type' => 'text',
        'section' => 'servicos'
    ));

    $wp_customize->add_setting( 'servicos_texto', array(
        'type' => 'theme_mod',
        'default' => __( 'A GF Souto em constante busca de inovação aos seus clientes, foi uma das pioneiras, em serviço de Portaria Virtual. Oferecemos tecnologia de ponta e soluções customizadas para condomínios e empresas, trazendo economia e tranquilidade aos clientes.', 'gfnovo' ),
        'sanitize_callback' => $pgwp_sanitize
    ));

    $wp_customize->add_control( 'servicos_texto', array(
        'label' => __( 'Texto', 'gfnovo' ),
        'type' => 'textarea',
        'section' => 'servicos'
    ));

    $wp_customize->add_setting( 'servicos_bnt', array(
        'type' => 'theme_mod',
        'default' => __( 'Saiba mais', 'gfnovo' ),
        'sanitize_callback' => $pgwp_sanitize
    ));

    $wp_customize->add_control( 'servicos_bnt', array(
        'label' => __( 'Botão', 'gfnovo' ),
        'type' => 'text',
        'section' => 'servicos'
    ));

    $wp_customize->add_setting( 'servicos_bnt_link', array(
        'type' => 'theme_mod',
        'sanitize_callback' => $pgwp_sanitize
    ));

    $wp_customize->add_control( 'servicos_bnt_link', array(
        'label' => __( 'Link', 'gfnovo' ),
        'type' => 'url',
        'section' => 'servicos'
    ));

    $wp_customize->add_setting( 'servicos_svg_01', array(
        'type' => 'theme_mod',
        'sanitize_callback' => $pgwp_sanitize
    ));

    $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'servicos_svg_01', array(
        'label' => __( 'Ícone em SVG 01', 'gfnovo' ),
        'type' => 'media',
        'mime_type' => 'image',
        'section' => 'servicos'
    ) ) );

    $wp_customize->add_setting( 'servicos_titulo_01', array(
        'type' => 'theme_mod',
        'default' => __( 'Condomínio Online', 'gfnovo' ),
        'sanitize_callback' => $pgwp_sanitize
    ));

    $wp_customize->add_control( 'servicos_titulo_01', array(
        'label' => __( 'Título 01', 'gfnovo' ),
        'type' => 'text',
        'section' => 'servicos'
    ));

    $wp_customize->add_setting( 'servicos_texto_01', array(
        'type' => 'theme_mod',
        'default' => __( 'Sistema completo para administração de condomínios, desenvolvido com tecnologia moderna e uma interface amigável.', 'gfnovo' ),
        'sanitize_callback' => $pgwp_sanitize
    ));

    $wp_customize->add_control( 'servicos_texto_01', array(
        'label' => __( 'Texto 01', 'gfnovo' ),
        'type' => 'textarea',
        'section' => 'servicos'
    ));

    $wp_customize->add_setting( 'servicos_svg_02', array(
        'type' => 'theme_mod',
        'sanitize_callback' => $pgwp_sanitize
    ));

    $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'servicos_svg_02', array(
        'label' => __( 'Ícone em SVG 02', 'gfnovo' ),
        'type' => 'media',
        'mime_type' => 'image',
        'section' => 'servicos'
    ) ) );

    $wp_customize->add_setting( 'servicos_titulo_02', array(
        'type' => 'theme_mod',
        'default' => __( 'Condomínio Online', 'gfnovo' ),
        'sanitize_callback' => $pgwp_sanitize
    ));

    $wp_customize->add_control( 'servicos_titulo_02', array(
        'label' => __( 'Título 02', 'gfnovo' ),
        'type' => 'text',
        'section' => 'servicos'
    ));

    $wp_customize->add_setting( 'servicos_texto_02', array(
        'type' => 'theme_mod',
        'default' => __( 'Sistema completo para administração de condomínios, desenvolvido com tecnologia moderna e uma interface amigável.', 'gfnovo' ),
        'sanitize_callback' => $pgwp_sanitize
    ));

    $wp_customize->add_control( 'servicos_texto_02', array(
        'label' => __( 'Texto 02', 'gfnovo' ),
        'type' => 'textarea',
        'section' => 'servicos'
    ));

    $wp_customize->add_setting( 'servicos_svg_03', array(
        'type' => 'theme_mod',
        'sanitize_callback' => $pgwp_sanitize
    ));

    $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'servicos_svg_03', array(
        'label' => __( 'Ícone em SVG 03', 'gfnovo' ),
        'type' => 'media',
        'mime_type' => 'image',
        'section' => 'servicos'
    ) ) );

    $wp_customize->add_setting( 'servicos_titulo_03', array(
        'type' => 'theme_mod',
        'default' => __( 'Condomínio Online', 'gfnovo' ),
        'sanitize_callback' => $pgwp_sanitize
    ));

    $wp_customize->add_control( 'servicos_titulo_03', array(
        'label' => __( 'Título 03', 'gfnovo' ),
        'type' => 'text',
        'section' => 'servicos'
    ));

    $wp_customize->add_setting( 'servicos_texto_03', array(
        'type' => 'theme_mod',
        'default' => __( 'Sistema completo para administração de condomínios, desenvolvido com tecnologia moderna e uma interface amigável.', 'gfnovo' ),
        'sanitize_callback' => $pgwp_sanitize
    ));

    $wp_customize->add_control( 'servicos_texto_03', array(
        'label' => __( 'Texto 03', 'gfnovo' ),
        'type' => 'textarea',
        'section' => 'servicos'
    ));

    $wp_customize->add_setting( 'servicos_botao', array(
        'type' => 'theme_mod',
        'default' => __( 'Todos os Serviços', 'gfnovo' ),
        'sanitize_callback' => $pgwp_sanitize
    ));

    $wp_customize->add_control( 'servicos_botao', array(
        'label' => __( 'Todos os Serviços', 'gfnovo' ),
        'type' => 'text',
        'section' => 'servicos'
    ));

    $wp_customize->add_setting( 'servicos_botao_link', array(
        'type' => 'theme_mod',
        'sanitize_callback' => $pgwp_sanitize
    ));

    $wp_customize->add_control( 'servicos_botao_link', array(
        'label' => __( 'Link do Botão', 'gfnovo' ),
        'type' => 'url',
        'section' => 'servicos'
    ));

    $wp_customize->add_setting( 'a_gfsouto', array(
        'type' => 'theme_mod',
        'sanitize_callback' => $pgwp_sanitize
    ));

    $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'a_gfsouto', array(
        'label' => __( 'Imagem GF Souto', 'gfnovo' ),
        'type' => 'media',
        'mime_type' => 'image',
        'section' => 'a_gfsouto'
    ) ) );

    $wp_customize->add_setting( 'a_gfsouto_chamada', array(
        'type' => 'theme_mod',
        'default' => __( 'A GF Souto', 'gfnovo' ),
        'sanitize_callback' => $pgwp_sanitize
    ));

    $wp_customize->add_control( 'a_gfsouto_chamada', array(
        'label' => __( 'Chamada', 'gfnovo' ),
        'type' => 'text',
        'section' => 'a_gfsouto'
    ));

    $wp_customize->add_setting( 'a_gfsouto_titulo', array(
        'type' => 'theme_mod',
        'default' => __( 'Uma história de muito trabalho e dedicação', 'gfnovo' ),
        'sanitize_callback' => $pgwp_sanitize
    ));

    $wp_customize->add_control( 'a_gfsouto_titulo', array(
        'label' => __( 'Título', 'gfnovo' ),
        'type' => 'text',
        'section' => 'a_gfsouto'
    ));

    $wp_customize->add_setting( 'a_gfsouto_texto', array(
        'type' => 'theme_mod',
        'default' => __( 'Apresentando um projeto de excelência, com uma grande noção de rigor e responsabilidade e uma forma de atuar transparente.', 'gfnovo' ),
        'sanitize_callback' => $pgwp_sanitize
    ));

    $wp_customize->add_control( 'a_gfsouto_texto', array(
        'label' => __( 'Texto', 'gfnovo' ),
        'type' => 'textarea',
        'section' => 'a_gfsouto'
    ));

    $wp_customize->add_setting( 'a_gfsouto_objetivo', array(
        'type' => 'theme_mod',
        'default' => __( 'Objetivo', 'gfnovo' ),
        'sanitize_callback' => $pgwp_sanitize
    ));

    $wp_customize->add_control( 'a_gfsouto_objetivo', array(
        'label' => __( 'Objetivo', 'gfnovo' ),
        'type' => 'text',
        'section' => 'a_gfsouto'
    ));

    $wp_customize->add_setting( 'a_gfsouto_visao', array(
        'type' => 'theme_mod',
        'default' => __( 'Visão', 'gfnovo' ),
        'sanitize_callback' => $pgwp_sanitize
    ));

    $wp_customize->add_control( 'a_gfsouto_visao', array(
        'label' => __( 'Visão', 'gfnovo' ),
        'type' => 'text',
        'section' => 'a_gfsouto'
    ));

    $wp_customize->add_setting( 'a_gfsouto_valor', array(
        'type' => 'theme_mod',
        'default' => __( 'Valor', 'gfnovo' ),
        'sanitize_callback' => $pgwp_sanitize
    ));

    $wp_customize->add_control( 'a_gfsouto_valor', array(
        'label' => __( 'Valor', 'gfnovo' ),
        'type' => 'text',
        'section' => 'a_gfsouto'
    ));

    $wp_customize->add_setting( 'a_gfsouto_objetivo_texto', array(
        'type' => 'theme_mod',
        'default' => 'A <strong>GF SOUTO</strong> tem por objetivo oferecer um atendimento personalizado com: Ética; Transparência; Eficiência e tranqüilidade a altura da expectativa do cliente, satisfazendo plenamente suas necessidades. Estamos sempre buscando a excelência no atendimento e o máximo de assistência na execução dos serviços, onde: identificamos as reais necessidades do condomínio, elaboramos propostas e soluções personalizadas adequando as reais expectativas e realidade financeira de cada cliente, além da otimização de resultados, nunca abrindo mão da qualidade.<br>',
        'sanitize_callback' => $pgwp_sanitize
    ));

    $wp_customize->add_control( 'a_gfsouto_objetivo_texto', array(
        'label' => __( 'Texto Objetivo', 'gfnovo' ),
        'type' => 'textarea',
        'section' => 'a_gfsouto'
    ));

    $wp_customize->add_setting( 'a_gfsouto_visao_texto', array(
        'type' => 'theme_mod',
        'default' => __( 'Temos certeza que para: administrar com eficiência o condomínio de forma a reduzir custos, garantir a qualidade dos serviços prestados e qualidade de vida para os moradores, teremos que ter em mente que o conhecimento é uma estrada que se percorre com conquistas diárias, e a chave para o sucesso é trabalhar muito, ser humilde e ter ética', 'gfnovo' ),
        'sanitize_callback' => $pgwp_sanitize
    ));

    $wp_customize->add_control( 'a_gfsouto_visao_texto', array(
        'label' => __( 'Texto Visão', 'gfnovo' ),
        'type' => 'textarea',
        'section' => 'a_gfsouto'
    ));

    $wp_customize->add_setting( 'a_gfsouto_valor_texto', array(
        'type' => 'theme_mod',
        'default' => 'Honestidade<br>Ética<br>Transparência<br>Persistência<br>Responsabilidade Social<br>Consciência Ecológica',
        'sanitize_callback' => $pgwp_sanitize
    ));

    $wp_customize->add_control( 'a_gfsouto_valor_texto', array(
        'label' => __( 'Texto Valor', 'gfnovo' ),
        'type' => 'textarea',
        'section' => 'a_gfsouto'
    ));

    $wp_customize->add_setting( 'contato_imagem', array(
        'type' => 'theme_mod',
        'sanitize_callback' => $pgwp_sanitize
    ));

    $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'contato_imagem', array(
        'label' => __( 'Imagem', 'gfnovo' ),
        'type' => 'media',
        'mime_type' => 'image',
        'section' => 'contato'
    ) ) );

    $wp_customize->add_setting( 'contato_duvida', array(
        'type' => 'theme_mod',
        'default' => __( 'Alguma duvida?', 'gfnovo' ),
        'sanitize_callback' => $pgwp_sanitize
    ));

    $wp_customize->add_control( 'contato_duvida', array(
        'label' => __( 'Alguma Duvida?', 'gfnovo' ),
        'type' => 'text',
        'section' => 'contato'
    ));

    $wp_customize->add_setting( 'contato_entre_em_contato', array(
        'type' => 'theme_mod',
        'default' => __( 'Entre em contato', 'gfnovo' ),
        'sanitize_callback' => $pgwp_sanitize
    ));

    $wp_customize->add_control( 'contato_entre_em_contato', array(
        'label' => __( 'Entre em Contato', 'gfnovo' ),
        'type' => 'text',
        'section' => 'contato'
    ));

    $wp_customize->add_setting( 'blog_chamada', array(
        'type' => 'theme_mod',
        'default' => __( 'Nosso Blog', 'gfnovo' ),
        'sanitize_callback' => $pgwp_sanitize
    ));

    $wp_customize->add_control( 'blog_chamada', array(
        'label' => __( 'Chamada', 'gfnovo' ),
        'type' => 'text',
        'section' => 'blog'
    ));

    $wp_customize->add_setting( 'blog_titulo', array(
        'type' => 'theme_mod',
        'default' => __( 'Matérias e Notícias Recentes', 'gfnovo' ),
        'sanitize_callback' => $pgwp_sanitize
    ));

    $wp_customize->add_control( 'blog_titulo', array(
        'label' => __( 'Título', 'gfnovo' ),
        'type' => 'text',
        'section' => 'blog'
    ));

    $wp_customize->add_setting( 'blog_imagem', array(
        'type' => 'theme_mod',
        'sanitize_callback' => $pgwp_sanitize
    ));

    $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'blog_imagem', array(
        'label' => __( 'Imagem de fundo', 'gfnovo' ),
        'type' => 'media',
        'mime_type' => 'image',
        'section' => 'blog'
    ) ) );

    $wp_customize->add_setting( 'virtual_home_img_fundo', array(
        'type' => 'theme_mod',
        'sanitize_callback' => $pgwp_sanitize
    ));

    $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'virtual_home_img_fundo', array(
        'label' => __( 'Funto da Portaria Vurtual', 'gfnovo' ),
        'type' => 'media',
        'mime_type' => 'image',
        'section' => 'virtual_home'
    ) ) );

    $wp_customize->add_setting( 'virtual_home_bem_vindo', array(
        'type' => 'theme_mod',
        'default' => __( 'Bem vindo a GFSouto', 'gfnovo' ),
        'sanitize_callback' => $pgwp_sanitize
    ));

    $wp_customize->add_control( 'virtual_home_bem_vindo', array(
        'label' => __( 'Bem Vindo', 'gfnovo' ),
        'type' => 'text',
        'section' => 'virtual_home'
    ));

    $wp_customize->add_setting( 'virtual_home_principal', array(
        'type' => 'theme_mod',
        'default' => 'Administrando condomónios<br> com <span class="txt-rotate" data-period="2000" data-rotate=\'[ "responsabilidade.", "seriedade.", "harmonia.", "honestidade." ]\' style="color: #001d6c;"></span>',
        'sanitize_callback' => $pgwp_sanitize
    ));

    $wp_customize->add_control( 'virtual_home_principal', array(
        'label' => __( 'Chamada Principal', 'gfnovo' ),
        'type' => 'textarea',
        'section' => 'virtual_home'
    ));

    $wp_customize->add_setting( 'virtual_home_sug_chamada', array(
        'type' => 'theme_mod',
        'default' => __( '"A solidez e a liderança absoluta no mercado de Mossoró são frutos do trabalho de uma equipe comprometida em atender seus clientes com transparência, ética e honestidade"', 'gfnovo' ),
        'sanitize_callback' => $pgwp_sanitize
    ));

    $wp_customize->add_control( 'virtual_home_sug_chamada', array(
        'label' => __( 'Sug Chamada', 'gfnovo' ),
        'type' => 'textarea',
        'section' => 'virtual_home'
    ));

    $wp_customize->add_setting( 'virtual_home_botao', array(
        'type' => 'theme_mod',
        'default' => 'Nossa História <span class="ion-ios-arrow-forward"></span>',
        'sanitize_callback' => $pgwp_sanitize
    ));

    $wp_customize->add_control( 'virtual_home_botao', array(
        'label' => __( 'Botão Home', 'gfnovo' ),
        'type' => 'text',
        'section' => 'virtual_home'
    ));

    $wp_customize->add_setting( 'virtual_home_botao_link', array(
        'type' => 'theme_mod',
        'sanitize_callback' => $pgwp_sanitize
    ));

    $wp_customize->add_control( 'virtual_home_botao_link', array(
        'label' => __( 'Link do Botão Home', 'gfnovo' ),
        'type' => 'url',
        'section' => 'virtual_home'
    ));

    $wp_customize->add_setting( 'portaria_virtual_sub', array(
        'type' => 'theme_mod',
        'default' => __( 'Pioneiros no mercado!', 'gfnovo' ),
        'sanitize_callback' => $pgwp_sanitize
    ));

    $wp_customize->add_control( 'portaria_virtual_sub', array(
        'label' => __( 'Sub Título', 'gfnovo' ),
        'type' => 'text',
        'section' => 'portaria_virtual'
    ));

    $wp_customize->add_setting( 'portaria_virtual_titulo', array(
        'type' => 'theme_mod',
        'default' => __( 'Portaria Virtual', 'gfnovo' ),
        'sanitize_callback' => $pgwp_sanitize
    ));

    $wp_customize->add_control( 'portaria_virtual_titulo', array(
        'label' => __( 'Título', 'gfnovo' ),
        'type' => 'text',
        'section' => 'portaria_virtual'
    ));

    $wp_customize->add_setting( 'portaria_virtual_txt', array(
        'type' => 'theme_mod',
        'default' => 'É um serviço de portaria 24 horas, através de uma central de monitoramento, controlamos por sensores, áudio e imagens ao vivo, a entrada e saída de pessoas e automóveis nas áreas comuns de um edifício, abrindo e fechando os portões quando necessário (como se naquele local houvesse realmente um porteiro de plantão), interagindo com os presentes no local.<br><br>Oferecemos um serviço de portaria integrado ao que a tecnologia tem de melhor a oferecer na área de segurança. Atendentes trabalham em uma base de portaria remota, onde supervisionam os acessos. O atendimento é feito remotamente contando com equipamentos de alta tecnologia instalados no condomínio.Na portaria virtual, os funcionários são continuamente acompanhados e monitorados para oferecer um atendimento eficiente e de qualidade para os moradores, garantindo a segurança de todos.<br><br>Com 10 anos de mercado, a GF Souto a 6 anos fornece o sistema de Portaria Virtual sempre aprimorando durante todo este período para garantir melhorias aos nossos clientes com reduções de custos e atendimento ágil e confiável.',
        'sanitize_callback' => $pgwp_sanitize
    ));

    $wp_customize->add_control( 'portaria_virtual_txt', array(
        'label' => __( 'Texto', 'gfnovo' ),
        'type' => 'textarea',
        'section' => 'portaria_virtual'
    ));

    $wp_customize->add_setting( 'blocks_promo1_video', array(
        'type' => 'theme_mod',
        'default' => __( 'http://www.youtube.com/embed/vcQDcbChHQA?rel=0&amp;controls=0&amp;showinfo=0', 'gfnovo' ),
        'sanitize_callback' => $pgwp_sanitize
    ));

    $wp_customize->add_control( 'blocks_promo1_video', array(
        'label' => __( 'Video url', 'gfnovo' ),
        'description' => __( 'Src of YouTube embed code', 'gfnovo' ),
        'type' => 'text',
        'section' => 'portaria_virtual'
    ));

    $wp_customize->add_setting( 'servicos_virtual_svg_01', array(
        'type' => 'theme_mod',
        'sanitize_callback' => $pgwp_sanitize
    ));

    $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'servicos_virtual_svg_01', array(
        'label' => __( 'Ícone em SVG 01', 'gfnovo' ),
        'type' => 'media',
        'mime_type' => 'image',
        'section' => 'servicos_virtual'
    ) ) );

    $wp_customize->add_setting( 'servicos_virtual_titulo_01', array(
        'type' => 'theme_mod',
        'default' => __( 'Condomínio Online', 'gfnovo' ),
        'sanitize_callback' => $pgwp_sanitize
    ));

    $wp_customize->add_control( 'servicos_virtual_titulo_01', array(
        'label' => __( 'Título 01', 'gfnovo' ),
        'type' => 'text',
        'section' => 'servicos_virtual'
    ));

    $wp_customize->add_setting( 'servicos_virtual_texto_01', array(
        'type' => 'theme_mod',
        'default' => __( 'Sistema completo para administração de condomínios, desenvolvido com tecnologia moderna e uma interface amigável.', 'gfnovo' ),
        'sanitize_callback' => $pgwp_sanitize
    ));

    $wp_customize->add_control( 'servicos_virtual_texto_01', array(
        'label' => __( 'Texto 01', 'gfnovo' ),
        'type' => 'textarea',
        'section' => 'servicos_virtual'
    ));

    $wp_customize->add_setting( 'servicos_virtual_svg_02', array(
        'type' => 'theme_mod',
        'sanitize_callback' => $pgwp_sanitize
    ));

    $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'servicos_virtual_svg_02', array(
        'label' => __( 'Ícone em SVG 02', 'gfnovo' ),
        'type' => 'media',
        'mime_type' => 'image',
        'section' => 'servicos_virtual'
    ) ) );

    $wp_customize->add_setting( 'servicos_virtual_titulo_02', array(
        'type' => 'theme_mod',
        'default' => __( 'Condomínio Online', 'gfnovo' ),
        'sanitize_callback' => $pgwp_sanitize
    ));

    $wp_customize->add_control( 'servicos_virtual_titulo_02', array(
        'label' => __( 'Título 02', 'gfnovo' ),
        'type' => 'text',
        'section' => 'servicos_virtual'
    ));

    $wp_customize->add_setting( 'servicos_virtual_texto_02', array(
        'type' => 'theme_mod',
        'default' => __( 'Sistema completo para administração de condomínios, desenvolvido com tecnologia moderna e uma interface amigável.', 'gfnovo' ),
        'sanitize_callback' => $pgwp_sanitize
    ));

    $wp_customize->add_control( 'servicos_virtual_texto_02', array(
        'label' => __( 'Texto 02', 'gfnovo' ),
        'type' => 'textarea',
        'section' => 'servicos_virtual'
    ));

    $wp_customize->add_setting( 'servicos_virtual_svg_03', array(
        'type' => 'theme_mod',
        'sanitize_callback' => $pgwp_sanitize
    ));

    $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'servicos_virtual_svg_03', array(
        'label' => __( 'Ícone em SVG 03', 'gfnovo' ),
        'type' => 'media',
        'mime_type' => 'image',
        'section' => 'servicos'
    ) ) );

    $wp_customize->add_setting( 'servicos_virtual_titulo_03', array(
        'type' => 'theme_mod',
        'default' => __( 'Condomínio Online', 'gfnovo' ),
        'sanitize_callback' => $pgwp_sanitize
    ));

    $wp_customize->add_control( 'servicos_virtual_titulo_03', array(
        'label' => __( 'Título 03', 'gfnovo' ),
        'type' => 'text',
        'section' => 'servicos_virtual'
    ));

    $wp_customize->add_setting( 'servicos_virtual_texto_03', array(
        'type' => 'theme_mod',
        'default' => __( 'Sistema completo para administração de condomínios, desenvolvido com tecnologia moderna e uma interface amigável.', 'gfnovo' ),
        'sanitize_callback' => $pgwp_sanitize
    ));

    $wp_customize->add_control( 'servicos_virtual_texto_03', array(
        'label' => __( 'Texto 03', 'gfnovo' ),
        'type' => 'textarea',
        'section' => 'servicos_virtual'
    ));

    $wp_customize->add_setting( 'servicos_virtual_botao', array(
        'type' => 'theme_mod',
        'default' => __( 'Todos os Serviços', 'gfnovo' ),
        'sanitize_callback' => $pgwp_sanitize
    ));

    $wp_customize->add_control( 'servicos_virtual_botao', array(
        'label' => __( 'Todos os Serviços', 'gfnovo' ),
        'type' => 'text',
        'section' => 'servicos_virtual'
    ));

    $wp_customize->add_setting( 'servicos_virtual_botao_link', array(
        'type' => 'theme_mod',
        'sanitize_callback' => $pgwp_sanitize
    ));

    $wp_customize->add_control( 'servicos_virtual_botao_link', array(
        'label' => __( 'Link do Botão', 'gfnovo' ),
        'type' => 'url',
        'section' => 'servicos_virtual'
    ));

    /* Pinegrow generated Customizer Controls End */

}
add_action( 'customize_register', 'gfnovo_customize_register' );
endif;// gfnovo_customize_register


if ( ! function_exists( 'gfnovo_enqueue_scripts' ) ) :
    function gfnovo_enqueue_scripts() {

        /* Pinegrow generated Enqueue Scripts Begin */

    wp_deregister_script( 'jquery' );
    wp_enqueue_script( 'jquery', get_template_directory_uri() . '/assets/js/jquery.min.js', false, null, true);

    wp_deregister_script( 'gfnovo-jquerymigrate' );
    wp_enqueue_script( 'gfnovo-jquerymigrate', get_template_directory_uri() . '/js/jquery-migrate-3.0.1.min.js', false, null, true);

    wp_deregister_script( 'gfnovo-popper' );
    wp_enqueue_script( 'gfnovo-popper', get_template_directory_uri() . '/assets/js/popper.js', false, null, true);

    wp_deregister_script( 'gfnovo-bootstrap' );
    wp_enqueue_script( 'gfnovo-bootstrap', get_template_directory_uri() . '/bootstrap/js/bootstrap.min.js', false, null, true);

    wp_deregister_script( 'gfnovo-jqueryeasing' );
    wp_enqueue_script( 'gfnovo-jqueryeasing', get_template_directory_uri() . '/js/jquery.easing.1.3.js', false, null, true);

    wp_deregister_script( 'gfnovo-jquerywaypoints' );
    wp_enqueue_script( 'gfnovo-jquerywaypoints', get_template_directory_uri() . '/js/jquery.waypoints.min.js', false, null, true);

    wp_deregister_script( 'gfnovo-jquerystellar' );
    wp_enqueue_script( 'gfnovo-jquerystellar', get_template_directory_uri() . '/js/jquery.stellar.min.js', false, null, true);

    wp_deregister_script( 'gfnovo-owlcarousel' );
    wp_enqueue_script( 'gfnovo-owlcarousel', get_template_directory_uri() . '/js/owl.carousel.min.js', false, null, true);

    wp_deregister_script( 'gfnovo-jquerymagnificpopup' );
    wp_enqueue_script( 'gfnovo-jquerymagnificpopup', get_template_directory_uri() . '/js/jquery.magnific-popup.min.js', false, null, true);

    wp_deregister_script( 'gfnovo-aos' );
    wp_enqueue_script( 'gfnovo-aos', get_template_directory_uri() . '/js/aos.js', false, null, true);

    wp_deregister_script( 'gfnovo-jqueryanimatenumber' );
    wp_enqueue_script( 'gfnovo-jqueryanimatenumber', get_template_directory_uri() . '/js/jquery.animateNumber.min.js', false, null, true);

    wp_deregister_script( 'gfnovo-scrollax' );
    wp_enqueue_script( 'gfnovo-scrollax', get_template_directory_uri() . '/js/scrollax.min.js', false, null, true);

    wp_deregister_script( 'gfnovo-script' );
    wp_enqueue_script( 'gfnovo-script', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false', false, null, true);

    wp_deregister_script( 'gfnovo-googlemap' );
    wp_enqueue_script( 'gfnovo-googlemap', get_template_directory_uri() . '/js/google-map.js', false, null, true);

    wp_deregister_script( 'gfnovo-main' );
    wp_enqueue_script( 'gfnovo-main', get_template_directory_uri() . '/js/main.js', false, null, true);

    /* Pinegrow generated Enqueue Scripts End */

        /* Pinegrow generated Enqueue Styles Begin */

    wp_deregister_style( 'gfnovo-style' );
    wp_enqueue_style( 'gfnovo-style', 'https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900', false, null, 'all');

    wp_deregister_style( 'gfnovo-bootstrap' );
    wp_enqueue_style( 'gfnovo-bootstrap', get_template_directory_uri() . '/bootstrap/css/bootstrap.min.css', false, null, 'all');

    wp_deregister_style( 'gfnovo-animate' );
    wp_enqueue_style( 'gfnovo-animate', get_template_directory_uri() . '/css/animate.css', false, null, 'all');

    wp_deregister_style( 'gfnovo-owlcarousel' );
    wp_enqueue_style( 'gfnovo-owlcarousel', get_template_directory_uri() . '/css/owl.carousel.min.css', false, null, 'all');

    wp_deregister_style( 'gfnovo-owlthemedefault' );
    wp_enqueue_style( 'gfnovo-owlthemedefault', get_template_directory_uri() . '/css/owl.theme.default.min.css', false, null, 'all');

    wp_deregister_style( 'gfnovo-magnificpopup' );
    wp_enqueue_style( 'gfnovo-magnificpopup', get_template_directory_uri() . '/css/magnific-popup.css', false, null, 'all');

    wp_deregister_style( 'gfnovo-aos' );
    wp_enqueue_style( 'gfnovo-aos', get_template_directory_uri() . '/css/aos.css', false, null, 'all');

    wp_deregister_style( 'gfnovo-ionicons' );
    wp_enqueue_style( 'gfnovo-ionicons', get_template_directory_uri() . '/css/ionicons.min.css', false, null, 'all');

    wp_deregister_style( 'gfnovo-flaticon' );
    wp_enqueue_style( 'gfnovo-flaticon', get_template_directory_uri() . '/css/flaticon.css', false, null, 'all');

    wp_deregister_style( 'gfnovo-icomoon' );
    wp_enqueue_style( 'gfnovo-icomoon', get_template_directory_uri() . '/css/icomoon.css', false, null, 'all');

    wp_deregister_style( 'gfnovo-style-1' );
    wp_enqueue_style( 'gfnovo-style-1', get_template_directory_uri() . '/css/style.css', false, null, 'all');

    wp_deregister_style( 'gfnovo-style-2' );
    wp_enqueue_style( 'gfnovo-style-2', get_bloginfo('stylesheet_url'), false, null, 'all');

    /* Pinegrow generated Enqueue Styles End */

    }
    add_action( 'wp_enqueue_scripts', 'gfnovo_enqueue_scripts' );
endif;

function pgwp_sanitize_placeholder($input) { return $input; }
/*
 * Resource files included by Pinegrow.
 */
/* Pinegrow generated Include Resources Begin */
require_once "inc/custom.php";
require_once "inc/wp_pg_helpers.php";
require_once "inc/wp_smart_navwalker.php";

    /* Pinegrow generated Include Resources End */
?>
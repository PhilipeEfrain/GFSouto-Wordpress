<?php
if ( ! function_exists( 'modelo_gfsouto_setup' ) ) :

function modelo_gfsouto_setup() {

    /*
     * Make theme available for translation.
     * Translations can be filed in the /languages/ directory.
     */
    /* Pinegrow generated Load Text Domain Begin */
    load_theme_textdomain( 'modelo_gfsouto', get_template_directory() . '/languages' );
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
    set_post_thumbnail_size( 825, 510, true );

    // Add menus.
    register_nav_menus( array(
        'primary' => __( 'Primary Menu', 'modelo_gfsouto' ),
        'social'  => __( 'Social Links Menu', 'modelo_gfsouto' ),
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
endif; // modelo_gfsouto_setup

add_action( 'after_setup_theme', 'modelo_gfsouto_setup' );


if ( ! function_exists( 'modelo_gfsouto_init' ) ) :

function modelo_gfsouto_init() {

    
    // Use categories and tags with attachments
    register_taxonomy_for_object_type( 'category', 'attachment' );
    register_taxonomy_for_object_type( 'post_tag', 'attachment' );

    /*
     * Register custom post types. You can also move this code to a plugin.
     */
    /* Pinegrow generated Custom Post Types Begin */

    register_post_type('Contato', array(
        'labels' => 
            array(
                'name' => __( 'Contatos', 'modelo_gfsouto' ),
                'singular_name' => __( 'Contato', 'modelo_gfsouto' )
            ),
        'public' => false,
        'supports' => array( 'title', 'editor', 'author' ),
        'show_in_rest' => false,
        'show_ui' => true,
        'show_in_menu' => true
    ));

    /* Pinegrow generated Custom Post Types End */
    
    /*
     * Register custom taxonomies. You can also move this code to a plugin.
     */
    /* Pinegrow generated Taxonomies Begin */

    /* Pinegrow generated Taxonomies End */

}
endif; // modelo_gfsouto_setup

add_action( 'init', 'modelo_gfsouto_init' );


if ( ! function_exists( 'modelo_gfsouto_custom_image_sizes_names' ) ) :

function modelo_gfsouto_custom_image_sizes_names( $sizes ) {

    /*
     * Add names of custom image sizes.
     */
    /* Pinegrow generated Image Sizes Names Begin*/
    /* This code will be replaced by returning names of custom image sizes. */
    /* Pinegrow generated Image Sizes Names End */
    return $sizes;
}
add_action( 'image_size_names_choose', 'modelo_gfsouto_custom_image_sizes_names' );
endif;// modelo_gfsouto_custom_image_sizes_names



if ( ! function_exists( 'modelo_gfsouto_widgets_init' ) ) :

function modelo_gfsouto_widgets_init() {

    /*
     * Register widget areas.
     */
    /* Pinegrow generated Register Sidebars Begin */

    register_sidebar( array(
        'name' => __( 'Barra Lateral - Categorias', 'modelo_gfsouto' ),
        'id' => 'barra_lateral_categorias',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widgettitle">',
        'after_title' => '</h3>'
    ) );

    register_sidebar( array(
        'name' => __( 'Barra Lateral - Blog', 'modelo_gfsouto' ),
        'id' => 'barra_lateral_blog',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widgettitle">',
        'after_title' => '</h3>'
    ) );

    register_sidebar( array(
        'name' => __( 'Barra Lateral - Tags', 'modelo_gfsouto' ),
        'id' => 'barra_lateral_tags',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widgettitle">',
        'after_title' => '</h3>'
    ) );

    /* Pinegrow generated Register Sidebars End */
}
add_action( 'widgets_init', 'modelo_gfsouto_widgets_init' );
endif;// modelo_gfsouto_widgets_init



if ( ! function_exists( 'modelo_gfsouto_customize_register' ) ) :

function modelo_gfsouto_customize_register( $wp_customize ) {
    // Do stuff with $wp_customize, the WP_Customize_Manager object.

    /* Pinegrow generated Customizer Controls Begin */

    $wp_customize->add_section( 'logo', array(
        'title' => __( 'Logo do Menu', 'modelo_gfsouto' ),
        'priority' => '0'
    ));

    $wp_customize->add_section( 'menu_especial', array(
        'title' => __( 'Menu especial', 'modelo_gfsouto' )
    ));

    $wp_customize->add_section( 'topo', array(
        'title' => __( 'Topo', 'modelo_gfsouto' )
    ));

    $wp_customize->add_section( 'portaria_virtual', array(
        'title' => __( 'Portaria Virtual', 'modelo_gfsouto' )
    ));

    $wp_customize->add_section( 'servicos', array(
        'title' => __( 'Serviços', 'modelo_gfsouto' )
    ));

    $wp_customize->add_section( 'a_gfsouto', array(
        'title' => __( 'A GF Souto', 'modelo_gfsouto' )
    ));

    $wp_customize->add_section( 'contato', array(
        'title' => __( 'Contato', 'modelo_gfsouto' )
    ));

    $wp_customize->add_section( 'blog', array(
        'title' => __( 'Blog', 'modelo_gfsouto' )
    ));

    $wp_customize->add_section( 'rodape', array(
        'title' => __( 'Rodapé', 'modelo_gfsouto' )
    ));

    $wp_customize->add_section( 'rodape', array(
        'title' => __( 'Rodapé', 'modelo_gfsouto' )
    ));
    $pgwp_sanitize = function_exists('pgwp_sanitize_placeholder') ? 'pgwp_sanitize_placeholder' : null;

    $wp_customize->add_setting( 'logo_imagem', array(
        'type' => 'theme_mod',
        'sanitize_callback' => $pgwp_sanitize
    ));

    $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'logo_imagem', array(
        'label' => __( 'Logo', 'modelo_gfsouto' ),
        'type' => 'media',
        'mime_type' => 'image',
        'section' => 'logo'
    ) ) );

    $wp_customize->add_setting( 'menu_especial_portaria', array(
        'type' => 'theme_mod',
        'sanitize_callback' => $pgwp_sanitize
    ));

    $wp_customize->add_control( 'menu_especial_portaria', array(
        'label' => __( 'Portaria Virtual', 'modelo_gfsouto' ),
        'type' => 'text',
        'section' => 'menu_especial'
    ));

    $wp_customize->add_setting( 'menu_especial_portaria_link', array(
        'type' => 'theme_mod',
        'sanitize_callback' => $pgwp_sanitize
    ));

    $wp_customize->add_control( 'menu_especial_portaria_link', array(
        'label' => __( 'Link Portaria', 'modelo_gfsouto' ),
        'type' => 'url',
        'section' => 'menu_especial'
    ));

    $wp_customize->add_setting( 'menu_especial_cliente', array(
        'type' => 'theme_mod',
        'sanitize_callback' => $pgwp_sanitize
    ));

    $wp_customize->add_control( 'menu_especial_cliente', array(
        'label' => __( 'Área do Cliente', 'modelo_gfsouto' ),
        'type' => 'text',
        'section' => 'menu_especial'
    ));

    $wp_customize->add_setting( 'menu_especial_cliente_link', array(
        'type' => 'theme_mod',
        'sanitize_callback' => $pgwp_sanitize
    ));

    $wp_customize->add_control( 'menu_especial_cliente_link', array(
        'label' => __( 'Link Área do Cliente', 'modelo_gfsouto' ),
        'type' => 'url',
        'section' => 'menu_especial'
    ));

    $wp_customize->add_setting( 'topo_bg', array(
        'type' => 'theme_mod',
        'sanitize_callback' => $pgwp_sanitize
    ));

    $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'topo_bg', array(
        'label' => __( 'Imagem de Fundo', 'modelo_gfsouto' ),
        'type' => 'media',
        'mime_type' => 'image',
        'section' => 'topo'
    ) ) );

    $wp_customize->add_setting( 'topo_bemvindo', array(
        'type' => 'theme_mod',
        'default' => __( 'Bem vindo a GF Souto', 'modelo_gfsouto' ),
        'sanitize_callback' => $pgwp_sanitize
    ));

    $wp_customize->add_control( 'topo_bemvindo', array(
        'label' => __( 'topo_bem_vindo', 'modelo_gfsouto' ),
        'type' => 'text',
        'section' => 'topo'
    ));

    $wp_customize->add_setting( 'topo_chamada', array(
        'type' => 'theme_mod',
        'default' => 'Administrando Condomínios <br>com <span class="txt-rotate" data-period="2000" data-rotate="[ &quot;responsabilidade.&quot;, &quot;honestidade.&quot;, &quot;seriedade.&quot;]"></span>',
        'sanitize_callback' => $pgwp_sanitize
    ));

    $wp_customize->add_control( 'topo_chamada', array(
        'label' => __( 'Chamada', 'modelo_gfsouto' ),
        'type' => 'textarea',
        'section' => 'topo'
    ));

    $wp_customize->add_setting( 'topo_sub', array(
        'type' => 'theme_mod',
        'default' => __( '"A solidez e a liderança absoluta no mercado de Mossoró são frutos do trabalho de uma equipe comprometida em atender seus clientes com transparência, ética e honestidade"', 'modelo_gfsouto' ),
        'sanitize_callback' => $pgwp_sanitize
    ));

    $wp_customize->add_control( 'topo_sub', array(
        'label' => __( 'Sub Texto', 'modelo_gfsouto' ),
        'type' => 'textarea',
        'section' => 'topo'
    ));

    $wp_customize->add_setting( 'topo_botao', array(
        'type' => 'theme_mod',
        'default' => 'Conheça Nossa História <span class="ion-ios-arrow-forward"></span>',
        'sanitize_callback' => $pgwp_sanitize
    ));

    $wp_customize->add_control( 'topo_botao', array(
        'label' => __( 'Botão', 'modelo_gfsouto' ),
        'type' => 'text',
        'section' => 'topo'
    ));

    $wp_customize->add_setting( 'topo_botao_link', array(
        'type' => 'theme_mod',
        'sanitize_callback' => $pgwp_sanitize
    ));

    $wp_customize->add_control( 'topo_botao_link', array(
        'label' => __( 'Link do Botão', 'modelo_gfsouto' ),
        'type' => 'url',
        'section' => 'topo'
    ));

    $wp_customize->add_setting( 'portaria_virtual_titulo', array(
        'type' => 'theme_mod',
        'default' => __( 'Pioneiros no mercado!', 'modelo_gfsouto' ),
        'sanitize_callback' => $pgwp_sanitize
    ));

    $wp_customize->add_control( 'portaria_virtual_titulo', array(
        'label' => __( 'Título', 'modelo_gfsouto' ),
        'type' => 'text',
        'section' => 'portaria_virtual'
    ));

    $wp_customize->add_setting( 'portaria_virtual_chamada', array(
        'type' => 'theme_mod',
        'default' => __( 'Portaria Virtual', 'modelo_gfsouto' ),
        'sanitize_callback' => $pgwp_sanitize
    ));

    $wp_customize->add_control( 'portaria_virtual_chamada', array(
        'label' => __( 'Chamada', 'modelo_gfsouto' ),
        'type' => 'text',
        'section' => 'portaria_virtual'
    ));

    $wp_customize->add_setting( 'portaria_virtual_texto', array(
        'type' => 'theme_mod',
        'default' => __( 'A GF Souto em constante busca de inovação aos seus clientes, foi uma das pioneiras, em serviço de Portaria Virtual. Oferecemos tecnologia de ponta e soluções customizadas para condomínios e empresas, trazendo economia e tranquilidade aos clientes.', 'modelo_gfsouto' ),
        'sanitize_callback' => $pgwp_sanitize
    ));

    $wp_customize->add_control( 'portaria_virtual_texto', array(
        'label' => __( 'Texto', 'modelo_gfsouto' ),
        'type' => 'textarea',
        'section' => 'portaria_virtual'
    ));

    $wp_customize->add_setting( 'portaria_virtual_botao', array(
        'type' => 'theme_mod',
        'default' => __( 'Saiba Mais', 'modelo_gfsouto' ),
        'sanitize_callback' => $pgwp_sanitize
    ));

    $wp_customize->add_control( 'portaria_virtual_botao', array(
        'label' => __( 'Botão', 'modelo_gfsouto' ),
        'type' => 'text',
        'section' => 'portaria_virtual'
    ));

    $wp_customize->add_setting( 'portaria_virtual_botao_link', array(
        'type' => 'theme_mod',
        'sanitize_callback' => $pgwp_sanitize
    ));

    $wp_customize->add_control( 'portaria_virtual_botao_link', array(
        'label' => __( 'Link do Botão', 'modelo_gfsouto' ),
        'type' => 'url',
        'section' => 'portaria_virtual'
    ));

    $wp_customize->add_setting( 'servicos_svg_01', array(
        'type' => 'theme_mod',
        'sanitize_callback' => $pgwp_sanitize
    ));

    $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'servicos_svg_01', array(
        'label' => __( 'Ícone em SVG 01', 'modelo_gfsouto' ),
        'type' => 'media',
        'mime_type' => 'image',
        'section' => 'servicos'
    ) ) );

    $wp_customize->add_setting( 'servicos_titulo_01', array(
        'type' => 'theme_mod',
        'default' => __( 'Condomínio Online', 'modelo_gfsouto' ),
        'sanitize_callback' => $pgwp_sanitize
    ));

    $wp_customize->add_control( 'servicos_titulo_01', array(
        'label' => __( 'Título 01', 'modelo_gfsouto' ),
        'type' => 'text',
        'section' => 'servicos'
    ));

    $wp_customize->add_setting( 'servicos_texto_01', array(
        'type' => 'theme_mod',
        'default' => __( 'Sistema completo para administração de condomínios, desenvolvido com tecnologia moderna e uma interface amigável.', 'modelo_gfsouto' ),
        'sanitize_callback' => $pgwp_sanitize
    ));

    $wp_customize->add_control( 'servicos_texto_01', array(
        'label' => __( 'Texto 01', 'modelo_gfsouto' ),
        'type' => 'textarea',
        'section' => 'servicos'
    ));

    $wp_customize->add_setting( 'servicos_link_01', array(
        'type' => 'theme_mod',
        'sanitize_callback' => $pgwp_sanitize
    ));

    $wp_customize->add_control( 'servicos_link_01', array(
        'label' => __( 'Link 01', 'modelo_gfsouto' ),
        'type' => 'url',
        'section' => 'servicos'
    ));

    $wp_customize->add_setting( 'servicos_svg_02', array(
        'type' => 'theme_mod',
        'sanitize_callback' => $pgwp_sanitize
    ));

    $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'servicos_svg_02', array(
        'label' => __( 'Ícone em SVG 02', 'modelo_gfsouto' ),
        'type' => 'media',
        'mime_type' => 'image',
        'section' => 'servicos'
    ) ) );

    $wp_customize->add_setting( 'servicos_titulo_02', array(
        'type' => 'theme_mod',
        'default' => __( 'Condomínio Online', 'modelo_gfsouto' ),
        'sanitize_callback' => $pgwp_sanitize
    ));

    $wp_customize->add_control( 'servicos_titulo_02', array(
        'label' => __( 'Título 02', 'modelo_gfsouto' ),
        'type' => 'text',
        'section' => 'servicos'
    ));

    $wp_customize->add_setting( 'servicos_texto_02', array(
        'type' => 'theme_mod',
        'default' => __( 'Sistema completo para administração de condomínios, desenvolvido com tecnologia moderna e uma interface amigável.', 'modelo_gfsouto' ),
        'sanitize_callback' => $pgwp_sanitize
    ));

    $wp_customize->add_control( 'servicos_texto_02', array(
        'label' => __( 'Texto 02', 'modelo_gfsouto' ),
        'type' => 'textarea',
        'section' => 'servicos'
    ));

    $wp_customize->add_setting( 'servicos_link_02', array(
        'type' => 'theme_mod',
        'sanitize_callback' => $pgwp_sanitize
    ));

    $wp_customize->add_control( 'servicos_link_02', array(
        'label' => __( 'Link 02', 'modelo_gfsouto' ),
        'type' => 'url',
        'section' => 'servicos'
    ));

    $wp_customize->add_setting( 'servicos_svg_03', array(
        'type' => 'theme_mod',
        'sanitize_callback' => $pgwp_sanitize
    ));

    $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'servicos_svg_03', array(
        'label' => __( 'Ícone em SVG 03', 'modelo_gfsouto' ),
        'type' => 'media',
        'mime_type' => 'image',
        'section' => 'servicos'
    ) ) );

    $wp_customize->add_setting( 'servicos_titulo_03', array(
        'type' => 'theme_mod',
        'default' => __( 'Condomínio Online', 'modelo_gfsouto' ),
        'sanitize_callback' => $pgwp_sanitize
    ));

    $wp_customize->add_control( 'servicos_titulo_03', array(
        'label' => __( 'Título 03', 'modelo_gfsouto' ),
        'type' => 'text',
        'section' => 'servicos'
    ));

    $wp_customize->add_setting( 'servicos_texto_03', array(
        'type' => 'theme_mod',
        'default' => __( 'Sistema completo para administração de condomínios, desenvolvido com tecnologia moderna e uma interface amigável.', 'modelo_gfsouto' ),
        'sanitize_callback' => $pgwp_sanitize
    ));

    $wp_customize->add_control( 'servicos_texto_03', array(
        'label' => __( 'Texto 03', 'modelo_gfsouto' ),
        'type' => 'textarea',
        'section' => 'servicos'
    ));

    $wp_customize->add_setting( 'servicos_link_03', array(
        'type' => 'theme_mod',
        'sanitize_callback' => $pgwp_sanitize
    ));

    $wp_customize->add_control( 'servicos_link_03', array(
        'label' => __( 'Link 03', 'modelo_gfsouto' ),
        'type' => 'url',
        'section' => 'servicos'
    ));

    $wp_customize->add_setting( 'servicos_botao', array(
        'type' => 'theme_mod',
        'default' => __( 'Todos os Serviços', 'modelo_gfsouto' ),
        'sanitize_callback' => $pgwp_sanitize
    ));

    $wp_customize->add_control( 'servicos_botao', array(
        'label' => __( 'Todos os Serviços', 'modelo_gfsouto' ),
        'type' => 'text',
        'section' => 'servicos'
    ));

    $wp_customize->add_setting( 'servicos_botao_link', array(
        'type' => 'theme_mod',
        'sanitize_callback' => $pgwp_sanitize
    ));

    $wp_customize->add_control( 'servicos_botao_link', array(
        'label' => __( 'Link do Botão', 'modelo_gfsouto' ),
        'type' => 'url',
        'section' => 'servicos'
    ));

    $wp_customize->add_setting( 'a_gfsouto', array(
        'type' => 'theme_mod',
        'sanitize_callback' => $pgwp_sanitize
    ));

    $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'a_gfsouto', array(
        'label' => __( 'Imagem GF Souto', 'modelo_gfsouto' ),
        'type' => 'media',
        'mime_type' => 'image',
        'section' => 'a_gfsouto'
    ) ) );

    $wp_customize->add_setting( 'a_gfsouto_video', array(
        'type' => 'theme_mod',
        'sanitize_callback' => $pgwp_sanitize
    ));

    $wp_customize->add_control( 'a_gfsouto_video', array(
        'label' => __( 'Vídeo', 'modelo_gfsouto' ),
        'type' => 'url',
        'section' => 'a_gfsouto'
    ));

    $wp_customize->add_setting( 'a_gfsouto_chamada', array(
        'type' => 'theme_mod',
        'default' => __( 'A GF Souto', 'modelo_gfsouto' ),
        'sanitize_callback' => $pgwp_sanitize
    ));

    $wp_customize->add_control( 'a_gfsouto_chamada', array(
        'label' => __( 'Chamada', 'modelo_gfsouto' ),
        'type' => 'text',
        'section' => 'a_gfsouto'
    ));

    $wp_customize->add_setting( 'a_gfsouto_titulo', array(
        'type' => 'theme_mod',
        'default' => __( 'Uma história de muito trabalho e dedicação', 'modelo_gfsouto' ),
        'sanitize_callback' => $pgwp_sanitize
    ));

    $wp_customize->add_control( 'a_gfsouto_titulo', array(
        'label' => __( 'Título', 'modelo_gfsouto' ),
        'type' => 'text',
        'section' => 'a_gfsouto'
    ));

    $wp_customize->add_setting( 'a_gfsouto_texto', array(
        'type' => 'theme_mod',
        'default' => __( 'Apresentando um projeto de excelência, com uma grande noção de rigor e responsabilidade e uma forma de atuar transparente.', 'modelo_gfsouto' ),
        'sanitize_callback' => $pgwp_sanitize
    ));

    $wp_customize->add_control( 'a_gfsouto_texto', array(
        'label' => __( 'Texto', 'modelo_gfsouto' ),
        'type' => 'textarea',
        'section' => 'a_gfsouto'
    ));

    $wp_customize->add_setting( 'a_gfsouto_objetivo', array(
        'type' => 'theme_mod',
        'default' => __( 'Objetivo', 'modelo_gfsouto' ),
        'sanitize_callback' => $pgwp_sanitize
    ));

    $wp_customize->add_control( 'a_gfsouto_objetivo', array(
        'label' => __( 'Objetivo', 'modelo_gfsouto' ),
        'type' => 'text',
        'section' => 'a_gfsouto'
    ));

    $wp_customize->add_setting( 'a_gfsouto_visao', array(
        'type' => 'theme_mod',
        'default' => __( 'Visão', 'modelo_gfsouto' ),
        'sanitize_callback' => $pgwp_sanitize
    ));

    $wp_customize->add_control( 'a_gfsouto_visao', array(
        'label' => __( 'Visão', 'modelo_gfsouto' ),
        'type' => 'text',
        'section' => 'a_gfsouto'
    ));

    $wp_customize->add_setting( 'a_gfsouto_valor', array(
        'type' => 'theme_mod',
        'default' => __( 'Valor', 'modelo_gfsouto' ),
        'sanitize_callback' => $pgwp_sanitize
    ));

    $wp_customize->add_control( 'a_gfsouto_valor', array(
        'label' => __( 'Valor', 'modelo_gfsouto' ),
        'type' => 'text',
        'section' => 'a_gfsouto'
    ));

    $wp_customize->add_setting( 'a_gfsouto_objetivo_texto', array(
        'type' => 'theme_mod',
        'default' => 'A <strong>GF SOUTO</strong> tem por objetivo oferecer um atendimento personalizado com: Ética; Transparência; Eficiência e tranqüilidade a altura da expectativa do cliente, satisfazendo plenamente suas necessidades. Estamos sempre buscando a excelência no atendimento e o máximo de assistência na execução dos serviços, onde: identificamos as reais necessidades do condomínio, elaboramos propostas e soluções personalizadas adequando as reais expectativas e realidade financeira de cada cliente, além da otimização de resultados, nunca abrindo mão da qualidade.<br>',
        'sanitize_callback' => $pgwp_sanitize
    ));

    $wp_customize->add_control( 'a_gfsouto_objetivo_texto', array(
        'label' => __( 'Texto Objetivo', 'modelo_gfsouto' ),
        'type' => 'textarea',
        'section' => 'a_gfsouto'
    ));

    $wp_customize->add_setting( 'a_gfsouto_visao_texto', array(
        'type' => 'theme_mod',
        'default' => __( 'Temos certeza que para: administrar com eficiência o condomínio de forma a reduzir custos, garantir a qualidade dos serviços prestados e qualidade de vida para os moradores, teremos que ter em mente que o conhecimento é uma estrada que se percorre com conquistas diárias, e a chave para o sucesso é trabalhar muito, ser humilde e ter ética', 'modelo_gfsouto' ),
        'sanitize_callback' => $pgwp_sanitize
    ));

    $wp_customize->add_control( 'a_gfsouto_visao_texto', array(
        'label' => __( 'Texto Visão', 'modelo_gfsouto' ),
        'type' => 'textarea',
        'section' => 'a_gfsouto'
    ));

    $wp_customize->add_setting( 'a_gfsouto_valor_texto', array(
        'type' => 'theme_mod',
        'default' => 'Honestidade<br>Ética<br>Transparência<br>Persistência<br>Responsabilidade Social<br>Consciência Ecológica',
        'sanitize_callback' => $pgwp_sanitize
    ));

    $wp_customize->add_control( 'a_gfsouto_valor_texto', array(
        'label' => __( 'Texto Valor', 'modelo_gfsouto' ),
        'type' => 'textarea',
        'section' => 'a_gfsouto'
    ));

    $wp_customize->add_setting( 'contato_imagem', array(
        'type' => 'theme_mod',
        'sanitize_callback' => $pgwp_sanitize
    ));

    $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'contato_imagem', array(
        'label' => __( 'Imagem', 'modelo_gfsouto' ),
        'type' => 'media',
        'mime_type' => 'image',
        'section' => 'contato'
    ) ) );

    $wp_customize->add_setting( 'contato_duvida', array(
        'type' => 'theme_mod',
        'default' => __( 'Alguma duvida?', 'modelo_gfsouto' ),
        'sanitize_callback' => $pgwp_sanitize
    ));

    $wp_customize->add_control( 'contato_duvida', array(
        'label' => __( 'Alguma Duvida?', 'modelo_gfsouto' ),
        'type' => 'text',
        'section' => 'contato'
    ));

    $wp_customize->add_setting( 'contato_entre_em_contato', array(
        'type' => 'theme_mod',
        'default' => __( 'Entre em contato', 'modelo_gfsouto' ),
        'sanitize_callback' => $pgwp_sanitize
    ));

    $wp_customize->add_control( 'contato_entre_em_contato', array(
        'label' => __( 'Entre em Contato', 'modelo_gfsouto' ),
        'type' => 'text',
        'section' => 'contato'
    ));

    $wp_customize->add_setting( 'blog_chamada', array(
        'type' => 'theme_mod',
        'default' => __( 'Nosso Blog', 'modelo_gfsouto' ),
        'sanitize_callback' => $pgwp_sanitize
    ));

    $wp_customize->add_control( 'blog_chamada', array(
        'label' => __( 'Chamada', 'modelo_gfsouto' ),
        'type' => 'text',
        'section' => 'blog'
    ));

    $wp_customize->add_setting( 'blog_titulo', array(
        'type' => 'theme_mod',
        'default' => __( 'Matérias e Notícias Recentes', 'modelo_gfsouto' ),
        'sanitize_callback' => $pgwp_sanitize
    ));

    $wp_customize->add_control( 'blog_titulo', array(
        'label' => __( 'Título', 'modelo_gfsouto' ),
        'type' => 'text',
        'section' => 'blog'
    ));

    $wp_customize->add_setting( 'rodape_logo', array(
        'type' => 'theme_mod',
        'sanitize_callback' => $pgwp_sanitize
    ));

    $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'rodape_logo', array(
        'label' => __( 'Logo', 'modelo_gfsouto' ),
        'type' => 'media',
        'mime_type' => 'image',
        'section' => 'rodape'
    ) ) );

    $wp_customize->add_setting( 'rodape_sub-texto', array(
        'type' => 'theme_mod',
        'default' => 'Quando você precisa,<br>nós estamos aqui.',
        'sanitize_callback' => $pgwp_sanitize
    ));

    $wp_customize->add_control( 'rodape_sub-texto', array(
        'label' => __( 'Sub Texto', 'modelo_gfsouto' ),
        'type' => 'textarea',
        'section' => 'rodape'
    ));

    $wp_customize->add_setting( 'rodape_youtube', array(
        'type' => 'theme_mod',
        'sanitize_callback' => $pgwp_sanitize
    ));

    $wp_customize->add_control( 'rodape_youtube', array(
        'label' => __( 'Link Youtube', 'modelo_gfsouto' ),
        'type' => 'url',
        'section' => 'rodape'
    ));

    $wp_customize->add_setting( 'rodape_facebook', array(
        'type' => 'theme_mod',
        'sanitize_callback' => $pgwp_sanitize
    ));

    $wp_customize->add_control( 'rodape_facebook', array(
        'label' => __( 'link Facebook', 'modelo_gfsouto' ),
        'type' => 'url',
        'section' => 'rodape'
    ));

    $wp_customize->add_setting( 'rodape_instagram', array(
        'type' => 'theme_mod',
        'sanitize_callback' => $pgwp_sanitize
    ));

    $wp_customize->add_control( 'rodape_instagram', array(
        'label' => __( 'Link Instagram', 'modelo_gfsouto' ),
        'type' => 'url',
        'section' => 'rodape'
    ));

    $wp_customize->add_setting( 'rodape_menu', array(
        'type' => 'theme_mod',
        'default' => __( 'Menu', 'modelo_gfsouto' ),
        'sanitize_callback' => $pgwp_sanitize
    ));

    $wp_customize->add_control( 'rodape_menu', array(
        'label' => __( 'Menu', 'modelo_gfsouto' ),
        'type' => 'text',
        'section' => 'rodape'
    ));

    $wp_customize->add_setting( 'rodape_duvida', array(
        'type' => 'theme_mod',
        'default' => __( 'Alguma duvida?', 'modelo_gfsouto' ),
        'sanitize_callback' => $pgwp_sanitize
    ));

    $wp_customize->add_control( 'rodape_duvida', array(
        'label' => __( 'Alguma Duvida?', 'modelo_gfsouto' ),
        'type' => 'text',
        'section' => 'rodape'
    ));

    $wp_customize->add_setting( 'rodape_endereco', array(
        'type' => 'theme_mod',
        'default' => 'Rua Amaro Duarte, 241, Nova BetâniaCEP 59.603.030<br>Mossoró / RN',
        'sanitize_callback' => $pgwp_sanitize
    ));

    $wp_customize->add_control( 'rodape_endereco', array(
        'label' => __( 'Endereço', 'modelo_gfsouto' ),
        'type' => 'textarea',
        'section' => 'rodape'
    ));

    $wp_customize->add_setting( 'rodape_telefone', array(
        'type' => 'theme_mod',
        'default' => '(84) 3323 - 1250',
        'sanitize_callback' => $pgwp_sanitize
    ));

    $wp_customize->add_control( 'rodape_telefone', array(
        'label' => __( 'Contato', 'modelo_gfsouto' ),
        'type' => 'text',
        'section' => 'rodape'
    ));

    $wp_customize->add_setting( 'rodape_email', array(
        'type' => 'theme_mod',
        'default' => __( 'contato@gfsouto.com.br', 'modelo_gfsouto' ),
        'sanitize_callback' => $pgwp_sanitize
    ));

    $wp_customize->add_control( 'rodape_email', array(
        'label' => __( 'E-mail', 'modelo_gfsouto' ),
        'type' => 'text',
        'section' => 'rodape'
    ));

    $wp_customize->add_setting( 'rodape', array(
        'type' => 'theme_mod',
        'default' => __( 'Escritório: Segunda a sexta-feira', 'modelo_gfsouto' ),
        'sanitize_callback' => $pgwp_sanitize
    ));

    $wp_customize->add_control( 'rodape', array(
        'label' => __( 'Horário de Atendimento', 'modelo_gfsouto' ),
        'type' => 'textarea',
        'section' => 'rodape'
    ));

    $wp_customize->add_setting( 'rodape_hora', array(
        'type' => 'theme_mod',
        'default' => __( '9h as 18h', 'modelo_gfsouto' ),
        'sanitize_callback' => $pgwp_sanitize
    ));

    $wp_customize->add_control( 'rodape_hora', array(
        'label' => __( 'Horário', 'modelo_gfsouto' ),
        'type' => 'text',
        'section' => 'rodape'
    ));

    $wp_customize->add_setting( 'rodape_emergencia', array(
        'type' => 'theme_mod',
        'default' => __( 'Emergências:&nbsp;', 'modelo_gfsouto' ),
        'sanitize_callback' => $pgwp_sanitize
    ));

    $wp_customize->add_control( 'rodape_emergencia', array(
        'label' => __( 'Emergência', 'modelo_gfsouto' ),
        'type' => 'text',
        'section' => 'rodape'
    ));

    $wp_customize->add_setting( 'rodape_horario_emergencia', array(
        'type' => 'theme_mod',
        'default' => __( 'Atendimento 24h', 'modelo_gfsouto' ),
        'sanitize_callback' => $pgwp_sanitize
    ));

    $wp_customize->add_control( 'rodape_horario_emergencia', array(
        'label' => __( 'Horário de Emergencia', 'modelo_gfsouto' ),
        'type' => 'textarea',
        'section' => 'rodape'
    ));

    $wp_customize->add_setting( 'rodape_copy', array(
        'type' => 'theme_mod',
        'default' => '<!-- Link back to Colorlib can\'t be removed. Template is licensed under CC BY 3.0. --> Copyright ©<script>document.write(new Date().getFullYear());</script> Todos os direitos reservados a GF Souto Administradora de Condomínios<!-- Link back to Colorlib can\'t be removed. Template is licensed under CC BY 3.0. -->',
        'sanitize_callback' => $pgwp_sanitize
    ));

    $wp_customize->add_control( 'rodape_copy', array(
        'label' => __( 'Copyright', 'modelo_gfsouto' ),
        'type' => 'textarea',
        'section' => 'rodape'
    ));

    /* Pinegrow generated Customizer Controls End */

}
add_action( 'customize_register', 'modelo_gfsouto_customize_register' );
endif;// modelo_gfsouto_customize_register


if ( ! function_exists( 'modelo_gfsouto_enqueue_scripts' ) ) :
    function modelo_gfsouto_enqueue_scripts() {

        /* Pinegrow generated Enqueue Scripts Begin */

    wp_register_script( 'inline-script-1', '', [], '', true );
    wp_enqueue_script( 'inline-script-1' );
    wp_add_inline_script( 'inline-script-1', 'document.write(new Date().getFullYear());');

    wp_deregister_script( 'jquery' );
    wp_enqueue_script( 'jquery', get_template_directory_uri() . '/js/jquery.min.js', false, null, true);

    wp_deregister_script( 'jquerymigrate' );
    wp_enqueue_script( 'jquerymigrate', get_template_directory_uri() . '/js/jquery-migrate-3.0.1.min.js', false, null, true);

    wp_deregister_script( 'popper' );
    wp_enqueue_script( 'popper', get_template_directory_uri() . '/js/popper.min.js', false, null, true);

    wp_deregister_script( 'bootstrap' );
    wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', false, null, true);

    wp_deregister_script( 'jqueryeasing' );
    wp_enqueue_script( 'jqueryeasing', get_template_directory_uri() . '/js/jquery.easing.1.3.js', false, null, true);

    wp_deregister_script( 'jquerywaypoints' );
    wp_enqueue_script( 'jquerywaypoints', get_template_directory_uri() . '/js/jquery.waypoints.min.js', false, null, true);

    wp_deregister_script( 'jquerystellar' );
    wp_enqueue_script( 'jquerystellar', get_template_directory_uri() . '/js/jquery.stellar.min.js', false, null, true);

    wp_deregister_script( 'owlcarousel' );
    wp_enqueue_script( 'owlcarousel', get_template_directory_uri() . '/js/owl.carousel.min.js', false, null, true);

    wp_deregister_script( 'jquerymagnificpopup' );
    wp_enqueue_script( 'jquerymagnificpopup', get_template_directory_uri() . '/js/jquery.magnific-popup.min.js', false, null, true);

    wp_deregister_script( 'aos' );
    wp_enqueue_script( 'aos', get_template_directory_uri() . '/js/aos.js', false, null, true);

    wp_deregister_script( 'jqueryanimatenumber' );
    wp_enqueue_script( 'jqueryanimatenumber', get_template_directory_uri() . '/js/jquery.animateNumber.min.js', false, null, true);

    wp_deregister_script( 'scrollax' );
    wp_enqueue_script( 'scrollax', get_template_directory_uri() . '/js/scrollax.min.js', false, null, true);

    wp_deregister_script( 'script-2' );
    wp_enqueue_script( 'script-2', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false', false, null, true);

    wp_deregister_script( 'googlemap' );
    wp_enqueue_script( 'googlemap', get_template_directory_uri() . '/js/google-map.js', false, null, true);

    wp_deregister_script( 'main' );
    wp_enqueue_script( 'main', get_template_directory_uri() . '/js/main.js', false, null, true);

    /* Pinegrow generated Enqueue Scripts End */

        /* Pinegrow generated Enqueue Styles Begin */

    wp_deregister_style( 'horizontalslim_' );
    wp_enqueue_style( 'horizontalslim_', '//cdn-images.mailchimp.com/embedcode/horizontal-slim-10_7.css', false, null, 'all');

    wp_deregister_style( 'style-1' );
    wp_enqueue_style( 'style-1', 'https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900', false, null, 'all');

    wp_deregister_style( 'openiconicbootstrap' );
    wp_enqueue_style( 'openiconicbootstrap', get_template_directory_uri() . '/css/open-iconic-bootstrap.min.css', false, null, 'all');

    wp_deregister_style( 'animate' );
    wp_enqueue_style( 'animate', get_template_directory_uri() . '/css/animate.css', false, null, 'all');

    wp_deregister_style( 'owlcarousel' );
    wp_enqueue_style( 'owlcarousel', get_template_directory_uri() . '/css/owl.carousel.min.css', false, null, 'all');

    wp_deregister_style( 'owlthemedefault' );
    wp_enqueue_style( 'owlthemedefault', get_template_directory_uri() . '/css/owl.theme.default.min.css', false, null, 'all');

    wp_deregister_style( 'magnificpopup' );
    wp_enqueue_style( 'magnificpopup', get_template_directory_uri() . '/css/magnific-popup.css', false, null, 'all');

    wp_deregister_style( 'aos' );
    wp_enqueue_style( 'aos', get_template_directory_uri() . '/css/aos.css', false, null, 'all');

    wp_deregister_style( 'ionicons' );
    wp_enqueue_style( 'ionicons', get_template_directory_uri() . '/css/ionicons.min.css', false, null, 'all');

    wp_deregister_style( 'flaticon' );
    wp_enqueue_style( 'flaticon', get_template_directory_uri() . '/css/flaticon.css', false, null, 'all');

    wp_deregister_style( 'icomoon' );
    wp_enqueue_style( 'icomoon', get_template_directory_uri() . '/css/icomoon.css', false, null, 'all');

    wp_deregister_style( 'style' );
    wp_enqueue_style( 'style', get_template_directory_uri() . '/css/style.css', false, null, 'all');

    wp_deregister_style( 'fontawesome' );
    wp_enqueue_style( 'fontawesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css', false, null, 'all');

    wp_deregister_style( 'style-1' );
    wp_enqueue_style( 'style-1', get_bloginfo('stylesheet_url'), false, null, 'all');

    /* Pinegrow generated Enqueue Styles End */

    }
    add_action( 'wp_enqueue_scripts', 'modelo_gfsouto_enqueue_scripts' );
endif;

function pgwp_sanitize_placeholder($input) { return $input; }
/*
 * Resource files included by Pinegrow.
 */
/* Pinegrow generated Include Resources Begin */
require_once "inc/wp_pg_helpers.php";
require_once "inc/wp_smart_navwalker.php";
require_once "inc/wp_simple_form_mailer.php";

    /* Pinegrow generated Include Resources End */
?>
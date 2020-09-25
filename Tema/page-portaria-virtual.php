<?php get_header(); ?>

<!-- END nav -->
<div class="hero-wrap js-fullheight" style="background-image: url('<?php echo esc_url( get_template_directory_uri() ); ?>/images/bg_1.jpg');background-image:<?php echo 'url('.PG_Image::getUrl( get_theme_mod( 'virtual_home_img_fundo' ), 'large' ).')' ?>;" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-start" data-scrollax-parent="true">
            <div class="col-md-8 ftco-animate">
                <h2 class="subheading"><?php echo get_theme_mod( 'virtual_home_bem_vindo', __( 'Bem vindo a GFSouto', 'gfnovo' ) ); ?></h2>
                <h1><?php echo get_theme_mod( 'virtual_home_principal', 'Administrando condomónios<br> com <span class="txt-rotate" data-period="2000" data-rotate=\'[ "responsabilidade.", "seriedade.", "harmonia.", "honestidade." ]\' style="color: #001d6c;"></span>' ); ?></h1>
                <!-- <h1 class="mb-4">Attorneys Fighting For Your Freedom</h1> -->
                <p class="mb-4"><?php echo get_theme_mod( 'virtual_home_sug_chamada', __( '"A solidez e a liderança absoluta no mercado de Mossoró são frutos do trabalho de uma equipe comprometida em atender seus clientes com transparência, ética e honestidade"', 'gfnovo' ) ); ?></p>
                <p><a href="<?php echo get_theme_mod( 'virtual_home_botao_link', '#' ); ?>" class="btn btn-primary mr-md-4 py-2 px-4"><?php echo get_theme_mod( 'virtual_home_botao', 'Nossa História <span class="ion-ios-arrow-forward"></span>' ); ?></a></p>
            </div>
        </div>
    </div>
</div>
<section class="ftco-section ftco-no-pt" style="background-color: #001d6c;">
    <div class="container">
        <div class="row">
            <div class="col-xl-5 py-5" style="background-color: #001d6c; padding-left: 40px; padding-right: 40px;">
                <div class="heading-section ftco-animate">
                    <span class="subheading" style="color: #ffffff;"><?php echo get_theme_mod( 'portaria_virtual_sub', __( 'Pioneiros no mercado!', 'gfnovo' ) ); ?></span>
                    <h2 class="mb-4" style="color: #ffffff;"><?php echo get_theme_mod( 'portaria_virtual_titulo', __( 'Portaria Virtual', 'gfnovo' ) ); ?></h2>
                    <p style="color: #ffffff; text-align: justify;"><?php echo get_theme_mod( 'portaria_virtual_txt', 'É um serviço de portaria 24 horas, através de uma central de monitoramento, controlamos por sensores, áudio e imagens ao vivo, a entrada e saída de pessoas e automóveis nas áreas comuns de um edifício, abrindo e fechando os portões quando necessário (como se naquele local houvesse realmente um porteiro de plantão), interagindo com os presentes no local.<br><br>Oferecemos um serviço de portaria integrado ao que a tecnologia tem de melhor a oferecer na área de segurança. Atendentes trabalham em uma base de portaria remota, onde supervisionam os acessos. O atendimento é feito remotamente contando com equipamentos de alta tecnologia instalados no condomínio.Na portaria virtual, os funcionários são continuamente acompanhados e monitorados para oferecer um atendimento eficiente e de qualidade para os moradores, garantindo a segurança de todos.<br><br>Com 10 anos de mercado, a GF Souto a 6 anos fornece o sistema de Portaria Virtual sempre aprimorando durante todo este período para garantir melhorias aos nossos clientes com reduções de custos e atendimento ágil e confiável.' ); ?></p>
                </div>
            </div>
            <div class="col-xl-7 py-5" style="background-color: #001d6c; padding-left: 40px; padding-right: 40px; align-self: center;">
                <iframe width="560" height="315" src="<?php echo get_theme_mod( 'blocks_promo1_video', 'http://www.youtube.com/embed/vcQDcbChHQA?rel=0&amp;controls=0&amp;showinfo=0' ); ?>" frameborder="0" allowfullscreen></iframe>
            </div>
        </div>
        <div class="pt-5 px-4">
            <div class="row pt-md-3">
                <div class="col-md-4 d-flex align-items-stretch">
                    <div class="services text-center">
                        <div class="icon d-flex justify-content-center align-items-center">
                            <img src="<?php echo PG_Image::getUrl( get_theme_mod( 'servicos_virtual_svg_01', esc_url( get_template_directory_uri() . '/images/icon/001-predio-comercial.svg' ) ), 'large' ) ?>" width="40">
                            <span></span>
                        </div>
                        <div class="text">
                            <h3><?php echo get_theme_mod( 'servicos_virtual_titulo_01', __( 'Condomínio Online', 'gfnovo' ) ); ?></h3>
                            <p class="text-justify" style="text-align: justify !important; font-size: 15px;"><?php echo get_theme_mod( 'servicos_virtual_texto_01', __( 'Sistema completo para administração de condomínios, desenvolvido com tecnologia moderna e uma interface amigável.', 'gfnovo' ) ); ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 d-flex align-items-stretch">
                    <div class="services text-center">
                        <div class="icon d-flex justify-content-center align-items-center">
                            <img src="<?php echo PG_Image::getUrl( get_theme_mod( 'servicos_virtual_svg_02', esc_url( get_template_directory_uri() . '/images/icon/002-lista-de-controle.svg' ) ), 'large' ) ?>" width="40">
                            <span></span>
                        </div>
                        <div class="text">
                            <h3><?php echo get_theme_mod( 'servicos_virtual_titulo_02', __( 'Condomínio Online', 'gfnovo' ) ); ?></h3>
                            <p class="text-justify" style="text-align: justify !important; font-size: 15px;"><?php echo get_theme_mod( 'servicos_virtual_texto_02', __( 'Sistema completo para administração de condomínios, desenvolvido com tecnologia moderna e uma interface amigável.', 'gfnovo' ) ); ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 d-flex align-items-stretch">
                    <div class="services text-center">
                        <div class="icon d-flex justify-content-center align-items-center">
                            <img src="<?php echo PG_Image::getUrl( get_theme_mod( 'servicos_virtual_svg_03', esc_url( get_template_directory_uri() . '/images/icon/005-alvo.svg' ) ), 'large' ) ?>" width="40">
                            <span></span>
                        </div>
                        <div class="text">
                            <h3><?php echo get_theme_mod( 'servicos_virtual_titulo_03', __( 'Condomínio Online', 'gfnovo' ) ); ?></h3>
                            <p class="text-justify" style="text-align: justify !important; font-size: 15px;"><?php echo get_theme_mod( 'servicos_virtual_texto_03', __( 'Sistema completo para administração de condomínios, desenvolvido com tecnologia moderna e uma interface amigável.', 'gfnovo' ) ); ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <p class="text-center pt-5"><a href="<?php echo get_theme_mod( 'servicos_virtual_botao_link', '#' ); ?>" class="botaovirtual btn px-4 py-3" style="background-color: #ffffff !important; color: #001d6c !important; font-weight: 800;"><?php echo get_theme_mod( 'servicos_virtual_botao', __( 'Todos os Serviços', 'gfnovo' ) ); ?></a></p>
        </div>
    </div>
</section>
<section class="bg-light ftco-section" style="background-color: #001d6c !important;">
    <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
            <div class="col-md-7 heading-section text-center ftco-animate">
                <span class="subheading" style="color: #ffffff;"><?php echo get_theme_mod( 'blog_chamada', __( 'Nosso Blog', 'gfnovo' ) ); ?></span>
                <h2 style="color: #ffffff;"><?php echo get_theme_mod( 'blog_titulo', __( 'Matérias e Notícias Recentes', 'gfnovo' ) ); ?></h2>
            </div>
        </div>
        <div class="row d-flex">
            <?php
                $post_query_args = array(
                    'post_type' => 'post',
                    'posts_per_page' => 3,
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
                                <h3 class="heading mb-0"><?php the_title(); ?></h3>
                            </div>
                            <?php $image_attributes = !empty( get_the_ID() ) ? wp_get_attachment_image_src( PG_Image::isPostImage() ? get_the_ID() : get_post_thumbnail_id( get_the_ID() ), 'large' ) : null; ?>
                            <a href="blog-single.html" class="block-20" style="background-image: url('<?php echo esc_url( get_template_directory_uri() ); ?>/images/image_2.jpg');<?php if($image_attributes) echo 'background-image:url(\''.$image_attributes[0].'\')' ?>"> </a>
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
                                <p><a href="<?php echo esc_url( get_permalink() ); ?>" class="botaovirtual btn"><?php _e( 'Leia Mais', 'gfnovo' ); ?></a></p>
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
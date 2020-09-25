<?php get_header(); ?>

        <!-- END nav -->
        <div class="hero-wrap js-fullheight" style="background-image: url('<?php echo esc_url( get_template_directory_uri() ); ?>/images/bg_1.jpg');background-image:<?php echo 'url('.PG_Image::getUrl( get_theme_mod( 'home_img_fundo' ), 'large' ).')' ?>;" data-stellar-background-ratio="0.5">
            <div class="overlay"></div>
            <div class="container">
                <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-start" data-scrollax-parent="true">
                    <div class="col-md-8 ftco-animate">
                        <h2 class="subheading"><?php echo get_theme_mod( 'home_bem_vindo', __( 'Bem vindo a GFSouto', 'gfnovo' ) ); ?></h2>
                        <h1><?php echo get_theme_mod( 'home_principal', 'Administrando condomónios<br> com <span class="txt-rotate" data-period="2000" data-rotate=\'[ "responsabilidade.", "seriedade.", "harmonia.", "honestidade." ]\'></span>' ); ?></h1>
                        <!-- <h1 class="mb-4">Attorneys Fighting For Your Freedom</h1> -->
                        <p class="mb-4"><?php echo get_theme_mod( 'home_sug_chamada', __( '"A solidez e a liderança absoluta no mercado de Mossoró são frutos do trabalho de uma equipe comprometida em atender seus clientes com transparência, ética e honestidade"', 'gfnovo' ) ); ?></p>
                        <p><a href="<?php echo get_theme_mod( 'home_botao_link', '#' ); ?>" class="btn btn-primary mr-md-4 py-2 px-4"><?php echo get_theme_mod( 'home_botao', 'Nossa História <span class="ion-ios-arrow-forward"></span>' ); ?></a></p>
                    </div>
                </div>
            </div>
        </div>
        <section class="ftco-section ftco-no-pt">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 py-5" style="background-color: #001d6c;">
                        <div class="heading-section ftco-animate">
                            <span class="subheading" style="color: #ffffff;"><?php echo get_theme_mod( 'servicos_sub', __( 'Pioneiros no mercado!', 'gfnovo' ) ); ?></span>
                            <h2 class="mb-4" style="color: #ffffff;"><?php echo get_theme_mod( 'servicos_titulo', __( 'Portaria Virtual', 'gfnovo' ) ); ?></h2>
                            <p style="color: #ffffff;"><?php echo get_theme_mod( 'servicos_texto', __( 'A GF Souto em constante busca de inovação aos seus clientes, foi uma das pioneiras, em serviço de Portaria Virtual. Oferecemos tecnologia de ponta e soluções customizadas para condomínios e empresas, trazendo economia e tranquilidade aos clientes.', 'gfnovo' ) ); ?></p>
                            <p><a href="<?php echo get_theme_mod( 'servicos_bnt_link', '#' ); ?>" class="btn btn-primary py-3 px-4"><?php echo get_theme_mod( 'servicos_bnt', __( 'Saiba mais', 'gfnovo' ) ); ?></a></p>
                        </div>
                    </div>
                    <div class="col-lg-9 services-wrap px-4 pt-5">
                        <div class="row pt-md-3">
                            <div class="col-md-4 d-flex align-items-stretch">
                                <div class="services text-center">
                                    <div class="icon d-flex justify-content-center align-items-center">
                                        <img src="<?php echo PG_Image::getUrl( get_theme_mod( 'servicos_svg_01', esc_url( get_template_directory_uri() . '/images/icon/001-predio-comercial.svg' ) ), 'large' ) ?>" width="40">
                                        <span></span>
                                    </div>
                                    <div class="text">
                                        <h3><?php echo get_theme_mod( 'servicos_titulo_01', __( 'Condomínio Online', 'gfnovo' ) ); ?></h3>
                                        <p class="text-justify" style="text-align: justify !important; font-size: 15px;"><?php echo get_theme_mod( 'servicos_texto_01', __( 'Sistema completo para administração de condomínios, desenvolvido com tecnologia moderna e uma interface amigável.', 'gfnovo' ) ); ?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 d-flex align-items-stretch">
                                <div class="services text-center">
                                    <div class="icon d-flex justify-content-center align-items-center">
                                        <img src="<?php echo PG_Image::getUrl( get_theme_mod( 'servicos_svg_02', esc_url( get_template_directory_uri() . '/images/icon/002-lista-de-controle.svg' ) ), 'large' ) ?>" width="40">
                                        <span></span>
                                    </div>
                                    <div class="text">
                                        <h3><?php echo get_theme_mod( 'servicos_titulo_02', __( 'Condomínio Online', 'gfnovo' ) ); ?></h3>
                                        <p class="text-justify" style="text-align: justify !important; font-size: 15px;"><?php echo get_theme_mod( 'servicos_texto_02', __( 'Sistema completo para administração de condomínios, desenvolvido com tecnologia moderna e uma interface amigável.', 'gfnovo' ) ); ?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 d-flex align-items-stretch">
                                <div class="services text-center">
                                    <div class="icon d-flex justify-content-center align-items-center">
                                        <img src="<?php echo PG_Image::getUrl( get_theme_mod( 'servicos_svg_03', esc_url( get_template_directory_uri() . '/images/icon/005-alvo.svg' ) ), 'large' ) ?>" width="40">
                                        <span></span>
                                    </div>
                                    <div class="text">
                                        <h3><?php echo get_theme_mod( 'servicos_titulo_03', __( 'Condomínio Online', 'gfnovo' ) ); ?></h3>
                                        <p class="text-justify" style="text-align: justify !important; font-size: 15px;"><?php echo get_theme_mod( 'servicos_texto_03', __( 'Sistema completo para administração de condomínios, desenvolvido com tecnologia moderna e uma interface amigável.', 'gfnovo' ) ); ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p class="text-center pt-5"><a href="<?php echo get_theme_mod( 'servicos_botao_link', '#' ); ?>" class="btn btn-primary py-3 px-4"><?php echo get_theme_mod( 'servicos_botao', __( 'Todos os Serviços', 'gfnovo' ) ); ?></a></p>
                    </div>
                </div>
            </div>
        </section>
        <section class="ftco-section ftco-no-pt ftco-no-pb" style="padding-top: 67px !important;">
            <div class="container">
                <div class="row d-flex">
                    <div class="col-md-6 d-flex">
                        <div class="img img-video align-items-center d-flex justify-content-md-end justify-content-center align-self-stretch" style="background-image: url('<?php echo esc_url( get_template_directory_uri() ); ?>/images/img/about.jpg');background-image:<?php echo 'url('.PG_Image::getUrl( get_theme_mod( 'a_gfsouto' ), 'large' ).')' ?>;">
</div>
                    </div>
                    <div class="col-md-6 pl-md-5">
                        <div class="row justify-content-start pt-3 pb-3">
                            <div class="col-md-12 heading-section ftco-animate">
                                <span class="subheading"><?php echo get_theme_mod( 'a_gfsouto_chamada', __( 'A GF Souto', 'gfnovo' ) ); ?></span>
                                <h2 class="mb-4"><?php echo get_theme_mod( 'a_gfsouto_titulo', __( 'Uma história de muito trabalho e dedicação', 'gfnovo' ) ); ?></h2>
                                <p class="text-justify" style="text-align: justify !important;"><?php echo get_theme_mod( 'a_gfsouto_texto', __( 'Apresentando um projeto de excelência, com uma grande noção de rigor e responsabilidade e uma forma de atuar transparente.', 'gfnovo' ) ); ?></p>
                                <div class="tabulation-2 mt-4">
                                    <ul class="nav nav-pills nav-fill d-md-flex d-block">
                                        <li class="nav-item mb-md-0 mb-2">
                                            <a class="nav-link py-2 show" data-toggle="tab" href="#home1"><?php echo get_theme_mod( 'a_gfsouto_objetivo', __( 'Objetivo', 'gfnovo' ) ); ?></a>
                                        </li>
                                        <li class="nav-item px-lg-2 mb-md-0 mb-2">
                                            <a class="nav-link py-2 show" data-toggle="tab" href="#home2"><?php echo get_theme_mod( 'a_gfsouto_visao', __( 'Visão', 'gfnovo' ) ); ?></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link py-2 mb-md-0 mb-2 active show" data-toggle="tab" href="#home3"><?php echo get_theme_mod( 'a_gfsouto_valor', __( 'Valor', 'gfnovo' ) ); ?></a>
                                        </li>
                                    </ul>
                                    <div class="tab-content bg-light rounded mt-2">
                                        <div class="tab-pane container p-0 show" id="home1">
                                            <p><?php echo get_theme_mod( 'a_gfsouto_objetivo_texto', 'A <strong>GF SOUTO</strong> tem por objetivo oferecer um atendimento personalizado com: Ética; Transparência; Eficiência e tranqüilidade a altura da expectativa do cliente, satisfazendo plenamente suas necessidades. Estamos sempre buscando a excelência no atendimento e o máximo de assistência na execução dos serviços, onde: identificamos as reais necessidades do condomínio, elaboramos propostas e soluções personalizadas adequando as reais expectativas e realidade financeira de cada cliente, além da otimização de resultados, nunca abrindo mão da qualidade.<br>' ); ?></p>
                                        </div>
                                        <div class="tab-pane container p-0 fade" id="home2">
                                            <p><?php echo get_theme_mod( 'a_gfsouto_visao_texto', __( 'Temos certeza que para: administrar com eficiência o condomínio de forma a reduzir custos, garantir a qualidade dos serviços prestados e qualidade de vida para os moradores, teremos que ter em mente que o conhecimento é uma estrada que se percorre com conquistas diárias, e a chave para o sucesso é trabalhar muito, ser humilde e ter ética', 'gfnovo' ) ); ?></p>
                                        </div>
                                        <div class="tab-pane container p-0 fade active show" id="home3">
                                            <p><?php echo get_theme_mod( 'a_gfsouto_valor_texto', 'Honestidade<br>Ética<br>Transparência<br>Persistência<br>Responsabilidade Social<br>Consciência Ecológica' ); ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="ftco-consultation ftco-section ftco-no-pt ftco-no-pb img" style="background-image: url('<?php echo esc_url( get_template_directory_uri() ); ?>/images/img/02.jpg');background-image:<?php echo 'url('.PG_Image::getUrl( get_theme_mod( 'contato_imagem' ), 'large' ).')' ?>;">
            <div class="overlay"></div>
            <div class="container">
                <div class="row d-md-flex justify-content-end">
                    <div class="col-md-6 half p-3 py-5 pl-md-5 ftco-animate heading-section heading-section-white">
                        <span class="subheading"><?php echo get_theme_mod( 'contato_duvida', __( 'Alguma duvida?', 'gfnovo' ) ); ?></span>
                        <h2 class="mb-4"><?php echo get_theme_mod( 'contato_entre_em_contato', __( 'Entre em contato', 'gfnovo' ) ); ?></h2>
                        <?php if ( is_active_sidebar( 'contato' ) ) : ?>
                            <form action="<?php echo esc_url( get_template_directory_uri() ); ?>/#contato_cliente_mailer_id" class="consultation" method="post" onsubmit="event.stopImmediatePropagation();event.stopPropagation();">
                                <?php dynamic_sidebar( 'contato' ); ?>
                            </form>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </section>
        <section class="ftco-section bg-light">
            <div class="container">
                <div class="row justify-content-center mb-5 pb-3">
                    <div class="col-md-7 heading-section text-center ftco-animate">
                        <span class="subheading" style="color: #001d6c;"><?php echo get_theme_mod( 'blog_chamada', __( 'Nosso Blog', 'gfnovo' ) ); ?></span>
                        <h2><?php echo get_theme_mod( 'blog_titulo', __( 'Matérias e Notícias Recentes', 'gfnovo' ) ); ?></h2>
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
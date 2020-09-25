<?php get_header(); ?>

        <!-- END nav -->
        <div class="hero-wrap js-fullheight" style="background-image: url('<?php echo esc_url( get_template_directory_uri() ); ?>/images/img/01.jpg');background-image:<?php echo 'url('.PG_Image::getUrl( get_theme_mod( 'topo_bg' ), 'large' ).')' ?>;" data-stellar-background-ratio="0.5">
            <div class="overlay"></div>
            <div class="container">
                <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-start" data-scrollax-parent="true">
                    <div class="col-md-6 ftco-animate col-md-10">
                        <h2 class="subheading"><?php echo get_theme_mod( 'topo_bemvindo', __( 'Bem vindo a GF Souto', 'modelo_gfsouto' ) ); ?></h2>
                        <h1><?php echo get_theme_mod( 'topo_chamada', 'Administrando Condomínios <br>com <span class="txt-rotate" data-period="2000" data-rotate="[ &quot;responsabilidade.&quot;, &quot;honestidade.&quot;, &quot;seriedade.&quot;]"></span>' ); ?></h1>
                        <!-- <h1 class="mb-4">Attorneys Fighting For Your Freedom</h1> -->
                        <p class="mb-4"><?php echo get_theme_mod( 'topo_sub', __( '"A solidez e a liderança absoluta no mercado de Mossoró são frutos do trabalho de uma equipe comprometida em atender seus clientes com transparência, ética e honestidade"', 'modelo_gfsouto' ) ); ?></p>
                        <p><a href="<?php echo get_theme_mod( 'topo_botao_link', '#' ); ?>" class="btn btn-primary mr-md-4 py-2 px-4"><?php echo get_theme_mod( 'topo_botao', 'Conheça Nossa História <span class="ion-ios-arrow-forward"></span>' ); ?></a></p>
                    </div>
                </div>
            </div>
        </div>
        <section class="ftco-section ftco-no-pt">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 py-5" style="background-color: #322d73;">
                        <div class="heading-section ftco-animate">
                            <span class="subheading" style="color: #ffffff;"><?php echo get_theme_mod( 'portaria_virtual_titulo', __( 'Pioneiros no mercado!', 'modelo_gfsouto' ) ); ?></span>
                            <h2 class="mb-4" style="color: #ffffff;"><?php echo get_theme_mod( 'portaria_virtual_chamada', __( 'Portaria Virtual', 'modelo_gfsouto' ) ); ?></h2>
                            <p style="color: #ffffff;" class="text-justify"><?php echo get_theme_mod( 'portaria_virtual_texto', __( 'A GF Souto em constante busca de inovação aos seus clientes, foi uma das pioneiras, em serviço de Portaria Virtual. Oferecemos tecnologia de ponta e soluções customizadas para condomínios e empresas, trazendo economia e tranquilidade aos clientes.', 'modelo_gfsouto' ) ); ?></p>
                            <p><a href="<?php echo get_theme_mod( 'portaria_virtual_botao_link', '#' ); ?>" class="btn btn-primary py-3 px-4"><?php echo get_theme_mod( 'portaria_virtual_botao', __( 'Saiba Mais', 'modelo_gfsouto' ) ); ?></a></p>
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
                                        <h3><?php echo get_theme_mod( 'servicos_titulo_01', __( 'Condomínio Online', 'modelo_gfsouto' ) ); ?></h3>
                                        <p class="text-justify" style="text-align: justify !important;"><?php echo get_theme_mod( 'servicos_texto_01', __( 'Sistema completo para administração de condomínios, desenvolvido com tecnologia moderna e uma interface amigável.', 'modelo_gfsouto' ) ); ?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 d-flex align-items-stretch">
                                <div class="services text-center">
                                    <div class="icon d-flex justify-content-center align-items-center">
                                        <img src="<?php echo PG_Image::getUrl( get_theme_mod( 'servicos_svg_02', esc_url( get_template_directory_uri() . '/images/icon/001-predio-comercial.svg' ) ), 'large' ) ?>" width="40">
                                        <span></span>
                                    </div>
                                    <div class="text">
                                        <h3><?php echo get_theme_mod( 'servicos_titulo_02', __( 'Condomínio Online', 'modelo_gfsouto' ) ); ?></h3>
                                        <p class="text-justify" style="text-align: justify !important;"><?php echo get_theme_mod( 'servicos_texto_02', __( 'Sistema completo para administração de condomínios, desenvolvido com tecnologia moderna e uma interface amigável.', 'modelo_gfsouto' ) ); ?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 d-flex align-items-stretch">
                                <div class="services text-center">
                                    <div class="icon d-flex justify-content-center align-items-center">
                                        <img src="<?php echo PG_Image::getUrl( get_theme_mod( 'servicos_svg_03', esc_url( get_template_directory_uri() . '/images/icon/001-predio-comercial.svg' ) ), 'large' ) ?>" width="40">
                                        <span></span>
                                    </div>
                                    <div class="text">
                                        <h3><?php echo get_theme_mod( 'servicos_titulo_03', __( 'Condomínio Online', 'modelo_gfsouto' ) ); ?></h3>
                                        <p class="text-justify" style="text-align: justify !important;"><?php echo get_theme_mod( 'servicos_texto_03', __( 'Sistema completo para administração de condomínios, desenvolvido com tecnologia moderna e uma interface amigável.', 'modelo_gfsouto' ) ); ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p class="text-center pt-5"><a href="<?php echo get_theme_mod( 'servicos_botao_link', '#' ); ?>" class="btn btn-primary py-3 px-4"><?php echo get_theme_mod( 'servicos_botao', __( 'Todos os Serviços', 'modelo_gfsouto' ) ); ?></a></p>
                    </div>
                </div>
            </div>
        </section>
        <section class="ftco-section ftco-no-pt ftco-no-pb" style="padding-top: 67px !important;">
            <div class="container">
                <div class="row d-flex">
                    <div class="col-md-6 d-flex">
                        <div class="img img-video align-items-center d-flex justify-content-md-end justify-content-center align-self-stretch" style="background-image:url('<?php echo esc_url( get_template_directory_uri() ); ?>/images/img/about.jpg');background-image:<?php echo 'url('.PG_Image::getUrl( get_theme_mod( 'a_gfsouto' ), 'large' ).')' ?>;">
                            <a href="<?php echo get_theme_mod( 'a_gfsouto_video', 'https://vimeo.com/45830194' ); ?>" class="icon-video popup-vimeo d-flex justify-content-center align-items-center"> <span class="icon-play"></span> </a>
                        </div>
                    </div>
                    <div class="col-md-6 pl-md-5">
                        <div class="row justify-content-start pt-3 pb-3">
                            <div class="col-md-12 heading-section ftco-animate">
                                <span class="subheading"><?php echo get_theme_mod( 'a_gfsouto_chamada', __( 'A GF Souto', 'modelo_gfsouto' ) ); ?></span>
                                <h2 class="mb-4"><?php echo get_theme_mod( 'a_gfsouto_titulo', __( 'Uma história de muito trabalho e dedicação', 'modelo_gfsouto' ) ); ?></h2>
                                <p class="text-justify" style="text-align: justify !important;"><?php echo get_theme_mod( 'a_gfsouto_texto', __( 'Apresentando um projeto de excelência, com uma grande noção de rigor e responsabilidade e uma forma de atuar transparente.', 'modelo_gfsouto' ) ); ?></p>
                                <div class="tabulation-2 mt-4">
                                    <ul class="nav nav-pills nav-fill d-md-flex d-block">
                                        <li class="nav-item mb-md-0 mb-2">
                                            <a class="nav-link py-2 show" data-toggle="tab" href="#home1"><?php echo get_theme_mod( 'a_gfsouto_objetivo', __( 'Objetivo', 'modelo_gfsouto' ) ); ?></a>
                                        </li>
                                        <li class="nav-item px-lg-2 mb-md-0 mb-2">
                                            <a class="nav-link py-2 show" data-toggle="tab" href="#home2"><?php echo get_theme_mod( 'a_gfsouto_visao', __( 'Visão', 'modelo_gfsouto' ) ); ?></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link py-2 mb-md-0 mb-2 active show" data-toggle="tab" href="#home3"><?php echo get_theme_mod( 'a_gfsouto_valor', __( 'Valor', 'modelo_gfsouto' ) ); ?></a>
                                        </li>
                                    </ul>
                                    <div class="tab-content bg-light rounded mt-2">
                                        <div class="tab-pane container p-0 show" id="home1">
                                            <p><?php echo get_theme_mod( 'a_gfsouto_objetivo_texto', 'A <strong>GF SOUTO</strong> tem por objetivo oferecer um atendimento personalizado com: Ética; Transparência; Eficiência e tranqüilidade a altura da expectativa do cliente, satisfazendo plenamente suas necessidades. Estamos sempre buscando a excelência no atendimento e o máximo de assistência na execução dos serviços, onde: identificamos as reais necessidades do condomínio, elaboramos propostas e soluções personalizadas adequando as reais expectativas e realidade financeira de cada cliente, além da otimização de resultados, nunca abrindo mão da qualidade.<br>' ); ?></p>
                                        </div>
                                        <div class="tab-pane container p-0 fade" id="home2">
                                            <p><?php echo get_theme_mod( 'a_gfsouto_visao_texto', __( 'Temos certeza que para: administrar com eficiência o condomínio de forma a reduzir custos, garantir a qualidade dos serviços prestados e qualidade de vida para os moradores, teremos que ter em mente que o conhecimento é uma estrada que se percorre com conquistas diárias, e a chave para o sucesso é trabalhar muito, ser humilde e ter ética', 'modelo_gfsouto' ) ); ?></p>
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
                        <span class="subheading"><?php echo get_theme_mod( 'contato_duvida', __( 'Alguma duvida?', 'modelo_gfsouto' ) ); ?></span>
                        <h2 class="mb-4"><?php echo get_theme_mod( 'contato_entre_em_contato', __( 'Entre em contato', 'modelo_gfsouto' ) ); ?></h2>
                        <?php $mailer = new PG_Simple_Form_Mailer(); ?>
                        <?php $mailer->process( array(
                                'form_id' => 'contato_cliente_mailer_id',
                                'send_to_email' => true,
                                'save_to_post_type' => true,
                                'email' => 'artes@bdeimagem.com.br',
                                'post_type' => 'contato',
                                'title' => 'Cliente entrou em contato pelo Site da GF Souto',
                                'intro' => 'Você recebeu uma mensagem pelo site da GF Souto',
                                'success_message' => 'Obrigado, sua mensagem foi enviada',
                                'error_message' => 'Obrigado, sua mensagem foi enviada'
                        ) ); ?>
                        <?php if( !$mailer->processed || $mailer->error) : ?>
                            <form action="<?php echo '#contato_cliente_mailer_id'; ?>" class="consultation" id="contato_cliente_mailer_id" method="post" onsubmit="event.stopImmediatePropagation();event.stopPropagation();">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Seu Nome" name="contato_cliente_mailer_id_1" value="<?php echo ( isset( $_POST['contato_cliente_mailer_id_1'] ) ? $_POST['contato_cliente_mailer_id_1'] : '' ); ?>">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Seu E-mail" name="contato_cliente_mailer_id_2" value="<?php echo ( isset( $_POST['contato_cliente_mailer_id_2'] ) ? $_POST['contato_cliente_mailer_id_2'] : '' ); ?>">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Titulo" name="contato_cliente_mailer_id_3" value="<?php echo ( isset( $_POST['contato_cliente_mailer_id_3'] ) ? $_POST['contato_cliente_mailer_id_3'] : '' ); ?>">
                                </div>
                                <div class="form-group">
                                    <textarea name="contato_cliente_mailer_id_4" id="" cols="30" rows="7" class="form-control" placeholder="Corpo da Mensagem"><?php echo ( isset( $_POST['contato_cliente_mailer_id_4'] ) ? $_POST['contato_cliente_mailer_id_4'] : '' ); ?></textarea>
                                </div>
                                <div class="form-group">
                                    <input type="submit" value="Enviar" class="btn py-3 px-4" name="contato_cliente_mailer_id_5">
                                </div>
                                <input type="hidden" name="contato_cliente_mailer_id" value="1"/>
                            </form>
                        <?php endif; ?>
                        <?php if( $mailer->processed ) : ?>
                            <?php echo $mailer->message; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </section>
        <section class="ftco-section bg-light">
            <div class="container">
                <div class="row justify-content-center mb-5 pb-3">
                    <div class="col-md-7 heading-section text-center ftco-animate">
                        <span class="subheading"><?php echo get_theme_mod( 'blog_chamada', __( 'Nosso Blog', 'modelo_gfsouto' ) ); ?></span>
                        <h2><?php echo get_theme_mod( 'blog_titulo', __( 'Matérias e Notícias Recentes', 'modelo_gfsouto' ) ); ?></h2>
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
                                        <p class="text-justify" style="text-align: justify !important;"><?php echo get_the_excerpt(); ?></p>
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
        <section class="ftco-section ftco-no-pt ftco-no-pb bg-light">
            <div class="container">
                <div class="row d-flex justify-content-end">
                    <div class="py-4 bg-primary px-md-4 col-lg-8">
                        <div class="row">
                            <div class="ftco-animate d-flex align-items-center col-md-5">
                                <h2 class="mb-0" style="color:white; font-size: 24px;"><?php _e( 'Inscreva-se em nosso Newsletter', 'modelo_gfsouto' ); ?></h2>
                            </div>
                            <div class="d-flex align-items-center col-md-7">
                                <form action="<?php echo esc_url( get_template_directory_uri() ); ?>/#" class="subscribe-form">
                                    <div class="form-group d-flex" id="inscreva-se_mailer_id">
                                        <div id="mc_embed_signup_scroll"> 
                                            <input type="email" value="" name="EMAIL" class="email" id="mce-EMAIL" placeholder="Digite seu e-mail" required>
                                            <input type="submit" value="Inscreva-se" name="subscribe" id="mc-embedded-subscribe" class="button">
                                            <div class="clear"></div>                                             
                                            <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->                                             
                                            <div style="position: absolute; left: -5000px;" aria-hidden="true"></div>                                             
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- Begin Mailchimp Signup Form -->                                                          
                            <style type="text/css">#mc_embed_signup { background: #fff; clear: left; font: 14px Helvetica,Arial,sans-serif; width: 100%; } /* Add your own Mailchimp form style overrides in your site stylesheet or in this style block.
	   We recommend moving this block and the preceding CSS link to the HEAD of your HTML file. */</style>                             
                            <div id="mc_embed_signup" class="col-lg-8" style="background-color: #dbb34e;"> 
                                <form action="https://gfsouto.us19.list-manage.com/subscribe/post?u=e045a12ad820c69434ec2226b&amp;id=d161458858" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate> 
</form>                                 
                            </div>                             
                            <!--End mc_embed_signup-->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="ftco-section ftco-no-pt ftco-no-pb bg-light">
            <div class="container">
                <div class="row d-flex justify-content-end">
</div>
            </div>
        </section>
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
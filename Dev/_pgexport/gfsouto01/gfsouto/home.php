<?php get_header(); ?>

        <nav class="navbar px-md-0 navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
            <div class="container">
                <img src="<?php echo PG_Image::getUrl( get_theme_mod( 'logo_imagem', esc_url( get_template_directory_uri() . '/images/img/logo.png' ) ), 'large' ) ?>" alt="Logo" class="img-fluid" width="10%">
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
                                'items_wrap' => '<ul class="navbar-nav ml-auto %2$s" data-pg-collapsed id="%1$s">%3$s</ul>',
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
        <!-- END nav -->
        <div class="hero-wrap js-fullheight" style="background-image:<?php echo 'url('.PG_Image::getUrl( get_theme_mod( 'topo_bg' ), 'large' ).')' ?>;" data-stellar-background-ratio="0.5">
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
        <section class="ftco-section ftco-no-pt ftco-no-pb">
            <div class="container">
                <div class="row d-flex">
                    <div class="col-md-6 d-flex">
                        <div class="img img-video align-items-center d-flex justify-content-md-end justify-content-center align-self-stretch" style="background-image:<?php echo 'url('.PG_Image::getUrl( get_theme_mod( 'a_gfsouto' ), 'large' ).')' ?>;">
                            <a href="<?php echo get_theme_mod( 'a_gfsouto_video', 'https://vimeo.com/45830194' ); ?>" class="icon-video popup-vimeo d-flex justify-content-center align-items-center"> <span class="icon-play"></span> </a>
                        </div>
                    </div>
                    <div class="col-md-6 pl-md-5">
                        <div class="row justify-content-start pt-3 pb-3">
                            <div class="col-md-12 heading-section ftco-animate">
                                <span class="subheading"><?php echo get_theme_mod( 'a_gfsouto_chamada', __( 'A GF Souto', 'modelo_gfsouto' ) ); ?></span>
                                <h2 class="mb-4"><?php echo get_theme_mod( 'a_gfsouto_titulo', __( 'Uma história de muito trabalho e dedicação', 'modelo_gfsouto' ) ); ?></h2>
                                <p><?php echo get_theme_mod( 'a_gfsouto_texto', __( 'Apresentando um projeto de excelência, com uma grande noção de rigor e responsabilidade e uma forma de atuar transparente.', 'modelo_gfsouto' ) ); ?></p>
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
        <section class="ftco-section ftco-no-pt ftco-no-pb bg-light">
            <div class="container">
                <div class="row d-flex justify-content-end">
</div>
            </div>
        </section>        

<?php get_footer(); ?>
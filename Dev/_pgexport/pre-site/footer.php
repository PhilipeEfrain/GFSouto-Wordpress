
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
        <!-- loader -->
        <?php wp_footer(); ?>
    </body>
</html>
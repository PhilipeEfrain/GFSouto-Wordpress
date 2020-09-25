
        </section>
        <!-- END nav -->
        <!-- loader -->
        <footer class="ftco-footer ftco-bg-dark ftco-section">
            <div class="container">
                <div class="row mb-5">
                    <div class="col-md">
                        <div class="ftco-footer-widget mb-4">
                            <a href="#"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/D__Arquivos%20BDE_GFSouto%20site%20novo_Site%20novo_logo.png" width="50%"/></a>
                            <p style="padding-top: 12px !important;"><?php _e( 'Quando você precisar, nós estamos aqui.', 'gfnovo' ); ?></p>
                            <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                                <li class="ftco-animate">
                                    <a href="#"><span class="icon-facebook"></span></a>
                                </li>
                                <li class="ftco-animate">
                                    <a href="#"><span class="icon-instagram"></span></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="ftco-footer-widget mb-4 ml-md-5">
                            <h2 class="ftco-heading-2"><?php _e( 'Menu', 'gfnovo' ); ?></h2>
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
                    <div class="col-md">
                        <div class="ftco-footer-widget mb-4">
                            <h2 class="ftco-heading-2"><?php _e( 'Alguma duvida?', 'gfnovo' ); ?></h2>
                            <div class="block-23 mb-3">
                                <ul>
                                    <li>
                                        <span class="icon icon-map-marker"></span>
                                        <span class="text"><p><?php _e( 'Rua Amaro Duarte, 241, Nova Betânia', 'gfnovo' ); ?><br><?php _e( 'CEP 59.603.030 Mossoró / RN', 'gfnovo' ); ?></p></span>
                                    </li>
                                    <li>
                                        <a href="#"><span class="icon icon-phone"></span><span class="text"><?php _e( '(84) 3323 -1250', 'gfnovo' ); ?></span></a>
                                    </li>
                                    <li>
                                        <a href="#"><span class="icon icon-envelope"></span><span class="text"><?php _e( 'contato@gfsouto.com.br', 'gfnovo' ); ?></span></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="ftco-footer-widget mb-4">
                            <h2 class="ftco-heading-2"><?php _e( 'Área de atendimento', 'gfnovo' ); ?></h2>
                            <div class="opening-hours">
                                <h4><?php _e( 'Escritório: Segunda a sexta-feira', 'gfnovo' ); ?></h4>
                                <p class="pl-3"> <span><?php _e( 'Das 9h às 18h', 'gfnovo' ); ?></span></p>
                                <h4><?php _e( 'Emergencias', 'gfnovo' ); ?></h4>
                                <p class="pl-3"><?php _e( 'Atendimento 24h', 'gfnovo' ); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 text-center">
                        <p><?php echo get_theme_mod( 'footer_direitos', '<!-- Link back to Colorlib can\'t be removed. Template is licensed under CC BY 3.0. --> Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart color-danger" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a> <!-- Link back to Colorlib can\'t be removed. Template is licensed under CC BY 3.0. -->' ); ?></p>
                    </div>
                </div>
            </div>
        </footer>
        <?php wp_footer(); ?>
    </body>
</html>
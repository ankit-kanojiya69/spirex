<header id="apus-header" class="apus-header header-v4 hidden-sm hidden-xs" role="banner">
    <div class="<?php echo (famita_get_config('keep_header') ? 'main-sticky-header-wrapper' : ''); ?>">
        <div class="<?php echo (famita_get_config('keep_header') ? 'main-sticky-header' : ''); ?>">
            <div class="header-full header-bottom container-fluid p-relative">
                    <div class="table-visiable">
                        <div class="col-lg-2 col-md-2">
                            <div class="logo-in-theme ">
                                <?php get_template_part( 'template-parts/logo/logo' ); ?>
                            </div>
                        </div>
                        <?php if ( has_nav_menu( 'primary' ) ) : ?>
                        <div class="col-lg-6 col-md-6 p-static">
                            <div class="main-menu">
                                <nav data-duration="400" class="hidden-xs hidden-sm apus-megamenu slide animate navbar p-static" role="navigation">
                                <?php   $args = array(
                                        'theme_location' => 'primary',
                                        'container_class' => 'collapse navbar-collapse no-padding',
                                        'menu_class' => 'nav navbar-nav megamenu',
                                        'fallback_cb' => '',
                                        'menu_id' => 'primary-menu',
                                        'walker' => new Famita_Nav_Menu()
                                    );
                                    wp_nav_menu($args);
                                ?>
                                </nav>
                            </div>
                        </div>
                        <?php endif; ?>
                        <div class="col-lg-4 col-md-4">
                            <div class="header-right clearfix">
                                <?php if ( defined('FAMITA_WOOCOMMERCE_ACTIVED') && famita_get_config('show_cartbtn') && !famita_get_config( 'enable_shop_catalog' ) ): ?>
                                    <div class="pull-right">
                                        <?php get_template_part( 'woocommerce/cart/mini-cart-button' ); ?>
                                    </div>
                                <?php endif; ?>

                                <?php if ( class_exists( 'YITH_WCWL' ) ):
                                    $wishlist_url = YITH_WCWL()->get_wishlist_url();
                                ?>
                                    <div class="pull-right">
                                        <a class="wishlist-icon" href="<?php echo esc_url($wishlist_url);?>" title="<?php esc_attr_e( 'View Your Wishlist', 'famita' ); ?>"><i class="icon_heart_alt"></i>
                                            <?php if ( function_exists('yith_wcwl_count_products') ) { ?>
                                                <span class="count"><?php echo yith_wcwl_count_products(); ?></span>
                                            <?php } ?>
                                        </a>
                                    </div>
                                <?php endif; ?>
                                
                                <?php if ( famita_get_config('show_searchform') ){ ?>
                                    <div class="pull-right">
                                        <a class="btn-search-top"><i class="icon_search"></i></a>
                                    </div>
                                <?php } ?>
                                <div class="pull-right top-account">
                                    <?php if( is_user_logged_in() ){ ?>
                                        <div class="top-wrapper-menu">
                                            <a class="drop-dow"><i class="icon_lock_alt"></i></a>
                                            <?php if ( has_nav_menu( 'top-menu' ) ) {
                                                    $args = array(
                                                        'theme_location' => 'top-menu',
                                                        'container_class' => 'inner-top-menu',
                                                        'menu_class' => 'nav navbar-nav topmenu-menu',
                                                        'fallback_cb' => '',
                                                        'menu_id' => '',
                                                        'walker' => new Famita_Nav_Menu()
                                                    );
                                                    wp_nav_menu($args);
                                                }
                                            ?>
                                        </div>
                                    <?php } else { ?>
                                        <ul class="topmenu-menu-line">
                                            <li><a class="login" href="<?php echo esc_url( get_permalink( get_option('woocommerce_myaccount_page_id') ) ); ?>" title="<?php esc_attr_e('Sign in','famita'); ?>"><?php esc_html_e('Sign in', 'famita'); ?></a></li>
                                            <li class="space">/</li>
                                            <li><a class="register" href="<?php echo esc_url( get_permalink( get_option('woocommerce_myaccount_page_id') ) ); ?>?ac=register" title="<?php esc_attr_e('Register','famita'); ?>"><?php esc_html_e('Register', 'famita'); ?></a></li>
                                        </ul>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>   
            </div>
        </div>
    </div>
</header>
<?php if ( famita_get_config('show_searchform') ): ?>
    <div class="search-header">
         <?php get_template_part( 'template-parts/productsearchform-nocategory' ); ?>
    </div>
<?php endif; ?>
<?php
function wp_menu_primary() {
    wp_nav_menu( [
        'theme_location'  => 'primary',
        'menu'            => '',
        'container'       => 'div',
        'container_id'    => 'menu',
        'container_class' => 'menu',
        'menu_class'      => 'menu__list',
        'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
        'depth'           => 10,
        'walker'          => new PrimaryMenu(),
    ] );
}

function wp_menu_portfoio() {
    wp_nav_menu( [
        'theme_location'  => 'portfolio-menu',
        'menu'            => '',
        'container'       => 'div',
        'container_id'    => '',
        'container_class' => 'portfolio-menu__wrapper',
        'menu_class'      => 'portfolio-menu__list',
        'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
        'depth'           => 10,
        'walker'          => new PortfolioMenu(),
    ] );
}

function wp_menu_footer() {
    wp_nav_menu( [
        'theme_location'  => 'footer-menu',
        'menu'            => '',
        'container'       => 'div',
        'container_id'    => 'footer-menu',
        'container_class' => 'footer-menu',
        'menu_class'      => 'footer-menu__list',
        'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
        'depth'           => 10,
        'walker'          => new FooterMenu(),
    ] );
}

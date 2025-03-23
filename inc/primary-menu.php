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

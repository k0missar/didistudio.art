<?php
/**
 * Пользовательский класс walker для навигационных меню.
 */
class FooterMenu extends Walker_Nav_Menu {

    /**
     * Добавляет классы к подменю (ul).
     */
    public function start_lvl( &$output, $depth = 0, $args = null ) {
        $indent = ( $depth > 0  ? str_repeat( "\t", $depth ) : '' );
        $display_depth = ( $depth + 1 );
        $classes = [
            'footer-menu__sub-menu',
            ( $display_depth % 2 ? 'footer-menu__odd' : 'footer-menu__even' ),
            ( $display_depth >= 2 ? 'footer-menu__sub-sub-menu' : '' ),
            'footer-menu__depth-' . $display_depth,
        ];
        $class_names = implode( ' ', $classes );

        $output .= "\n" . $indent . '<ul class="' . $class_names . '">' . "\n";
    }

    /**
     * Добавляет основные классы для li и ссылок.
     */
    public function start_el( &$output, $data_object, $depth = 0, $args = null, $current_object_id = 0 ) {
        $item = $data_object;

        $indent = ( $depth > 0 ? str_repeat( "\t", $depth ) : '' );

        $depth_classes = [
            ( $depth == 0 ? 'footer-menu__item' : 'footer-menu__sub-item' ),
            ( $depth >= 2 ? 'footer-menu__sub-sub-item' : '' ),
            ( $depth % 2 ? 'footer-menu__item-odd' : 'footer-menu__item-even' ),
            'footer-menu__item-depth-' . $depth,
        ];
        $depth_class_names = esc_attr( implode( ' ', $depth_classes ) );

        $classes = empty( $item->classes ) ? [] : (array) $item->classes;
        $class_names = esc_attr( implode( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) ) );

        $output .= $indent . '<li id="footer-menu__item-'. $item->ID . '" class="' . $depth_class_names . ' ' . $class_names . '">';

        $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
        $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
        $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
        $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
        $attributes .= ' class="footer-menu__link ' . ( $depth > 0 ? 'footer-menu__sub-menu-link' : 'footer-menu__menu-link' ) . '"';

        $item_output = strtr( '{BEFORE}<a{ATTRIBUTES}>{LINK_BEFORE}{TITLE}{LINK_AFTER}</a>{AFTER}', [
            '{BEFORE}'      => $args->before,
            '{ATTRIBUTES}'  => $attributes,
            '{LINK_BEFORE}' => $args->link_before,
            '{TITLE}'       => apply_filters( 'the_title', $item->title, $item->ID ),
            '{LINK_AFTER}'  => $args->link_after,
            '{AFTER}'       => $args->after,
        ] );

        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
    }

}

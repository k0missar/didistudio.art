<?php
/**
 * Пользовательский класс walker для навигационных меню.
 */
class PortfolioMenu extends Walker_Nav_Menu {

    /**
     * Добавляет классы к подменю (ul).
     */
    public function start_lvl( &$output, $depth = 0, $args = null ) {
        $indent = ( $depth > 0  ? str_repeat( "\t", $depth ) : '' );
        $display_depth = ( $depth + 1 );
        $classes = [
            'portfolio-menu__sub-menu',
            ( $display_depth % 2 ? 'portfolio-menu__odd' : 'portfolio-menu__even' ),
            ( $display_depth >= 2 ? 'portfolio-menu__sub-sub-menu' : '' ),
            'portfolio-menu__depth-' . $display_depth,
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
            ( $depth == 0 ? 'portfolio-menu__item' : 'portfolio-menu__sub-item' ),
            ( $depth >= 2 ? 'portfolio-menu__sub-sub-item' : '' ),
            ( $depth % 2 ? 'portfolio-menu__item-odd' : 'portfolio-menu__item-even' ),
            'portfolio-menu__item-depth-' . $depth,
        ];
        $depth_class_names = esc_attr( implode( ' ', $depth_classes ) );

        $classes = empty( $item->classes ) ? [] : (array) $item->classes;
        $class_names = esc_attr( implode( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) ) );

        $output .= $indent . '<li id="menu__item-'. $item->ID . '" class="' . $depth_class_names . ' ' . $class_names . '">';

        $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
        $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
        $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
        $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
        $attributes .= ' class="portfolio-menu__link h1 ' . ( $depth > 0 ? 'portfolio-menu__sub-menu-link' : 'portfolio-menu__menu-link' ) . '"';

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

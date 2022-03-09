<?php

class PrimaryMenuWalker extends Walker_Nav_Menu {
    function start_el(&$output, $item, $depth = 0, $args = null, $id = 0){
        $icon = get_field('icon', $item);
        $container_classes = [];

        if($icon){
            $container_classes[] = $icon;
        }

        if($item->current){
            $container_classes[] = 'current';
        }

        if(in_array('menu-item-type-custom', $item->classes)){
            $container_classes[] = 'custom';
        }

        if($depth){
            $container_classes[] = 'subitem';
        }

        $output .= '<li class="' . $this->generateBemClasses('nav__item', $container_classes) . '">';
        $output .= '<a href="' . $item->url . '" class="nav__link"' . ($item->attr_title ? ' title="' .  $item->attr_title . '"': '') . '>' . $item->title . '</a>';
    }
    function end_el(&$output, $data_object, $depth = 0, $args = null){
        $output .= '</li>';
    }

    function generateBemClasses($base, array $modifiers = []){
        $value = $base;

        foreach ($modifiers as $modifier){
            $value .= ' ' . $base . '--' . $modifier;
        }

        return $value;
    }
}


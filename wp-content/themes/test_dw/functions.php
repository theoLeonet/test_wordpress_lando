<?php

// Désactiver l'éditeur "Gutenberg" de Wordpress
add_filter('use_block_editor_for_post', '__return_false');

// Activer les images sur les articles
add_theme_support('post-thumbnails');

//Enregistrer un seul custom post type pour nos voyages
register_post_type('trip', [
    'label' => 'Voyages',
    'labels' => [
      'name' => 'Voyages',
      'singular_name' => 'Voyage',
    ],
    'description' => 'Tous les articles qui décrivent un voyage',
    'public' => true,
    'menu_position' => 4,
    'menu_icon' => 'dashicons-palmtree',
    'supports' => [
        'thumbnail',
        'title',
        'editor',
    ],
    'rewrite' => [
        'slug' => 'voyages'
    ]
]);

//Récupérer les trips via une requête wordpress.
function testdw_get_trips($count = 20){
    // 1. On instancie l'objet WP_Query
    $trips = new WP_Query([
        'post_type' => 'trip',
        'orderby' => 'date',
        'order' => 'DESC',
        'posts_per_page' => $count,
    ]);

    // 2. On retourne l'objet WP_Query
    return $trips;
}
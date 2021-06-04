<?php

add_action('init', 'si_registration');

function si_registration() {

    register_post_type('offers', array(
		'labels'             => array(
			'name'               => 'Офферы',
			'singular_name'      => 'Офферы',
			'add_new'            => 'Добавить оффера',
			'add_new_item'       => 'Добавить нового оффера',
			'edit_item'          => 'Редактировать оффера',
			'new_item'           => 'Новый оффер',
			'view_item'          => 'Посмотреть оффер',
			'search_items'       => 'Найти оффер',
			'not_found'          => 'Офферов не найдено',
			'not_found_in_trash' => 'В корзине Офферов не найдено',
			'parent_item_colon'  => '',
			'menu_name'          => 'Офферы'

		  ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => true,
		'capability_type'    => 'post',
		'has_archive'        => false,
		'hierarchical'       => false,
		'menu_position'      => null,
        'menu_icon'          => 'dashicons-cart',
		'supports'           => ['title']
	));
}

add_action('wp_enqueue_scripts', 'theme_name_scripts', 1000);

function theme_name_scripts() {
    wp_enqueue_style('style', get_stylesheet_uri());
	wp_enqueue_style('style1', 'https://cdn.jsdelivr.net/npm/@splidejs/splide@latest/dist/css/splide.min.css');
    wp_enqueue_script('Main', get_stylesheet_directory_uri() . '/assets/js/main.js');
	wp_enqueue_script('Splide', 'https://cdn.jsdelivr.net/npm/@splidejs/splide@latest/dist/js/splide.min.js');

}


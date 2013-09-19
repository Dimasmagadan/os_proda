<?php
/*
Plugin Name: Proda
Description: Плагин для сайта dem-mihailov.ru
Version: 1.1
Author: dimas
Author URI: http://odminstudios.ru/
*/

function os_dem_proda( $atts ) {

	extract( shortcode_atts(
		array(
			'date' => date('j-F-Y'),
			'text' => '&darr; Прода',
		), $atts )
	);

	$out='<div class="proda prodanew">'.$text.' ('.$date.')</div>';
	return $out;
}
add_shortcode( 'proda', 'os_dem_proda' );

function os_dem_styles_and_scripts() {
	$ver=1;
	if(!is_admin() && is_single() ){
		wp_enqueue_style( 'os_dem_style', plugins_url( '/style.css' , __FILE__ ), false, $ver );
		wp_enqueue_script( 'os_dem_script', plugins_url( '/script.js' , __FILE__ ), array( 'jquery' ), $ver, true );
	}
}
add_action( 'wp_enqueue_scripts', 'os_dem_styles_and_scripts' );

function os_get_characters($text) {
	if ($text == '') {
		return 0;
	};
	$count = strlen(utf8_decode($text));
	return $count;
}

function os_show_kb_count($text){
	
	$count=os_get_characters($text);
	if($count>0){
		$count=round($count/1024);
	}

	echo $count.' кб';
}
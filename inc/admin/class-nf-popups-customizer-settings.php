<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

class NF_Popups_Customizer_Settings {

	private function __construct() {}

	public static function add_settings(  ) {
		global $wp_customize;
		$popup_id = get_option( 'nf_popup_id_customizer' );
		//var_dump($popup_id); die;
		$wp_customize->add_setting( 'nf_popups['.$popup_id.'][overlay_color]', array(
				'type'      => 'option',
				'transport' => 'postMessage',
			) );

		$wp_customize->add_setting( 'nf_popups['.$popup_id.'][overlay_opacity]', array(
				'type'      => 'option',
				'transport' => 'postMessage',
			) );


		$wp_customize->add_setting( 'nf_popups['.$popup_id.'][container_padding]', array(
				'type'      => 'option',
				'transport' => 'postMessage',
			) );
		$wp_customize->add_setting( 'nf_popups['.$popup_id.'][container_background_color]', array(
				'type'      => 'option',
				'transport' => 'postMessage',
			) );
		$wp_customize->add_setting( 'nf_popups['.$popup_id.'][container_width]', array(
				'type'      => 'option',
				'transport' => 'postMessage',
			) );

		$wp_customize->add_setting( 'nf_popups['.$popup_id.'][container_height]', array(
				'type'      => 'option',
				'transport' => 'postMessage',
			) );
		$wp_customize->add_setting( 'nf_popups['.$popup_id.'][container_border_radius]', array(
				'type'      => 'option',
				'transport' => 'postMessage',
			) );
		$wp_customize->add_setting( 'nf_popups['.$popup_id.'][container_border_thickness]', array(
				'type'      => 'option',
				'transport' => 'postMessage',
			) );

		$wp_customize->add_setting( 'nf_popups['.$popup_id.'][container_border_color]', array(
				'type'      => 'option',
				'transport' => 'postMessage',
			) );

		$wp_customize->add_setting( 'nf_popups['.$popup_id.'][container_border_style]', array(
				'type'      => 'option',
				'transport' => 'postMessage',
			) );
		$wp_customize->add_setting( 'nf_popups['.$popup_id.'][close_btn_top_margin]', array(
				'type'      => 'option',
				'transport' => 'postMessage',
			) );
		$wp_customize->add_setting( 'nf_popups['.$popup_id.'][close_btn_right_margin]', array(
				'type'      => 'option',
				'transport' => 'postMessage',
			) );



	}
}

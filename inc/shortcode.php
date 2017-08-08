<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

class NF_Popups_Shortocde {

	function __construct() {
		add_shortcode( 'nf-popup', array( $this, 'nf_popup_shortcode' ) );
	}

	function nf_popup_shortcode( $atts ) {
		if ( empty( $atts['id'] ) ) {
			return;
		}
		$popup_id = $atts['id'];
		$nf_popups_settings = get_post_meta( $popup_id, 'nf_popups_settings', true );
		$ninja_form_id = isset( $nf_popups_settings['ninja_form_id'] )?$nf_popups_settings['ninja_form_id'] :'';
		$content_before_form = isset( $nf_popups_settings['content_before_form'] )?$nf_popups_settings['content_before_form'] :'';
		$content_after_form = isset( $nf_popups_settings['content_after_form'] )?$nf_popups_settings['content_after_form'] :'';
		$trigger = '.preview-popup-link-'.$popup_id;
		$auto_open = false;
		if($nf_popups_settings['trigger'] == 'auto_open'){
				$auto_open = true;
				$delay = isset( $nf_popups_settings['auto_open_delay'] )?$nf_popups_settings['auto_open_delay'] :'0';
		}else{
			$trigger = $nf_popups_settings['trigger_id'];
		}
		if ( !empty($ninja_form_id)) {
			ob_start();
?>

	<style type="text/css">

	.white-popup {
		  position: relative;
		  background: #FFF;
		  padding: 20px;
		  width: auto;
		  margin: 20px auto;
	}
	.mfp-bg.mfp-ready{
		background-color: <?php echo NF_Popups_Customizer::get_value( $popup_id, 'overlay_color' ); ?>;
		opacity:<?php echo NF_Popups_Customizer::get_value( $popup_id, 'overlay_opacity' ) == 0 ? 0 : NF_Popups_Customizer::get_value( $popup_id, 'overlay_opacity' )/100; ?>;
	}
	body .nf-popup-<?php echo $popup_id ?>{
		width: <?php echo NF_Popups_Customizer::get_value( $popup_id, 'container_width' ); ?>;
		height: <?php echo NF_Popups_Customizer::get_value( $popup_id, 'container_height' ); ?>;
		padding:<?php echo NF_Popups_Customizer::get_value( $popup_id, 'container_padding' ); ?>px;
		margin:<?php echo NF_Popups_Customizer::get_value( $popup_id, 'container_margin' ); ?>;
		background: <?php echo NF_Popups_Customizer::get_value( $popup_id, 'container_background_color' ); ?>;
		border-radius: <?php echo NF_Popups_Customizer::get_value( $popup_id, 'container_border_radius' ); ?>px;
		border-width: <?php echo NF_Popups_Customizer::get_value( $popup_id, 'container_border_thickness' ); ?>;
		border-color: <?php echo NF_Popups_Customizer::get_value( $popup_id, 'container_border_color' ); ?>;
		border-style: <?php echo NF_Popups_Customizer::get_value( $popup_id, 'container_border_style' ); ?>;
	}
	body .nf-popup-<?php echo $popup_id ?> .mfp-close{
		top: <?php echo NF_Popups_Customizer::get_value( $popup_id, 'close_btn_top_margin' ); ?>;
		right: <?php echo NF_Popups_Customizer::get_value( $popup_id, 'close_btn_right_margin' ); ?>;
	}
	</style>
	<script type="text/javascript">
	(function($){

		$(function(){
			$('<?php echo $trigger; ?>').magnificPopup({
			  	 items: {
				      src: '#nf-popup-<?php echo $popup_id ?>',
				      type: 'inline'
				  }
			});
			<?php if($auto_open){ ?>

				setTimeout(function(){ $('<?php echo $trigger; ?>').trigger('click'); }, <?php echo $delay; ?>);

			<?php } ?>

	})
		})(jQuery);
	</script>
	<a style="display:none" href="javscript:void(0)" class='preview-popup-link-<?php echo $popup_id ?>'></a>
	<div class=" nf-popup-<?php echo $popup_id ?> white-popup mfp-hide" id="nf-popup-<?php echo $popup_id ?>">
	<?php echo $content_before_form; ?>
	    <?php echo do_shortcode( '[ninja_form id='.$ninja_form_id.']' ); ?>
	<?php echo $content_before_form; ?>
	</div>

<?php }
	$content = ob_get_contents();
	ob_clean();
	return $content;
	}

}

new NF_Popups_Shortocde();

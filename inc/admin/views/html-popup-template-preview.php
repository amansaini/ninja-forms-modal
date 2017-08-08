<script type="text/javascript">
    (function($){
		$(function(){
			$('.preview-popup-link').magnificPopup({
			  		type:'inline',
			  		//modal : true,
			 		midClick: true,
			 		 callbacks: {
					    open: function() {
					      $('.preview-popup-link').hide()
					    },
					    close: function() {
					      $('.preview-popup-link').show()
					    }

					  }
			});

			$('.preview-popup-link').trigger('click');

			})
		})(jQuery);
</script>
<!-- Like so: -->
<?php
$popup_id = get_option( 'nf_popup_id_customizer' );
$nf_popups_settings = get_post_meta( $popup_id, 'nf_popups_settings', true );
$ninja_form_id = isset($nf_popups_settings['ninja_form_id'])?$nf_popups_settings['ninja_form_id'] :'';
$content_before_form = isset($nf_popups_settings['content_before_form'])?$nf_popups_settings['content_before_form'] :'';
$content_after_form = isset($nf_popups_settings['content_after_form'])?$nf_popups_settings['content_after_form'] :'';
if ( $popup_id ) {
	if( $ninja_form_id){
	?>

	<style type="text/css">
		.preview-popup-link{
		    padding: 20px;
		    border: 1px solid orange;
		    background: orange;
		    border-radius: 24px;
		    position: absolute;
		    top: 40%;
		    left: 40%;
		    color: #fff;
		  }
		  .preview-popup-link:hover{
		  	color: #fff;
		  }
		.white-popup {
		  position: relative;
		  background: #FFF;
		  padding: 20px;
		  width: auto;
		  max-width: 500px;
		  margin: 20px auto;
		}
	.mfp-bg.mfp-ready{
		background-color: <?php echo NF_Popups_Customizer::get_value($popup_id,'overlay_color'); ?>;
		opacity:<?php echo NF_Popups_Customizer::get_value($popup_id,'overlay_opacity') == '' ? 1 : NF_Popups_Customizer::get_value($popup_id,'overlay_opacity')/100; ?>;
	}
	body .nf-popup-<?php echo $popup_id ?>{
		width: <?php echo NF_Popups_Customizer::get_value($popup_id,'container_width'); ?>;
		height: <?php echo NF_Popups_Customizer::get_value($popup_id,'container_height'); ?>;
		padding:<?php echo NF_Popups_Customizer::get_value($popup_id,'container_padding'); ?>px;
		margin:<?php echo NF_Popups_Customizer::get_value($popup_id,'container_margin'); ?>;
		background: <?php echo NF_Popups_Customizer::get_value($popup_id,'container_background_color'); ?>;
		border-radius: <?php echo NF_Popups_Customizer::get_value($popup_id,'container_border_radius'); ?>px;
		border-width: <?php echo NF_Popups_Customizer::get_value($popup_id,'container_border_thickness'); ?>;
		border-color: <?php echo NF_Popups_Customizer::get_value($popup_id,'container_border_color'); ?>;
		border-style: <?php echo NF_Popups_Customizer::get_value($popup_id,'container_border_style'); ?>;
	}
	body .nf-popup-<?php echo $popup_id ?> .mfp-close{
		top: <?php echo NF_Popups_Customizer::get_value($popup_id,'close_btn_top_margin'); ?>;
		right: <?php echo NF_Popups_Customizer::get_value($popup_id,'close_btn_right_margin'); ?>;
	}
	</style>

	<a href="#preview-nf-popup" class="preview-popup-link">Open popup</a>
	<div style="background-color:#fff;min-width:100%;min-height:100%;display:inline-block">
	</div>
	<div class=" nf-popup-<?php echo $popup_id ?> white-popup mfp-hide" id="preview-nf-popup">
	<?php echo $content_before_form; ?>
	    <?php echo do_shortcode( '[ninja_form id='.$ninja_form_id.']' ); ?>
	<?php echo $content_before_form; ?>
	</div>

<?php } else{
	echo 'Please select & save the Ninja Forms first';
}
}

?>


<?php
/*  
 * 2J SlideShow		http://2joomla.net/wordpress
 * Version:           1.2.20 - 95609
 * Author:            2J Team (c)
 * Author URI:        http://2joomla.net/wordpress
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Date:              Sat, 08 Oct 2016 06:23:57 GMT
 */

function jt_cmb2_slider_field( $metakey, $post_id = 0 ) {
	echo jt_cmb2_get_slider_field( $metakey, $post_id );
}

function jt_cmb2_render_slider_field_callback( $field, $value, $object_id, $object_type, $field_type_object ) {
	$value =  $value ? $value : $field->args('default') ;

	$level = $field->args('level') ? 1 : 0 ;

?>
<div class="form-horizontal">
	<div class="form-group">
	    <label class="col-sm-2 control-label" for="<?php echo $field_type_object->_id(); ?>'"><?php echo esc_html(  $field->args('name') ); ?></label>
	    <div class="col-sm-<?php echo $level?'8':'10'; ?>">
		    <?php 
		    echo $field_type_object->input( array(
						'name'  => $field_type_object->_name( ),
						'id'    => $field_type_object->_id( ),
						'value' => (int) $value,
						'data-slider-value' => (int) $value,
						'type'  => 'text',
						'class' => 'small-text twoj_slider',
						'data-slider-min'=> $field->args('min'),
						'data-slider-max'=> $field->args('max'),
						'data-slider-step'=> $field->args('step')
					) ); 
			echo $field->args('addons')?' '.$field->args('addons'):''; ?>
	    </div>
	    <?php if($level){ ?>
			<div class="col-sm-2 twoj-block-premium"><?php echo TWOJ_SLIDESHOW_LABEL_PRO; ?></div>
		<?php } ?>
	</div>
</div>
<?php
}
add_filter( 'cmb2_render_slider', 'jt_cmb2_render_slider_field_callback', 10, 5 );
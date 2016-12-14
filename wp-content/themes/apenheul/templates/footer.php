<footer id="containerfooter" class="footerclass">
  <div class="container">
<!--  	<div class="row">-->
<!--  		--><?php //global $virtue; if(isset($virtue['footer_layout'])) { $footer_layout = $virtue['footer_layout']; } else { $footer_layout = 'fourc'; }
//  			if ($footer_layout == "fourc") {
//  				if (is_active_sidebar('footer_1') ) { ?>
<!--					<div class="col-md-3 col-sm-6 footercol1">-->
<!--					--><?php //dynamic_sidebar('footer_1'); ?>
<!--					</div>-->
<!--            	--><?php //}; ?>
<!--				--><?php //if (is_active_sidebar('footer_2') ) { ?>
<!--					<div class="col-md-3  col-sm-6 footercol2">-->
<!--					--><?php //dynamic_sidebar('footer_2'); ?>
<!--					</div>-->
<!--		        --><?php //}; ?>
<!--		        --><?php //if (is_active_sidebar('footer_3') ) { ?>
<!--					<div class="col-md-3 col-sm-6 footercol3">-->
<!--					--><?php //dynamic_sidebar('footer_3'); ?>
<!--					</div>-->
<!--	            --><?php //}; ?>
<!--				--><?php //if (is_active_sidebar('footer_4') ) { ?>
<!--					<div class="col-md-3 col-sm-6 footercol4">-->
<!--					--><?php //dynamic_sidebar('footer_4'); ?>
<!--					</div>-->
<!--		        --><?php //}; ?>
<!--		    --><?php //} else if($footer_layout == "threec") {
//		    	if (is_active_sidebar('footer_third_1') ) { ?>
<!--					<div class="col-md-4 footercol1">-->
<!--					--><?php //dynamic_sidebar('footer_third_1'); ?>
<!--					</div>-->
<!--            	--><?php //}; ?>
<!--				--><?php //if (is_active_sidebar('footer_third_2') ) { ?>
<!--					<div class="col-md-4 footercol2">-->
<!--					--><?php //dynamic_sidebar('footer_third_2'); ?>
<!--					</div>-->
<!--		        --><?php //}; ?>
<!--		        --><?php //if (is_active_sidebar('footer_third_3') ) { ?>
<!--					<div class="col-md-4 footercol3">-->
<!--					--><?php //dynamic_sidebar('footer_third_3'); ?>
<!--					</div>-->
<!--	            --><?php //}; ?>
<!--			--><?php //} else {
//					if (is_active_sidebar('footer_double_1') ) { ?>
<!--					<div class="col-md-6 footercol1">-->
<!--					--><?php //dynamic_sidebar('footer_double_1'); ?>
<!--					</div>-->
<!--		            --><?php //}; ?>
<!--		        --><?php //if (is_active_sidebar('footer_double_2') ) { ?>
<!--					<div class="col-md-6 footercol2">-->
<!--					--><?php //dynamic_sidebar('footer_double_2'); ?>
<!--					</div>-->
<!--		            --><?php //}; ?>
<!--		        --><?php //} ?>
<!--        </div>-->
        <div class="standard_page_width">
	        <div class="footercredits clearfix">	
	    		<?php if (has_nav_menu('footer_navigation')) :
	        	?><div class="footernav clearfix"><?php 
	              wp_nav_menu(array('theme_location' => 'footer_navigation', 'menu_class' => 'footermenu'));
	            ?></div><?php
	        	endif;?>
	        	<p style="float:left;"><?php if(isset($virtue['footer_text'])) { $footertext = $virtue['footer_text'];} else {$footertext = '[copyright] [the-year] [site-name] [theme-credit]';}
	        		$footertext = str_replace('[copyright]','&copy;',$footertext);
	        		$footertext = str_replace('[the-year]',date('Y'),$footertext);
	        		$footertext = str_replace('[site-name]',get_bloginfo('name'),$footertext);
	        		$footertext = str_replace('[theme-credit]','- ',$footertext);
	        		 echo do_shortcode($footertext); ?></p>
	        	<div id="widget_kadence_social-3" class="widget widget_kadence_social">
		        	<div class="virtue_social_widget">
		      			<a href="https://www.facebook.com/Apenheul/" title="Facebook" target="_blank" data-original-title="Facebook"><img src="/wp-content/uploads/2016/11/facebook-rounded.png" /></a>
		      			<a href="https://twitter.com/Apenheul" title="Twitter" target="_blank" data-original-title="Twitter"><img src="/wp-content/uploads/2016/11/twitter-rounded.png"/></a>
		      			<a href="https://www.youtube.com/user/StichtingApenheul" title="Youtube" target="_blank"  data-original-title="Youtube"><img src="/wp-content/uploads/2016/11/youtube-rounded.png"/></a>
		      		</div>
				</div>	 	 
	    	</div>
	    </div>
  </div>

</footer>

<?php wp_footer(); ?>

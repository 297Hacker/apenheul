<style>
#sitemap_img{
    margin-top:-250px;
    z-index:999!important;
    display:block;
    position: relative;
}

.gradient-content{
   position:absolute;
   display:block;
   top:485px;
   height:50px;
   z-index:99;
   margin:0 auto;
   left:0;
   right:0;
   max-width:948px;
} 

  .gradient-content span{
    color: #ffffff;
    font-size: 14px;
    bottom: 0;
    padding: 20px 5px;
}

.front-page-review{
  display:none;
}

.single-article{
    margin-top: -345px!important;
    z-index: 9999;
    display: block;
    position: relative;
    background-color: #fff;
    border-radius: 5px;
    width: 958px;
    margin:auto;
}

.col-md-4{
  background-color: #ebe7df!important;
}

.entry-title{
  top:-25px!important;
}

.subhead{
  display: none;
}

.postdate{
  display: none;
}

@media (max-width: 496px){
  .gradient-full{
    bottom:325px;
  }
  .gradient-content{
    bottom:234px;
  }
}
</style>
<meta charset="utf-8">
<?php  global $virtue; 
      if(isset($virtue['mobile_switch'])) {
        $mobile_slider = $virtue['mobile_switch']; 
      } else { 
        $mobile_slider = '0';
      }
      if(isset($virtue['choose_slider'])) {
        $slider = $virtue['choose_slider'];
      } else {
        $slider = 'mock_flex';
      }
      if($mobile_slider == '1') {
        $mslider = $virtue['choose_mobile_slider'];
        if ($mslider == "flex") {
          get_template_part('templates/mobile_home/mobileflex', 'slider');
        } else if ($mslider == "video") {
          get_template_part('templates/mobile_home/mobilevideo', 'block');
        } 
      }
      if ($slider == "flex") {
          get_template_part('templates/home/flex', 'slider');
      } else if ($slider == "thumbs") {
          get_template_part('templates/home/thumb', 'slider');
      } else if ($slider == "fullwidth") {
          get_template_part('templates/home/flex', 'slider-fullwidth');
      } else if ($slider == "latest") {
          get_template_part('templates/home/latest', 'slider');
      } else if ($slider == "carousel") {
          get_template_part('templates/home/carousel', 'slider');
      } else if ($slider == "video") {
          get_template_part('templates/home/video', 'block');
      } else if ($slider == "mock_flex") {
          get_template_part('templates/home/mock', 'flex');
      }
      $show_pagetitle = false;
      if(isset($virtue['homepage_layout']['enabled'])){
        $i = 0;
        foreach ($virtue['homepage_layout']['enabled'] as $key=>$value) {
          if($key == "block_one") {
            $show_pagetitle = true;
          }
          $i++;
          if($i==2) break;
        }
      } 
      if($show_pagetitle == true) { ?>
      <div class="gradient-content">
      <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet"> 
        <span><?php get_template_part('templates/page', 'header'); ?></span>
      </div>
        <div id="website_wrapper">
          <div class="front-page-review">
            <div class="review_text">"We hebben met onze klanten een prachtige dag over teambuilding door"</div>
            <div class="rating">
            <img src="/wp-content/uploads/2016/10/5-star.png" style="width:85px!important;" />
            </div>
            <a href="http://vps489.directvps.nl/reviews/"><button class="more_review_btn">Meer reviews</button></a>
          </div>  
         <!-- <div id="homeheader" class="welcomeclass">
          <div class="container">
            
          </div>
        </div> titleclass-->
      <?php } ?>
    <div id="content" class="container homepagecontent">
          <div class="row single-article" itemscope="" itemtype="http://schema.org/BlogPosting">
        <div class="main <?php echo esc_attr( kadence_main_class() ); ?>" role="main">
        <?php while (have_posts()) : the_post(); ?>
            <article <?php post_class(); ?>>
            <?php
             do_action( 'kadence_single_post_before' ); 

            if ($headcontent == 'flex') { ?>
                <section class="postfeat">
                    <div class="flexslider kad-light-wp-gallery loading kt-flexslider" style="max-width:<?php echo esc_attr($slidewidth);?>px;" data-flex-speed="7000" data-flex-anim-speed="400" data-flex-animation="fade" data-flex-auto="true">
                        <ul class="slides">
                        <?php 
                        $image_gallery = get_post_meta( $post->ID, '_kad_image_gallery', true );
                        if(!empty($image_gallery)) {
                            $attachments = array_filter( explode( ',', $image_gallery ) );
                            if ($attachments) {
                                foreach ($attachments as $attachment) {
                                $attachment_src = wp_get_attachment_image_src($attachment , 'full');
                                $caption = get_post($attachment)->post_excerpt;
                                $image = aq_resize($attachment_src[0], $slidewidth, $slideheight, true, false, false, $attachment);
                                if(empty($image[0])) { $image = array($attachment_src[0], $attachment_src[1], $attachment_src[2]); }

                                    echo '<li>';
                                        echo '<a href="'.esc_url($attachment_src[0]).'" data-rel="lightbox">';
                                            echo '<img src="'.esc_url($image[0]).'" width="'.esc_attr($image[1]).'" height="'.esc_attr($image[2]).'" alt="'.esc_attr($caption).'" '.kt_get_srcset_output($image[1], $image[2], $attachment_src[0], $attachment).' itemprop="image"/>';
                                        echo '</a>';
                                    echo '</li>';
                                }
                            }
                        }
                        ?>                            
                        </ul>
                    </div> <!--Flex Slides-->
                </section>
            <?php } else if ($headcontent == 'video') { ?>
                <section class="postfeat">
                    <div class="videofit">
                        <?php echo do_shortcode( get_post_meta( $post->ID, '_kad_post_video', true ) ); ?>
                    </div>
                </section>
            <?php } else if ($headcontent == 'image') {
                    if (has_post_thumbnail( $post->ID ) ) {        
                        $image_id = get_post_thumbnail_id();
                        $image_src = wp_get_attachment_image_src( $image_id, 'full' );
                        $image = aq_resize( $image_src[0], $slidewidth, $slideheight, true, false, false, $image_id); //resize & crop the image
                        if(empty($image[0])) { $image = array($image_src[0], $image_src[1], $image_src[2]); }
                        ?>
                            <div class="imghoverclass postfeat post-single-img" itemprop="image">
                                <a href="<?php echo esc_url($image_src[0]); ?>" data-rel="lightbox" class="lightboxhover">
                                    <img src="<?php echo esc_url($image[0]); ?>"  width="<?php echo esc_attr($image[1]); ?>" height="<?php echo esc_attr($image[2]); ?>" <?php echo kt_get_srcset_output($image[1], $image[2], $image[0], $image_id);?> itemprop="image" alt="<?php the_title(); ?>" />
                                </a>
                            </div>
                        <?php
                    } 
            }  ?>

                <?php
                  /**
                  * @hooked virtue_single_post_meta_date - 20
                  */
                  do_action( 'kadence_single_post_before_header' );
                  ?>
                <header>
                    <?php 
                    /**
                    * @hooked virtue_post_header_title - 20
                    * @hooked virtue_post_header_meta - 30
                    */
                    do_action( 'kadence_single_post_header' );
                    ?>
                </header>

                <div class="entry-content" itemprop="description articleBody">
                    <?php
                    do_action( 'kadence_single_post_content_before' );
                        
                        the_content(); 
                      
                    do_action( 'kadence_single_post_content_after' );
                    ?>
                </div>

                <footer class="single-footer">
                <?php 
                  /**
                  * @hooked virtue_post_footer_pagination - 10
                  * @hooked virtue_post_footer_tags - 20
                  * @hooked virtue_post_footer_meta - 30
                  * @hooked virtue_post_nav - 40
                  */
                  do_action( 'kadence_single_post_footer' );
                  ?>
                </footer>
            </article>
            <?php
            /**
            * @hooked virtue_post_authorbox - 20
            * @hooked virtue_post_bottom_carousel - 30
            * @hooked virtue_post_comments - 40
            */
            do_action( 'kadence_single_post_after' );
            
            endwhile; ?>
        </div>
        <?php 
        do_action( 'kadence_single_post_end' ); 
        ?>
    </div> 

    </div>  <!-- /.main -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>  
    <script type="text/javascript">

    window.addEventListener("scroll",function() { 
       if(window.scrollY > 25) {
          $('.innerdivcallback').slideDown();
       }
       else {
          $('.innerdivcallback').slideUp();
       }
    },false);

    var slideIndex = 0;
    showSlidesSmall();

    function showSlidesSmall() {
        var i;
        var slides = document.getElementsByClassName("mySlides");
        var dots = document.getElementsByClassName("dot_small_slide");
        for (i = 0; i < slides.length; i++) {
           slides[i].style.display = "none";  
        }
        slideIndex++;
        if (slideIndex> slides.length) {slideIndex = 1}    
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace("active", "");
        }
        slides[slideIndex-1].style.display = "block";  
        dots[slideIndex-1].className += " active";
        setTimeout(showSlidesSmall, 3000); // Change image every 3 seconds
      }

      $(document).ready(function () {
          resetForms();
      });

      function resetForms() {
          for (i = 0; i < document.forms.length; i++) {
              document.forms[i].reset();
          }
      }
</script>
<a href="http://vps489.directvps.nl/belmij/">
    <div class="callbackdiv">
        <div class="innerdivcallback">
            <span>Bel mij</span>
            <img src="/wp-content/uploads/2016/08/afbeelding4.jpg"/>
        </div>
    </div>
</a>




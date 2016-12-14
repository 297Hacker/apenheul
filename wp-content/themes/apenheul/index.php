<?php
/*
Template Name: Search Page
*/
?>
<style xmlns="http://www.w3.org/1999/html">
 .front-page-review{
     display:block;
 }


 @media all and (-ms-high-contrast: none), (-ms-high-contrast: active) {
     .gradient-content{
         margin-left:200px;
         text-align: center!important;
     }

 }

  .gradient-content{
   position:absolute;
   display:block;
   top:335px;
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
      if($show_pagetitle == false) { ?>
          <div class="gradient-content">
              <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
              <span><?php get_template_part('templates/page', 'header'); ?></span>
          </div>
          <div id="website_wrapper">
              <div class="container" style="padding: 0px 70px;">
                  <div class="row">
                      <div class="banner-wrapper-review">
                          <div class="container">
                              <div class="standard_page_width">
                                  <div class="row">
                                      <div class="front-page-review">
                                          <div class="review_text">"We hebben met onze klanten een prachtige dag over teambuilding door"</div>
                                          <div class="rating">
                                              <img src="/wp-content/uploads/2016/10/5-star.png" style="width:85px!important;" />
                                          </div>
                                          <a href="/reviews/"><button class="more_review_btn">Meer reviews</button></a>
                                      </div>
                                  </div>
                              </div>
                          </div>

                      </div>

                  </div>
              </div>
          </div>
      <?php } ?>
    <div id="content" class="container homepagecontent">
        <div class="result_content1">
                <?php get_search_form(); ?>
                <section>
              <div class="row">
                  <div class="main col-lg-12 result-content <?php echo esc_attr(kadence_main_class()); ?>" role="main">
                    <div class="entry-content" itemprop="mainContentOfPage">

                <?php if (!have_posts()) : ?>
                <div class="alert">
                  <?php _e('Sorry, no results were found.', 'virtue'); ?>
                </div>
              <?php endif; ?>

              <?php while (have_posts()) : the_post(); ?>
                <?php get_template_part('templates/content', get_post_format()); ?>
              <?php endwhile; ?>

              <?php //Page Navigation
                if ($wp_query->max_num_pages > 1) :
                  virtue_wp_pagenav();
                endif; ?>
                    </div>
                  </div>
              </div>
                </section>
        </div>
  </div> <!-- /.main -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>  
    <script type="text/javascript">
        window.addEventListener("scroll",function() {
            if( $(window).scrollTop() > 25) {
                $('.innerdivcallback').slideDown();
            }
            else {
                $('.innerdivcallback').slideUp();
            }
        },false);
        console.log($(window).scrollTop());
</script>
<a href="/belmij/">
    <div class="callbackdiv">
        <div class="innerdivcallback">
            <span>bel mij</span>
            <img style="border-radius:0px!important;" src="/wp-content/uploads/2016/08/afbeelding4.jpg"/>
        </div>
    </div>
</a>
<?php get_search_form(); ?>

<?php
global $query_string;

$query_args = explode("&", $query_string);
$search_query = array();

if( strlen($query_string) > 0 ) {
  foreach($query_args as $key => $string) {
    $query_split = explode("=", $string);
    $search_query[$query_split[0]] = urldecode($query_split[1]);
  } // foreach
} //if

?>

   <!-- /.main -->
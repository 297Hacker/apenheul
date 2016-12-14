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
                <div id="homeheader" class="welcomeclass">
                    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
                    <div class="container">
                        <?php get_template_part('templates/page', 'header'); ?>
                    </div>
                </div><!--titleclass-->
            <?php } ?>
    <!--review ratting -->
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
    <!-- start gradient slide -->
    <div class="gradient-full front-gradient-full"></div>
    <div class="front_page_middle"><div class="gradient-content front-gradient"><span id="slide_title1">De St@art</span><span id="slide_title2">Kambizuri</span><a href="/offerte/"><button class="btn_orange_front" style="color:#fff;">Informatie aanvragen</button></a></div></div> <!-- end gradient slide -->
    <div id="content" class="container homepagecontent real-front">
           <div class="row" style="margin-top: -25px!important;">
              <div class="main <?php echo esc_attr(kadence_main_class()); ?>" role="main">
              <div class="entry-content" itemprop="mainContentOfPage">

              <?php if(isset($virtue['homepage_layout']['enabled'])) {
                  $layout = $virtue['homepage_layout']['enabled'];
                } else {
                    $layout = array("block_one" => "block_one", "block_four" => "block_four");
                }

                if ($layout):

                foreach ($layout as $key=>$value) {

                    switch($key) {

                        case 'block_one':
                               if($show_pagetitle == false) {?>
                              <div id="homeheader" class="welcomeclass">
                                    <?php get_template_part('templates/page', 'header'); ?>
                                </div><!--titleclass-->
                            <?php }
                        break;
                        case 'block_four':
                            if(is_home()) {
                                    if(kadence_display_sidebar()) {
                                        $display_sidebar = true;
                                        $fullclass = '';
                                    } else {
                                        $display_sidebar = false;
                                        $fullclass = 'fullwidth';
                                    }
                                    if(isset($virtue['home_post_summery']) and ($virtue['home_post_summery'] == 'full')) {
                                        $summery = "full";
                                        $postclass = "single-article fullpost";
                                    } else {
                                        $summery = "summery";
                                        $postclass = "postlist";
                                    } ?>

                                <div class="homecontent <?php echo esc_attr($fullclass); ?>  <?php echo esc_attr($postclass); ?> clearfix home-margin">
                                    <?php while (have_posts()) : the_post();
                                              if($summery == 'full') {
                                                if($display_sidebar){
                                                    get_template_part('templates/content', 'fullpost');
                                                } else {
                                                    get_template_part('templates/content', 'fullpostfull');
                                                }
                                            } else {
                                                if($display_sidebar){
                                                     get_template_part('templates/content', get_post_format());
                                                 } else {
                                                     get_template_part('templates/content', 'fullwidth');
                                                 }
                                            }
                                        endwhile;

                                        //Page Navigation
                                        if ($wp_query->max_num_pages > 1) :
                                            virtue_wp_pagenav();
                                        endif; ?>
                                </div>
                            <?php } else { ?>
                                <div class="homecontent clearfix home-margin">
                                    <?php get_template_part('templates/content', 'page'); ?>
                                </div>
                            <?php }
                        break;
                        case 'block_five':
                                get_template_part('templates/home/blog', 'home');
                        break;
                        case 'block_six':
                                get_template_part('templates/home/portfolio', 'carousel');
                        break;
                        case 'block_seven':
                                get_template_part('templates/home/icon', 'menu');
                        break;
                        case 'block_twenty':
                                get_template_part('templates/home/icon', 'menumock');
                        break;
                    }
                }
            endif; ?>
            </div>
         </div>
        </div>
    </div>
    <!-- /.main -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script type="text/javascript">

        if ($(window).width() > 768) {
        $('.innerdivcallback_mobile').css({"display": "none"});
        };

        window.addEventListener("scroll",function() {
            if( $(window).scrollTop() > 25) {
                $('.innerdivcallback').slideDown();
            }
            else {
                $('.innerdivcallback').slideUp();
            }
        },false);
        console.log($(window).scrollTop());

        window.addEventListener("scroll",function() {
            if( $(window).scrollTop() > 25) {
                $('.innerdivcallback_mobile').slideDown();
            }
            else {
                $('.innerdivcallback_mobile').slideUp();
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

<a href="/belmij/">
    <div class="callbackdiv">
        <div class="innerdivcallback_mobile">
            <img src="/wp-content/uploads/2016/12/old-handphone.png"/>
        </div>
    </div>
</a>


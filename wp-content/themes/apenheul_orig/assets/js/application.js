$(document).ready(function () {
    $(document).on('init.slides', function () {
        $('.loading-container').fadeOut(function () {
            $(this).remove();
        });
    });

    $('#slides').superslides();

    //document.ontouchmove = function (e) {
    //    e.preventDefault();
    //};

    $('#slides').on('mouseenter', function () {
        $(this).superslides('stop');
        console.log('Stopped');
    });
    $('#slides').on('mouseleave', function () {
        $(this).superslides('start');
        console.log('Started');
    });

    if (jQuery().magnificPopup) {
        $('.popup-gallery').magnificPopup({
            delegate: 'a',
            type: 'image',
            tLoading: 'Loading image #%curr%...',
            mainClass: 'mfp-img-mobile',
            gallery: {
                enabled: true,
                navigateByImgClick: true,
                preload: [0, 1]
            },
            image: {
                tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
                titleSrc: function (item) {
                    return item.el.attr('title');
                }
            }
        });
    }
});

$(document).ready(function () {
    if (jQuery().scrollable) {

        $("#chained").scrollable({
            circular: true,
            mousewheel: true,
            onSeek: function () {
                $('.caption').fadeIn('fast');
            },
            onBeforeSeek: function () {
                $('.caption').fadeOut('fast');
            }
        }).navigator().autoscroll({
            interval: 6000
        });
    }
});

var triggers = $('ul.triggers li');
var images = $('ul.images li');
var lastElem = triggers.length-1;
var mask = $('.mask ul.images');
var imgWidth = images.width();
var target;

triggers.first().addClass('selected');
mask.css('width', imgWidth*(lastElem+1) +'px');

function sliderResponse(target) {
    mask.stop(true,false).animate({'left':'-'+ imgWidth*target +'px'},300);
    triggers.removeClass('selected').eq(target).addClass('selected');
}

triggers.click(function() {
    if ( !$(this).hasClass('selected') ) {
        target = $(this).index();
        sliderResponse(target);
        resetTiming();
    }
});
$('.next').click(function() {
    target = $('ul.triggers li.selected').index();
    target === lastElem ? target = 0 : target = target+1;
    sliderResponse(target);
    resetTiming();
});
$('.prev').click(function() {
    target = $('ul.triggers li.selected').index();
    lastElem = triggers.length-1;
    target === 0 ? target = lastElem : target = target-1;
    sliderResponse(target);
    resetTiming();
});
function sliderTiming() {
    target = $('ul.triggers li.selected').index();
    target === lastElem ? target = 0 : target = target+1;
    sliderResponse(target);
}
var timingRun = setInterval(function() { sliderTiming(); },5000);
function resetTiming() {
    clearInterval(timingRun);
    timingRun = setInterval(function() { sliderTiming(); },5000);
}

var thumbnails = document.getElementsByClassName("thumb");
var mainImage = document.getElementById("mainImage");

for (index in thumbnails)
{
    thumbnails[index].onclick = function () {
        // Depending on the way used use on of the following:
        mainImage.src = this.src.replace('.jpg', 'Main.jpg');
        // Or
        // mainImage.src = this.src.replace('thumb.jpg', '.jpg');
        // Or
        // mainImage.src = this.src.replace('/images/small/', '/images/large/');
    }
}

$(document).ready(function(){
    $("#searchlink").click(function(){
        $(".searchform").toggle();
        $(".search-box").toggleClass("search-active");
    });
});

$(".hamburger").on("click", function() {
    if($(this).hasClass('active'))
    {
        $("nav .navigation").hide();
        $(this).removeClass('active');
    }
    else {
        $("nav .navigation").show();
        $(this).addClass('active');
    }
});




$(window).resize(function(){

    if($(this).width() > 960)
    {
        $("nav .navigation").show();
    }
    else {
        if(!$(".hamburger").hasClass('active'))
        {
            $("nav .navigation").hide();
        }
    }
});

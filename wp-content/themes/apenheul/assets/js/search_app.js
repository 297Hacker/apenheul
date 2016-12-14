$(document).ready(function(){
    $("#searchlink").click(function(){
        $(".searchform").toggle();
        $(".search-box").toggleClass("search-active");
    });
});
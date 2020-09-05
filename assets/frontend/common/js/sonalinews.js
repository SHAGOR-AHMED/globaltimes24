//ajax loader by class
$(document).ready(function(){
    $(document).ajaxStart(function(){
       $(".ajaxLoader").fadeIn('fast');
    });
    $(document).ajaxComplete(function(){
        $(".ajaxLoader").fadeOut('fast');
    });
});
/* js for menu*/
$(function(){
window.prettyPrint && prettyPrint()
$(document).on('click', '.yamm .dropdown-menu', function(e){e.stopPropagation()})
});
$(document).ready(function(){
	// country load
	$("#country-news").hover(function(){$(".contentArea").load("http://www.sonalinews.com/archives/menu/countryMenu-news.html");});
	$("#dhaka-news").hover(function(){$(".contentArea").load("http://www.sonalinews.com/archives/menu/dhakaMenu-news.html");});
	$("#chittagong-news").hover(function(){$(".contentArea").load("http://www.sonalinews.com/archives/menu/chittagongMenu-news.html");});
	$("#rajshahi-news").hover(function(){$(".contentArea").load("http://www.sonalinews.com/archives/menu/rajshahiMenu-news.html");});
	$("#mymensingh-news").hover(function(){$(".contentArea").load("http://www.sonalinews.com/archives/menu/mymensinghMenu-news.html");});
	$("#khulna-news").hover(function(){$(".contentArea").load("http://www.sonalinews.com/archives/menu/khulnaMenu-news.html");});
	$("#barishal-news").hover(function(){$(".contentArea").load("http://www.sonalinews.com/archives/menu/barisalMenu-news.html");});
	$("#sylhet-news").hover(function(){$(".contentArea").load("http://www.sonalinews.com/archives/menu/sylhetMenu-news.html");});
	$("#rangpur-news").hover(function(){$(".contentArea").load("http://www.sonalinews.com/archives/menu/rangpurMenu-news.html");});
	// sports subCat news load
	$("#sports-news").hover(function(){$(".contentArea").load("http://www.sonalinews.com/archives/menu/sportsMenu-news.html");});
	$("#cricket-news").hover(function(){$(".contentArea").load("http://www.sonalinews.com/archives/menu/cricketMenu-news.html");});
	$("#football-news").hover(function(){$(".contentArea").load("http://www.sonalinews.com/archives/menu/footballMenu-news.html");});
	$("#others-news").hover(function(){$(".contentArea").load("http://www.sonalinews.com/archives/menu/otherSportsMenu-news.html");});
	// bibidho news load
	$("#bibidho-news").hover(function(){$(".contentArea").load("http://www.sonalinews.com/archives/menu/literatureMenu-news.html");});
	$("#media-news").hover(function(){$(".contentArea").load("http://www.sonalinews.com/archives/menu/mediaMenu-news.html");});
	$("#literature-cultural-news").hover(function(){$(".contentArea").load("http://www.sonalinews.com/archives/menu/literatureMenu-news.html");});
	$("#probash-news").hover(function(){$(".contentArea").load("http://www.sonalinews.com/archives/menu/propashMenu-news.html");});
	$("#health-news").hover(function(){$(".contentArea").load("http://www.sonalinews.com/archives/menu/healthMenu-news.html");});
	$("#law-news").hover(function(){$(".contentArea").load("http://www.sonalinews.com/archives/menu/lawMenu-news.html");});
	$("#feature").hover(function(){$(".contentArea").load("http://www.sonalinews.com/archives/menu/featureMenu-news.html");});
	$("#womens-news").hover(function(){$(".contentArea").load("http://www.sonalinews.com/archives/menu/womenMenu-news.html");});
	$("#liberationWar-news").hover(function(){$(".contentArea").load("http://www.sonalinews.com/archives/menu/liberationMenu-news.html");});
	$("#relgion-news").hover(function(){$(".contentArea").load("http://www.sonalinews.com/archives/menu/religionMenu-news.html");});
	$("#education-news").hover(function(){$(".contentArea").load("http://www.sonalinews.com/archives/menu/educationMenu-news.html");});
	$("#probash-news").hover(function(){$(".contentArea").load("http://www.sonalinews.com/archives/menu/probashMenu-news.html");});
	$("#job-news").hover(function(){$(".contentArea").load("http://www.sonalinews.com/archives/menu/jobMenu-news.html");});
	$("#from-facebook").hover(function(){$(".contentArea").load("http://www.sonalinews.com/archives/menu/facebookMenu-news.html");});
});
//nav manu fixed===============================================
console.log("Default loaded");
$(window).scroll(function(){
    //console.log("Scrool loaded");
    var spx = 250;

    if( $(document).scrollTop() > spx ){
        // console.log("scrollDown");
        $('nav.navbar').addClass('navbar-fixed-top container menu-container');
    }
    if( $(document).scrollTop() < spx ){
        $('nav.navbar').removeClass('navbar-fixed-top container menu-container');
    }
});
//marquee
$(function(){
	var $mwo = $('.marquee-section');
//        $('.marquee').marquee();
	$('.marquee-section').marquee({
		speed: 20000,
		gap: 50,
		delayBeforeStart: 0,
		direction: 'left',
		duplicated: true,
		pauseOnHover: true
	});
	//pause and resume links
	// $('.pause').click(function(e){
	// 	e.preventDefault();
	// 	$mwo.trigger('pause');
	// });
	// $('.resume').click(function(e){
	// 	e.preventDefault();
	// 	$mwo.trigger('resume');
	// });
	// //toggle
	// $('.toggle').hover(function(e){
	// 	$mwo.trigger('pause');
	// },function(){
	// 	$mwo.trigger('resume');
	// })
});


// $(document).ready(function() {
// 	$(".fancyBox").fancybox();
// });
// $(document).ready(function(){
    
//     var clickEvent = false;
//     $('#top-slider').carousel({
//         interval:   4000    
//     }).on('click', '.list-group li', function() {
//             clickEvent = true;
//             $('.list-group li').removeClass('active');
//             $(this).addClass('active');     
//     }).on('slid.bs.carousel', function(e) {
//         if(!clickEvent) {
//             var count = $('.list-group').children().length -1;
//             var current = $('.list-group li.active');
//             current.removeClass('active').next().addClass('active');
//             var id = parseInt(current.data('slide-to'));
//             if(count == id) {
//                 $('.list-group li').first().addClass('active'); 
//             }
//         }
//         clickEvent = false;
//     });
// })
// $(window).load(function() {
//     var boxheight = $('#top-slider .carousel-inner').innerHeight();
//     var itemlength = $('#top-slider .item').length;
//     var triggerheight = Math.round(boxheight/itemlength+1);
//     $('#top-slider .list-group-item').outerHeight(triggerheight);
// });
// end top news slider
//unknown script
!function (d, s, id) {
	var js, fjs = d.getElementsByTagName(s)[0];
	if (!d.getElementById(id)) {
		js = d.createElement(s);
		js.id = id;
		js.src = "//platform.twitter.com/widgets.js";
		fjs.parentNode.insertBefore(js, fjs);
	}
}(document, "script", "twitter-wjs");
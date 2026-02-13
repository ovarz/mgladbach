function ClosePopup(){
  $('.open-sticky').removeClass('show-sticky');
  $('.rancak-popup').fadeOut('fast');
}



function sticky_maininfo(){
  var $window = $(window);
  function checkWidth(){
    var windowsize = $window.width();
    if (windowsize > 1000){
      $window.scroll(function(){
		var sc = $window.scrollTop();
        var right_container_height = $('.rancak-sticky-sidebar').outerHeight();
		if(sc >= 0){
          $('.rancak-sticky-sidebar').css({
			'top':'calc(100% - ' + right_container_height + 'px - 21px)' //--section-space-normal
          });
		}
      });
    }
  }
  checkWidth();
  //$(window).resize(checkWidth);
}



$(document).ready(function(){
  "use strict";
  sticky_maininfo();
});
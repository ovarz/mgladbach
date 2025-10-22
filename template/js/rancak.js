function ClosePopup(){
  $('.open-sticky').removeClass('show-sticky');
  $('.rancak-popup').fadeOut('fast');
}



function open_sticky(){
  $('.open-sticky').click(function(){
    var get_id = $(this).attr('aria-popup-button');
	$('.open-sticky[aria-popup-button=' + get_id +']').toggleClass('show-sticky');
	$('.open-sticky').not('.open-sticky[aria-popup-button=' + get_id +']').removeClass('show-sticky');
    $('.rancak-popup[aria-popup-box=' + get_id +']').slideToggle('fast');
    $('.rancak-popup').not('[aria-popup-box=' + get_id +']').slideUp('fast');
	return false;
  });	
  
  $('.rancak-popup-overlay, .rancak-popup-close').click(function(){
    ClosePopup();
  });
}



function change_lang(){
  $('.choice-lang').click(function(){
    var get_lang = $(this).attr('aria-lang');
	$('body').removeClass();
	$('body').addClass('lang-' + get_lang);
	return false;
  });	
}



$(document).ready(function(){
  "use strict";
  open_sticky();
  change_lang();
});
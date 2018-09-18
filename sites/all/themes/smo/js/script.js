// Using the closure to map jQuery to $. 
(function ($) {
  // Store our function as a property of Drupal.behaviors.
	Drupal.behaviors.smo = {
		attach: function (context, settings) {
			 // Make sure that the default currency is processed
	     //get_converter();
	     $('#edit-converter-currency').change(function(){
				  var rate = $(this).val();
				  window.location = 'price-list?rate=' + rate;	
			 });
			 
			 // add custom class	
			 $('.form-type-radios input').each(function(){
          $('input.error').parents('.form-type-radios').addClass('custom_error');	
       });
       $('.form-type-textfield input').each(function(){
          $('input.error').parent('.form-type-textfield').addClass('custom_error');	
       });
       $('.form-type-checkbox input').each(function(){
          $('input.error').parent('.form-type-checkbox').addClass('custom_error');	
       });
       $('.form-type-textarea input').each(function(){
          $('input.error').parent('.form-type-textarea').addClass('custom_error');	
       });
       $('ul.term-reference-tree-level li .term-reference-tree-button').siblings('.form-type-checkbox').children('.form-checkbox').click(function(){
				  $(this).attr('checked',false); 
			 });
		}
	};
}(jQuery));


function gotoblock(id,name) {
	jQuery("div."+name+"-content-page").find('span').removeClass('active');
	jQuery('span#'+name+'-page-number-'+id).addClass('active');
	
	jQuery("div#"+name+"-content").find('div[id^='+name+'-]').hide();
	jQuery("div[id="+name+"-"+id+"]").fadeIn("slow");
}

function get_converter() {
	var cur_value = jQuery('#convert').html();
	var value = cur_value.split('<br>');
	var cur_unit = jQuery('#selected_currency_2').text();
	var cur_symbol = jQuery('#selected_currency_symbol').text();
	
	if(cur_value != ""){	
		jQuery('#edit-submitted-currency-value').val(value[1]);
	}
	if(cur_unit != ""){
		jQuery('#edit-submitted-currency-format').val(cur_unit + " " + cur_symbol);
	}
}

/*function dc_ld() { 
	var dc_dlay = document.createElement("script"); 
	dc_dlay.setAttribute('type', 'text/javascript'); 
	dc_dlay.setAttribute('language', 'javascript'); 
	dc_dlay.setAttribute('id', 'dcdlay'); 
	dc_dlay.setAttribute("src", "http"+(window.location.protocol.indexOf("https:")==0?"s://converter":"://converter2")+".dynamicconverter.com/accounts/13/13957"+"."+"js"); 
	document.getElementsByTagName("head")[0].appendChild(dc_dlay); 
} setTimeout('dc_ld()',10);*/


(function ($) {
	jQuery(function() {
		jQuery( "#accordion" ).accordion({
			 heightStyle: "content"
		});
	});
}(jQuery));

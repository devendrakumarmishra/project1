$(document).ready(function(){

	$.preloadCssImages();
	// Make sure that the default currency is processed
	get_converter();
	//search
	$("#edit-search-block-form-1").val("Search");

	$("#edit-search-block-form-1").focus(function () {
	$(this).val('');
		});
	$('#edit-search-block-form-1').blur(function() {
	$(this).val("Search"); });
	$("#block-nice_menus-1 a.active").click(function(e){
	e.preventDefault();

	});
	
	//livezilla
	if(($('#lz-startChat').hasClass('lz-online') || $('#lz-startChat').hasClass('lz-offline')) == false){
		$('#lz-startChat>img').css('display','block');
	}
		
	
	//testimonial homepage content slider
	if($('.contentWrap').size()>0){
		$('.contentWrap').liteSlider({
			content : '.content-testimonial',		// The panel selector. Can be a list also. eg:li
			width : 260,			// Width of the slider
			height : 350,			// Height of the slider
			autoplay : true,		// Autoplay the slider. Values, true & false
			delay : 6,			// Transition Delay. Default 3s
			buttonsClass : 'buttons',	// Button's class
			activeClass : 'active',		// Active class
			controlBt : '.control',		// Control button selector
			playText : 'Play',		// Play text
			pauseText : 'Stop'		// Stop text
		});
	}
	$.history.init(function(hash){
		if(hash == ""){
			procedure_history("procedure_overview");
		}
		else{
			procedure_history(hash);
		}
	});
	
	//converter
	
	

	
	//DOCTOR LEFT MENU
	if($('.dental-surgeons li.dental-active').html() != null){
		$('.plastic-surgeons ul').hide();
	}	
	if($('.plastic-surgeons li.plastic-active').html() != null){
		$('.dental-surgeons ul').hide();
	}
	
	$('#dental-surgeons-title').click(function(){
		$('.dental-surgeons ul').slideToggle("slow");
		$('.plastic-surgeons ul').hide();
	});
	$('#plastic-surgeons-title').click(function(){
		$('.plastic-surgeons ul').slideToggle("slow");
		$('.dental-surgeons ul').hide();
	});
	
	
	//procedure leet menu
	
	/*if($('.Non- li.Non-active').html() != null){
		$('.Surgical- ul').hide();
		$('.Dental ul').hide();
	}
	if($('.Surgical li.Surgical-active').html() != null){
		$('.Non- ul').hide();
		$('.Dental ul').hide();
	}	
	if($('.Dental li.Dental-active').html() != null){
		$('.Non- ul').hide();
		$('.Surgical- ul').hide();
	}*/
	if($('.Non-surgical a.active').html() !=null){
	$('.node-type-procedure .Surgical ul').slideUp(0);
	$('.node-type-procedure .Dental ul').slideUp(0);
	}
	if($('.Surgical a.active').html() !=null){
	$('.node-type-procedure .Non-surgical ul').slideUp(0);
	$('.node-type-procedure .Dental ul').slideUp(0);
	}
	if($('.Dental a.active').html() !=null){
	$('.node-type-procedure .Non-surgical ul').slideUp(0);
	$('.node-type-procedure .Surgical ul').slideUp(0);
	}
	
	$('.node-type-procedure .Non-surgical').live('click',function(){
		$('.Non-surgical ul').slideDown("slow");
		$('.Surgical ul').slideUp("slow");
		$('.Dental ul').slideUp("slow");
	});
	$('.node-type-procedure .Surgical').live('click',function(){
		$('.Surgical ul').slideDown("slow");
		$('.Non-surgical ul').slideUp();
		$('.Dental ul').slideUp();
	});
	$('.node-type-procedure .Dental').live('click',function(){
		$('.Dental  ul').slideDown("slow");
		$('.Non-surgical ul').slideUp();
		$('.Surgical ul').slideUp();
	});
	
	//*** procedure **//
	$('.procedure-testimonial-longbody').hide();
	
	$('.view-more-a').click(function(){
		$(this).parent().siblings(".video-testimonial-info").children(".testimonial-body-main").children(".procedure-testimonial-longbody").slideToggle("slow");
		if($(this).text()== "view more"){
			$(this).text("view less");
		}
		else if($(this).text()== "view less"){
			$(this).text("view more");
		}
		return false;//Prevent the browser jump to the link anchor
	});
	
	//FAQ
	$('a.faq-question').addClass('a-open');
	$('a.faq-question').click(function(){
		$(this).toggleClass('a-open');								   
		$(this).parent().siblings(".procedure-faq-a").slideToggle("fast");		   
	});
	
	/*---sub menu inactive ---*/
	$('li.menu-314').addClass('menu-disable');
	$('li.menu-316').addClass('menu-disable');
	$('li.menu-314 a').attr('href','javascript:void(0);');
	$('li.menu-316 a').attr('href','javascript:void(0);');

	//facilities
	if($('.node-type-facilities').size()>0){
		$('#block-stu_destionationmenu-0 ul.menu-group').each(function(){
			$(this).find('li:first').css('border-top','none');
		});
		$('#block-stu_destionationmenu-0 .content p:not(:first)').css('padding-top','25px');
		
		/*---hide "Useful links" if no item---*/
		if(!$('#block-block-10 .content .view-facilities-useful-links .view-content .custom-view-item').html()){
			$('#block-block-10 h2').hide();
		}
	}
	//destination
	if($('.page-destinations').size()>0){
		if(!$('#block-block-9 .content .view-destinations-useful-links .view-content .custom-view-item').html()){
			$('#block-block-9 h2').hide();
		}
	}
	//doctor
	if($('.node-type-doctor').size()>0){
		if(!$('#block-block-11 .content .view-Doctor-relate-Package .view-content .custom-view-item').html()){
			$('#block-block-11 h2').hide();
		}
	}
	//procedure	
	if($('.node-type-procedure').size()>0){
		if(!$('#block-block-12 .content .view-procedure-related-package .view-content .custom-view-item').html()){
			$('#block-block-12 h2').hide();
		}
		
		//actve li
		$('#block-block-15 .procedure-item li').each(function(){
			if($(this).find('a').attr('class') == 'active'){
				$(this).addClass('active');
			}
		});
	}
	
	//print
	if($('.print-content .precedure-page-bottom,.print-content .doctor-page-bottom').size()>0){
		$('.precedure-page-bottom,.doctor-page-bottom').hide();
	}
	
	//contact us
	if($('.page-contact-contact-us').size()>0){

		$('.region-sidebar-first').css('padding-top','0px');
		$('.two-sidebars #content').css('background-image','none');
		$('.two-sidebars #content').css('width','620px');
		$('.two-sidebars #content .section').css('margin-left','125px');
		$('#contact-mail-page #edit-submit').val('Send');
		//$('fieldset.captcha legend').css('display','none');
		$('div.captcha').prepend('<div class="secure-info">Enter both words below, separeted by space.</div>');
		$('div.captcha').prepend('<label id="edit-security">Security Check: <span title="This field is required." class="form-required">*</span></label>');
		
		$('#edit-name,#edit-mail,#edit-subject').attr('size','50');
		
		$('#edit-name-wrapper').prepend('<div class="contact-head">Leave us a message:</div>');
		$('#edit-subject-wrapper').prepend('<div class="email-info">We confirm that your email address will be  only used for handing <br/>this request, and it will be not be made available to any third party.</div>');
		$('input#edit-submit').attr('style','display:block');
		
		//console.log($('input#edit-submit').attr());
	}
	
	
	////////////////////////////////////////////////////////////////////////////////////////////////////////
	//**********************************ENQUIRY***********************************************************//
	////////////////////////////////////////////////////////////////////////////////////////////////////////
    // Default values on page load
	
	var surgical = $('#edit-submitted-plastic-surgery-nid').val();
	check_boxes(surgical, 'input');
	plastic_select();
	var non_surgical = $('#edit-submitted-non-surgical-nid').val();
	check_boxes(non_surgical, 'input');
	non_surgical_select();
	
	var dental_nids = $('#edit-submitted-dental-procedures-nid').val();
	check_boxes(dental_nids, 'option', '#webform-dental-procedure', 1, function() {
	  dental_select();
	});
	var dental_teeth = $('#edit-submitted-a-tooth-teeth-selected').val();
	dental_boxes(dental_teeth, 1);
	
	var dental_nids2 = $('#edit-submitted-dental-procedures-nid-2').val();
	if (dental_nids2 != '') {
	  $('#enquiry-dental-procedure-2').show();
	  check_boxes(dental_nids2, 'option', '#webform-dental-procedure-2', 2, function() {
	    dental2_select();
	  });
	}
	var dental_teeth2 = $('#edit-submitted-a-tooth-teeth-selected-2').val();
	dental_boxes(dental_teeth2, 2);
	
	var dental_nids3 = $('#edit-submitted-dental-procedures-nid-3').val();
	if (dental_nids3 != '') {
	  $('#enquiry-dental-procedure-3').show();
	  check_boxes(dental_nids3, 'option', '#webform-dental-procedure-3', 3, function() {
	    dental3_select();
	  });
	}
	var dental_teeth3 = $('#edit-submitted-a-tooth-teeth-selected-3').val();
	dental_boxes(dental_teeth3, 3);
	
	var surgery_packages = $('#edit-submitted-packages-nid').val();
	check_boxes(surgery_packages, 'input');
	packages_select();
	// run these near the end to ensure other processes are complete
	
	////////////////////////////////////////////////////////////////////////////////////////////////////////
	$('#liposuction-procedure').hide();
	$('#webform-plastic-bt').click(function (e) {
		$('#webform-plastic-procedure').modal({maxWidth:980,minWidth:635,maxHeight:800,minHeight:450});
		return false;
	});
	$('#webform-non-surgical-bt').click(function (e) {
		$('#webform-non-surgical-procedure').modal({maxWidth:980,minWidth:635,maxHeight:500,minHeight:450});
		return false;
	});
	//////////////////////////////////////////////////////////
	$('#webform-dental-bt').click(function (e) {
		$('#webform-dental-procedure').modal({minWidth:950,maxHeight:510});
		return false;
	});
	$('#webform-dental-bt-2').click(function (e) {
		$('#webform-dental-procedure-2').modal({minWidth:950});
		return false;
	});
	$('#webform-dental-bt-3').click(function (e) {
		$('#webform-dental-procedure-3').modal({minWidth:950});
		return false;
	});
	////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	$('#webform-package-bt').click(function (e) {
		$('#webform-package').modal({minWidth:400,minHeight:300});
		return false;
	});
	
	//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	$('#plastic-select').click(function (e) {

		//$('#dental-procedure-teeth').html(newString);
		newString_nid = plastic_select();
		$('#edit-submitted-plastic-surgery-nid').val(newString_nid);
		
		$.modal.close();
		
		$('#webform-plastic-bt').text("Re-Select");
		$('#webform-plastic-bt').css('padding','0px 10px');
		
		return false;
	});
	$('.plastic_procedure#147').bind('click', function (e) {
	    if ($(this).is(':checked')) {
		  $('#liposuction-procedure').show();
		  $('.simplemodal-wrap').css('overflow', 'scroll');
          $('.plastic_procedure#149').removeAttr('checked');	  
          $('.plastic_procedure#150').removeAttr('checked');	  
        }
        else {
		  $('#liposuction-procedure').hide();
          $('.simplemodal-wrap').css('overflow', 'visible');
        }		  
	});
	$('.plastic_procedure#149').bind('click', function (e) {
	    if ($(this).is(':checked')) {
		  $('#liposuction-procedure').show();
		  $('.simplemodal-wrap').css('overflow', 'scroll');
          $('.plastic_procedure#147').removeAttr('checked');		  
          $('.plastic_procedure#150').removeAttr('checked');		  
          		  
        }
        else {
		  $('#liposuction-procedure').hide();
          $('.simplemodal-wrap').css('overflow', 'visible');
        }		  
	});
	$('.plastic_procedure#150').bind('click', function (e) {
	    if ($(this).is(':checked')) {
		  $('#liposuction-procedure').show();	
          $('.simplemodal-wrap').css('overflow', 'scroll');		  
          $('.plastic_procedure#147').removeAttr('checked');		  
          $('.plastic_procedure#149').removeAttr('checked');		  
        }
        else {
		  $('#liposuction-procedure').hide();
          $('.simplemodal-wrap').css('overflow', 'visible');
        }		  
	});
	//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	$('#non-surgical-select').click(function (e) {
	    newString_nid = non_surgical_select();
		$('#edit-submitted-non-surgical-nid').val(newString_nid);

		$.modal.close();
		
		$('#webform-plastic-bt').text("Re-Select");
		$('#webform-plastic-bt').css('padding','0px 10px');
		
		return false;
	});
	//////////////////////////////////////////////////////////////////////////////////////////////
	$('#webform-dental-close-1').hide();
	$('#webform-dental-close-2').hide();
	$('#webform-dental-close-3').hide();
	//////////////////////////////////////////////////////////////////////////////////////////////
	$('#dental_procedure').change(function () {
	  var option = $(this).val();
	  if (option == 'Dental Bridge') {
	    $('#dental_procedure_msg').html('Select missing teeth only');
	  }
	  else $('#dental_procedure_msg').empty();
	});
	$('#dental-select').click(function (e) {
		newString = dental_select();
		
		if($("input[name$='dental_select_all']:checked").val()) {
			$('#edit-submitted-a-tooth-teeth-selected').val('all');
		}
		else {
			$('#edit-submitted-a-tooth-teeth-selected').val(newString);
		}

		$('#webform-dental-close-1').show();
		$('#webform-dental-bt').text("Re-Select");
		$('#webform-dental-bt').css('padding','0px 10px');
		$('#webform-dental-add').show();
		
		$.modal.close();
		return false;
	});
	$('#webform-dental-procedure .dental-select-all').change(function (e) {
	  if ('#webform-dental-procedure .dental-select-all:checked') {
	    $('#webform-dental-procedure .tooth').attr('checked', true);
	  }
	  else {
  	    $('#webform-dental-procedure .tooth').attr('checked', false);
      }	  
	});
	$('#webform-dental-procedure-2 .dental-select-all').change(function (e) {
	  if ('#webform-dental-procedure-2 .dental-select-all:checked') {
	    $('#webform-dental-procedure-2 .tooth').attr('checked', true);
	  }
	  else {
  	    $('#webform-dental-procedure-2 .tooth').attr('checked', false);
      }	  
	});
	$('#webform-dental-procedure-3 .dental-select-all').change(function (e) {
	  if ('#webform-dental-procedure-3 .dental-select-all:checked') {
	    $('#webform-dental-procedure-3 .tooth').attr('checked', true);
	  }
	  else {
  	    $('#webform-dental-procedure-3 .tooth').attr('checked', false);
      }	  
	});
	//////////////////
	$('#dental_procedure-2').change(function () {
	  var option = $(this).val();
	  if (option == 'Dental Bridge') {
	    $('#dental_procedure_msg2').html('Select missing teeth only');
	  }
	  else $('#dental_procedure_msg2').empty();
	});
	$('#dental-select-2').click(function (e) {
        newString = dental2_select();
		if($("input[name$='dental_select_all-2']:checked").val()) {
			$('#edit-submitted-a-tooth-teeth-selected-2').val('all');
		}
		else {
			$('#edit-submitted-a-tooth-teeth-selected-2').val(newString);
		}
		$('#webform-dental-close-2').show();
		$('#webform-dental-bt-2').text("Re-Select");
		$('#webform-dental-bt-2').css('padding','0px 10px');
		$('#webform-dental-add-2').show();
		
		$.modal.close();
		return false;
	});
	//////////////////
	$('#dental_procedure-3').change(function () {
	  var option = $(this).val();
	  if (option == 'Dental Bridge') {
	    $('#dental_procedure_msg3').html('Select missing teeth only');
	  }
	  else $('#dental_procedure_msg3').empty();
	});
	$('#dental-select-3').click(function (e) {
        newString = dental3_select();
		if($("input[name$='dental_select_all-3']:checked").val()) {
			$('#edit-submitted-a-tooth-teeth-selected-3').val('all');
		}
		else {
			$('#edit-submitted-a-tooth-teeth-selected-3').val(newString);
		}
		$('#webform-dental-close-3').show();
		$('#webform-dental-bt-3').text("Re-Select");
		$('#webform-dental-bt-3').css('padding','0px 10px');
		$.modal.close();
		return false;
	});
	//////////////////////////////////////////////////////////
	$('#webform-dental-close-1').click(function (e) {
		$('#enquiry-dental-procedure-1').hide();										 
	});
	$('#webform-dental-close-2').click(function (e) {
		$('#enquiry-dental-procedure-2').hide();
		$('#webform-dental-add').show();
	});
	$('#webform-dental-close-3').click(function (e) {
		$('#enquiry-dental-procedure-3').hide();
		$('#webform-dental-add-2').show();
												 
	});
	//////////////////////////////////////////////////////////
	$('#webform-dental-add').click(function (e) {
		$('#enquiry-dental-procedure-2').show();
		$(this).hide();
	});
	$('#webform-dental-add-2').click(function (e) {
		$('#enquiry-dental-procedure-3').show();
		$(this).hide();
	});
	/////////////////////////////////////////////////////////
	$('#dental-clear').click(function (e) {
		$("input[name$='teeth']:checked").each(function()
		{
			$(this).attr('checked','');
			$("input[name$='dental_select_all']:checked").attr('checked','');
		});
	});
	$('#dental-clear-2').click(function (e) {
		$("input[name$='teeth-2']:checked").each(function()
		{
			$(this).attr('checked','');
			$("input[name$='dental_select_all-2']:checked").attr('checked','');
		});
	});
	$('#dental-clear-3').click(function (e) {
		$("input[name$='teeth-3']:checked").each(function()
		{
			 $(this).attr('checked','');
			 $("input[name$='dental_select_all-3']:checked").attr('checked','');
		});
	});
	///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	
	$('#package-select').click(function (e) {
	    newString_nid = packages_select();
		$('#edit-submitted-packages-nid').val(newString_nid);

		$.modal.close();
		
		$('#webform-package-bt').text("Re-Select");
		$('#webform-package-bt').css('padding','0px 10px');
		
		return false;
	});
	
	
	$('#plastic-clear').click(function (e) {
		$('.plastic_procedure:checked').each(function()
		{
			$(this).attr('checked' ,'');
		});
	})
	$('#package-clear').click(function (e) {
		$('.package:checked').each(function()
		{
			$(this).attr('checked' ,'');
		});
	});	
	
	if($("input[name$='submitted[airfares]']").val() == 'yes') {
			$('.enquiry-airfare-wraper').show();	
	}
	else {
			$('.enquiry-airfare-wraper').hide();
	}
	$('.enquiry-airfare-wraper').hide();
	$("input[name$='submitted[airfares]']").change(function () {
		if($(this).val() == 'yes') {
			$('.enquiry-airfare-wraper').show();	
		}
		else {
			$('.enquiry-airfare-wraper').hide();
		}
	});	
	
	$('#edit-submitted-how-many').attr("disabled","disabled");
	$('#edit-submitted-how-many').val("-");
	$("input[name$='submitted[are_you_travelling_with_others]']").change(function () {
		if($(this).val() == 'yes') {
			$('#edit-submitted-how-many').attr("disabled","");
			$('#edit-submitted-how-many').val("");
		}
		else {
			$('#edit-submitted-how-many').attr("disabled","disabled");	
			$('#edit-submitted-how-many').val("-");
		}
	});	
	
	$('#edit-submitted-contact-number').attr("disabled","disabled");	
	$("input[name$='submitted[can_we_contact_you_by_phone]']").change(function () {
		if($(this).val() == 'yes') {
			$('#edit-submitted-contact-number').attr("disabled","");
			$('#edit-submitted-contact-number').val("");
		}
		else {
			$('#edit-submitted-contact-number').attr("disabled","disabled");	
			$('#edit-submitted-contact-number').val("");
		}
	});
	
	//$('#edit-submit').hide(); <----?????????????????????????????????????????
	$("input[name$='submitted[have_you_read_understood_and_agree_to_the_terms__conditions]']").change(function () {
		if($(this).val() == 'yes') {
			$('#edit-submit').show();
		}
		else {
			$('#edit-submit').hide();	
		}
	});
	
	$('#edit-next').val("Next");
	$('#edit-previous').val("Back");
	
	$('#edit-previous').click(function (e) {
		e.preventDefault();
		history.back();						
	});
	
	////////////////////////////////////////////////////////////////////////////////////////////////////////
	//**********************************END ENQUIRY***********************************************************//
	////////////////////////////////////////////////////////////////////////////////////////////////////////
	 
	//Currency at enquiry page
	
	$("#currency_select").live("click", function(){
	  $(this).find('select').change(function(){
			get_converter();
	  });
	});
	
	// $('#currency_select select').delegate('change', function() { 
		// console.log('----');
	// });
	
	// $('#currency_select select').bind('onChange', function () {
		// console.log('----');
	// });
});
function plastic_select() {
		var plastic_value = '';
		var plastic_nid = '';
		$("input[name$='plastic_procedure']:checked").each(function()
		{
		    var nid = $(this).attr('id');
			if (nid == 147 || nid == 149 || nid == 150) {
		      var liposuction_value = '';
			  plastic_value += $(this).val();
		      $("input[name$='liposuction']:checked").each(function()
		      {
			      liposuction_value += $(this).val()+",";
		      });
		      var lipoString = liposuction_value.substring(0, liposuction_value.length-1); //remove last charactor
		
		      $('#edit-submitted-a-body-part-selected').val(lipoString);
			  plastic_value += ': ' + lipoString + ',';
			
			}
			else plastic_value += $(this).val()+", ";
			plastic_nid += nid+",";
			
		});
		
		var newString = plastic_value.substring(0, plastic_value.length-2); //remove last charactor
		var newString_nid = plastic_nid.substring(0, plastic_nid.length-1); //remove last charactor
		//$('#edit-submitted-plactic-surgery---non-surgical-procedures').val(newString);
		$('#plastic-procedures').html(newString);
		return newString_nid;
}

function non_surgical_select() {
		var plastic_value = '';
		var plastic_nid = '';
		$("input[name$='non_surgical_procedure']:checked").each(function()
		{
		    var nid = $(this).attr('id');
			plastic_value += $(this).val()+", ";
			plastic_nid += nid+",";
			
		});
		
		var newString = plastic_value.substring(0, plastic_value.length-2); //remove last charactor
		var newString_nid = plastic_nid.substring(0, plastic_nid.length-1); //remove last charactor
		//$('#edit-submitted-plactic-surgery---non-surgical-procedures').val(newString);
		$('#non-surgical-procedures').html(newString);
		return newString_nid;
}

function dental_select() {
	    var selection = $("#dental_procedure").val();
	    if ( selection == 0) {
		  alert('Please select a procedure');
		  return false;
		}
		var dental_value = '';		
		var teeth_value = '';
		//$('#edit-submitted-dental-procedures').val($("#dental_procedure option:selected").val());
		// These are poorly name - too similar
		$('#dental-procedure').html($("#dental_procedure option:selected").val() + '&nbsp;');
		var id = $("#dental_procedure option:selected").attr('id'); 
        parts = id.split('-');
		//alert('parts ' + parts[1]);
		$('#edit-submitted-dental-procedures-nid').val(parts[1]);
		$("input[name$='teeth']:checked").each(function()
		{
			teeth_value += $(this).val()+",";
		});
		var newString = teeth_value.substring(0, teeth_value.length-1); //remove last charactor
		
		if($("input[name$='dental_select_all']:checked").val()) {
		    $('#dental-procedure-teeth').html('all');
		}
		else {
			$('#dental-procedure-teeth').html(newString);
		}
		return newString;
}

function dental2_select() {
	    var selection2 = $("#dental_procedure-2").val();
	    if ( selection2 == 0) {
		  alert('Please select a procedure');
		  return;
		}
		var dental_value = '';		
		var teeth_value = '';
		//$('#edit-submitted-dental-procedures-2').val($("#dental_procedure-2 option:selected").val());
		$('#dental-procedure-2').html($("#dental_procedure-2 option:selected").val() + '&nbsp;');
		var id = $("#dental_procedure-2 option:selected").attr('id'); 
        parts = id.split('-');
		//alert('parts ' + parts[1]);
		$('#edit-submitted-dental-procedures-nid-2').val(parts[1]);
		
		$("input[name$='teeth-2']:checked").each(function()
		{
			teeth_value += $(this).val()+",";
		});
		var newString = teeth_value.substring(0, teeth_value.length-1); //remove last charactor
		
		if($("input[name$='dental_select_all-2']:checked").val()) {
			$('#dental-procedure-2-teeth').html('all');
		
		}
		else {
			$('#dental-procedure-2-teeth').html(newString);
		}
		return newString;
}

function dental3_select() {
	    var selection3 = $("#dental_procedure-3").val();
	    if ( selection3 == 0) {
		  alert('Please select a procedure');
		  return;
		}
		var dental_value = '';		
		var teeth_value = '';
		//$('#edit-submitted-dental-procedures-3').val($("#dental_procedure-3 option:selected").val());
		$('#dental-procedure-3').html($("#dental_procedure-3 option:selected").val() + '&nbsp;');
		var id = $("#dental_procedure-3 option:selected").attr('id'); 
        parts = id.split('-');
		//alert('parts ' + parts[1]);
		$('#edit-submitted-dental-procedures-nid-3').val(parts[1]);
		
		$("input[name$='teeth-3']:checked").each(function()
		{
			teeth_value += $(this).val()+",";
		});
		var newString = teeth_value.substring(0, teeth_value.length-1); //remove last charactor
		
		if($("input[name$='dental_select_all-3']:checked").val()) {
		    $('#dental-procedure-3-teeth').html('all');
		}
		else {
			$('#dental-procedure-3-teeth').html(newString);
		}
		return newString;
}

function packages_select() {
		var package_value = '';
		var package_nid = '';
		$("input[name$='package']:checked").each(function()
		{
			package_value += $(this).val()+", ";
			package_nid += $(this).attr('id')+",";
		});	
		var newString = package_value.substring(0, package_value.length-2); //remove last charactor
		var newString_nid = package_nid.substring(0, package_nid.length-1); //remove last charactor
		
		//$('#edit-submitted-packages').val(newString);
		$('#packages').html(newString);
		return newString_nid;
}

function check_boxes(surgical, tagtype, div, number, callback) {

	if (surgical != '') surgical = surgical.split(',');
	else return;
	
	if (callback) surgical.push('callback');
	for (x in surgical) {
	  nid = surgical[x];
	  //if (tagtype == 'option') alert('nid '+ nid);
	  //alert('nid ' + nid);
	  switch (tagtype) {
	    case 'input':
	      $(tagtype + '#' + nid).attr('checked', true);
		  break;
	    case 'option':
	      $(div + ' ' + tagtype + '#d' + number + '-' + nid).attr('selected', 'selected');
		  break;
	  }
	  if (nid == 'callback') setTimeout(function() { callback(); }, 1000);
	}
	
	return;
}
function dental_boxes(dental, id) {
//alert(dental);
	if (dental != '') dental = dental.split(',');
	else return;
	switch (id) {
	  case 1:
	    var div = '#webform-dental-procedure';
		break;
	  case 2:
	    var div = '#webform-dental-procedure-2';
		break;
	  case 3:
	    var div = '#webform-dental-procedure-3';
		break;
	}
	for (x in dental) {
	  box_num = dental[x];
	  //alert(box_num);
	  $(div + ' input[value=' + box_num + ']').attr('checked', true);
	}
	return;
}

function procedure_history(url) {
	$('.procedure-overview').hide();
	$('.procedure-before-after').hide();
	$('.procedure-testimonial').hide();
	$('.procedure-faq').hide();	
	$('.left-navigation a').removeClass('left-active');
	
	$('.left-navigation li.active').removeClass('active');


	if(url == "procedure_overview"){
		$('.procedure-overview').show();
		$('#a_procedure_overview').addClass('left-active');
		$('#a_procedure_overview').parent().addClass('active');
	
	}
	if(url == "procedure_before"){
		$('.procedure-before-after').show();
		$('#a_procedure_before').addClass('left-active');
		$('#a_procedure_before').parent().addClass('active');

	}
	if(url == "procedure_testimonial"){
		$('.procedure-testimonial').show();
		$('#a_procedure_testimonial').addClass('left-active');
		$('#a_procedure_testimonial').parent().addClass('active');

	}
	if(url == "procedure_faq"){
		$('.procedure-faq').show();	
		$('#a_procedure_faq').addClass('left-active');
		$('#a_procedure_faq').parent().addClass('active');
	}

}
function gotoblock(id,name){
	$("div."+name+"-content-page").find('span').removeClass('active');
	$('span#'+name+'-page-number-'+id).addClass('active');
	
	$("div#"+name+"-content").find('div[id^='+name+'-]').hide();
	$("div[id="+name+"-"+id+"]").fadeIn("slow");
	
}

function get_converter(){
	var cur_value = $('#convert').html();
	var value = cur_value.split('<br>');
	var cur_unit = $('#node-107 #selected_currency_2').text();
	var cur_symbol = $('#node-107 #selected_currency_symbol').text();
	
	if(cur_value != ""){	
		$('#edit-submitted-currency-value').val(value[1]);
	}
	if(cur_unit != ""){
		$('#edit-submitted-currency-format').val(cur_unit + " " + cur_symbol);
	}
}

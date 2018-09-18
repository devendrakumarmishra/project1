// Using the closure to map jQuery to $. 
(function ($) {
  // Store our function as a property of Drupal.behaviors.
	Drupal.behaviors.stu_schedule = {
		attach: function (context, settings) {
			$('.form-field-name-field-tour table tbody tr:eq(0) td select').change(function(){
			  $('#edit-field-payment-details-und-5-field-payment-sections-und-0-value').val($(this).val());	
			});
			
		  $('.form-field-name-field-tour table tbody tr:eq(1) td select').change(function(){
			  $('#edit-field-payment-details-und-6-field-payment-sections-und-0-value').val($(this).val());	
			});
			
			$('.form-field-name-field-tour table tbody tr:eq(2) td select').change(function(){
			  $('#edit-field-payment-details-und-7-field-payment-sections-und-0-value').val($(this).val());	
			});
			
			$('.form-field-name-field-tour table tbody tr:eq(3) td select').change(function(){
			  $('#edit-field-payment-details-und-8-field-payment-sections-und-0-value').val($(this).val());	
			});
      
      $('.page-node-add-makeovers-master #edit-title').blur(function(){
				if ($(this).val()) {
					$('#edit-field-primary-guest-und-0-value').val($(this).val());
				}
      });

      $('#edit-field-contact-phone-no-und-0-value').blur(function(){
				if ($(this).val()) {
				  $('.field-name-field-client-name input').val($(this).val());
				}
      });
       
			$('#edit-title').blur(function(){
			  if ($(this).val()) {
				  $('.field-name-field-clients-passport-name input').val($(this).val());
			  }
			});
       
      /*======== Makeover Schedule =========*/
	     jQuery('#edit-field-check-in-date-und-0-value-datepicker-popup-0').datepicker({
				  dateFormat: 'dd/mm/yy',
					onSelect: function(dateText, inst) {
						var startdate = jQuery(this).datepicker('getDate');
						if (startdate !== null && startdate !== undefined) {
							var enddate  = $('#edit-field-check-out-date-und-0-value-datepicker-popup-0').datepicker('getDate');
							if (enddate !== null && enddate !== undefined) {
								var days =  Math.floor(( Date.parse(enddate) - Date.parse(startdate) ) / 86400000);
								if (days > 0) {
									$('#edit-field-no-nights-und-0-value').val(days);
								}
								else if (days <= 0) {
									 $('#edit-field-no-nights-und-0-value').val(0);
								}
							}
						}
					}
				});
				
				jQuery('#edit-field-check-out-date-und-0-value-datepicker-popup-0').datepicker({
				  dateFormat: 'dd/mm/yy',
					onSelect: function(dateText, inst) {
						var enddate = jQuery(this).datepicker('getDate');
						if (enddate !== null && enddate !== undefined) {
							var startdate  = $('#edit-field-check-in-date-und-0-value-datepicker-popup-0').datepicker('getDate');
							if (startdate !== null && startdate !== undefined) {
								var days =  Math.floor(( Date.parse(enddate) - Date.parse(startdate) ) / 86400000);
								if (days > 0) {
									$('#edit-field-no-nights-und-0-value').val(days);
								}
								else if (days <= 0) {
									 $('#edit-field-no-nights-und-0-value').val(0);
								}
							}
						}
					}
				});
				
				// Cost
				var cost = 0;
				var rollaway_bed = 0;
				var total = 0;
				jQuery('#edit-field-cost-per-night-thb-und-0-value').blur(function() {
				  var number_of_nights = jQuery('#edit-field-no-nights-und-0-value').val();
				  if (parseInt(number_of_nights)) {
						var cost = jQuery(this).val();
						var rollaway_bed = jQuery('#edit-field-cost-for-rollaway-bed-und-0-value').val();
						if (parseInt(rollaway_bed)) {
							var total = parseInt(number_of_nights) * (parseInt(cost) + parseInt(rollaway_bed));
						}
						else {
							var total = parseInt(number_of_nights) * (parseInt(cost));
						}
					   jQuery('#edit-field-total-cost-und-0-value').val(total);
					 }
					 else {
						 jQuery('#edit-field-total-cost-und-0-value').val(0);
					 }
			  });
			  
			  // Cost for Rollaway Bed
			  jQuery('#edit-field-cost-for-rollaway-bed-und-0-value').blur(function() {
					var number_of_nights = jQuery('#edit-field-no-nights-und-0-value').val();
				  if (parseInt(number_of_nights)) {
						var rollaway_bed = jQuery(this).val();
						var cost = jQuery('#edit-field-cost-per-night-thb-und-0-value').val();
						if (parseInt(rollaway_bed)) {
							var total = parseInt(number_of_nights) * ( parseInt(cost) + parseInt(rollaway_bed));
						}
						else {
							var total = parseInt(number_of_nights) * (parseInt(cost));
						}
						jQuery('#edit-field-total-cost-und-0-value').val(total);
					}
					else {
						jQuery('#edit-field-total-cost-und-0-value').val(0);
					}
			  });
       /*======== Makeover Schedule =========*/
       
		}
	};
}(jQuery));



/**
 * Select default date
 */
(function ($) {
  jQuery('#edit-field-consultation-date-und-0-value-datepicker-popup-0').datepicker({
	dateFormat: 'dd/mm/yy',
    onSelect: function(dateText, inst) {
			if (dateText !== null && dateText !== undefined) {
			  jQuery("#edit-field-consultation-transfer-time-und-0-value-datepicker-popup-0").val(dateText);
			  jQuery( "#edit-field-cs-txt-und-2-field-cstxt-start-date-und-0-value-datepicker-popup-0" ).val(dateText);
			}
    }
  });
  jQuery('#edit-field-surgery-appointment-date-und-0-value-datepicker-popup-0').datepicker({
	dateFormat: 'dd/mm/yy',
    onSelect: function(dateText, inst) {
	  var surgery1 = jQuery(this).datepicker('getDate');
	  surgery1.setDate(surgery1.getDate()+3);
	  
	  var surgery2 = jQuery(this).datepicker('getDate');
	  surgery2.setDate(surgery2.getDate()+10);
	  
	  var surgery3 = jQuery(this).datepicker('getDate');
	  surgery3.setDate(surgery3.getDate()+15);
	  
			if (dateText !== null && dateText !== undefined) {
				jQuery("#edit-field-surgery-appoint-tran-time-und-0-value-datepicker-popup-0").val(dateText);
				jQuery( "#edit-field-cs-txt-und-3-field-cstxt-start-date-und-0-value-datepicker-popup-0" ).val(dateText);
			}
			if (surgery1 !== null && surgery1 !== undefined) {
				jQuery( "#edit-field-cs-txt-und-4-field-cstxt-start-date-und-0-value-datepicker-popup-0" ).val($.datepicker.formatDate('dd/mm/yy', new Date(surgery1)));
			}
			if (surgery2 !== null && surgery2 !== undefined) {
				jQuery( "#edit-field-cs-txt-und-5-field-cstxt-start-date-und-0-value-datepicker-popup-0" ).val($.datepicker.formatDate('dd/mm/yy', new Date(surgery2)));
			}
			if (surgery3 !== null && surgery3 !== undefined) {
				jQuery( "#edit-field-cs-txt-und-6-field-cstxt-start-date-und-0-value-datepicker-popup-0" ).val($.datepicker.formatDate('dd/mm/yy', new Date(surgery3)));
			}
    }
  });
  jQuery('#edit-field-dental-date-und-0-value-datepicker-popup-0').datepicker({
	dateFormat: 'dd/mm/yy',
    onSelect: function(dateText, inst) {
	  var dental1 = jQuery(this).datepicker('getDate');
	  dental1.setDate(dental1.getDate()+3);
	  
	  var dental2 = jQuery(this).datepicker('getDate');
	  dental2.setDate(dental2.getDate()+10);
	  
	  if (dateText !== null && dateText !== undefined) {
	    jQuery("#edit-field-dental-appoint-transf-time-und-0-value-datepicker-popup-0").val(dateText);
	    jQuery("#edit-field-cs-txt-und-7-field-cstxt-start-date-und-0-value-datepicker-popup-0").val(dateText);
	  }
	  if (dental1 !== null && dental1 !== undefined) {
	    jQuery( "#edit-field-cs-txt-und-8-field-cstxt-start-date-und-0-value-datepicker-popup-0" ).val($.datepicker.formatDate('dd/mm/yy', new Date(dental1)));
	  }
	  if (dental2 !== null && dental2 !== undefined) {
	    jQuery( "#edit-field-cs-txt-und-9-field-cstxt-start-date-und-0-value-datepicker-popup-0" ).val($.datepicker.formatDate('dd/mm/yy', new Date(dental2)));
	  }
	}
  });
  
  // Arrival time 
	jQuery("#edit-field-arrival-flight-details-und-0-field-flight-date-und-0-value-timeEntry-popup-1").blur(function(){
	  var arrival_flight_time = jQuery(this).val();
	  if (arrival_flight_time !== null && arrival_flight_time !== undefined) {
	    jQuery('#edit-field-arrival-flight-details-und-0-field-transfers-pickup-date-und-0-value-timeEntry-popup-1').val(arrival_flight_time);
		}
	});
	
	// Departure time 
	jQuery("#edit-field-departure-flight-details-und-0-field-departure-date-und-0-value-timeEntry-popup-1").blur(function(){
	  var departure_flight_time = jQuery(this).val();
	  if (departure_flight_time !== null && departure_flight_time !== undefined) {
	    jQuery('#edit-field-departure-flight-details-und-0-field-transfers-pickup-date-und-0-value-timeEntry-popup-1').val(departure_flight_time);
		}
	});
		  
  jQuery("#edit-field-arrival-flight-details-und-0-field-flight-date-und-0-value-datepicker-popup-0").datepicker({
		dateFormat: 'dd/mm/yy',
    onSelect: function(dateText, inst) {
		var newdate = jQuery(this).datepicker('getDate');
	  var newdate2 = jQuery(this).datepicker('getDate');
	  newdate.setDate(newdate.getDate()-5);
	  if (newdate !== null && newdate !== undefined) {
	    jQuery( "#edit-field-cs-txt-und-0-field-cstxt-start-date-und-0-value-datepicker-popup-0" ).val($.datepicker.formatDate('dd/mm/yy', new Date(newdate)));
	  }
	  
	  if (newdate2 !== null && newdate2 !== undefined) {
			//jQuery("#edit-field-cs-txt-und-1-field-cstxt-start-date-und-0-value-datepicker-popup-0" ).val($.datepicker.formatDate('dd/mm/yy', new Date(newdate2)));
			jQuery("#edit-field-arrival-flight-details-und-0-field-transfers-pickup-date-und-0-value-datepicker-popup-0").val($.datepicker.formatDate('dd/mm/yy', new Date(newdate2)));
			jQuery("#edit-field-check-in-date-und-0-value-datepicker-popup-0").val($.datepicker.formatDate('dd/mm/yy', new Date(newdate2)));
	  }
	}
  });
  
  jQuery('#edit-field-departure-flight-details-und-0-field-departure-date-und-0-value-datepicker-popup-0').datepicker({
	dateFormat: 'dd/mm/yy',
    onSelect: function(dateText, inst) {
	  var departure = jQuery(this).datepicker('getDate');
    var departure2 = jQuery(this).datepicker('getDate');
	  departure.setDate(departure.getDate()+3);
    departure2.setDate(departure2.getDate()+4);
      
      if (departure2 !== null && departure2 !== undefined) {
        jQuery("#edit-field-cs-txt-und-1-field-cstxt-start-date-und-0-value-datepicker-popup-0" ).val($.datepicker.formatDate('dd/mm/yy', new Date(departure2)));
      }
      
	    if (departure !== null && departure !== undefined) {
			  jQuery("#edit-field-cs-txt-und-11-field-cstxt-start-date-und-0-value-datepicker-popup-0" ).val($.datepicker.formatDate('dd/mm/yy', new Date(departure)));
		    jQuery("#edit-field-departure-flight-details-und-0-field-transfers-pickup-date-und-0-value-datepicker-popup-0").val(dateText);
		    jQuery("#edit-field-check-out-date-und-0-value-datepicker-popup-0").val(dateText);
		  }
    }
  });
  
}(jQuery));


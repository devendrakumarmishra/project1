  <?php
  $edit = isset($form['nid']['#value'])  ? true : false ;
  global $user, $base_url;
  $arg = arg();
  $both = ($arg[3] == 'both') ? true: false;
  $imageType = ($arg[3] == 'both') ? 'Surgery Photos': 'Image';
  $surgery = ($arg[3] == 'surgery') ? true: false;
  $dental = ($arg[3] == 'dental') ? true: false;
  ?>
  <div><span style="font-size:14px;margin-top:5px;font-weight:bold;color:red;text-align:center;"><i>Please only complete this form if you have photos to upload for review.</i></span><span style="font-size:14px;margin-top:5px;font-weight:bold;text-align:center;"><i> For a quote, please click on Get a FREE Quote Now! at the top of this page.</i></span></div>
    
    <div class="treatment-type clearfix">
		<?php 
    if($edit) {
      print drupal_render_children($form['field_treatment_type']);
    }
    ?>
	 </div>
    
   <div class="image">
		<h3><span><?php print $imageType; ?></span></h3>
		<?php print drupal_render_children($form['field_sg_images']);?>
	 </div>
   
   <?php if ($both || $edit) { ?>
   <div class="group_dental_health">
    <?php print render($form['group_dental_images']['#prefix']);?>
    <div class="row">
      <?php print drupal_render_children($form['group_dental_images']['field_dental_images']); ?>
    </div>
    <?php print render($form['group_dental_images']['#suffix']);?>
  </div>
  <?php } ?>
   
<div class="surgeonform">
    <?php print render($form['group_general']['#prefix']);?>
		<div style="font-size:13px;margin-bottom:5px;margin-top:5px;font-weight:bold;color:red;text-align:center;"><i>Please provide First Name and Last Name AS APPEARS IN YOUR PASSPORT.</i></div>
		<div class="row">
		  <div class="pull-left col"> <?php print drupal_render($form['group_general']['field_sg_title']); ?> </div>
		  <div class="pull-right col"> <?php print drupal_render($form['group_general']['field_sg_age']); ?> </div>
		</div>
		
		<div class="row">
		  <div class="pull-left col"> <?php print drupal_render_children($form['group_general']['field_sg_first_name'])?> </div>
		  <div class="pull-right col"> <?php print drupal_render_children($form['group_general']['field_sg_nationality'])?> </div>
		</div>
		
	  <div class="row">
		  <div class="pull-left col"> <?php print drupal_render_children($form['group_general']['field_sg_last_name'])?> </div>
		  <div class="pull-right col datefield"><?php print drupal_render_children($form['group_general']['field_sg_dob']); ?> </div>
		</div>
		
		<div class="row">
		  <div class="pull-left col"><?php print drupal_render_children($form['group_general']['field_sg_gender']); ?> </div>
		  <div class="pull-right col"><?php //print drupal_render_children($form['group_general']['field_sg_dob']); ?> </div>
		</div>
		
	 <div class="row">
		  <div class="pull-left col"><?php print drupal_render_children($form['group_general']['field_sg_height']); ?></div>
		  <div class="pull-right col"><?php print drupal_render_children($form['group_general']['field_sg_weight']); ?></div>
		</div>
		
		<div class="row">
		  <div class="pull-left col"><?php print drupal_render_children($form['group_general']['field_sg_email']); ?></div>
		  <div class="pull-right col"><?php print drupal_render_children($form['group_general']['field_sg_phone']); ?></div>
		</div>
		
		<div class="row">
		  <div class="pull-left col"><?php print drupal_render_children($form['group_general']['field_sg_mobile_number']); ?></div>
		  <div class="pull-right col"><?php print drupal_render_children($form['group_general']['field_sg_daytime_number']); ?></div>
		</div>
		
		<div class="row">
			<div class="pull-full"><?php print drupal_render_children($form['group_general']['field_sg_postal_street_address']); ?></div>
		</div>
		
		<div class="row">
		  <div class="pull-left col"><?php print drupal_render_children($form['group_general']['field_sg_suburb']); ?></div>
		  <div class="pull-right col"><?php print drupal_render_children($form['group_general']['field_sg_city']); ?></div>
		</div>
		
		<div class="row">
		  <div class="pull-left col"><?php print drupal_render_children($form['group_general']['field_sg_region_state']); ?></div>
		  <div class="pull-right col"><?php print drupal_render_children($form['group_general']['field_sg_postcode_zip']); ?></div>
		</div>
		
		<div class="row">
		  <div class="pull-left col"><?php print drupal_render_children($form['group_general']['field_sg_countries']); ?></div>
		  <div class="pull-right col"><?php //print drupal_render_children($form['group_general']['field_sg_passport_number']); ?></div>
		</div>
		
		<div class="row">
		   <div class=""><?php print drupal_render_children($form['group_general']['field_sg_preferred_language']); ?></div>
		</div>
		
		<?php print render($form['group_general']['#suffix']);?>
		
		<div class="group_surgery_details">
		<?php print render($form['group_surgery_details']['#prefix']);?>
		 
		 <div class="row">
		   <div class="pull-left col"><?php print drupal_render_children($form['group_surgery_details']['field_sg_plan_date']); ?></div>
		   <div class="pull-right col"><?php print drupal_render_children($form['group_surgery_details']['field_sg_home_date']); ?></div>
		 </div>
		 
		 <div class="row">
		   <div><?php print drupal_render_children($form['group_surgery_details']['field_sg_procedures']); ?></div>
		 </div>
		 
     <div class="row">
		   <div><?php print drupal_render_children($form['group_surgery_details']['field_surgery_concerns']); ?></div>
		 </div>
     
		 <div class="row">
			 <div ><?php print drupal_render_children($form['group_surgery_details']['field_sg_preferred_surgeon']); ?></div>
		 </div>
		 
		 <div class="row">
		   <div><?php print drupal_render_children($form['group_surgery_details']['field_sg_expectation']); ?></div>
		 </div>
		 
		 <div class="row">
		   <div><?php print drupal_render_children($form['group_surgery_details']['field_sg_questions']); ?></div>
		 </div>
		 
		 
		 <?php print render($form['group_surgery_details']['#suffix']);?>
	  </div>
	  
	  
	  <div class="group_family_medical_conditions">
		  <?php print render($form['group_family_medical_conditions']['#prefix']);?>
		  
		    <div class="row">
					<div class="pull-left col"><?php print drupal_render_children($form['group_family_medical_conditions']['field_sg_heart_disease']); ?></div>
					<div class="pull-right col"><?php print drupal_render_children($form['group_family_medical_conditions']['field_sg_heart_disease_info']); ?></div>
				</div>
				
				<div class="row">
					<div class="pull-left col"><?php print drupal_render_children($form['group_family_medical_conditions']['field_sg_diabetes_new']); ?></div>
					<div class="pull-right col"><?php print drupal_render_children($form['group_family_medical_conditions']['field_sg_diabetes_new_info']); ?></div>
				</div>
				
				<div class="row">
					<div class="pull-left col"><?php print drupal_render_children($form['group_family_medical_conditions']['field_sg_hypertension']); ?></div>
					<div class="pull-right col"><?php print drupal_render_children($form['group_family_medical_conditions']['field_sg_hypertension_info']); ?></div>
				</div>
				
				<div class="row">
					<div class="pull-left col"><?php print drupal_render_children($form['group_family_medical_conditions']['field_sg_asthma']); ?></div>
					<div class="pull-right col"><?php print drupal_render_children($form['group_family_medical_conditions']['field_sg_asthma_info']); ?></div>
				</div>
				
				<div class="row">
					<div class="pull-left col"><?php print drupal_render_children($form['group_family_medical_conditions']['field_sg_cancer_new']); ?></div>
					<div class="pull-right col"><?php print drupal_render_children($form['group_family_medical_conditions']['field_sg_cancer_new_info']); ?></div>
				</div>
		
		  <?php print render($form['group_family_medical_conditions']['#suffix']);?>
	</div>
		
		
	  
	  <div class="group_medical_conditions">
		<?php print render($form['group_medical_conditions']['#prefix']);?>
	    
	  <div class="row">
		  <div class="pull-left col"><?php print drupal_render_children($form['group_medical_conditions']['field_sg_diabetes']); ?></div>
		  <div class="pull-right col"><?php print drupal_render_children($form['group_medical_conditions']['field_sg_diabetes_info']); ?></div>
		</div>
		
		<div class="row">
		  <div class="pull-left col"><?php print drupal_render_children($form['group_medical_conditions']['field_sg_thyroid']); ?></div>
		  <div class="pull-right col"><?php print drupal_render_children($form['group_medical_conditions']['field_sg_thyroid_info']); ?></div>
		</div>
	   
	  <div class="row">
		  <div class="pull-left col"><?php print drupal_render_children($form['group_medical_conditions']['field_sg_heart']); ?></div>
		  <div class="pull-right col"><?php print drupal_render_children($form['group_medical_conditions']['field_sg_heart_info']); ?></div>
		</div>
		
		<div class="row">
		  <div class="pull-left col"><?php print drupal_render_children($form['group_medical_conditions']['field_sg_lung']); ?></div>
		  <div class="pull-right col"><?php print drupal_render_children($form['group_medical_conditions']['field_sg_lung_info']); ?></div>
		</div>
		
		<div class="row">
		  <div class="pull-left col"><?php print drupal_render_children($form['group_medical_conditions']['field_sg_blood_pressure']); ?></div>
		  <div class="pull-right col"><?php print drupal_render_children($form['group_medical_conditions']['field_sg_blood_pressure_info']); ?></div>
		</div>
		
		<div class="row">
		  <div class="pull-left col"><?php print drupal_render_children($form['group_medical_conditions']['field_sg_liver']); ?></div>
		  <div class="pull-right col"><?php print drupal_render_children($form['group_medical_conditions']['field_sg_liver_info']); ?></div>
		</div>
		
		<div class="row">
		  <div class="pull-left col"><?php print drupal_render_children($form['group_medical_conditions']['field_sg_blood_disorder']); ?></div>
		  <div class="pull-right col"><?php print drupal_render_children($form['group_medical_conditions']['field_sg_blood_disorder_info']); ?></div>
		</div>
		
		<div class="row">
		  <div class="pull-left col"><?php print drupal_render_children($form['group_medical_conditions']['field_sg_cancer']); ?></div>
		  <div class="pull-right col"><?php print drupal_render_children($form['group_medical_conditions']['field_sg_cancer_info']); ?></div>
		</div>
		
		<div class="row">
		  <div class="pull-left col"><?php print drupal_render_children($form['group_medical_conditions']['field_sg_hiv']); ?></div>
		  <div class="pull-right col"><?php print drupal_render_children($form['group_medical_conditions']['field_sg_hiv_info']); ?></div>
		</div>
		
		<div class="row">
		  <div class="pull-left col"><?php print drupal_render_children($form['group_medical_conditions']['field_sg_depression']); ?></div>
		  <div class="pull-right col"><?php print drupal_render_children($form['group_medical_conditions']['field_sg_depression_info']); ?></div>
		</div>
		
		<div class="row">
		  <div class="pull-left col"><?php print drupal_render_children($form['group_medical_conditions']['field_sg_neurologic']); ?></div>
		  <div class="pull-right col"><?php print drupal_render_children($form['group_medical_conditions']['field_sg_neurologic_info']); ?></div>
		</div>
		
		<div class="row">
		  <div class="pull-left col"><?php print drupal_render_children($form['group_medical_conditions']['field_sg_anaesthesia']); ?></div>
		  <div class="pull-right col"><?php print drupal_render_children($form['group_medical_conditions']['field_sg_anaesthesia_info']); ?></div>
		</div>
		
	   <div class="row">
				<div class="pull-left col"><?php print drupal_render_children($form['group_medical_conditions']['field_cardiovascular_accidents']); ?></div>
				<div class="pull-right col"><?php print drupal_render_children($form['group_medical_conditions']['field_cardiovascular_acc_info']); ?></div>
			</div>
			
			<div class="row">
				<div class="pull-left col"><?php print drupal_render_children($form['group_medical_conditions']['field_bleeding_tendency']); ?></div>
				<div class="pull-right col"><?php print drupal_render_children($form['group_medical_conditions']['field_bleeding_tendency_info']); ?></div>
			</div>
			
			<div class="row">
				<div class="pull-left col"><?php print drupal_render_children($form['group_medical_conditions']['field_hyperthyroidism']); ?></div>
				<div class="pull-right col"><?php print drupal_render_children($form['group_medical_conditions']['field_hyperthyroidism_info']); ?></div>
			</div>
			
			<div class="row">
				<div class="pull-left col"><?php print drupal_render_children($form['group_medical_conditions']['field_adrenal_insufficiency']); ?></div>
				<div class="pull-right col"><?php print drupal_render_children($form['group_medical_conditions']['field_adrenal_insufficiency_info']); ?></div>
			</div>
			
			<div class="row">
				<div class="pull-left col"><?php print drupal_render_children($form['group_medical_conditions']['field_hepatitus']); ?></div>
				<div class="pull-right col"><?php print drupal_render_children($form['group_medical_conditions']['field_hepatitus_info']); ?></div>
			</div>
			
			<div class="row">
				<div class="pull-left col"><?php print drupal_render_children($form['group_medical_conditions']['field_hiv']); ?></div>
				<div class="pull-right col"><?php print drupal_render_children($form['group_medical_conditions']['field_hiv_info']); ?></div>
			</div>
			
			
			<div class="row">
				<div class="pull-left col"><?php print drupal_render_children($form['group_medical_conditions']['field_keloid_scarring']); ?></div>
				<div class="pull-right col"><?php print drupal_render_children($form['group_medical_conditions']['field_keloid_scarring_info']); ?></div>
			</div>
			
			<div class="row">
				<div class="pull-left col"><?php print drupal_render_children($form['group_medical_conditions']['field_breast_cancer']); ?></div>
				<div class="pull-right col"><?php print drupal_render_children($form['group_medical_conditions']['field_breast_cancer_info']); ?></div>
			</div>
			
			<div class="row">
				<div class="pull-left col"><?php print drupal_render_children($form['group_medical_conditions']['field_major_operation']); ?></div>
				<div class="pull-right col"><?php print drupal_render_children($form['group_medical_conditions']['field_major_operation_info']); ?></div>
			</div>
			
			<div class="row">
				<div class="pull-left col"><?php print drupal_render_children($form['group_medical_conditions']['field_underlying_disease']); ?></div>
				<div class="pull-right col"><?php print drupal_render_children($form['group_medical_conditions']['field_underlying_disease_info']); ?></div>
			</div>
			
			<div class="row">
				<div class="pull-left col"><?php print drupal_render_children($form['group_medical_conditions']['field_have_you_ever_been_treated']); ?></div>
				<div class="pull-right col"><?php print drupal_render_children($form['group_medical_conditions']['field_treated_info']); ?></div>
			</div>
      
      
			
			<div class="row">
		    <div class="pull-full-special"><?php print drupal_render_children($form['group_medical_conditions']['field_sg_other']); ?></div>
		  </div>
		
		 <div class="row">
		   <?php print drupal_render_children($form['group_medical_conditions']['field_sg_other_specify']); ?>
		 </div>
		
		
		<?php foreach ($form['group_medical_conditions'] as $key => $field):?>
		  <?php if (substr($key, 0, 5) != 'field') continue?>
		  <?php if ($output = render($field)):?>
		    <div class="row <?php print $key?>"><?php print $output?></div>
		  <?php endif?>
		<?php endforeach;?>
	   
	  <?php print render($form['group_medical_conditions']['#suffix']);?>
	  </div>
	  
	  
	  <div class="group_women">
		   <?php print render($form['group_women']); ?>
		</div>
	  
	  
		<div class="group_women_surgery">
			
			<?php print render($form['group_women_surgery']['#prefix']);?>
			
			<div class="row">
		    <?php print drupal_render_children($form['group_women_surgery']['field_sg_wm_surgery']); ?>
		  </div>
		  <div class="row">
		    <?php print drupal_render_children($form['group_women_surgery']['field_sg_wm_pregnant']); ?>
		  </div>
		  <div class="row">
		    <?php print drupal_render_children($form['group_women_surgery']['field_sg_wm_pregnancies']); ?>
		  </div>
		  <div class="row">
		    <?php print drupal_render_children($form['group_women_surgery']['field_sg_wm_breastfed']); ?>
		  </div>
		  <div class="row">
		    <?php print drupal_render_children($form['group_women_surgery']['field_sg_wm_milk']); ?>
		  </div>
		  
		  <div class="row">
		     <div class="pull-left col"><?php print drupal_render_children($form['group_women_surgery']['field_sg_wm_lastfeed']); ?></div>
		     <div class="pull-right col"><?php print drupal_render_children($form['group_women_surgery']['field_sg_wm_last_baby']); ?></div>
		  </div>
		  
		  <div class="row">
		   <div class="pull-left col"> <?php print drupal_render_children($form['group_women_surgery']['field_sg_wm_children']); ?></div>
		   <div class="pull-right col"><?php print drupal_render_children($form['group_women_surgery']['field_sg_wm_age_youngest']); ?></div>
		  </div>
		  
		  
		  
		  
	<?php print render($form['group_women_surgery']['#suffix']);?>
		</div>
		
		<div class="group_breast_surgery_details">
		  <?php print render($form['group_breast_surgery_details']['#prefix']);?>
		  
		  <div class="row">
				<div class="pull-left col"><?php print drupal_render_children($form['group_breast_surgery_details']['field_sg_current_bra_size']); ?></div>
				<div class="pull-right col"><?php print drupal_render_children($form['group_breast_surgery_details']['field_sg_requested_size']); ?></div>
			</div>
			
		  <div class="row">
				<div class="pull-left col"><?php print drupal_render_children($form['group_breast_surgery_details']['field_sg_desired_implant']); ?></div>
				<div class="pull-right col"><?php print drupal_render_children($form['group_breast_surgery_details']['field_sg_desired_placement']); ?></div>
			</div>
			
			<div class="row">
				<div class="pull-left col"><?php print drupal_render_children($form['group_breast_surgery_details']['field_sg_desired_incision']); ?></div>
				<div class="pull-right col"><?php //print drupal_render_children($form['group_breast_surgery_details']['field_desired_incision_pref']); ?></div>
			</div>
			
			<div class="row">
				<div class="pull-left col"><?php //print drupal_render_children($form['group_breast_surgery_details']['field_sg_desired_placement']); ?></div>
				<div class="pull-right col"><?php //print drupal_render_children($form['group_breast_surgery_details']['field_desired_placement_pref']); ?></div>
			</div>
			
			<?php print render($form['group_breast_surgery_details']['#suffix']);?>
		</div> 
		
	  
	  <div class="group_medical_history" style="margin-top:20px;margin-bottom:20px;">
			
			<?php  print render($form['group_medical_history']['#prefix']);?>
			
			<div class="row">
		    <?php print drupal_render_children($form['group_medical_history']['field_sg_hospitalized']); ?>
		  </div>
		  <div class="row shortdate">
		    <?php print drupal_render_children($form['group_medical_history']['field_sg_when_hospitalized']); ?>
		  </div>
		  <div class="row">
		    <?php print drupal_render_children($form['group_medical_history']['field_sg_hospitalized_reason']); ?>
		  </div>
		  
		   <div class="row ">
		    <?php print drupal_render_children($form['group_medical_history']['field_any_surgery_before']); ?>
		  </div>
		  <div class="row shortdate">
		    <?php print drupal_render_children($form['group_medical_history']['field_surgery_before_date']); ?>
		  </div>
		  <div class="row">
		    <?php print drupal_render_children($form['group_medical_history']['field_surgery_before_kind']); ?>
		  </div>
		  
		  
		  <div class="row">
		    <?php print drupal_render_children($form['group_medical_history']['field_sg_implants']); ?>
		  </div>
		  <div class="row">
		    <?php print drupal_render_children($form['group_medical_history']['field_sg_implants_specify']); ?>
		  </div>
		  <div class="row">
		    <?php print drupal_render_children($form['group_medical_history']['field_sg_healing']); ?>
		  </div>
		  <div class="row">
		    <?php print drupal_render_children($form['group_medical_history']['field_sg_allergies']); ?>
		  </div>
		  <div class="row">
		    <?php print drupal_render_children($form['group_medical_history']['field_sg_allergies_specify']); ?>
		  </div>
		  <div class="row">
		    <?php print drupal_render_children($form['group_medical_history']['field_sg_medications']); ?>
		  </div>
		  <div class="row">
		    <?php print drupal_render_children($form['group_medical_history']['field_sg_supplements']); ?>
		  </div>
		  <div class="row shortdate">
		    <?php print drupal_render_children($form['group_medical_history']['field_sg_inhibitor']); ?>
		  </div>
		  <div class="row shortdate">
		    <?php print drupal_render_children($form['group_medical_history']['field_sg_inhibitor_date']); ?>
		  </div>
		  <div class="row">
		    <?php print drupal_render_children($form['group_medical_history']['field_sg_anticoagulant']); ?>
		  </div>
		  <div class="row shortdate">
		    <?php print drupal_render_children($form['group_medical_history']['field_sg_anticoagulant_date']); ?>
		  </div>
		  <div class="row">
		    <?php print drupal_render_children($form['group_medical_history']['field_sg_smoke']); ?>
		  </div>
		  <div class="row shortdate">
		    <?php print drupal_render_children($form['group_medical_history']['field_sg_smoke_date']); ?>
		  </div>
		  <div class="row">
		    <?php print drupal_render_children($form['group_medical_history']['field_sg_smoke_howmuch']); ?>
		  </div>
		  <div class="row">
		    <?php print drupal_render_children($form['group_medical_history']['field_sg_alcohol']); ?>
		  </div>
		  <div class="row">
		    <?php print drupal_render_children($form['group_medical_history']['field_sg_alcohol_howmuch']); ?>
		  </div>
		  <div class="row">
				<?php print drupal_render_children($form['group_medical_history']['field_fillers_botox']); ?>
			</div>
      <div class="row">
				<?php print drupal_render_children($form['group_medical_history']['field_fillers_botox_info']); ?>
			</div>
		  <?php print render($form['group_medical_history']['#suffix']);?>
		</div>
		
		<!------- Dental Section------>
		<div class="group_dental_detail">
		  <?php print render($form['group_dental_detail']['#prefix']);?>
		  
      <div class="row">
				<div class="pull-left col"><?php print drupal_render_children($form['group_dental_detail']['field_dental_plan_date']); ?></div>
				<div class="pull-right col"><?php print drupal_render_children($form['group_dental_detail']['field_dental_homedate']); ?></div>
			</div>
      <div class="row">
        <?php print drupal_render_children($form['group_dental_detail']['field_dental_concerns']); ?>
      </div>
      
      <div class="row">
        <?php print drupal_render_children($form['group_dental_detail']['field_dental_procedure']); ?>
      </div>
			
		  <div class="row">
        <?php print drupal_render_children($form['group_dental_detail']['field_dental_expectation']); ?>
      </div>
      
      <div class="row">
        <?php print drupal_render_children($form['group_dental_detail']['field_dental_questions']); ?>
      </div>
			<?php print render($form['group_dental_detail']['#suffix']);?>
		</div> 
		
    <div class="group_dental_medicines_condition">
		  <?php print render($form['group_dental_medicines_condition']['#prefix']);?>
      
      <div class="row">
        <?php print drupal_render_children($form['group_dental_medicines_condition']['field_dental_medicine']); ?>
      </div>
      
      <div class="row">
        <?php print drupal_render_children($form['group_dental_medicines_condition']['field_dental_supplements']); ?>
      </div>
      
      <div class="row">
        <?php print drupal_render_children($form['group_dental_medicines_condition']['field_dental_medical_conditions']); ?>
      </div>
      
      <?php print render($form['group_dental_medicines_condition']['#suffix']);?>
		</div> 
    
    
    <div class="group_dental_medical_history">
		  <?php print render($form['group_dental_medical_history']['#prefix']);?>
      
      <div class="row">
        <?php print drupal_render_children($form['group_dental_medical_history']['field_dental_medications']); ?>
      </div>
      
      <div class="row">
        <?php print drupal_render_children($form['group_dental_medical_history']['field_dental_vitamins']); ?>
      </div>
      
      <?php print render($form['group_dental_medical_history']['#suffix']);?>
		</div>
    
    
    
    <div class="group_dental_health">
		  <?php print render($form['group_dental_health']['#prefix']);?>
      
      <div class="row">
        <?php print drupal_render_children($form['group_dental_health']['field_dental_health']); ?>
      </div>
      
      <div class="row">
        <?php print drupal_render_children($form['group_dental_health']['field_dental_health_text']); ?>
      </div>
      
      <?php print render($form['group_dental_health']['#suffix']);?>
		</div>
    
    
    
		<div class="field_term_condition clearfix">
			<?php print drupal_render_children($form['field_term_condition']);?>
		</div>
		
		<div class="clearfix">
			<?php print render($form['mollom']);?>
		</div>
		
		<div class="clearfix">
			<?php if($user->uid == 1) {print render($form['additional_settings']);}?>
		</div>
		
		
		<div class="clearfix">
			<?php print render($form['actions']);?>
		</div>
		
		<div style="display:none;">
			<?php print drupal_render_children($form);?>
		</div>
</div>

<div class="overlay"  style="display:none;">
	<div class="title"><b>Please Note</b></div>
  <p>Photos must be uploaded before completing form.
  
  <div id="treatment" class="form-radios clearfix" style="margin-left:0px;">
    <div for="edit-field-treatment-type-und"><b>Please select the treatment you required</b></div>
    <div class="form-item form-type-radio form-item-field-treatment-type-und" style="float:none;">
     <input type="radio" id="surgery" name="treatment_type[und]"  <?php print ($arg[3] == 'surgery' || count($arg == 3)) ? "checked='checked'" : ''; ?> value="Surgery" class="form-radio">  
     <label class="option" for="edit-field-treatment-type-und-surgery">Surgery ONLY</label>
    </div>
    <div class="form-item form-type-radio form-item-field-treatment-type-und" style="float:none;">
     <input type="radio" id="dental" name="treatment_type[und]" <?php print ($arg[3] == 'dental') ? "checked='checked'" : ''; ?> value="Dental" class="form-radio">
     <label class="option" for="edit-field-treatment-type-und-dental">Dental ONLY</label>
    </div>
    <div class="form-item form-type-radio form-item-field-treatment-type-und" style="float:none;">
     <input type="radio" id="both" name="treatment_type[und]" <?php print ($arg[3] == 'both') ? "checked='checked'" : ''; ?> value="Both" class="form-radio">
     <label class="option" for="edit-field-treatment-type-und-both">Surgery AND Dental </label>
    </div>
  </div>
  </p>  
  
  <button type="button" class="custom-cancel" title="Cancel">Cancel</button>
  <button type="button" class="custom-ok" title="Ok">Ok</button>
</div>
<div style='margin:10px 0px;'><b style="text-decoration:underline;">Photos to upload</b><div class="heading-text">If someone else cannot take your photos, please use the timer function on your camera.</div></div>

<?php if($surgery || $both || count($arg) == 3): ?>
<div class="images-wrapper">
<div style='margin:10px 0px;'><b style="text-decoration:underline;">Breast Lift, Augmentation and Reduction</b><div class="heading-text">Arms should be by your sides.</div></div>
<div style='margin:10px 0px;width:290px;'><img src='<?php print $base_url ?>/sites/all/themes/smo/images/email_templates/new/BreastLiftAugmenationandReduction.png' width='290px' height='85px' /></div>
</div>

<div class="images-wrapper">
<div style='margin:10px 0px;'><b style="text-decoration:underline;">Face Lift, Neck Lift, Eyelids, Rhinoplasty and Ears</b><div class="heading-text">Full head from top to collarbone. Eyes open. No makeup or glasses. Hair pulled away from forehead, ears and neck. For nose surgery include photo of head tilted back.</div></div>
<div style='margin:10px 0px;width:253px;display:inline-block;'><img src='<?php print $base_url ?>/sites/all/themes/smo/images/email_templates/new/FaceLift.jpg' width='253px' height='85px'/>
</div>
<div style='margin:10px 0px;width:85px;display:inline-block;'><img src='<?php print $base_url ?>/sites/all/themes/smo/images/email_templates/new/FaceLift2.jpg' width='85px' height='85px'/>
</div>
</div>

<div class="images-wrapper">
<div style='margin:10px 0px;'><b style="text-decoration:underline;">Breast Lift, Augmentation, Reduction and Tummy Tuck and Liposuction</b><div class="heading-text">Arms should be by your sides.</div></div>
<div style='margin:10px 0px;width:286px;'><img src='<?php print $base_url ?>/sites/all/themes/smo/images/email_templates/new/BreastandTummyArea.jpg' width='286px' height='160px'/></div>
</div>

<div class="images-wrapper">
<div style='margin:10px 0px;'><b style="text-decoration:underline;">Arm Lift</b><div class="heading-text">Arms stretched out.</div></div>
<div style='margin:10px 0px;width:302px;'><img src='<?php print $base_url ?>/sites/all/themes/smo/images/email_templates/new/ArmLift.png' width='302px' height='85px'/>
</div>
</div>

<div class="images-wrapper">
<div style='margin:10px 0px;'><b style="text-decoration:underline;">Tummy Tuck and Liposuction</b><div class="heading-text">Arms should be by your sides.</div></div>
<div style='margin:10px 0px;width:305px;'><img src='<?php print $base_url ?>/sites/all/themes/smo/images/email_templates/new/TummyTuckDiagram2.jpg' width='305px' height='126px'/></div>
</div>

<div class="images-wrapper">
<div style='margin:10px 0px;'><b style="text-decoration:underline;">Buttock Lift and Buttock Implants</b></div>
<div style='margin:10px 0px;width:283px;'><img src='<?php print $base_url ?>/sites/all/themes/smo/images/email_templates/new/ButtockLift.jpg' width='283px' height='85px'/></div>
</div>

<div class="images-wrapper">
<div style='margin:10px 0px;'><b style="text-decoration:underline;">Thigh Lift and Liposuction</b></div>
<div style='margin:10px 0px;width:318px;'><img src='<?php print $base_url ?>/sites/all/themes/smo/images/email_templates/new/ThighLift.jpg' width='318px' height='100px'/></div>
</div>

<div class="images-wrapper">
<div style='margin:10px 0px;'><b style="text-decoration:underline;">Hair Transplant </b><div class="heading-text">Hair should be dry. All 5 photos required as surgeon is assessing donor area as well as bald areas.</div></div>
<div style='margin:10px 0px;width:419px;'><img src='<?php print $base_url ?>/sites/all/themes/smo/images/email_templates/new/HairTransplant.jpg' width='419px' height='115px'/></div>
</div>
<?php endif; ?>

<?php if($dental || $both): ?>
<div class="images-wrapper">
<div style='margin:10px 0px;'><b style="text-decoration:underline;">Dental </b><div class="heading-text">All 5 photos required as specialist is checking for alignment, wear and other issues.</div></div>
<div style='margin:10px 0px;width:599px;'><img src='<?php print $base_url ?>/sites/all/themes/smo/images/email_templates/new/Dental.jpg' width='599px' height='92px'/></div>
</div>

<div class="images-wrapper">
<div style='margin:10px 0px;'>Also, dental x-rays and OPG if available</div>
<div style='margin:10px 0px;width:138px;'><img src='<?php print $base_url ?>/sites/all/themes/smo/images/email_templates/new/Dental2.jpg' width='138px' height='75px'/></div>
</div>
<?php endif; ?>
<style>
div.images-wrapper {
  margin: 20px 0;  
}
div.heading-text,
span.heading-text {
  line-height:1em;  
}
.group_dental_health .form-item label,
.group_dental_health .form-item .description {
  padding-left:0px;
}
div.title {
  border:1px solid #c5c5c5;
  background-color: #dddddd;
  border-top-left-radius:5px;
  border-top-right-radius:5px;
  padding:5px;
}
div.overlay {
  z-index:101;
  border:1px solid #c5c5c5;
  background-color: #fff;
  position: absolute;
  left: 50%;
  top: 5%;
  transform: translate(-50%, -50%);
  border-radius:5px;
  padding:5px;
  max-width:320px;
  width:320px;
}
.node-surgeon-form .group_medical_history .form-item-field-fillers-botox-und label {width:30% !important;}
</style>

<script>
(function ($) {
	//jQuery('.page-node-add-surgeon .form-actions input[type="submit"]').attr('disabled','disabled');
	//jQuery('.page-node-add-surgeon .form-actions input:submit').attr('disabled','disabled');
	jQuery('.page-node-add-surgeon .surgeonform').hide();
	jQuery('.page-node-add-surgeon .overlay').hide();
	
	if (jQuery('.page-node-add-surgeon input:file').val() == '' && jQuery('.image-preview').length == 0) {
		jQuery('.page-node-add-surgeon .surgeonform').hide();
		jQuery('.page-node-add-surgeon .overlay').show();
	}
	else {
		jQuery('.page-node-add-surgeon .surgeonform').show();
	}
		
	jQuery('.page-node-add-surgeon input:file').change(
		function(){
		 if (jQuery(this).val()) {
				//jQuery('.form-actions input:submit').attr('disabled',false);
				jQuery('.page-node-add-surgeon .surgeonform').show();
				jQuery('.page-node-add-surgeon .overlay').hide();
		 } 
	});
	
	jQuery(document).ajaxComplete(function( event, request, settings ) {
    if (jQuery('.page-node-add-surgeon input:file').val() == '' && jQuery('.image-preview').length == 0) {
			jQuery('.page-node-add-surgeon .surgeonform').hide();
			jQuery('.page-node-add-surgeon .overlay').show();
		}
		else {
			jQuery('.page-node-add-surgeon .surgeonform').show();
			jQuery('.page-node-add-surgeon .overlay').hide();
		} 
  });
  
  jQuery('.page-node-add-surgeon .custom-ok').click(function(){
    jQuery('.page-node-add-surgeon .overlay').hide();
  });
  
  jQuery('.page-node-add-surgeon .custom-cancel').click(function(){
    window.location.href = document.referrer;
  });
}(jQuery));
</script>

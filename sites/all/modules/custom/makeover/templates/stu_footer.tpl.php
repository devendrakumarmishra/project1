<div class="hr"><hr /></div>
<div class="footer-note">
  <span style="width:88%;float:left;">
	<p>
	<b>Note:</b> Surgical procedures have benefits and risks and should be considered carefully. You should discuss this option with your doctor and ask if surgery overseas is right for you. A website review of your case cannot replace an individual assessment in person by a healthcare professional. Suitable travel insurance cover and medical complications insurance should be obtained.
	</p>
  </span>
  <span>
  <img src="https://stunningmakeovers.com/sites/all/themes/smo/images/comodo_secure_seal_113x59_transp.png">
  </span>
</div>
<div id="sitemap"> 
		<div class="sitemap-content-left">
			<p><?php echo l('HOME','node/7');?></p>
			<p><?php echo l('ABOUT US','node/34');?></p>
			<ul>
				<li><?php echo l('Why Choose Stunning Makeovers?','node/35');?></li>
				<li><?php echo l('Company History','node/34');?></li>
				<li><?php echo l('Ambassador Program','node/36');?></li>
			</ul>
			<p><?php echo l('OUR PROCESS','node/54');?></p>
			<ul>
				<li><?php echo l('Four Easy Steps','node/54');?></li>
				<li><?php echo l('Surgeons Form','node/add/surgeon');?></li>
		  </ul>	
			<p><?php echo l('SURGEONS','node/65');?></p>
			<p><?php echo l('COSTS','price-list');?></p>
			<ul>
				<li><?php echo l('Price List','price-list');?></li>	
				<li><?php echo l('Packages','node/73');?></li>		
				<li><?php echo l('Group Trips','node/557');?></li>				
				<li><?php echo l('Specials','node/105');?></li>
				<li><?php echo l('Finance','node/106');?></li>
			</ul>
			
			<!--<div class="newsletter-subcribe">
				<div class="newsletter-title">Sign up for newsletter</div>
				<div class="newsletter-form">
				<?php
				//block name: Aweber Newsletter
				//$block = module_invoke('aweber', 'block', 'view', 'aweber_form');
				//print $block['content'];
				?>
				</div>
			</div>-->
		</div>
		<div class="sitemap-content-center">
			<p><?php echo l('DESTINATIONS','node/96');?></p>
			<p class="head-procedure">Bangkok</p>
			<ul>
				<li><?php echo l('Bangpakok 9 International Hospital','node/721');?></li>
				<li><?php echo l('Vejthani International Hospital','node/67');?></li>
				<li><?php echo l('Yanhee International Hospital','node/66');?></li>
			  <li><?php echo l('Bangkok Smile Dental','node/68');?></li>
			</ul>
			<p class="head-procedure">Phuket</p>
			<ul>
				<li><?php echo l('Phuket Plastic Surgery Institute','node/731');?></li>
				<li><?php echo l('Sea Smile Dental','node/71');?></li>
				<li><?php echo l('Bangkok Phuket Hospital','node/69');?></li>
				<li><?php echo l('Phuket International Hospital','node/70');?></li>
			</ul>
			<p><?php echo l('WHAT CLIENTS SAY','node/28');?></p>
			<ul>
				<li><?php echo l('Testimonials','node/28');?></li>
				<!--<li><?php //echo l('Video Testimonials','node/30');?></li>-->
			</ul>
			<!--<p><?php //echo l('Media Center','node/32');?></p>
			<p><?php //echo l('Refer a friend','node/33');?></p>-->
			<p><?php echo l('Enquire Now','node/add/quote');?></p>
			<p><a href="/contact/Contact_us">Contact Us</a></p>
		</div>
		<div class="sitemap-content-procedure">
			<p style="margin-bottom: 15px;"><?php echo l('PROCEDURES WE OFFER','node/38');?></p>
			<?php
				$results = views_get_view_result('procedure_group_list', null);
				//echo '<pre>';
				//echo print_r($results);
				//echo print_r($results[0]->nid);
				foreach($results as $group){
					//echo '<pre>';
					//print_r($group);
				 echo views_embed_view("footer_procedure", "default",$group->nid);
				}
			?>
		</div>
		
		<div class="clear-block"></div>
</div>
<div class="clear-block"></div>
<div id="inner-footer"> 
	<!--<div id="icon">
		<a id="facebook" href="javascript:void(0)" ></a>
		<a id="twitter" href="javascript:void(0)" ></a>
		<a id="rss" href="/rss.xml" ></a> 
	</div>-->
	<div id="term">
		<?php echo l('Disclaimer','node/55');?><span class="line">|</span>
	</div>
	<div id="disclaimer">
		<?php echo l('Privacy Policy','node/56');?><span class="line">|</span>
	</div>
	<div id="license">
		<span id="footer-text-2"> &#169 Stunning Makeovers Ltd. All rights reserved.</span>
	</div>
</div>
<div class="clear-block"></div>

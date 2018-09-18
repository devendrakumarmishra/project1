<?php
// session_start() has to go right at the top, before any output!
	session_start();
	
	require_once ('soapclient/SforceEnterpriseClient.php');
	
	define("USERNAME", "nopporn@demo.com");
	define("PASSWORD", "password1234");
	define("SECURITY_TOKEN", "M5pc3YfinBmWOljqTq8hjlDj");
	
function makeover_salesforce($data) {
	global $mySforceConnection;
            try {
					//-------------------------------------------------------Conection----------------------------------------------------------------//
					//-----------------------------------------------------------------------------------------------------------------------------------//
					$mySforceConnection = new SforceEnterpriseClient();
					$mySforceConnection->createConnection("sites/all/modules/stu_quotation/soapclient/enterprise.wsdl.xml");
					
					// Simple example of session management - first call will do
					// login, refresh will use session ID and location cached in
					// PHP session
					// if (isset($_SESSION['enterpriseSessionId'])) {
						// $location = $_SESSION['enterpriseLocation'];
						// $sessionId = $_SESSION['enterpriseSessionId'];

						// $mySforceConnection->setEndpoint($location);
						// $mySforceConnection->setSessionHeader($sessionId);

						// echo "Used session ID for enterprise<br/>";
					// } else {
						$mySforceConnection->login(USERNAME, PASSWORD.SECURITY_TOKEN);

						$_SESSION['enterpriseLocation'] = $mySforceConnection->getLocation();
						$_SESSION['enterpriseSessionId'] = $mySforceConnection->getSessionId();

						echo "Logged in with enterprise<br/>";
					// }
					//-----------------------------------------------------------------------------------------------------------------------------------//
					//-----------------------------------------------------------------------------------------------------------------------------------//
					
					//CREATE - INSERT
					$account = array();
					$opportunity = array();
					
					//*********** Create Account ********************//
					$account[0] = new stdclass();
					$account[0]->Name = $data['name'];
					$account[0]->Email__c = $data['email'];
					$account[0]->Country__c = $data['country'];
					$account[0]->Date_of_Birth__c = $data['date_of_birth'];
					$account[0]->City__c = $data['city'];  
					$account[0]->Gender__c = $data['gender'];  
										
					if(!makeover_check_account($data['email'])){
						$acc_id = makeover_save_account($account);  //create new account
					}
					else{
						$acc_id = makeover_get_account_id($data['email']);  //if account already have
						makeover_update_account($acc_id,$data);
					}
					//********************************************//
					
					//****************Create  Opportunity********************//
					$opportunity[0] = new stdclass();			
					$opportunity[0]->AccountId = $acc_id;
					$opportunity[0]->Name = $data['plastic_surgery']." ".$data['dental_procedures_1']." ".$data['packages'];	
					$opportunity[0]->CloseDate = date("Y-m-d");
					$opportunity[0]->StageName = 'Proposal/Price Quote';
					$opportunity[0]->What_is_your_preferred_destination__c = $data['preferred_destination'];
					$opportunity[0]->When_do_you_plan_to_have_surgery__c = $data['have_surgery'];
					$opportunity[0]->Are_you_travelling_with_others__c = $data['travelling_with_others'];
					$opportunity[0]->How_Many__c = $data['how_many'];
					$opportunity[0]->Accommodation__c = $data['accommodation'];
					$opportunity[0]->Airfares__c = $data['airfares'];
					$opportunity[0]->From_city_or_airport__c = $data['from'];
					$opportunity[0]->Departing__c = $data['departing'];
					$opportunity[0]->To_city_or_airport__c = $data['to'];
					$opportunity[0]->Returning__c = $data['returning'];
					$opportunity[0]->Airport_tranfers__c = $data['airport_tranfers'];
					$opportunity[0]->Hospital_transfers__c = $data['hospital_transfers'];
					$opportunity[0]->How_did_you_find_out_about_us__c = $data['how_did_you_find'];
					$opportunity[0]->Can_we_contact_you_by_phone__c = $data['contact_you_by_phone'];
					$opportunity[0]->Contact_number__c = $data['contact_number'];	
					$opportunity[0]->informed_of_specials_and_updates__c = $data['specials_and_updates'];		
					$opportunity[0]->Plastic_Surgery_Non_surgical_Procedure__c = $data['plastic_surgery'];		
					$opportunity[0]->dental_Procedures_1__c = $data['dental_procedures_1'];
					$opportunity[0]->dental_Procedures_2__c = $data['dental_procedures_2'];
					$opportunity[0]->dental_Procedures_3__c = $data['dental_procedures_3'];
					$opportunity[0]->A_tooth_teeth_selected_1__c = $data['a_tooth'];
					$opportunity[0]->A_tooth_teeth_selected_2__c = $data['a_tooth_2'];
					$opportunity[0]->A_tooth_teeth_selected_3__c = $data['a_tooth_3'];
					$opportunity[0]->Packages__c = $data['packages'];
					
					$opportunity_id = makeover_save_opportunity($opportunity);
				
					//create product
					$plastic_surgery_nid = $data['plastic_surgery_nid'];
					$package_nid = $data['packages_nid'];
					$dental_nid_1 = $data['dental_procedures_nid'];
					$dental_nid_2 = $data['dental_procedures_nid_2'];
					$dental_nid_3 = $data['dental_procedures_nid_3'];
					$flight_nid = $data['flight_nid'];
					
					
					if(!makeover_check_product($flight_nid)){
						makeover_save_product($flight_nid,$opportunity_id);
					}
					else{
						makeover_opportunity_add_product($flight_nid,$opportunity_id);
						makeover_update_product($flight_nid);
					}
					
					if(!makeover_check_product($dental_nid_1)){
						makeover_save_product($dental_nid_1,$opportunity_id,$data['a_tooth']);
						
					}
					else{
						makeover_opportunity_add_product($dental_nid_1,$opportunity_id,$data['a_tooth']);
						makeover_update_product($dental_nid_1);
					}
					
					if(!makeover_check_product($dental_nid_2)){
						makeover_save_product($dental_nid_2,$opportunity_id,$data['a_tooth_2']);
					}
					else{
						makeover_opportunity_add_product($dental_nid_2,$opportunity_id,$data['a_tooth_2']);
						makeover_update_product($dental_nid_2);
					}
					
					if(!makeover_check_product($dental_nid_3)){
						makeover_save_product($dental_nid_3,$opportunity_id,$data['a_tooth_3']);
					}
					else{
						makeover_opportunity_add_product($dental_nid_3,$opportunity_id,$data['a_tooth_3']);
						makeover_update_product($dental_nid_3);
					}
				
					$s_plastic_nid = explode(",",$plastic_surgery_nid);
					foreach($s_plastic_nid as $nid){
						if(!makeover_check_product($nid)){
							makeover_save_product($nid,$opportunity_id);
						}
						else{
							makeover_opportunity_add_product($nid,$opportunity_id);
							makeover_update_product($nid);
						}
					}
					
					$s_package_nid = explode(",",$package_nid);
					foreach($s_package_nid as $nid){
						if(!makeover_check_product($nid)){
							makeover_save_product($nid,$opportunity_id);
						}
						else{
							makeover_opportunity_add_product($nid,$opportunity_id);
							makeover_update_product($nid);
						}
					}
            } catch (Exception $e) {
                echo "Exception ".$e->faultstring."<br/><br/>\n";
                echo "Last Request:<br/><br/>\n";
                echo $mySforceConnection->getLastRequestHeaders();
                echo "<br/><br/>\n";
                echo $mySforceConnection->getLastRequest();
                echo "<br/><br/>\n";
                echo "Last Response:<br/><br/>\n";
                echo $mySforceConnection->getLastResponseHeaders();
                echo "<br/><br/>\n";
                echo $mySforceConnection->getLastResponse();
            }
}
function makeover_check_product($pid){
	global $mySforceConnection;
	$query = "SELECT Name from Product2 where nid__c ='".$pid."'";
	$response = $mySforceConnection->query($query);
				
	if($response->size != 0){
		return 1;
	}
	else {
		return 0;
	}			
}			
function makeover_check_account($email){
	global $mySforceConnection;
	$query = "SELECT Name from Account where email__c ='".$email."'";
	$response = $mySforceConnection->query($query);
	
	if($response->size != 0){
		return 1;
	}
	else {
		return 0;
	}			
}
function makeover_get_account_id($email){
	global $mySforceConnection;
	$query = "SELECT Id from Account where email__c ='".$email."'";
	$response = $mySforceConnection->query($query);
	
	return $response->records[0]->Id;

}
function makeover_save_product($nid,$opportunity_id,$teeth = ' ') {
		global $mySforceConnection;
		$node  = node_load($nid);
		
		if($node->nid != '') {
			$product = array();
			
			// Create a new product
			$product[0] = new stdclass();	
			$product[0]->Name = $node->title;
			$product[0]->IsActive = true;
			$product[0]->nid__c = $node->nid;
			
			$unit_price = '';
			if($node->type == 'procedure'){
				$unit_price = $node->field_procedure_cost[0]['value'];
			}
			if($node->type == 'packages'){
				$unit_price = $node->field_package_price[0]['value'];
			}
			if($node->type == 'flight'){
				$unit_price = $node->field_filght_price[0]['value'];
			}
							
			$response = $mySforceConnection->create($product, 'Product2');  //Create  product	
			$product_id = $response->id;
		
			//Create a custom pricebook
			// $pricebook[0] = new stdclass();
			// $pricebook[0]->Name = 'Standard';
			// $pricebook[0]->IsActive = true;
			// $response_3 = $mySforceConnection->create($pricebook, 'Pricebook2');  //Create  product
			// $pricebook_id = $response_3->id;
			
			// Add product to standard pricebook
			$query = "SELECT Id from Pricebook2  where isStandard=true";
			$response_query = $mySforceConnection->query($query);
			$stdPbid = $response_query->records[0]->Id;
			
			// Create a pricebook entry for standard pricebook
			$pricebookentry[0] = new stdclass();
			$pricebookentry[0]->IsActive = true;
			$pricebookentry[0]->UnitPrice = $unit_price.".0";
			$pricebookentry[0]->Pricebook2Id = $stdPbid;
			$pricebookentry[0]->Product2Id = $product_id;
			$response_4 = $mySforceConnection->create($pricebookentry, 'PricebookEntry');
			$pricebookEntry_id = $response_4->id;
			
			//add standard price book to Opportunity 
			$opportunity_update[0] = new stdclass();
            $opportunity_update[0]->Id = $opportunity_id;
            $opportunity_update[0]->Pricebook2Id = $stdPbid;
            $response_5 = $mySforceConnection->update($opportunity_update, 'Opportunity');
			
			//create OpportunityLineItem for Opportunity add product
			$opportunityLineItem[0] = new stdclass();
            $opportunityLineItem[0]->PricebookEntryId = $pricebookEntry_id;
			$opportunityLineItem[0]->OpportunityId = $opportunity_id;
			$opportunityLineItem[0]->Quantity = '1.0';
			$opportunityLineItem[0]->UnitPrice = $unit_price.".0";
			$opportunityLineItem[0]->Description = $teeth;
			$response_6 = $mySforceConnection->create($opportunityLineItem, 'OpportunityLineItem');
			
		}
		if($response->success == 1 ){
            echo "Product success</br>";				
		}
		else {
            echo "Product Error: ".$response->errors->message."<br/>\n";
		}
}
function makeover_opportunity_add_product($nid,$opportunity_id,$teeth = ' '){    //if product already had
	global $mySforceConnection;
	if($nid != ''){
			$node  = node_load($nid);
			$product_id = '';
			
			$query = "SELECT Id , Name from Product2 where nid__c ='".$nid."'";
			$response_query = $mySforceConnection->query($query);
			$product_id = $response_query->records[0]->Id;
			
			$unit_price = '';
			if($node->type == 'procedure'){
				$unit_price = $node->field_procedure_cost[0]['value'];
			}
			if($node->type == 'packages'){
				$unit_price = $node->field_package_price[0]['value'];
			}
			if($node->type == 'flight'){
				$unit_price = $node->field_filght_price[0]['value'];
			}
			
			$query = "SELECT Id from Pricebook2  where isStandard=true";
			$response_query = $mySforceConnection->query($query);
			$stdPbid = $response_query->records[0]->Id;
			
			// query a pricebook entry for standard pricebook
			$query = "SELECT Id , Name from PricebookEntry where Product2Id ='".$product_id."'";
			$response_PricebookEntry = $mySforceConnection->query($query);
			$pricebookEntry_id = $response_PricebookEntry->records[0]->Id;
		
			
			//add standard price book to Opportunity 
			$opportunity_update[0] = new stdclass();
            $opportunity_update[0]->Id = $opportunity_id;
            $opportunity_update[0]->Pricebook2Id = $stdPbid;
            $response_5 = $mySforceConnection->update($opportunity_update, 'Opportunity');
			
			//create OpportunityLineItem for Opportunity add product
			$opportunityLineItem[0] = new stdclass();
            $opportunityLineItem[0]->PricebookEntryId = $pricebookEntry_id;
			$opportunityLineItem[0]->OpportunityId = $opportunity_id;
			$opportunityLineItem[0]->Quantity = '1.0';
			$opportunityLineItem[0]->UnitPrice = $unit_price.".0";
			$opportunityLineItem[0]->Description = $teeth;
			$response_6 = $mySforceConnection->create($opportunityLineItem, 'OpportunityLineItem');	

	}
}

function makeover_save_account($account) {
		global $mySforceConnection;		
		
		
		$response = $mySforceConnection->create($account, 'Account');  //Create  Account		
		
		if($response->success == 1 ){
                    echo " account success </br>";				
		}
		else {
            echo "account Error: ".$response->errors->message."<br/>\n";
		}
		
	return($response->id);
}
function makeover_save_opportunity($opportunity) {
		global $mySforceConnection;
		$response = $mySforceConnection->create($opportunity, 'Opportunity');  //Create  opportunity	
		$opportunity_id  = $response->id;
		
		if($response->success == 1 ){
            echo "opportunity success </br>";
		}
		else {
            echo "opportunity Error: ".$response->errors->message."<br/>\n";
		}
		return($opportunity_id);
}
function makeover_update_account($acc_id,$data) {
		global $mySforceConnection;
		
		$account[0] = new stdclass();
		$account[0]->Id = $acc_id;
		$account[0]->Name = $data['name'];
		$account[0]->Email__c = $data['email'];
		$account[0]->Country__c = $data['country'];
		$account[0]->Date_of_Birth__c = $data['date_of_birth'];
		$account[0]->City__c = $data['city'];  
		$account[0]->Gender__c = $data['gender']; 
		
		$response = $mySforceConnection->update($account, 'Account');
		
		if($response->success == 1 ){
            echo "update account success </br>";
		}
		else {
            echo "update account Error: ".$response->errors->message."<br/>\n";
		}
}
function makeover_update_product($nid){
	global $mySforceConnection;
	
	$query = "SELECT Id from Product2 where nid__c ='".$nid."'";
	$response = $mySforceConnection->query($query);
	
	$product_id = $response->records[0]->Id;
	
	$node  = node_load($nid);
		
		if($node->nid != '') {
			$product = array();
			
			// Create a new product
			$product[0] = new stdclass();	
			$product[0]->Id  = $product_id;
			$product[0]->Name = $node->title;
			$product[0]->IsActive = true;
			$product[0]->nid__c = $node->nid;
			
			$unit_price = '';
			if($node->type == 'procedure'){
				$unit_price = $node->field_procedure_cost[0]['value'];
			}
			if($node->type == 'packages'){
				$unit_price = $node->field_package_price[0]['value'];
			}
			if($node->type == 'flight'){
				$unit_price = $node->field_filght_price[0]['value'];
			}
							
			$response = $mySforceConnection->update($product, 'Product2');  //Create  product	
			
		}
		if($response->success == 1 ){
            echo "update product success </br>";
		}
		else {
            echo "update product Error: ".$response->errors->message."<br/>\n";
		}


}
	
	
?>



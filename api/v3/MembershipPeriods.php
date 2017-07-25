<?php
function civicrm_api3_membership_periods_get($params) {
	$cid = $params['cid'];
	$check = "SELECT p.start_date, p.end_date, p.renewed_date, p.contribution_id 
		  FROM civicrm_membership_period p
		  INNER JOIN civicrm_membership m ON m.id = p.membership_id
	      WHERE m.contact_id = $cid
			     ";
		$results = CRM_Core_DAO::executeQuery($check);

		$myarray = array();
			$i=0;
			while($results->fetch()){
				$myarray[$i][0] = $results->start_date;
				$myarray[$i][1] = $results->end_date;
				$myarray[$i][2] = $results->renewed_date;
				$myarray[$i][3] = $results->contribution_id;
				$i++;
			}
			return $myarray;
}

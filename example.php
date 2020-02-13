<?php



		require_once('authorizedNetClass.php');



		/****** Production credentials for LA ******/
		//$authorizeNet	=	new authorize_net_payments('6x2DfjdmY7q', '23J48EpuP7p6Hmwg', false);

		/****** Sandbox credentials for LA ******/
		$authorizeNet	=	new authorize_net_payments('4CpQc73aS', '53T2fB65Ms844gz2', true);


		$amount_to_charge			=	34.99;
		$fp_sequence					=	76768;

		$fingerprint	=	$authorizeNet->generate_authorizeNet_fingerprint($amount_to_charge,$fp_sequence);

		$authorizeNet->add_form_field("x_invoice_num","88766");
		$authorizeNet->add_form_field("x_description","default order description");
		$authorizeNet->add_form_field("x_fp_sequence",$fp_sequence);
		$authorizeNet->add_form_field("x_amount",$amount_to_charge);
		$authorizeNet->add_form_field("x_fp_hash",$fingerprint);
		$authorizeNet->add_form_field("x_custom_field_1","Define your own fields and values");
		$authorizeNet->add_form_field("x_custom_field_2","Define your own fields and values");
		$authorizeNet->add_form_field("x_custom_field_3","Define your own fields and values");

		echo $authorizeNet->generate_form();

?>

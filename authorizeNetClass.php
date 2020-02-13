<?php



		require_once('authorized.net/autoload.php');



		class authorize_net_payments{

			private $api_login_id;
			private $transaction_key;
			private $test_mode;
			private $form_fields	=	array();
			private $timestamp;
			private $endpoint_url;

			function authorize_net_payments($api_login, $api_transaction_key, $test_mode=true){
				$this->api_login_id			=	$api_login;
				$this->transaction_key	=	$api_transaction_key;
				$this->test_mode	=	$test_mode;
				$this->timestamp	=	time();
				$this->set_endpoint_url();
			}

			function set_endpoint_url(){
					if($this->test_mode){
							$this->endpoint_url		=	'https://test.authorize.net/gateway/transact.dll';
					}else{
							$this->endpoint_url		=	'https://secure.authorize.net/gateway/transact.dll';
					}
			}

			function generate_authorizeNet_fingerprint($amount, $fp_sequence){
					return AuthorizeNetSIM_Form::getFingerprint($this->api_login_id, $this->transaction_key, $amount, $fp_sequence, $this->timestamp);
			}

			function add_form_field($key, $val){
				$this->form_fields[$key]	=	$val;
			}

			function generate_form(){

						$this->add_form_field("x_method","cc");
						$this->add_form_field("x_version","3.1");
						$this->add_form_field("x_login",$this->api_login_id);
						$this->add_form_field("x_fp_timestamp",$this->timestamp);
						$this->add_form_field("x_show_form","payment_form");

						if($this->test_mode){
									$this->add_form_field("x_test_request","true");
						}else{
									$this->add_form_field("x_test_request","false");
						}




						foreach($this->form_fields as $key=>$val){
							  $fields .= '<input type="hidden" name="'.$key.'" value="'.$val.'" />'."\n";
						}

						$form_data	=	'<form method="post" id="p_form" action="'.$this->endpoint_url.'">';
						$form_data	.=	$fields;
						$form_data	.=	"<input type=\"submit\" value=\"Pay Now\"/>\n";
						$form_data	.=	'</form>';

				return $form_data;
			}



		}



		



?>


# Authorize.net API (SIM) Wrapper PHP Class
This PHP class allows you to generate payment forms to integrate Authorize.net SIM API. The library allows you to generate SIM based checkout forms which allow merchants to charge credit cards of their customers.

## Authorize.net Sandbox Account for Testing
Before you start integrating this Authorize.net API into your applications, you need to [register for Authorize.net sandbox account](https://developer.authorize.net/hello_world/sandbox/). If you already have that sandbox account, you may need to [login to Authorize.net sandbox account](https://logintest.authorize.net/).

## Example Usage of This Class
```sh
$authorizeNet	=	new authorize_net_payments('4CpQc73aS', '53T2fB65Ms844gz2', true);
$amount_to_charge	=	34.99;
$fp_sequence		=	76768;

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


```

## The Aurhorize.net Order Form

```sh

<form method="post" id="p_form" action="https://test.authorize.net/gateway/transact.dll"><input type="hidden" name="x_invoice_num" value="88766" />
<input type="hidden" name="x_description" value="default order description" />
<input type="hidden" name="x_fp_sequence" value="76768" />
<input type="hidden" name="x_amount" value="34.99" />
<input type="hidden" name="x_fp_hash" value="c62a55df3e160dee3897e4f2ddcacedd" />
<input type="hidden" name="x_custom_field_1" value="Define your own fields and values" />
<input type="hidden" name="x_custom_field_2" value="Define your own fields and values" />
<input type="hidden" name="x_custom_field_3" value="Define your own fields and values" />
<input type="hidden" name="x_method" value="cc" />
<input type="hidden" name="x_version" value="3.1" />
<input type="hidden" name="x_login" value="4CpQc73aS" />
<input type="hidden" name="x_fp_timestamp" value="1581635186" />
<input type="hidden" name="x_show_form" value="payment_form" />
<input type="hidden" name="x_test_request" value="true" />
<input type="submit" value="Pay Now"/>
</form>



```


## Authorize.net Test Credit Card Numbers

| Credit Card Type | Credit Card Number |  Credit Card Number | CVV |
| ------ | ------ | ------ | ------ |
| VISA | 4007 0000 0002 7 | 10/2026 | 999 |
|  | 4012 8888 1888 8 | 10/2026 | 999 |
|  | 4111 1111 1111 1111 | 10/2026 | 999 |
| MasterCard | 2222 4200 0000 1113 | 10/2026 | 999 |
|  | 5424 0000 0000 0015 | 10/2026 | 999 |
|  | 2223 0000 1030 9703 | 10/2026 | 999 |
|  | 2223 0000 1030 9711 | 10/2026 | 999 |
| American Express  | 3700 0000 0000 002 | 10/2026 | 999 |
| Discover  | 6011 0000 0000 0012 | 10/2026 | 999 |
| JCB | 3088 0000 0000 0017 | 10/2026 | 999 |



## Checkout My Other Libraries on Github

Here are few more PHP libraries programmed by me, have a look if you need it.

| Site Name | URL |
| ------ | ------ |
| Cybersource API | https://github.com/shahzad11/cybersource-api |
| PHP Gender Predictor | https://github.com/shahzad11/php-gender-predictor-class |
| MySql CRUD | https://github.com/shahzad11/Mysql-CRUD |



## Helpful Websites

Here is a list of helpful websites to learn more about programming.

| Site Name | URL |
| ------ | ------ |
| Designs Valley | https://designsvalley.com |
| WordPress Blog Help | https://wpbloghelp.com |
| Web Zeto | https://webzeto.com |
| Shahzad Mirza | http://shahzadmirza.com |



[![Designs Valley](https://designsvalley.com/wp-content/uploads/2020/02/small-logo.png)](https://designsvalley.com)

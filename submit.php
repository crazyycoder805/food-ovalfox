<?php
require_once 'assets/includes/config.php';
if(isset($_POST['stripeToken'])){
	\Stripe\Stripe::setVerifySslCerts(false);

	$token=$_POST['stripeToken'];

	$data=\Stripe\Charge::create(array(
		"amount"=>1000,
		"currency"=>"gbp",
		"description"=>"Programming with Vishal Desc",
		"source"=>$token,
	));

	echo "<pre>";
	print_r($data);
}
?>
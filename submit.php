<?php
require_once 'assets/includes/config.php';
require_once 'assets/includes/pdo.php';


if(isset($_POST['stripeToken'])){
	\Stripe\Stripe::setVerifySslCerts(false);

	$token=$_POST['stripeToken'];

	$data=\Stripe\Charge::create(array(
		"amount"=>1000,
		"currency"=>"gbp",
		"description"=>"Programming with Vishal Desc",
		"source"=>$token,
	));
	$pdo->create("stripe_payments", ['payment_status' => json_encode($data), 'status' => json_decode(json_encode($data), true)['status']]);
	$data = json_decode($pdo->read("stripe_payments", ['id' => 3])[0]['payment_status'], true);
	if($data['status'] == "succeeded") {
		echo "Payment success. refreshing...";
		$pdo->headTo("index.php",3000);
	} else {
		echo "Payment failed. refreshing...";
		$pdo->headTo("index.php",3000);

	}
}



?>
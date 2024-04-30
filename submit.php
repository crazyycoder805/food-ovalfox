<?php
session_start();
require_once 'assets/includes/config.php';
require_once 'assets/includes/pdo.php';

if ($_POST['pay_with'] == "cod") {
	$postData = $_POST;
	$transformedData = array();
	$tempArray = array();
	foreach ($postData as $key => $value) {
		if ($key !== 'total_final_amount' && $key !== 'pay_with') {
			$tempArray[$key] = $value;
	
			if (count($tempArray) == 4) {
				$transformedData[] = array_values($tempArray);
				$tempArray = array();
			}
		}
	}
	
	if (!empty($tempArray)) {
		$transformedData[] = array_values($tempArray);
	}
	$all_cart_items = $pdo->read("cart", ['user_id' => $_SESSION['food_project_user_id']]);
	$paymentSuccess = false;
		$paymentFailed = false;

		foreach ($all_cart_items as $key => $aci) {
			$food = $pdo->read("food", ['id' => $aci['food_id']]);
			if ($pdo->create("stripe_payments", ['status' => "succeeded", 'food_id' => $food[0]['id'], 'quantity' => $transformedData[$key][2], 
			'total' => $transformedData[$key][3], 'final_amount' => $_POST['total_final_amount'], 'sub_total' => $_POST['sub-total-input'], 
			'discounted_amount' => $_POST['discounted_amount_input'], 'order_status' => 'pending', 'user_id' => $_SESSION['food_project_user_id'], 
			'pay_with' => $_POST['pay_with'], 'vat' => 3.20, 'dc' => 2.50]) && 
			$pdo->delete("cart", $_SESSION['food_project_user_id'], 'user_id')) {
				$paymentSuccess = true;
			} else {
				$paymentFailed = true;
			}
		}

		if ($paymentSuccess) {
			echo "Payment success. refreshing...";
		} elseif ($paymentFailed) {
			echo "Payment failed. refreshing...";
		}
		$pdo->headTo("index.php", 3000);

} else {
	if(isset($_POST['stripeToken'])){
		$postData = $_POST;
		
		$transformedData = array();
		$tempArray = array();
		foreach ($postData as $key => $value) {
			if ($key !== 'total_final_amount' && $key !== 'pay_with') {
				$tempArray[$key] = $value;
		
				if (count($tempArray) == 4) {
					$transformedData[] = array_values($tempArray);
					$tempArray = array();
				}
			}
		}
		
		if (!empty($tempArray)) {
			$transformedData[] = array_values($tempArray);
		}
		\Stripe\Stripe::setVerifySslCerts(false);
	
		$token=$_POST['stripeToken'];
	
		$data=\Stripe\Charge::create(array(
			"amount"=>$_POST['total_final_amount'],
			"currency"=>"gbp",
			"description"=>"Sweet Delightness",
			"source"=>$token,
		));
		
		
		$all_cart_items = $pdo->read("cart", ['user_id' => $_SESSION['food_project_user_id']]);
		
		$paymentSuccess = false;
		$paymentFailed = false;

		foreach ($all_cart_items as $key => $aci) {
			$food = $pdo->read("food", ['id' => $aci['food_id']]);
			if ($pdo->create("stripe_payments", ['food_id' => $food[0]['id'], 'quantity' => $transformedData[$key][2], 
			'total' => $transformedData[$key][3], 'final_amount' => $_POST['total_final_amount'], 'sub_total' => $_POST['sub-total-input'], 
			'discounted_amount' => $_POST['discounted_amount_input'], 'order_status' => 'pending', 'user_id' => $_SESSION['food_project_user_id'], 
			'pay_with' => $_POST['pay_with'], 'vat' => 3.20, 'dc' => 2.50,'payment_status' => json_encode($data), 
			'status' => json_decode(json_encode($data), true)['status']]) && 
			$pdo->delete("cart", $_SESSION['food_project_user_id'], 'user_id')) {
				$paymentSuccess = true;
			} else {
				$paymentFailed = true;
			}
		}

		if ($paymentSuccess) {
			echo "Payment success. refreshing...";
		} elseif ($paymentFailed) {
			echo "Payment failed. refreshing...";
		}
		$pdo->headTo("index.php", 3000);


	

		
	}
	
}





?>
<?php 

	$peticionAjax = true;

	if (isset($_POST['amount_pay']) ) {
		
		require_once '../controller/homeController.php';
		$inst = new homeController();
 
		if (isset($_POST['amount_pay'])) { 
			$inst -> updatePayment();
		}

	} 
<?php

namespace App\Http\Controllers\Sales;

use Symfony\Component\HttpFoundation\Request as BaseRequest;
use GuzzleHttp\Client;

class SalesCall extends BaseRequest {

	public function __construct() {
	}

	/**
	 * Make an API call to PayMe
	 * @param $params - the data array
	 * @param string - $paymeUrl
	 * @param string - $paymentId
	 * @return mixed
	 */
	public function callPayMe($params,$paymeUrl,$paymentId) {

		$client = new Client([
			'headers' => ['Content-Type' => 'application/json']
		]);

		try {
		$response = $client->post($paymeUrl,[
			\GuzzleHttp\RequestOptions::JSON => [
				"seller_payme_id" => $paymentId,
				"sale_price"      => $params['sale_price'],
				"currency"        => $params['currency'],
				"product_name"    => $params['product_name'],
				"installments"    => $params['installments'],
				"language"        => $params['language'],
			]
		]);
		} catch (\Exception $e) {
			echo"Error with PayMe server response! <br>".$e->getMessage(); die();
		}

		$preResponseCode = var_export($response->getStatusCode(),true);
		$preResponse     = trim(var_export($response->getBody()->getContents(),true),"'");

		if($preResponseCode!=200) {
			echo"Error with PayMe server response!"; die();
		}

		$ResponseAfter = json_decode($preResponse);

		return $ResponseAfter;
	}
}
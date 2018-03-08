<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Sales\SalesModel;
use App\Http\Controllers\Sales\SalesCall;

class SalesController extends Controller {

	private static $paymentId;
	private $paymeUrl = "https://preprod.paymeservice.com/api/generate-sale";

	const INSTALLMENTS = '1';
	const LANGUAGE = 'en';

	public function __construct() {

		self::$paymentId = "MPL14985-68544Z1G-SPV5WK2K-0WJWHC7N";
	}

	/**
	 * Show sale input form
	 * @param SalesModel $salesModel
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function sale(SalesModel $salesModel) {

		return view("saleForm",[
			"currencies"   => $salesModel->getCurrencies(),
			"paymentId"    => self::$paymentId,
			"installments" => SalesController::INSTALLMENTS,
			"language"     => self::LANGUAGE
		]);
	}

	/**
	 * Submit the sale request
	 * @param SalesModel $salesModel
	 * @param SalesCall $salesCall
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function submitSale(SalesModel $salesModel,SalesCall $salesCall) {

		$showToUser = array();

		if(!empty($_GET)) {      // little validation
			$sellerPaymeId = isset($_GET['seller_payme_id']) ? $_GET['seller_payme_id'] : "";
			$salePrice     = isset($_GET['sale_price']) ? intval($_GET['sale_price']) : "";
			$currency      = isset($_GET['currency']) ? substr($_GET['currency'],0,3) : "";
			$installments  = isset($_GET['installments']) ? intval(substr($_GET['installments'],0,1)) : "";
			$language      = isset($_GET['language']) ? substr($_GET['language'],0,2) : "";
			$description   = isset($_GET['description']) ? $_GET['description'] : "";

			$params = array(
				"seller_payme_id" => $sellerPaymeId,
				"sale_price"      => $salePrice,
				"currency"        => $currency,
				"product_name"    => $description,
				"installments"    => $installments,
				"language"        => $language
			);

			$response = $salesCall->callPayMe($params,$this->paymeUrl,SalesController::$paymentId);     // make the api call
			if(!$response->transaction_id) {
				$response->transaction_id = 0;
			}

			$salesModel->storeSaleData($response,$description);          // store the response

			$showToUser = array(
				"Time"         => now(),
				"Sale Number"  => $response->payme_sale_code,
				"Description"  => $description,
				"Amount"       => $salePrice,
				"Currency"     => $currency,
				"Payment Link" => $response->sale_url,
			);
		}

			$sales = $salesModel->getAllSales();

			return view("saleRepones",[
				"showToUser" => $showToUser,
				"sales" => $sales,
			]);
/*		}
		catch (Exception $e) {
			throw new Exception("Error saving payment",111);
		}*/
	}
}


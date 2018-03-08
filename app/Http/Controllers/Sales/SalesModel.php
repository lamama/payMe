<?php

namespace App\Http\Controllers\Sales;

use Illuminate\Support\Facades\DB;

class SalesModel {

	public $currencies;

	public function __construct() {

		//	$this->getCurrencies();
	}

	/**
	 * Get the available currencies
	 * @return object|mixed
	 */
	public function getCurrencies() {

		try {
			$this->currencies = DB::select('SELECT * FROM currency WHERE active = ?',[1]);

			return $this->currencies;
		}
		catch(\Throwable $e) {
			DB::rollback();
			throw new Exception  ("Error fetching currencies ".$e->getMessage(),333);
		}
	}

	/**
	 * Get all sales that already made
	 * @return mixed
	 */
	public function getAllSales() {

		try {
			$sales = DB::select('SELECT s.dateTime,s.price,s.description,s.currency,s.payme_sale_code  FROM sales as s');

			return $sales;
		}
		catch(\Throwable $e) {
			DB::rollback();
			throw new Exception  ("Error fetching sales ".$e->getMessage(),333);
		}
	}

	/**
	 * Store the sale data
	 * @param $data object
	 * @param $description string
	 */
	public function storeSaleData($data,$description) {

		DB::beginTransaction();

		try {
			$data = DB::insert('INSERT INTO `sales` (`id`, `status_code`, `sale_url`, `seller_payme_id`, `payme_sale_code`, `price`, `transaction_id`, `currency`, `description`) VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?)',[
				$data->status_code,
				$data->sale_url,
				$data->payme_sale_id,
				$data->payme_sale_code,
				$data->price,
				$data->transaction_id,
				$data->currency,
				$description,
			]);

			DB::commit();
		}
		catch(\Throwable $e) {
			DB::rollback();
			die("Error saving sale");
		}
	}
}
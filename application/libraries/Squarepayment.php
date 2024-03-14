<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Razorpay PHP library
 *
 **/

require_once APPPATH . "third_party/squarepayment/vendor/autoload.php";

use Square\SquareClient;
use Square\LocationsApi;
use Square\Environment;
use Square\Exceptions\ApiException;
use Square\Http\ApiResponse;
use Square\Models\ListLocationsResponse;
use Square\Models\Money;
use Square\Models\CreatePaymentRequest;
use Square\Models\createPayment;

class Squarepayment
{
	/**
	 * Privates
	 */
	private $ci;
	private $accessToken = '';
	private $environment;
	private $currency;

	/**
	 * Constructor
	 *
	 * @access public
	 * @param array
	 */
	public function __construct()
	{
		$this->ci =& get_instance();
  	     $payment_settings = $this->ci->settings_model->get_payment_settings();
		 $this->accessToken = $payment_settings->square_accessToken;
		// $this->environment = $payment_settings->razorpay_key_secret;
		 $this->currency = $payment_settings->default_product_currency;

	}

	/**
	 * Create Order
	 *
	 * @access public
	 */
	public function create_order($array)
	{
		$square_client = new SquareClient([
			'accessToken' => $this->accessToken,
			'environment' => Environment::SANDBOX,
		]);
		//$amount_money = new Money();
		//$amount_money->setAmount($array['amount']);
		//$amount_money->setCurrency($this->currency);

		// Every payment you process with the SDK must have a unique idempotency key.
		// If you're unsure whether a particular payment succeeded, you can reattempt
		// it with the same idempotency key without worrying about double charging
		// the buyer.

		$orderId = rand(9000,1000);;
		$amount_money = new \Square\Models\Money();
		$amount_money->setAmount($array['amount']);
		$amount_money->setCurrency($this->currency);


		$body = new \Square\Models\CreatePaymentRequest($array['sourceId'], $orderId);
		$body->setAmountMoney($amount_money);
		//$body->setAppFeeMoney($app_fee_money);
		$body->setAutocomplete(true);
		$body->setCustomerId($array['cust_id']);
		///$body->setLocationId('LMBAMY9TF81MC');
		//$body->setReferenceId('123456');
		$body->setNote($array['desc']);

		$api_response = $square_client->getPaymentsApi()->createPayment($body);
		if ($api_response->isSuccess()) {
			$success = $api_response->getResult();
			$result = $api_response->getBody();
			$resp_dec = json_decode($result, true);
			$transid = $resp_dec["payment"]["id"];
			$created_at = $resp_dec["payment"]["created_at"];
			$amount = $resp_dec["payment"]['amount_money']["amount"];
			$currency = $resp_dec["payment"]['amount_money']["currency"];
			$status = $resp_dec["payment"]["status"];
			$receipt_number = $resp_dec["payment"]["receipt_number"];
			$receipt_url = $resp_dec["payment"]["receipt_url"];
		
			$resultarray = array(
				'txn_id' => $transid,
				'created_at' => $created_at,
				'amount' => $amount,
				'currency' => $currency,
				'status' => $status,
				'receipt_number' => $receipt_number,
				'receipt_url' => $receipt_url,
			);
			 return $resultarray;
		} else {
			$errors = $api_response->getErrors();
			return json_encode($errors);
		}
		
	}


}


<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Orders extends Core_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->is_not_logged_in();
		$this->table_name='orders';
		$this->view_path='admin/order/';
	}

	/**
	 * Orders
	 */
	public function index()
	{
		$data['form_action'] = admin_url() . "orders";
		//$pagination = $this->paginate(admin_url() . 'orders', $this->order_model->get_orders_count());
	//	$data['orders'] = $this->order_model->get_paginated_orders($pagination['per_page'], $pagination['offset']);
		$header['pagecss']="contentCss";
		$header['title']='Orders';
		$this->load->view('admin/partials/header',$header);
		$data['orders']=$this->select->select_table($this->table_name,'id','asc');
		$this->load->view($this->view_path.'orders',$data);
		$script['pagescript']='contentScript';
		$this->load->view('admin/partials/footer',$script);

	}

	/**
	 * Order Details
	 */
	public function order_details($id)
	{
		$data['order'] = $this->order_model->get_order($id);
		if (empty($data['order'])) {
			redirect(admin_url() . "orders");
		}
		$data['order_products'] = $this->order_model->get_order_products($id);
		$datatitm = $this->order_model->get_order_products($id);
		$data['order_id'] = $id;
		$data['buyer_id'] = $datatitm[0]->buyer_id;

		$header['pagecss']="contentCss";
		$header['title']='Order';
		$this->load->view('admin/partials/header',$header);
		$this->load->view($this->view_path.'order_details', $data);
		$script['pagescript']='contentScript';
		$this->load->view('admin/partials/footer',$script);	
	}

	/**
	 * Order Options Post
	 */
	public function order_options_post()
	{
		$order_id = $this->input->post('id', true);
		$option = $this->input->post('option', true);

		if ($option == "payment_received") {
			$this->order_model->update_order_payment_received_admin($order_id);

			$this->order_model->update_payment_status_if_all_received($order_id);
			$this->order_model->update_order_status_if_completed($order_id);
		}

		$this->session->set_flashdata('success', 'Successfully Updated');
		redirect($this->agent->referrer());
	}

	/**
	 * Delete Order Post
	 */
	public function delete()
	{
		$id = $this->input->post('id', true);
		if ($this->order_model->delete_order($id)) {
			echo 'Deleted Successfully';
			//$this->session->set_flashdata('success', 'Deleted Successfully');
		} else {
			echo 'error';
			//$this->session->set_flashdata('error', 'error');
		}
	}

	/**
	 * Update Order Product Status Post
	 */
	public function update_order_product_status_post()
	{
		$id = $this->input->post('id', true);
		$order_product = $this->order_model->get_order_product($id);
		if (!empty($order_product)) {
			if ($this->order_model->update_order_product_status_admin($order_product->id)) {
				$order_status = $this->input->post('order_status', true);
				if ($order_product->product_type == "digital") {
					if ($order_status == 'completed' || $order_status == 'payment_received') {
						$this->order_model->add_digital_sale($order_product->product_id, $order_product->order_id);
						//add seller earnings
						//$this->earnings_model->add_seller_earnings($order_product);
					}
				} else {
					if ($order_status == 'completed') {
                    /////send sms
                    		$buyers = $this->auth_model->get_user($order_product->buyer_id);
                            // $senderId = 'MAGXRT';
             				// $templateID = '1707167113092657812';  	
                    
             				// $smstext = 'Dear '.$buyers->first_name.', Your Order is delivered, Order ID is '.select_value_by_id('orders','id',$order_product->order_id,'order_number') .' - Magxmart india.';
							// send_sms($buyers->phone_number,$senderId,$templateID,$smstext);
                            // $this->email_template->order_delivered_to_buyer($order_product->buyer_id,$order_product->order_id,$order_product->id);
						//add seller earnings
					//	$this->earnings_model->add_seller_earnings($order_product);
                    
		
					} else {
                    
                    	if($order_status == 'shipped'){
                      //  echo 'Buyer Id= '.$order_product->buyer_id;
                      //  echo '<br>Seller Id='.$order_product->seller_id;
                       // echo '<br>Product Id= '.$order_product->product_title;
                        
                      //  orderManifest($awb , $order_no ,$buyer ,$seller, $invoice_no, $itemCategory ){
        			//	$consignee = consignee_details_by_id($order_product->buyer_id);
           			  // $pickup = pickup_details_by_id($order_product->seller_id);

    					//  $awbNo = $this->ecom->fetchWayBill(1);
    					//  $orderManifest = $this->ecom->orderManifest($awbNo->awb[0] , $order_product->order_id ,$order_product->buyer_id ,$order_product->seller_id, $order_product->order_id, $order_product->product_title);
                        //  if(!empty($orderManifest)){
                        //  	if($orderManifest->status ==1){
                        //     ///update traking no
                            $this->order_model->updateTrackingNo($order_product->id,$this->input->post('shipping_tracking_number', true),$this->input->post('shipping_tracking_url', true)); 
                            $this->session->set_flashdata('success', 'Updated Successfully');
                            
                            // $buyer = $this->auth_model->get_user($order_product->buyer_id);
                            // /////send sms
                            // $senderId = 'MAGXRT';
             				// $templateID = '1707167107209975522';  	
             				// $smstext = 'Dear '.$buyer->first_name.', Your Order is Shipped, Tracki ID is '.$awbNo->awb[0].', Will be delivered soon - Magxmart india.';
							// send_sms($buyer->phone_number,$senderId,$templateID,$smstext);
                            // /////////////////////
                            
                            redirect($this->agent->referrer());
                        //     }else{ 
                        //     $this->session->set_flashdata('error', $orderManifest->msg);
                        //     redirect($this->agent->referrer());
                        //     }
                        //  }else{
                        //   $this->session->set_flashdata('error', 'Error.');
                        //     redirect($this->agent->referrer());
                        //  }
                        
                        }
						//check if earning added before
						// $order = $this->order_model->get_order($order_product->order_id);
						// if (!empty($order) && !empty($this->earnings_model->get_earning_by_user_id($order_product->seller_id, $order->order_number))) {
						// 	//remove seller earnings
						// 	$this->earnings_model->remove_seller_earnings($order_product);
						// }
					}
				}
				$this->session->set_flashdata('success', 'Successfully Updated');
			} else {
				$this->session->set_flashdata('error', 'Error.');
			}

			$this->order_model->update_payment_status_if_all_received($order_product->order_id);
			$this->order_model->update_order_status_if_completed($order_product->order_id);
		}
    $this->session->set_flashdata('success', 'Successfully Updated');
   // echo $this->input->post('order_status', true);die;
		redirect($this->agent->referrer() . "#t_product");
	}

	/**
	 * Delete Order Product Post
	 */
	public function delete_order_product_post()
	{
		$id = $this->input->post('id', true);
		if ($this->order_model->delete_order_product($id)) {
			echo 'Deleted Successfully';
		} else {
			echo 'Error!';
		}
	}

	/**
	 * Transactions
	 */
	public function transactions()
	{
		$data['title'] = trans("transactions");
		$data['form_action'] = admin_url() . "transactions";

		$pagination = $this->paginate(admin_url() . 'transactions', $this->transaction_model->get_transactions_count());
		$data['transactions'] = $this->transaction_model->get_paginated_transactions($pagination['per_page'], $pagination['offset']);
        $data['panel_settings'] = $this->settings_model->get_panel_settings();

		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/order/transactions', $data);
		$this->load->view('admin/includes/_footer');
	}

	/**
	 * Delete Transaction Post
	 */
	public function delete_transaction_post()
	{
		$id = $this->input->post('id', true);
		if ($this->transaction_model->delete_transaction($id)) {
			$this->session->set_flashdata('success', trans("msg_deleted"));
		} else {
			$this->session->set_flashdata('error', trans("msg_error"));
		}
	}

	/**
	 * Bank Transfer Notifications
	 */
	public function order_bank_transfers()
	{
		$data['title'] = trans("bank_transfer_notifications");
		$data['form_action'] = admin_url() . "order-bank-transfers";

		$pagination = $this->paginate(admin_url() . 'order-bank-transfers', $this->order_model->get_bank_transfers_count());
		$data['bank_transfers'] = $this->order_model->get_paginated_bank_transfers($pagination['per_page'], $pagination['offset']);

		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/order/bank_transfers', $data);
		$this->load->view('admin/includes/_footer');
	}

	/**f
	 * Bank Transfer Options Post
	 */
	public function bank_transfer_options_post()
	{
		$id = $this->input->post('id', true);
		$order_id = $this->input->post('order_id', true);
		$option = $this->input->post('option', true);
		if ($this->order_model->update_bank_transfer_status($id, $option)) {
			if ($option == 'approved') {
				$this->order_model->update_order_payment_received($order_id);
			}
			$this->order_model->update_order_status_if_completed($order_id);
			$this->session->set_flashdata('success', trans("msg_updated"));
			redirect($this->agent->referrer());
		} else {
			$this->session->set_flashdata('error', trans("msg_error"));
			redirect($this->agent->referrer());
		}
	}

	/**
	 * Approve Guest Order Product
	 */
	public function approve_guest_order_product()
	{
		$order_product_id = $this->input->post('order_product_id', true);
		if ($this->order_model->approve_guest_order_product($order_product_id)) {
			//order product
			$order_product = $this->order_model->get_order_product($order_product_id);
			//add seller earnings
			$this->earnings_model->add_seller_earnings($order_product);
			//update order status
			$this->order_model->update_order_status_if_completed($order_product->order_id);
		}
		redirect($this->agent->referrer());
	}

	/**
	 * Delete Bank Transfer Post
	 */
	public function delete_bank_transfer_post()
	{
		$id = $this->input->post('id', true);
		if ($this->order_model->delete_bank_transfer($id)) {
			$this->session->set_flashdata('success', trans("msg_deleted"));
		} else {
			$this->session->set_flashdata('error', trans("msg_error"));
		}
	}

    /**
     * Invoices
     */
    public function invoices()
    {
        $data['title'] = trans("invoices");
        $data['form_action'] = admin_url() . "invoices";

        $pagination = $this->paginate(admin_url() . 'invoices', $this->order_model->get_invoices_count());
        $data['invoices'] = $this->order_model->get_paginated_invoices($pagination['per_page'], $pagination['offset']);
        $data['panel_settings'] = $this->settings_model->get_panel_settings();

        $this->load->view('admin/includes/_header', $data);
        $this->load->view('admin/order/invoices', $data);
        $this->load->view('admin/includes/_footer');
    }

	/**
	 * Digital Sales
	 */
	public function digital_sales()
	{
		$data['title'] = trans("digital_sales");
		$data['form_action'] = admin_url() . "digital-sales";

		$pagination = $this->paginate(admin_url() . 'digital-sales', $this->order_model->get_digital_sales_count());
		$data['digital_sales'] = $this->order_model->get_digital_sales($pagination['per_page'], $pagination['offset']);
        $data['panel_settings'] = $this->settings_model->get_panel_settings();

		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/order/digital_sales', $data);
		$this->load->view('admin/includes/_footer');
	}

	/**
	 * Delete Digital Sales Post
	 */
	public function delete_digital_sales_post()
	{
		$id = $this->input->post('id', true);
		if ($this->order_model->delete_digital_sale($id)) {
			$this->session->set_flashdata('success', trans("msg_deleted"));
		} else {
			$this->session->set_flashdata('error', trans("msg_error"));
		}
	}
}

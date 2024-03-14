<!-- 
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
  font-size: 12px;
}

td, th h2 {
  margin: 0px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>

 -->
 <?php  $seller = get_user($invoice[0]->seller_id);?>
 <table style="width: 800; border-collapse: collapse;font-family: arial, sans-serif; border: 0px solid #000000;margin: 0 auto;">
  <tr>
    <td>

<table style="width: 800; border-collapse: collapse;font-family: arial, sans-serif;">
  <tbody>
    <tr style="height: 18px;">
      <td style="width: 30%; height: 18px; text-align: left;padding: 8px;font-size: 12px;"><img src="<?= get_image($this->general_settings->logo);?>" class="logo" style="width: 150px;"></td>
      <td style="width: 70%; height: 18px; text-align: left;padding: 8px;font-size: 12px;">
        <h2 style="margin: 0px;"><b>Tax Invoice / Bill Of Supply / Cash Memo</b></h2>
        <p><b>( Original for Recipient )</b></p>
      </td>
    </tr>

  </tbody>
</table>

<table style="width: 800; border-collapse: collapse;font-family: arial, sans-serif;">
<tr style="height: 18px;">
      <td style="width: 50%; height: 18px;border: 1px solid #dddddd;text-align: left;padding: 8px;font-size: 12px;">
        <h2 style="margin: 0px;"><b>Sold By :</b></h2>
        <p><?= $seller->first_name.' '.$seller->last_name;?> </p>
        <p><?= $seller->address;?></p>
        <p><?= select_value_by_id('location_cities','id',$seller->city_id,'name').', '.select_value_by_id('location_states','id',$seller->state_id,'name').' - '.$seller->zip_code;?></p>
      </td>
      <td style="width: 50%; height: 18px;border: 1px solid #dddddd;text-align: left;padding: 8px;font-size: 12px;">
        <h2 style="margin: 0px;"><b>Billing Address :</b></h2>
        <p><?= $invoice[0]->billing_name;?></p>
        <p><?= $invoice[0]->billing_addr;?></p>
        <p>Pin: <?= $invoice[0]->billing_pin;?></p>
        <p>Phone No. : <?= $invoice[0]->billing_phone;?></p>
      
      </td>
    </tr>

    <tr style="height: 1px;">
      <td style="width: 50%; height: 1px; padding: 0px;"></td>
      <td style="width: 50%; height: 1px; padding: 0px;"></td>
    </tr>
</table>

 <?php $show_all_products = true;
  $prefix = "";
  if ($this->auth_user->role != "admin" && $order->buyer_id != $this->auth_user->id) {
      $show_all_products = false;
      $prefix = "VN";
  } ?>

<table style="width: 800; border-collapse: collapse;font-family: arial, sans-serif;">
 <tr style="height: 18px;">
      <td style="width: 50%; height: 18px;border: 1px solid #dddddd;text-align: left;padding: 8px;font-size: 12px;">
        <p><b>PAN No : <?= $seller->pan_no;?></b></p>
        <p><b>GST Registration No : <?= $seller->gst_no;?></b></p>
         </br></br>
        <p>Order Number :</p>
        <p>Order Date : </p>
        <p>Invoice Number : <?php echo $prefix . $order->order_number; ?></p>
        <p>Invoice Date : <?php echo formatted_date($order->created_at); ?></p>

      </td>


      <td style="width: 50%;height: 18px;border: 1px solid #dddddd;text-align: left;padding: 8px;font-size: 12px;">
        <h2><b>Shipping Address :</b></h2>
        <p><?= $invoice[0]->shipping_name;?></p>
        <p><?= $invoice[0]->shipping_addr;?></p>
        <p>Pin: <?= $invoice[0]->shipping_pin;?></p>
        <p>Phone No.: <?= $invoice[0]->shipping_phone;?></p>
        </br></br>
        <p>Place of Supply : <?= select_value_by_id('location_states','id',$invoice[0]->place_of_supply,'name');?></p>
        <!-- <p>Place of Supply : <?= $invoice[0]->place_of_supply;?></p> -->
      </td>
    </tr>

    <tr style="height: 1px;">
      <td style="width: 50%; height: 1px; padding: 0px;"></td>
      <td style="width: 25%; height: 1px; padding: 0px;"></td>
    </tr>
</table>

<table style="width: 800; border-collapse: collapse;font-family: arial, sans-serif;">
<tr style="height: 18px;">
      <td style="width: 10%; height: 18px;border: 1px solid #dddddd;text-align: left;padding: 8px;font-size: 12px;background:#00000014;">SL.No.</td>
      <td style="width: 20%; height: 18px;border: 1px solid #dddddd;text-align: left;padding: 8px;font-size: 12px;background:#00000014;">Description</td>
      <td style="width: 10%; height: 18px;border: 1px solid #dddddd;text-align: left;padding: 8px;font-size: 12px;background:#00000014;">Unit Price</td>
      <td style="width: 10%; height: 18px;border: 1px solid #dddddd;text-align: left;padding: 8px;font-size: 12px;background:#00000014;">Qty</td>
      <td style="width: 10%; height: 18px;border: 1px solid #dddddd;text-align: left;padding: 8px;font-size: 12px;background:#00000014;">Net Amount</td>
      <td style="width: 10%; height: 18px;border: 1px solid #dddddd;text-align: left;padding: 8px;font-size: 12px;background:#00000014;">Tax Rate</td>
      <td style="width: 10%; height: 18px;border: 1px solid #dddddd;text-align: left;padding: 8px;font-size: 12px;background:#00000014;">Tax Type</td>
      <td style="width: 10%; height: 18px;border: 1px solid #dddddd;text-align: left;padding: 8px;font-size: 12px;background:#00000014;">Tax Amount</td>
      <td style="width: 10%; height: 18px;border: 1px solid #dddddd;text-align: left;padding: 8px;font-size: 12px;background:#00000014;">Total Amount</td>
    </tr>
    <?php $total_amount=0; $i=1; foreach($invoice as $data){ ?>
    <tr style="height: 18px; background:#ffffff;">
      <td style="width: 10%; height: 18px;border: 1px solid #dddddd;text-align: left;padding: 8px;font-size: 12px;"><?= $i++ ?></td>
      <td style="width: 20%; height: 18px;border: 1px solid #dddddd;text-align: left;padding: 8px;font-size: 12px;"><?= $data->product_title;?> </td>
      <td style="width: 10%; height: 18px;border: 1px solid #dddddd;text-align: left;padding: 8px;font-size: 12px;"><?= get_default_currency();?><?= $data->unit_price;?></td>
      <td style="width: 10%; height: 18px;border: 1px solid #dddddd;text-align: left;padding: 8px;font-size: 12px;"><?= $data->qty;?></td>
      <td style="width: 10%; height: 18px;border: 1px solid #dddddd;text-align: left;padding: 8px;font-size: 12px;"><?= get_default_currency();?><?= $total_amount += $data->net_amount;?></td>
      <td style="width: 10%; height: 18px;border: 1px solid #dddddd;text-align: left;padding: 8px;font-size: 12px;"><?= $data->gst_rate; ?>%</td>
      <td style="width: 10%; height: 18px;border: 1px solid #dddddd;text-align: left;padding: 8px;font-size: 12px;">GST</td>
      <td style="width: 10%; height: 18px;border: 1px solid #dddddd;text-align: left;padding: 8px;font-size: 12px;"><?= get_default_currency();?><?php $gst = $data->unit_price*$data->gst_rate/100;echo $gst;?></td>
      <td style="width: 10%; height: 18px;border: 1px solid #dddddd;text-align: left;padding: 8px;font-size: 12px;"><?= get_default_currency();?><?= $data->net_amount+$gst;?></td>
    </tr>
    <?php } ?>
</table>

<table style="width: 800; border-collapse: collapse;font-family: arial, sans-serif;border: 1px solid #dddddd;">
  <tr style="height: 20px; text-align: left; padding: 5px;">
    <td>
      <h2 style="margin: 0px; font-size: 16px; padding: 5px;font-family: arial, sans-serif;">TOTAL :</h2>
    </td>
     
      <td colspan="8">
      <h2 style="margin: 0px; font-size: 16px; padding: 5px;font-family: arial, sans-serif;text-align: right;"><?= get_default_currency();?><?= $total_amount+$gst;?></h2>
    </td>
  </tr>
  <tr>
</table>

<table style="width: 800; border-collapse: collapse;">
  <tr style="height: 18px; text-align: left;">
    <th>
      <p style="font-size: 14px; padding: 5px;font-family: arial, sans-serif;">Amount in Words :<?= numberTowords($total_amount+$gst);?></p>
    </th>
  </tr>
  <tr>
</table>

<table style="width: 800; border-collapse: collapse;">
  <tr style="height: 18px;">
    <th style="text-align: right;">
      <p>For Bengal Detergent.</p>
    </th>
  </tr>
  <tr>
</table>


<table style="width: 800; border-collapse: collapse;font-family: arial, sans-serif;">
  <tr>
    <th style="text-align: right;">
      <p>
      <!--<img src="image/sig.jpg" class="logo">-->
      </p>
      <p>Authorized Signatory</p>
    </th>
  </tr>
  <tr>
</table>

</td></tr></table>
<p style="text-align: left;">Whether tax is payable under reverse charge-No</p>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <style>

        /*--------------------------------------------------------------
        Styles
        --------------------------------------------------------------*/

        /* Fonts */
        :root {
        --body-font: 'Roboto', sans-serif;
        }

        /* Bootstrap Override */
        body {
        --bs-font-sans-serif: 'Roboto', sans-serif;
        --bs-body-font-family: var(--bs-font-sans-serif);
        --bs-body-font-size: 1rem;
        --bs-body-font-weight: 400;
        --bs-body-line-height: 2;
        --bs-body-color: #383735;
        --bs-primary: #ffc400;
        --bs-primary-rgb: 244, 187, 0;
        --bs-border-color: #eeeeee;
        }
        @media (min-width: 576px){
            .container, .container-sm {
                max-width: 890px !important;
            }
        }
        .text-primary {
            --bs-text-opacity: 1;
            color: rgb(188 27 54) !important;
        }
        .border-primary {
            --bs-border-opacity: 1;
            border-color: rgb(188 27 54) !important;
        }
    </style>
</head>

<body>
<?php  $seller = get_user($invoice->seller_id);?>
    <section id="invoice">
        <div class="container">

            <div class="text-center pb-5">
                <img src="<?= get_logo(); ?>" alt="">
            </div>

            <div class="d-md-flex justify-content-between" style="display:flex">
                <div>
                    <p class="fw-bold text-primary">Invoice To</p>
                    <h4><?= $invoice->billing_name;?></h4>
                    <ul class="list-unstyled m-0">
                        <li>Phone : <?= $invoice->billing_phone;?></li>
                        <li><?= $invoice->billing_addr;?></li>
                        <li>Pin : <?= $invoice->billing_pin;?></li>
                    </ul>
                </div>
                <div class="mt-md-0">
                    <p class="fw-bold text-primary">Invoice From</p>
                    <h4>Itsy Bitsy</h4>
                    <ul class="list-unstyled m-0">
                       <li>RUPKATHA APARTMENT<br> Flat no 3B 1426<br> LAKEPALLY UTTAR SREEPUR<br> KOLKATA 700154</li>
                    </ul>
                </div>
            </div>

            <div class=" d-md-flex justify-content-between align-items-center border-top border-bottom border-primary my-2 py-3" style="display:flex;margin-bottom:0;">
                <h2 class="display-6 fw-bold m-0">Invoice</h2>
                <div>
                    <p class="m-0"> <span class="fw-medium">Invoice No:</span> <?php echo $order->order_number; ?></p>
                    <p class="m-0"> <span class="fw-medium">Invoice Date:</span> <?php echo formatted_date($order->created_at); ?></p>
                </div>

            </div>

            <div class="py-1">
                <table class="table table-striped border my-2" style="margin-bottom: 0 !important;">
                    <thead>
                        <tr>
                            <th scope="col">Description</th>
                            <th scope="col">Unit Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Net Amount</th>
                            <!-- <th scope="col">Tax Rate</th> -->
                            <th scope="col">Tax Type</th>
                            <th scope="col">Tax Amount</th>
                            <th scope="col">Total Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?= $invoice->product_title;?></td>
                            <td>₹ <?= $invoice->unit_price;?></td>
                            <td><?= $invoice->qty;?></td>
                            <td>₹ <?= $invoice->net_amount;?></td>
                            <!-- <td><?= $invoice->gst_rate;?>%</td> -->
                            <td>GST</td>
                            <td>₹ <?php $gst = $invoice->unit_price*$invoice->gst_rate/100;echo $gst;?></td>
                            <td>₹ <?= $invoice->net_amount+$gst;?></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td colspan="3" class="text-primary fs-5 fw-bold">Shipping Charges</td>
                            <td class="text-primary fs-5 fw-bold">₹ <?= $order->price_shipping; ?></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td colspan="3" class="text-primary fs-5 fw-bold">Grand Total</td>
                            <td class="text-primary fs-5 fw-bold">₹ <?= $invoice->net_amount+$gst+$order->price_shipping;?></td>
                        </tr>
                    </tbody>
                </table>
            </div>


            <div class="d-md-flex justify-content-between my-2" style="display:flex;">

                <div>
                <h5 class="fw-bold my-4">Contact Us</h5>
                    <ul class="list-unstyled">
                        <li><iconify-icon class="social-icon text-primary fs-5 me-2" icon="mdi:location"
                                style="vertical-align:text-bottom"></iconify-icon> RUPKATHA APARTMENT Flat no 3B 1426<br> LAKEPALLY UTTAR SREEPUR KOLKATA 700154</li>
                        <li><iconify-icon class="social-icon text-primary fs-5 me-2" icon="solar:phone-bold"
                                style="vertical-align:text-bottom"></iconify-icon> 8017250236</li>
                        <li><iconify-icon class="social-icon text-primary fs-5 me-2" icon="ic:baseline-email"
                                style="vertical-align:text-bottom"></iconify-icon> itsybitsyinfo@gmail.com</li>
                    </ul>
                </div>

                <div style="text-align: center;margin: auto 0;">
                    <h3 class="fw-bold my-4">Authorised Signatory</h3>
                </div>


            </div>

            <!-- <div class="text-center my-5">
                <p class="text-muted"><span class="fw-semibold">NOTICE: </span> A finance charge of 1.5% will be made on
                    unpaid balances after 30 days.</p>
            </div> -->

            <div id="footer-bottom">
                <div class="container border-top border-primary">
                    <div class="row mt-3">
                        
                    </div>
                </div>
            </div>

        </div>
    </section>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
    <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>

</body>

</html>

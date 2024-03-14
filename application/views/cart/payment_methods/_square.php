<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php if ($cart_payment_method->payment_option == 'square'):  ?>

    <link href="<?= base_url('assets/css/payment/app.css');?>" rel="stylesheet" />
    <script type="text/javascript" src="https://sandbox.web.squarecdn.com/v1/square.js"></script>
    <script>
      const appId = '<?= $this->payment_settings->square_appId?>';
      const locationId = '<?= $this->payment_settings->square_locationId?>';

      async function initializeCard(payments) {
        const card = await payments.card();
        await card.attach('#card-container');

        return card;
      }

      async function createPayment(token, verificationToken) {
        const body = JSON.stringify({
          locationId,
          sourceId: token,
          verificationToken,
          idempotencyKey: window.crypto.randomUUID(),
        });
        const getUrl = window.location;
        //const base_url = getUrl.protocol + "//" + getUrl.host + "/filthygainzinc/" ;
        const base_url = getUrl.protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1]+"/";
        const paymentResponse = await fetch(base_url + 'square-payment-post', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
          },
          body,
        });

        if (paymentResponse.ok) {
          
          return paymentResponse.json();
        }

        const errorBody = await paymentResponse.text();
        throw new Error(errorBody);
      }

      async function tokenize(paymentMethod) {
        const tokenResult = await paymentMethod.tokenize();
        if (tokenResult.status === 'OK') {
          return tokenResult.token;
        } else {
          let errorMessage = `Tokenization failed with status: ${tokenResult.status}`;
          if (tokenResult.errors) {
            errorMessage += ` and errors: ${JSON.stringify(
              tokenResult.errors
            )}`;
          }

          throw new Error(errorMessage);
        }
      }

      // Required in SCA Mandated Regions: Learn more at https://developer.squareup.com/docs/sca-overview
      async function verifyBuyer(payments, token) {
        const verificationDetails = {
          amount: '<?= $total_amount;?>',
          billingContact: {
            addressLines: ['<?= $this->auth_user->shipping_address_1;?>'],
            familyName: '<?= $this->auth_user->last_name;?>',
            givenName: '<?= $this->auth_user->first_name;?>',
            email: '<?= $this->auth_user->email;?>',
            country: 'US',
            phone: '<?= $this->auth_user->phone_number;?>',
            region: '<?= select_value_by_id('location_states','id',$this->auth_user->shipping_state,'name');?>',
            city: '<?= select_value_by_id('location_cities','id',$this->auth_user->shipping_city,'name');?>',
          },
          currencyCode: '<?= $currency?>',
          intent: 'CHARGE',
        };

        const verificationResults = await payments.verifyBuyer(
          token,
          verificationDetails
        );
        return verificationResults.token;
      }

      // status is either SUCCESS or FAILURE;
      function displayPaymentResults(status,paymentResults) {
        const statusContainer = document.getElementById(
          'payment-status-container'
        );
        if (status === 'SUCCESS') {
        //  var obj = JSON.parse(paymentResults);
          var obj = paymentResults;
          console.log(obj.redirect);
              if (obj.result == 1) {
                  window.location.href = obj.redirect;
              } else {
                  location.reload();
                 // displayPaymentResults('ERROR');
              }
          // statusContainer.classList.remove('is-failure');
          // statusContainer.classList.add('is-success');
          // console.log(status);
        } else {
          statusContainer.classList.remove('is-success');
          statusContainer.classList.add('is-failure');
        }

        statusContainer.style.visibility = 'visible';
      }

      document.addEventListener('DOMContentLoaded', async function () {
        if (!window.Square) {
          throw new Error('Square.js failed to load properly');
        }

        let payments;
        try {
          payments = window.Square.payments(appId, locationId);
        } catch {
          const statusContainer = document.getElementById(
            'payment-status-container'
          );
          statusContainer.className = 'missing-credentials';
          statusContainer.style.visibility = 'visible';
          return;
        }

        let card;
        try {
          card = await initializeCard(payments);
        } catch (e) {
          console.error('Initializing Card failed', e);
          return;
        }

        async function handlePaymentMethodSubmission(event, card) {
          event.preventDefault();

          try {
            // disable the submit button as we await tokenization and make a payment request.
            cardButton.disabled = true;
            const token = await tokenize(card);
            const verificationToken = await verifyBuyer(payments, token);
            const paymentResults = await createPayment(
              token,
              verificationToken
            );
            displayPaymentResults('SUCCESS',paymentResults);
            //console.log('Payment Success', paymentResults.currency);
           // console.debug('Payment Success', paymentResults);
          } catch (e) {
            cardButton.disabled = false;
            displayPaymentResults('FAILURE','');
            console.error(e.message);
          }
        }

        const cardButton = document.getElementById('card-button');
        cardButton.addEventListener('click', async function (event) {
          await handlePaymentMethodSubmission(event, card);
        });
      });
    </script>

    <form id="payment-form">
      <div id="card-container"></div>
      <button id="card-button" type="button">Pay $<?= $total_amount;?></button>
    </form>
    <div id="payment-status-container"></div>
<?php endif; ?>
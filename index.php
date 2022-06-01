<?php
require './vendor/autoload.php'; 
use Stripe\StripeClient;
use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->safeLoad(); 

$stripe = new StripeClient($_ENV['STRIPE_SECRET_KEY']);

/**
 * create price
 */
// $res=$stripe->prices->create(
//   [
//     'currency' => 'usd',
//     'unit_amount' => 30000,
//     'product_data' => ['name' => 'stand up paddleboard'],
//   ]
// );

 /**
  * create product
  */
// $res=$stripe->products->create([
//     'name' => 'Gold Special',
//   ]);

//  $res= $stripe->checkout->sessions->create([
//     'success_url' => 'http://127.0.0.1:8001/success',
//     'cancel_url' => 'http://127.0.0.1:8001/cancel',
//     'line_items' => [
//       [
//         'price' => 'price_1L5jw2JaFgadmwuiyW65f9A3',
//         'quantity' => 2,
//       ],
//     ],
//     'mode' => 'payment',
//   ]);

 /**
  * create session
  */
// $res = $stripe->checkout->sessions->create([
//     'line_items' => [[
//       'price' => 'price_1L5jw2JaFgadmwuiyW65f9A3',
//       'quantity' => 1,
//     ]],
//     'mode' => 'payment',
//     'success_url' => 'http://127.0.0.1:8001/success',
//     'cancel_url' => 'http://127.0.0.1:8001/canceled',
//     'payment_intent_data' => [
//       'application_fee_amount' => 123,
//       'transfer_data' => [
//         'destination' => 'acct_1L5mtbR6NVrlr7Jy',
//       ],
//     ],
//   ]);

  
/**
 * Create Connection
 */
 

// $res=$stripe->accounts->create(['type' => 'express']);
// $res=$stripe->accountLinks->create(
//     [
//       'account' => 'acct_1L3yjTJaFgadmwui',
//       'refresh_url' => 'http://127.0.0.1:8001/',
//       'return_url' => 'http://127.0.0.1:8001/',
//       'type' => 'account_onboarding',
//     ]
//   );

// $res=$stripe->accounts->create(['type' => 'express']);

/**
 * account create
 */
// $res=$stripe->accounts->create([
//     'type' => 'custom',
//     'country' => 'US',
//     'email' => 'anichur@wedevs.com',
//     'capabilities' => [
//       'card_payments' => ['requested' => true],
//       'transfers' => ['requested' => true],
//     ],
//   ]);

/**
 * retrive  account
 */

$res=$stripe->accounts->all(['limit' => 3]);
 
/**
 * retrive single account
 */

// $res=$stripe->accounts->retrieve(
//     'acct_1L3yjTJaFgadmwui',
//     []
//   );

/**
 * payment link create
 */
// $res=$stripe->paymentLinks->create([
//     'line_items' => [
//       [
//         'price' => 'price_1L5jw2JaFgadmwuiyW65f9A3',
//         'quantity' => 1,
//       ],
//     ],
//   ]);

/**
 * customer create
 */

// $res=$stripe->customers->create([
//     'description' => 'My First Test Customer 2 (created for API docs at https://www.stripe.com/docs/api)',
//   ]);

/**
 * invoice item create
 */
// $res=$stripe->invoiceItems->create([
//     'customer' => 'cus_LnL1wp6t85hlI1',
//     'price' => 'price_1L5jw2JaFgadmwuiyW65f9A3',
//   ]);
  
/**
 * Charges
 */
// https://connect.stripe.com/oauth/v2/authorize?response_type=code&client_id=ca_LnNcXzYxJGsZ2Icy9TJ1Ny1iFtwcef35&scope=read_write


 


echo "<pre>";
print_r($res);
echo "</pre>";

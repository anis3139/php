<?php
require './vendor/autoload.php';
// Set your secret key. Remember to switch to your live secret key in production.
// See your keys here: https://dashboard.stripe.com/apikeys
$stripe = new \Stripe\StripeClient('sk_test_51L3yjTJaFgadmwuiO88J6v8gHCCzGWm8QZFuoPyZQD5dMkyRmqcSNzjserDrmgnn4ckuLgSEhbXES5frHLdFZ9SZ00QX1j3hkz');

$stripe->prices->create(
  [
    'currency' => 'usd',
    'unit_amount' => 120000,
    'product_data' => ['name' => 'stand up paddleboard'],
  ]
);
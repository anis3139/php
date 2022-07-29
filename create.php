<?php

require_once __DIR__ . '/vendor/autoload.php';

// This is your test secret API key.
\Stripe\Stripe::setApiKey('sk_test_51L5on8BNn7wtDd9phrNE9Rf9UfUuBguzzDWrq7HkINJIBd1NEPfW6AZMxgQMs1tWdjzS2Iw80PmDdXyQ9k4r1ne800b8dYSlxP');

function calculateOrderAmount(array $items): int
{
    // Replace this constant with a calculation of the order's amount
    // Calculate the order total on the server to prevent
    // people from directly manipulating the amount on the client
    return 1400;
}

header('Content-Type: application/json');

try {
    // retrieve JSON from POST body
    $jsonStr = file_get_contents('php://input');
    $jsonObj = json_decode($jsonStr);

    // Create a PaymentIntent with amount and currency
    $paymentIntent = \Stripe\PaymentIntent::create([
        'amount' => calculateOrderAmount([]),
        'currency' => 'usd',
        'transfer_group' => 'tr_1LQ5WbBNn7wtDd9p2GFG4CCE',
        'confirm' => 'true',
        'payment_method' => 'pm_card_bypassPending',
        'automatic_payment_methods' => [
            'enabled' => true,
        ],
        'return_url' => 'http://stripe-test.test/checkout',
    ]);

    $output = [
        'clientSecret' => $paymentIntent->client_secret,
    ];

    echo json_encode($output);
} catch (Error $e) {
    http_response_code(500);
    echo json_encode(['error' => $e->getMessage()]);
}

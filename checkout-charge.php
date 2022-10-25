<?php
    include("./config.php");

    $token = $_POST["stripeToken"];
    $contact_name = "";
    $token_card_type = $_POST["stripeTokenType"];
    $phone           = "";
    $email           = "ahnaf.abid22@gmail.com";
    $address         = "";
    $amount          = "500000"; 
    $desc            = "Premium Membership";



$stripe = new \Stripe\StripeClient(
  'sk_test_51LTiqcSBusZ24ZCjJWqijdzP8bgs5GYMVWUdHOeaSJc4QFXcxmexpYKWHO5CRtxJrVyvqjqltwFmXWUcOWwlqiXI00QUgtdBzf'
);
$stripe->paymentIntents->create([
  'amount' => '500000',
  'currency' => 'inr',
  'payment_method_types' => ['card'],
]);

    // $charge = \Stripe\Charge::create([
    //   "amount" => str_replace(",","",$amount) * 100,
    //   "currency" => 'inr',
    //   "description"=>$desc,
    //   "source"=> $token,
    // ]);
    

    if($stripe){
      header("Location:set_payment_status.php?");
    }
?>
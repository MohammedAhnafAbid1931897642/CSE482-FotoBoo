<?php
    require_once "stripe-php-master/init.php";

    $stripeDetails = array(
        "secretKey"=>"sk_test_51LTiqcSBusZ24ZCjJWqijdzP8bgs5GYMVWUdHOeaSJc4QFXcxmexpYKWHO5CRtxJrVyvqjqltwFmXWUcOWwlqiXI00QUgtdBzf",
        "publishableKey"=>"pk_test_51LTiqcSBusZ24ZCje34jrO6oJrPIz5oZgwOG60w4uQ7La4ecb3Ob118ha9Rmrxaa2xXfL0WuQMWGU5NNzprKIzyG00TKTqZhZd"
    );

    \Stripe\Stripe::setApiKey($stripeDetails["secretKey"]);
?>
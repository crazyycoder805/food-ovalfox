<?php
require('vendor/stripe-php-master/init.php');

$publishableKey="pk_test_51Ng7lCIfGClG3aILVvGqI6uvxL8cCBrLgglEso8kcDzU2ewFMKWDM7f4BrZVcmUfpbqblyYi7zSk9Kzw8de6RZd200cF0gR7do";

$secretKey="sk_test_51Ng7lCIfGClG3aIL37QOElh9ilcWmHNiiEAfVevFbT31DeUGAZzV0oWuZ0Lq7mskOuf7z5RqfCgI0aMbA0JCz1kN00EcGOOw7S";

\Stripe\Stripe::setApiKey($secretKey);
?>
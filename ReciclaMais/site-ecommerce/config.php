<?php 
// Product Details 
// Minimum amount is $0.50 US 
// Test Stripe API configuration 

define('STRIPE_API_KEY', 'sk_test_51LHzhDJ6IibYh1aVzRXYMhZFq2wd7avqQvlzWiqP0y2J9meDJP1znvE8L8M3PFjZ2Mv9l0OYle4hOoD6FVyN70j300Dgdg7zFU');  
define('STRIPE_PUBLISHABLE_KEY', 'pk_test_51LHzhDJ6IibYh1aVX3xdwV9pXX9aPasCSo3O1MwCpFnwyotLuciPR2JUSQCEZNVRPsizZzH4FODE3TKg1TI7nsu600kZxsVie2'); 

define('STRIPE_SUCCESS_URL', 'http://localhost/success.php'); 
define('STRIPE_CANCEL_URL', 'http://localhost:4242/cancel.php'); 

// Database configuration   
define('DB_HOST', 'localhost');  
define('DB_USERNAME', 'root');  
define('DB_PASSWORD', '');  
define('DB_NAME', 'teste'); 
?>




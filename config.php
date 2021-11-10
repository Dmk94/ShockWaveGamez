


<?php  
// PayPal configuration  
define('PAYPAL_ID', 'Info@ShockWaveGamez.com'); 
define('PAYPAL_SANDBOX', TRUE); //TRUE or FALSE  
 
define('CONTINUE_SHOPPING_URL', 'http://192.168.0.11/ShockWaveGamez/products.php');  
define('PAYPAL_RETURN_URL', 'http://192.168.0.11/ShockWaveGamez/success.php');  
define('PAYPAL_CANCEL_URL', 'http://192.168.0.11/ShockWaveGamez/cancel.php');
// Has to be given a temporary domain because paypal does not support localhost
define('PAYPAL_NOTIFY_URL', 'https://c03d-2603-6000-ce0a-6a00-54d8-a1bd-884a-5214.ngrok.io/ShockWaveGamez/paypal_ipn.php');
define('PAYPAL_CURRENCY', 'USD');  
  
// Database configuration  
define('DB_HOST', 'localhost');  
define('DB_USERNAME', 'root');  
define('DB_PASSWORD', 'dev123');  
define('DB_NAME', 'ShockWaveGamez');  
  
// Paypal URL where customer data is stored and sent to paypal_ipn.php   
define('PAYPAL_URL', (PAYPAL_SANDBOX == true)?"https://ipnpb.sandbox.paypal.com/cgi-bin/webscr":"https://ipnpb.sandbox.paypal.com/cgi-bin/webscr");
?>
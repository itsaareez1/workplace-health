<?php

error_reporting(0);
?>
<?php

//autoloading the packages in the vendor folder.
//require "vendor/autoload.php";

//setting up braintree credentials
Braintree_Configuration::environment('sandbox');
Braintree_Configuration::merchantId('csys8wbds84q872h');
Braintree_Configuration::publicKey('8by7zvn7dm223xkg');
Braintree_Configuration::privateKey('1c5f27e19d1534e3b6401c5e137037b2');

//Booting Done.
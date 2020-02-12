 # Mailer REST client library
A simple Sendbox REST client library and example for PHP.

### Installing
Via Composer:
```bash
composer require sendbox/rest-api
```

### Usage
```php
<?php
require 'vendor/autoload.php';

use Mailer\RestApi\ApiClient;
use Mailer\RestApi\Storage\FileStorage;

define('API_USER_ID', '');
define('API_SECRET', '');
define('PATH_TO_ATTACH_FILE', __FILE__);

$ApiClient = new ApiClient(API_USER_ID, API_SECRET, new FileStorage());

/*
 * Example: Get Mailing Lists
 */
var_dump($ApiClient->listAddressBooks());

/*
 * Example: Add new email to mailing lists
 */
 $bookID = 123;
 $emails = array(
    array(
        'email' => 'subscriber@example.com',
        'variables' => array(
            'phone' => '+12345678900',
            'name' => 'User Name',
        )
    )
);
 $additionalParams = array(
   'confirmation' => 'force',
   'sender_email' => 'sender@example.com',
);
 // With confirmation
var_dump($ApiClient->addEmails($bookID, $emails, $additionalParams));
```

# Sendbox

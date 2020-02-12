<?php
require '../vendor/autoload.php';
/*
 * Mailer REST API Usage Example
 *
 */

use Mailer\RestApi\ApiClient;
use Mailer\RestApi\Storage\FileStorage;

define('API_USER_ID', '');
define('API_SECRET', '');
define('PATH_TO_ATTACH_FILE', __FILE__);

$ApiClient = new ApiClient(API_USER_ID, API_SECRET, new FileStorage());

// Get Mailing Lists list example
var_dump($ApiClient->listAddressBooks());

// Send mail using SMTP
$email = array(
    'html' => '<p>Hello!</p>',
    'text' => 'text',
    'subject' => 'Mail subject',
    'from' => array(
        'name' => 'John',
        'email' => 'John@domain.com',
    ),
    'to' => array(
        array(
            'name' => 'Client',
            'email' => 'client@domain.com',
        ),
    ),
    'bcc' => array(
        array(
            'name' => 'Manager',
            'email' => 'manager@domain.com',
        ),
    ),
    'attachments' => array(
        'file.txt' => file_get_contents(PATH_TO_ATTACH_FILE),
    ),
);
var_dump($ApiClient->smtpSendMail($email));

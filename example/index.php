<?php

require_once __DIR__.'/../vendor/autoload.php';

$sender = new \FML\Notification\Sender();
$channel = new \FML\Notification\Example\Channel\OutputChannel();
$message = new \FML\Notification\Example\Message\PlainMessage();
$recipient = new \FML\Notification\Recipient\Recipient();

$recipient
    ->setAddress('foo@bar.com')
    ->setName('John');

$sender->addChannel($channel);
$sender->addMessage($message, $recipient, array(
        'foo' => 'bar'
    ));

$sender->send();
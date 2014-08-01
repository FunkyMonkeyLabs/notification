<?php

require_once __DIR__.'/../vendor/autoload.php';

$channel = new \FML\Notification\Example\Channel\OutputChannel();
$messageManager = new \FML\Notification\MessageManager();
$messageManager->addChannel($channel);

$recipient = new \FML\Notification\Recipient\Recipient();
$recipient
    ->setAddress('foo@bar.com')
    ->setName('John');

$message = new \FML\Notification\Example\Message\PlainMessage();
$message
    ->addRecipient($recipient)
    ->setParameters(array(
            'foo' => 'bar'
        ));

$messageManager->sendMessage($message); // it will be send on demand
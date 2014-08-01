<?php

require_once __DIR__.'/../vendor/autoload.php';

$channel = new \FML\Notification\Example\Channel\OutputChannel();
$messageManager = new \FML\Notification\BufferedMessageManager();
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

$messageManager->addMessage($message); // adding message to stack

/**
 [..] // you can do some stuff with your application (for example, you can add another messages to stack)
 */

$messageManager->flush(); // send every messages through channels
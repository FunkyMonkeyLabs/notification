<?php

namespace FML\Tests\Notification;

use FML\Notification\Example\Channel\OutputChannel;
use FML\Notification\Example\Message\PlainMessage;
use FML\Notification\MessageManager;
use FML\Notification\Recipient\Recipient;

class MessageManagerTest extends \PHPUnit_Framework_TestCase
{

    public function testSendMessages()
    {
        $recipient = new Recipient();
        $recipient
            ->setAddress('1111')
            ->setName('test');
        $message = new PlainMessage();
        $message
            ->setSubject('test')
            ->addRecipient($recipient)
            ->setParameters(array(
                    'foo' => 'bar'
                ));
        $outputChannel = new OutputChannel();

        $manager = new MessageManager();
        $manager
            ->addChannel($outputChannel);

        ob_start();
        $manager->sendMessage($message);
        $content = trim(str_replace("\r\n", " ", ob_get_clean()));

        $this->assertEquals($content, "test Hello test 1111  foo:bar");
    }
}
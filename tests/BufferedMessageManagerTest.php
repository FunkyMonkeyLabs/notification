<?php

namespace FML\Tests\Notification;

use FML\Notification\Example\Channel\OutputChannel;
use FML\Notification\Example\Message\PlainMessage;
use FML\Notification\BufferedMessageManager;
use FML\Notification\Recipient\Recipient;

class BufferedMessageManagerTest extends \PHPUnit_Framework_TestCase
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

        $manager = new BufferedMessageManager();
        $manager
            ->addChannel($outputChannel)
            ->addMessage($message);

        ob_start();
        $manager->flush();
        $content = trim(str_replace("\r\n", " ", ob_get_clean()));

        $this->assertEquals($content, "test Hello test 1111  foo:bar");
    }
}
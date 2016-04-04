<?php

namespace FML\Tests\Notification\Recipient;

use FML\Notification\Recipient\Recipient;

class RecipientTest extends \PHPUnit_Framework_TestCase
{

    const NAME = 'Patryk Szlagowski';
    const ADDRESS = 'szlagowskipatryk@gmail.com';

    public function testRewriteData()
    {
        $recipient = new Recipient();
        $recipient
            ->setName(self::NAME)
            ->setAddress(self::ADDRESS);

        $this->assertEquals($recipient->getName(), self::NAME);
        $this->assertEquals($recipient->getAddress(), self::ADDRESS);
    }
}
<?php

namespace FML\Notification\Example\Channel;

use FML\Notification\Channel\AbstractChannel;
use Swift_Mailer;

class OutputChannel extends AbstractChannel
{

    public static $channelName = 'output';

    public function __construct()
    {
        $this->name = self::$channelName;
    }

    /**
     * simple echo message to output
     * @return string
     */
    public function flush()
    {
        foreach ($this->messages as $message) {
            echo $message->getContent();
        }
    }
}
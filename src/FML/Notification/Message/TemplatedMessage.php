<?php

namespace FML\Notification\Message;

use FML\Notification\Recipient\RecipientInterface;
use FML\Notification\Channel\ChannelInterface;
use Symfony\Bundle\TwigBundle\TwigEngine;

abstract class TemplatedMessage extends Message
{
    /**
     * @var TimedTwigEngine
     */
    protected $templating;

    /**
     * @param TwigEngine $templating
     */
    public function setTemplating(TwigEngine $templating)
    {
        $this->templating = $templating;
    }
}
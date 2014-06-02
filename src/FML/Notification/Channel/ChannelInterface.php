<?php

namespace FML\Notification\Channel;

use FML\Notification\Message\MessageInterface;

interface ChannelInterface
{

    /**
     * @return string
     */
    public function getName();

    /**
     * @return string
     */
    public function send();

    /**
     * @param MessageInterface $message
     * @return mixed
     */
    public function addMessage(MessageInterface $message);
}
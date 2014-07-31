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
    public function flush();

    /**
     * @param MessageInterface $message
     * @return $this
     */
    public function addMessage(MessageInterface $message);
}
<?php

namespace FML\Notification;

use FML\Notification\Channel\ChannelInterface;
use FML\Notification\Recipient\RecipientInterface;
use FML\Notification\Message\MessageInterface;

class MessageManager
{

    /**
     * @var ChannelInterface[]
     */
    protected $channels;

    /**
     * @var MessageInterface[]
     */
    protected $messages = array();

    /**
     * @param ChannelInterface $channel
     * @return $this
     */
    public function addChannel($channel)
    {
        $this->channels[$channel->getName()] = $channel;
        return $this;
    }

    /**
     * send immediately message
     * @param MessageInterface $message
     */
    public function sendMessage(MessageInterface $message)
    {
        $channel = $this->channels[$message->getChannel()];
        $channel->addMessage($message);
        $channel->flush();
    }
}
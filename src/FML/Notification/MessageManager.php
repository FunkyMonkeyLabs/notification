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
    private $channels;

    /**
     * @var MessageInterface[]
     */
    private $messages = array();

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
     * @param MessageInterface $message
     * @return $this
     */
    public function addMessage(MessageInterface $message)
    {
        $this->messages[$message->getChannel()][] = $message;
        return $this;
    }

    /**
     * flush filled channels
     */
    public function flush()
    {
        foreach ($this->messages as $channel => $messages) {
            $channel = $this->channels[$channel];
            foreach ($messages as $message) {
                $channel->addMessage($message);
            }
            $channel->flush();
        }
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
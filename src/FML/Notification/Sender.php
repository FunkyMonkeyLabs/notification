<?php

namespace FML\Notification;

use FML\Notification\Channel\ChannelInterface;
use FML\Notification\Recipient\RecipientInterface;
use FML\Notification\Message\MessageInterface;

class Sender
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
     */
    public function addChannel($channel)
    {
        $this->channels[$channel->getName()] = $channel;
    }

    /**
     * @param $name
     * @param RecipientInterface $recipient
     * @param array $parameters
     */
    public function addMessage(MessageInterface $message, RecipientInterface $recipient, array $parameters)
    {
        $message->setRecipient($recipient);
        $message->setParameters($parameters);

        $this->messages[] = $message;
    }

    public function send()
    {
        $channels = array();

        foreach ($this->messages as $message) {
            if (!empty($this->channels[$message->getChannel()])) {
                $channel = $this->channels[$message->getChannel()];
                $channel->addMessage($message);
                $channels[$channel->getName()] = $channel;
            }
        }

        foreach ($channels as $channel) {
            $channel->send();
        }
    }
}
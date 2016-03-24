<?php

namespace FML\Notification;

use FML\Notification\Message\MessageInterface;

class BufferedMessageManager extends MessageManager
{

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
     * flush buffered messages
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
}
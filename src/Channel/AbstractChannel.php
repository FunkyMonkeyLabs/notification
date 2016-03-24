<?php

namespace FML\Notification\Channel;

use FML\Notification\Message\MessageInterface;
use FML\Notification\Recipient\RecipientInterface;

abstract class AbstractChannel implements ChannelInterface
{

    /**
     * @var string
     */
    protected $name;

    /**
     * @var MessageInterface[]
     */
    protected $messages = array();

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @param MessageInterface $message
     * @return $this
     */
    public function addMessage(MessageInterface $message)
    {
        $this->messages[] = $message;
        return $this;
    }
}
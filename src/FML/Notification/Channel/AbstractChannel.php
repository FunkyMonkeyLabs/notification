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
     * @var MessageInterface[]
     */
    protected $messageTemplates;

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @param MessageInterface $messages
     */
    public function addMessageTemplate(MessageInterface $message)
    {
        $this->messageTemplates[$message->getName()] = $message;
    }

    /**
     * @param MessageInterface $message
     * @return mixed|void
     */
    public function addMessage(MessageInterface $message)
    {
        $this->messages[] = $message;
    }
}
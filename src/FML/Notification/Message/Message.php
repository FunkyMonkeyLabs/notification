<?php

namespace FML\Notification\Message;

use FML\Notification\Recipient\RecipientInterface;
use FML\Notification\Channel\ChannelInterface;

abstract class Message implements MessageInterface
{

    /**
     * @var string
     */
    private $from;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $channel;

    /**
     * @var RecipientInterface
     */
    protected $recipient;

    /**
     * @var string
     */
    protected $subject;

    /**
     * @var array
     */
    protected $parameters;

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getChannel()
    {
        return $this->channel;
    }

    /**
     * @param array $parameters
     */
    public function setParameters(array $parameters = array())
    {
        $this->parameters = $parameters;
        return $this;
    }

    /**
     * @return RecipientInterface
     */
    public function getRecipient()
    {
        return $this->recipient;
    }

    /**
     * @param RecipientInterface $recipient
     */
    public function setRecipient(RecipientInterface $recipient)
    {
        $this->recipient = $recipient;
        return $this;
    }

    /**
     * @return string
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * @param string $subject
     */
    public function setSubject($subject)
    {
        $this->subject = $subject;
        return $this;
    }

    /**
     * @return string
     */
    public function getFrom()
    {
        return $this->from;
    }

    /**
     * @param string $from
     */
    public function setFrom($from)
    {
        $this->from = $from;
        return $this;
    }
}
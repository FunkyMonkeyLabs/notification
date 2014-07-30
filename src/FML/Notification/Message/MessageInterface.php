<?php

namespace FML\Notification\Message;

use FML\Notification\Recipient\Recipient;
use FML\Notification\Recipient\RecipientInterface;

interface MessageInterface
{

    /**
     * @return string
     */
    public function getName();

    /**
     * @return string
     */
    public function getFrom();

    /**
     * @return string
     */
    public function getSubject();

    /**
     * @return string
     */
    public function getContent();

    /**
     * @return RecipientInterface[]
     */
    public function getRecipients();

    /**
     * @return string
     */
    public function getChannel();

    /**
     * @param RecipientInterface $recipient
     * @return $this
     */
    public function addRecipient(RecipientInterface $recipient);

    /**
     * @param array $parameters
     * @return $this
     */
    public function setParameters(array $parameters = array());
}
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
     * @return RecipientInterface
     */
    public function getRecipient();

    /**
     * @return string
     */
    public function getChannel();

    /**
     * @param RecipientInterface $recipient
     * @return mixed
     */
    public function setRecipient(RecipientInterface $recipient);

    /**
     * @param array $parameters
     * @return mixed
     */
    public function setParameters(array $parameters = array());
}
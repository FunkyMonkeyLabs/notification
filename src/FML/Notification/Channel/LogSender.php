<?php

namespace FML\Notification\Channel;

use Monolog\Logger;
use FML\Notification\Message\MessageInterface;

class LogSender
{

    /**
     * @var Logger
     */
    private $logger;

    /**
     * @param Logger $logger
     */
    public function __construct(Logger $logger)
    {
        $this->logger = $logger;
    }

    /**
     * @param MessageInterface $message
     */
    public function send(MessageInterface $message)
    {
        $this->logger->addInfo('message send', array(
                    $message->getRecipient()->getName(),
                    $message->getRecipient()->getAddress(),
                    $message->getName(),
                    $message->getContent()
                ));
    }
}
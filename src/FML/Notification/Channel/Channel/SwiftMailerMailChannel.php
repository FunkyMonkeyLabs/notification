<?php

namespace FML\Notification\Channel\Channel;

use FML\Notification\Channel\AbstractChannel;
use Swift_Mailer;

class SwiftMailerMailChannel extends AbstractChannel
{

    public static $channelName = 'mail';

    /**
     * @var Swift_Mailer
     */
    private $sender;

    /**
     * @param object $mailer
     */
    public function __construct($mailer)
    {
        parent::__construct();
        $this->sender = $mailer;
        $this->name = self::$channelName;
    }

    public function send()
    {
        foreach ($this->messages as $message) {
           $newMessage = \Swift_Message::newInstance()
               ->setSubject($message->getSubject())
               ->setTo($message->getRecipient()->getAddress())
               ->setFrom($message->getFrom())
               ->setBody(
                   $message->getContent(),
                   'text/html'
               );
            $this->sender->send($newMessage);
        }
    }
}
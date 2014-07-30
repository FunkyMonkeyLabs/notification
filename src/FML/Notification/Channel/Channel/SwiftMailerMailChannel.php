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
        $this->sender = $mailer;
        $this->name = self::$channelName;
    }

    public function flush()
    {
        foreach ($this->messages as $message) {
            $recipients = array();
            foreach ($message->getRecipients() as $recipient) {
                $recipients[] = $recipient->getAddress();
            }

            $newMessage = \Swift_Message::newInstance()
               ->setSubject($message->getSubject())
               ->setTo($recipients)
               ->setFrom($message->getFrom())
               ->setBody(
                   $message->getContent(),
                   'text/html'
               );
            $this->sender->send($newMessage);
        }
    }
}
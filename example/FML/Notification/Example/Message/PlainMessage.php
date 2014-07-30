<?php

namespace FML\Notification\Example\Message;

use FML\Notification\Message\Message;

class PlainMessage extends Message
{
    public function __construct()
    {
        $this->channel = 'output';
        $this->subject = 'Simple plain message';
    }

    /**
     * @return string
     */
    public function getContent()
    {
        $recipients = '';
        foreach($this->getRecipients() as $recipient){
            $recipients .= $recipient->getName().' '.$recipient->getAddress()."\r\n";
        }
        $content =
            $this->getSubject()
            ."\r\n"
            ."Hello ".$recipients
            ."\r\n"
            ;
        foreach ($this->parameters as $key => $parameter) {
            $content .= $key.":".$parameter."\r\n";
        }

        return $content;
    }
}
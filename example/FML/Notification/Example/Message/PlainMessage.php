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
        $content =
            $this->getSubject()
            ."\r\n"
            ."Hello "
            .$this->getRecipient()->getName()
            ." "
            .$this->getRecipient()->getAddress()
            ."\r\n"
            ;
        foreach ($this->parameters as $key => $parameter) {
            $content .= $key.":".$parameter."\r\n";
        }

        return $content;
    }
}
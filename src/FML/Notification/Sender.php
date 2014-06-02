<?php

namespace FML\Notification\Notification;

use FML\Notification\Channel\ChannelInterface;
use FML\Notification\Recipient\RecipientInterface;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use FML\Notification\Message\MessageInterface;

class Sender implements ContainerAwareInterface
{

    /**
     * @var ChannelInterface[]
     */
    private $channels;

    /**
     * @var MessageInterface[]
     */
    private $messages = array();

    /**
     * @var ContainerInterface
     */
    private $container;

    /**
     * @param ContainerInterface $container
     */
    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    /**
     * @param ChannelInterface $channel
     */
    public function addChannel($channel)
    {
        $this->channels[$channel->getName()] = $channel;
    }

    /**
     * @param $name
     * @param RecipientInterface $recipient
     * @param array $parameters
     */
    public function addMessage($name, RecipientInterface $recipient, array $parameters)
    {
        /**
         * @var MessageInterface $message
         */
        $message = clone $this->container->get($name);
        $message->setRecipient($recipient);
        $message->setParameters($parameters);

        $this->messages[] = $message;
    }

    public function send()
    {
        $channels = array();

        foreach ($this->messages as $message) {
            if (!empty($this->channels[$message->getChannel()])) {
                $channel = $this->channels[$message->getChannel()];
                $channel->addMessage($message);
                $channels[$channel->getName()] = $channel;
            }
        }

        foreach ($channels as $channel) {
            $channel->send();
        }
    }
}
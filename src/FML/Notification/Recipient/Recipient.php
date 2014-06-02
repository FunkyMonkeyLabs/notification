<?php

namespace FML\Notification\Recipient;

use FML\Notification\Entity\User;

class Recipient implements RecipientInterface
{

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $address;

    /**
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param string $address
     */
    public function setAddress($address)
    {
        $this->address = $address;
        return $this;
    }

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
        return $this;
    }
}
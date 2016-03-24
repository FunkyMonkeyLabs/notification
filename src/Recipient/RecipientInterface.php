<?php

namespace FML\Notification\Recipient;

interface RecipientInterface
{

    /**
     * @return string
     */
    public function getName();

    /**
     * tel/email/sth
     *
     * @return string
     */
    public function getAddress();
}
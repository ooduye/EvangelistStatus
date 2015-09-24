<?php

namespace League\EvangelistStatus;

/**
 * Class InvalidUrlException
 * @package League\EvangelistStatus
 */
class InvalidUrlException extends \Exception
{

    protected $message;

    /**
     * @param string $message
     */
    public function __construct($message) {
        $this->message = $message;
    }

    /**
     * @return string
     */
    public function getErrorMessage()
    {
        return "Error! " . $this->message;
    }

}

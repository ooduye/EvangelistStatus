<?php

namespace League\EvangelistStatus;

/**
 * Class InvalidUsernameException
 * @package League\EvangelistStatus
 */
class InvalidUsernameException extends \Exception
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
        return "Error: Username " . $this->message;
    }

}
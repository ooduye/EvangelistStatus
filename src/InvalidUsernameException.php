<?php

namespace League\EvangelistStatus;

class InvalidUsernameException extends \Exception {

    protected $message;

    public function __construct($message) {
        $this->message = $message;
    }

    public function getErrorMessage()
    {
        return "Error: Username " . $this->message;
    }

}

?>
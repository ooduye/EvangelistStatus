<?php

namespace League\EvangelistStatus;

class InvalidUrlException extends \Exception {

    protected $message;

    public function __construct($message) {
        $this->message = $message;
    }

    public function getErrorMessage()
    {
        return "Error: " . $this->message;
    }

}

?>

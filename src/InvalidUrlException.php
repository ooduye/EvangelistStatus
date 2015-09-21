<?php

namespace League\EvangelistStatus;

class InvalidUrlException extends \Exception
{

    protected $message;



    public function getErrorMessage()
    {
        return "Error! URL is invalid";
    }

}

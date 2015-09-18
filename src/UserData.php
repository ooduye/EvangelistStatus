<?php

namespace League\EvangelistStatus;

class UserData {
    private static $userUrl = "https://api.github.com/users/";
    private static $authKey = "?client_id=92e95931025ef214002d&client_secret=a4c5fb9e89d0f073f65394933f4871a541c00818";

    static function makeApiCall($username){
        $url = self::$userUrl . $username . self::$authKey;

        // Initiate curl
        $curl = curl_init();

        // Set the url
        curl_setopt($curl, CURLOPT_URL, $url);

        // Set the User Agent as username
        curl_setopt($curl, CURLOPT_USERAGENT, "andela-ooduye");

        // Accept the response as json
        curl_setopt($curl, CURLOPT_HTTPHEADER, array( 'Accept: application/json'));

        // Will return the response, if false it print the response
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

        // Execute
        $result = curl_exec($curl);

        // Handing Errors of curl
        if(curl_errno($curl))
        {
            throw new InvalidUrlException($curl);
        }

        // Closing
        curl_close($curl);

        // Decode the json in associative array
        return json_decode($result);

    }
}
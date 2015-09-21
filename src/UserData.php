<?php

namespace League\EvangelistStatus;

/**
 * Class UserData
 * @package League\EvangelistStatus
 */
class UserData {
    // Declaring static variables needed for $url build
    private static $userUrl = "https://api.github.com/users/";
    private static $authKey = "?client_id=92e95931025ef214002d&client_secret=a4c5fb9e89d0f073f65394933f4871a541c00818";

    /**
     * @param $username
     * @return mixed
     * @throws InvalidUrlException
     * @throws InvalidUsernameException
     */
    static function makeApiCall($username)
    {
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
            throw new InvalidUrlException();
        }

        // Closing
        curl_close($curl);

        // Decode the json in associative array
        $decoded_result = json_decode($result);

        if(isset($decoded_result->id)) {
            return $decoded_result;
        } else {
            throw new InvalidUsernameException($decoded_result->message);
        }
    }
}
<?php

/**
 * This class does the fetching of the user's data
 * for package League\EvangelistStatus.
 *
 * @package League\EvangelistStatus
 * @author  Oluwayemisi ODUYE <oluwayemisioduye@gmail.com>
 */

namespace League\EvangelistStatus;

/**
 * Class UserData
 * @package League\EvangelistStatus
 */
class UserData {

    // Declaring static variables needed for $url build
    private static $userUrl = "https://api.github.com/users/";

    /**
     * @param $username
     * @return mixed
     * @throws InvalidUrlException
     * @throws InvalidUsernameException
     */

    private static function loadDotEnv(){
        $dotenv = new \Dotenv\Dotenv(__DIR__ . '/../');
        $dotenv->load();
    }

    public static function makeApiCall($username)
    {
        self::loadDotEnv();

        $url = self::$userUrl . $username . '?client_id=' . getenv('GITHUB_CLIENT_ID') . '&client_secret=' . getenv('GITHUB_CLIENT_SECRET');

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
        $decoded_result = json_decode($result);

        if(isset($decoded_result->id)) {
            return $decoded_result;
        } else {
            throw new InvalidUsernameException($decoded_result->message);
        }
    }
}
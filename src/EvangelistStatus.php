<?php

namespace League\EvangelistStatus;

class EvangelistStatus
{
    private $username;

    /**
     * Create a new EvangelistStatus Instance
     */
    public function __construct($username)
    {
        // constructor body
        $this->username = $username;
    }

    public function getStatus() {

        try {
            $new_result = UserData::makeApiCall($this->username);
        } catch(InvalidUrlException $e) {
            return $e->getErrorMessage();
        }

        $noOfRepo = $new_result->public_repos;

        if($new_result->name) {
            $name = $new_result->name;

            if(! $new_result->company) {
                $company = ". ";
            } else {
                $company = " of " . $new_result->company . ". ";
            }

        } else {
            $name = "";
            $company = "";
        }

        $createdAt = substr($new_result->created_at, 0, 4);

        if($new_result->followers === 0) {
            $followers = "no";
        } else {
            $followers = $new_result->followers;
        }

        switch ($noOfRepo) {
            case $noOfRepo < 5 :
                return "Damn it!! " .  $name  . $company . "Even upon registration to the glorious Github community in the year " . $createdAt . "AD and with " . $followers . " fellow evangelists looking up to thee, yet ye have refused to preach the gospel of open source development. Gear up! Oh Ye Prodigal Evangelist.";
                break;
            case $noOfRepo >= 5 && $noOfRepo <= 10 :
                return $name . $company . "Welcome to the circle of open source evangelist. Ye joined the Github community in the year " . $createdAt . "AD. Currently, " . $followers . " fellow evangelists are looking up to you. Do not disappoint the community. Ye are hereby crowned Junior Evangelist.";
                break;
            case $noOfRepo >= 11 && $noOfRepo <= 20 :
                return $name . $company . "Ye joined the Github community in the year " . $createdAt . "AD. Ye are on the right path to showing the community and " . $followers . " fellow evangelists looking up to thee the way of open source evangelism. For this, the world thanks thee and hereby crown thee Associate Evangelist.";
                break;
            case $noOfRepo >= 21 :
                return $name . $company . "The Great One! Oh Mighty Evangelist! Ye joined the Github community in the year " . $createdAt . "AD. Ye have shown the community and " . $followers . " fellow evangelist looking up to thee the right way to open source evangelism. For this, the world thanks and respects thee. Ye are hereby crowned the Most Senior Evangelist. Thank you for making the world a better place.";
                break;
            default:
                echo "Ye are not an Evangelist of any kind";

        }
    }
}

<?php

namespace League\EvangelistStatus;

/**
 * Class EvangelistStatus
 * @package League\EvangelistStatus
 */
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

    /**
     * @return mixed|string
     */
    public function getUserData()
    {
        try {
            return UserData::makeApiCall($this->username);
        } catch(InvalidUrlException $e) {
            return $e->getErrorMessage();
        } catch(InvalidUsernameException $e) {
            return $e->getErrorMessage();
        }
    }

    public function getNumberOfRepos()
    {
        return $this->getUserData()->public_repos;
    }

    private function getName()
    {
        return $this->getUserData()->name;
    }

    private function getUserCompany()
    {
        return $this->getUserData()->company;
    }

    private function UserNameAndCompany()
    {
        if($this->getName()) {

            if(! $this->getUserCompany()) {
                return $this->getName() . ". ";
            } else {
                return $this->getName() . " of " . $this->getUserCompany() . ". ";
            }
        } else {
            return "";
        }
    }

    public function getUserCreatedYear()
    {
        return substr($this->getUserData()->created_at, 0, 4);
    }

    private function getUserFollowers()
    {

        if($this->getUserData()->followers === 0) {
            return "no";
        } else {
            return $this->getUserData()->followers;
        }
    }

    /**
     * @return string
     */
    public function getStatus()
    {

        switch ($this->getNumberOfRepos()) {
            case $this->getNumberOfRepos() < 5 :
                return "Damn it!! " .  $this->UserNameAndCompany() . "Even upon registration to the glorious Github community in the year " . $this->getUserCreatedYear() . "AD and with " . $this->getUserFollowers() . " fellow evangelists looking up to thee, yet ye have refused to preach the gospel of open source development. Gear up! Oh Ye Prodigal Evangelist.";
                break;
            case $this->getNumberOfRepos() >= 5 && $this->getNumberOfRepos() <= 10 :
                return $this->UserNameAndCompany() . "Welcome to the circle of open source evangelist. Ye joined the Github community in the year " . $this->getUserCreatedYear() . "AD. Currently, " . $this->getUserFollowers() . " fellow evangelists are looking up to you. Do not disappoint the community. Ye are hereby crowned Junior Evangelist.";
                break;
            case $this->getNumberOfRepos() >= 11 && $this->getNumberOfRepos() <= 20 :
                return $this->UserNameAndCompany() . "Ye joined the Github community in the year " . $this->getUserCreatedYear() . "AD. Ye are on the right path to showing the community and " . $this->getUserFollowers() . " fellow evangelists looking up to thee the way of open source evangelism. For this, the world thanks thee and hereby crown thee Associate Evangelist.";
                break;
            case $this->getNumberOfRepos() >= 21 :
                return $this->UserNameAndCompany() . "The Great One! Oh Mighty Evangelist! Ye joined the Github community in the year " . $this->getUserCreatedYear() . "AD. Ye have shown the community and " . $this->getUserFollowers() . " fellow evangelist looking up to thee the right way to open source evangelism. For this, the world thanks and respects thee. Ye are hereby crowned the Most Senior Evangelist. Thank you for making the world a better place.";
                break;
            default:
                echo "Ye are not an Evangelist of any kind";

        }
    }
}

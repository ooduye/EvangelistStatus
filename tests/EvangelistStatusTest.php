<?php

namespace League\EvangelistStatus\Test;

use League\EvangelistStatus\EvangelistStatus;

class EvangelistStatusTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Test that number of Repo is not empty
     */
    public function testGetNoOfRepo() {
        $status = new EvangelistStatus("andela-vdugeri");
        $noOfRepo = $status->getNumberOfRepos();
        $this->assertNotNull($noOfRepo);
    }

    /**
     * Test that User account was created in the right year
     */
    public function testUserCreatedYear() {
        $status = new EvangelistStatus("andela-vdugeri");
        $result = $status->getUserCreatedYear();
        $this->assertEquals(2013, $result);
    }

    /**
     * Test that appropriate status is given to user based on number of repositories
     */
    public function testGetStatus()
    {
        $status = new EvangelistStatus("andela-vdugeri");

        $noOfRepo = $status->getNumberOfRepos();
        $result = $status->getStatus();

        if ($noOfRepo < 5) {
            $this->assertRegexp('/Prodigal Evangelist/', $result);
        } elseif ($noOfRepo >= 5 && $noOfRepo <= 10) {
            $this->assertRegexp('/Junior Evangelist/', $result);
        } elseif ($noOfRepo >= 11 && $noOfRepo <= 20) {
            $this->assertRegexp('/Associate Evangelist/', $result);
        } elseif ($noOfRepo > 20) {
            $this->assertRegexp('/Senior Evangelist/', $result);
        }
    }
}

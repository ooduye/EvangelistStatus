<?php

namespace League\EvangelistStatus\Test;

use League\EvangelistStatus\EvangelistStatus;

class EvangelistStatusTest extends \PHPUnit_Framework_TestCase
{


    /**
     * Test that true does in fact equal true
     */
    public function testGetNoOfRepo() {
        $nacho = new EvangelistStatus("andela-vdugeri");
        $noOfRepo = $nacho->getNumberOfRepos();
        $this->assertNotNull($noOfRepo);
    }

    public function testUserCreatedYear() {
        $nacho = new EvangelistStatus("andela-vdugeri");
        $result = $nacho->getUserCreatedYear();
        $this->assertEquals(2013, $result);
    }

    public function testGetStatus()
    {

        $nacho = new EvangelistStatus("andela-vdugeri");

        $noOfRepo = $nacho->getNumberOfRepos();
        $result = $nacho->getStatus();

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

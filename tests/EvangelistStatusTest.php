<?php

namespace League\EvangelistStatus\Test;

use League\EvangelistStatus\EvangelistStatus;

class EvangelistStatusTest extends \PHPUnit_Framework_TestCase
{


    /**
     * Test that true does in fact equal true
     */
    public function testGetStatus()
    {
        $expectedResult = 'Dugeri, Verem Daniel of Andela. Welcome to the circle of open source evangelist. Ye joined the Github community in the year 2013AD. Currently, no fellow evangelists are looking up to you. Do not disappoint the community. Ye are hereby crowned Junior Evangelist.';

        $nacho = new EvangelistStatus("andela-vdugeri");

        $result = $nacho->getStatus();

        $this->assertNotNull($result);
        $this->assertEquals($expectedResult, $result);
        $this->assertRegexp('/Dugeri/', $result);
        $this->assertRegexp('/2013AD/', $result);
        $this->assertRegexp('/Junior Evangelist/', $result);

        unset($expectedResult);
        unset($nacho);
        unset($result);

        $expectedResult = 'Oluwayemisi. Welcome to the circle of open source evangelist. Ye joined the Github community in the year 2015AD. Currently, 6 fellow evangelists are looking up to you. Do not disappoint the community. Ye are hereby crowned Junior Evangelist.';

        $nacho = new EvangelistStatus("andela-ooduye");

        $result = $nacho->getStatus();

        $this->assertNotNull($result);
        $this->assertEquals($expectedResult, $result);
        $this->assertRegexp('/Oluwayemisi/', $result);
        $this->assertRegexp('/2015AD/', $result);
        $this->assertRegexp('/Junior Evangelist/', $result);

        unset($expectedResult);
        unset($nacho);
        unset($result);

        $expectedResult = 'Damn it!! Chidozie Ijeomah of Andela. Even upon registration to the glorious Github community in the year 2015AD and with no fellow evangelists looking up to thee, yet ye have refused to preach the gospel of open source development. Gear up! Oh Ye Prodigal Evangelist.';
        $nacho = new EvangelistStatus("andela-cijeomah");

        $result = $nacho->getStatus();

        $this->assertNotNull($result);
        $this->assertEquals($expectedResult, $result);
        $this->assertRegexp('/Chidozie Ijeomah/', $result);
        $this->assertRegexp('/2015AD/', $result);
        $this->assertRegexp('/Prodigal Evangelist/', $result);

        unset($expectedResult);
        unset($nacho);
        unset($result);

        $expectedResult = 'Mustapha Babatunde of Andela, GAI. Ye joined the Github community in the year 2015AD. Ye are on the right path to showing the community and 11 fellow evangelists looking up to thee the way of open source evangelism. For this, the world thanks thee and hereby crown thee Associate Evangelist.';
        $nacho = new EvangelistStatus("andela-bmustapha");

        $result = $nacho->getStatus();

        $this->assertNotNull($result);
        $this->assertEquals($expectedResult, $result);
        $this->assertRegexp('/Mustapha Babatunde/', $result);
        $this->assertRegexp('/2015AD/', $result);
        $this->assertRegexp('/Associate Evangelist/', $result);

        unset($expectedResult);
        unset($nacho);
        unset($result);

        $expectedResult = 'Otemuyiwa Prosper of Andela. The Great One! Oh Mighty Evangelist! Ye joined the Github community in the year 2012AD. Ye have shown the community and 19 fellow evangelist looking up to thee the right way to open source evangelism. For this, the world thanks and respects thee. Ye are hereby crowned the Most Senior Evangelist. Thank you for making the world a better place.';
        $nacho = new EvangelistStatus("busayo");

        $result = $nacho->getStatus();

        $this->assertNotNull($result);
        $this->assertEquals($expectedResult, $result);
        $this->assertRegexp('/Otemuyiwa Prosper/', $result);
        $this->assertRegexp('/2012AD/', $result);
        $this->assertRegexp('/Most Senior Evangelist/', $result);

    }
}

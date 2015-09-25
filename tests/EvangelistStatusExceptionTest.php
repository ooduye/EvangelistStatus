<?php

namespace League\EvangelistStatus\Test;

use League\EvangelistStatus\EvangelistStatus;
use League\EvangelistStatus\InvalidUsernameException;
use League\EvangelistStatus\UserData;

/**
 * Class EvangelistStatusExceptionTest
 * @package League\EvangelistStatus\Test
 */
class EvangelistStatusExceptionTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Test that invalid username throws a message
     */
    public function testInvalidUsernameExceptionMessage()
    {
        $status = new EvangelistStatus("andela-vdugri");
        $result = $status->getUserData();
        $this->assertEquals("Error: Username Not Found", $result);
    }

    /**
     * @throws \League\EvangelistStatus\InvalidUsernameException
     */
    public function testInvalidUsernameException()
    {
        try {
            // ... Code that is expected to raise an exception ...
            UserData::makeApiCall("andela-vdugri");
        }
        catch (InvalidUsernameException $expected) {
            return;
        }
        $this->fail('An expected exception has not been raised.');
    }
}

<?php
use Codeception\Util\Stub;

class UserTest extends \Codeception\TestCase\Test
{
   /**
    * @var \CodeGuy
    */
    protected $codeGuy;

    protected function _before()
    {
    }

    protected function _after()
    {
    }

    /**
     * @test
     */
    public function label() 
    {
        $expected = "1";
        $actual = "1";
        $this->assertEquals($expected, $actual);
    }

}
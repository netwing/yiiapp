<?php
use Codeception\Util\Stub;

class XdebugTest extends \Codeception\TestCase\Test
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

    // tests
    public function testMe()
    {
        $I = $this->codeGuy;
        $I->runShellCommand("php -i | grep xdebug");
        $I->seeInShellOutput("xdebug support => enabled");
        $I->seeInShellOutput("xdebug.remote_enable => On => On");
    }

}
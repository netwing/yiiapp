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
        Yii::import('application.modules.admin.models.User');
    }

    protected function _after()
    {
    }

    public function testLabel() 
    {
        // Expected result
        $expected = "{{user}}";
        // Get actual result
        $model = new User();
        $actual = $model->tableName();
        // Assert are equals
        $this->assertEquals($expected, $actual);
    }

    public function testRules()
    {
        $model = new User();
        $rules = $model->rules();
        $this->assertTrue(is_array($rules));
    }
}
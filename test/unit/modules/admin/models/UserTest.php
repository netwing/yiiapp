<?php
Yii::import("application.modules.admin.models.User");

class UserTest extends PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function label() 
    {
        // make an instance of the user
        $user = User::model();

        $expected = "User";
        $actual = $user->label();
        $this->assertEquals($expected, $actual);

        $expected = "Users";
        $actual = $user->label(2);
        $this->assertEquals($expected, $actual);

        $expected = "Users";
        $actual = $user->label(200);
        $this->assertEquals($expected, $actual);

        Yii::app()->language = "it";

        $expected = "Utente";
        $actual = $user->label();
        $this->assertEquals($expected, $actual);

        $expected = "Utenti";
        $actual = $user->label(2);
        $this->assertEquals($expected, $actual);

        $expected = "Utenti";
        $actual = $user->label(200);
        $this->assertEquals($expected, $actual);

    }

    /**
     * @test
     */
    public function search()
    {
        $model = User::model();
        $model->username = 'administrator';
        $result = $model->search();
        $this->assertInstanceOf('CActiveDataProvider', $result);
        $this->assertEquals($result->totalItemCount, 1);
    }

}

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

        $expected = "{{user}}";
        $actual = $user->tableName();
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

    /**
     * @test
     */
    public function create()
    {
        $model = new User();
        $model->name = "Test user";
        $model->username = "test_username";
        $model->password = "test_password";
        $model->role = array('ADMIN');
        $result = $model->validate();
        $this->assertTrue($result);
        if ($result) {
            $result = $model->save();
            $this->assertTrue($result);
        }
        return $model->id;
    }

    /**
     * @test
     * @depends create
     */
    public function read($id)
    {
        $user = User::model()->findByPk($id);
        $this->assertInstanceOf('User', $user);
        return $id;
    }

    /**
     * @test
     * @depends read
     */
    public function update($id)
    {
        // Test name and password update
        $user = User::model()->findByPk($id);
        $this->assertInstanceOf('User', $user);
        $user->name = "Test user updated";
        $user->password = "test_password_update";
        $result = $user->save();
        $this->assertTrue($result);
        $user = User::model()->findByPk($id);
        $this->assertEquals($user->name, 'Test user updated');

        // Test without password update and empty role
        $user = User::model()->findByPk($id);
        $this->assertInstanceOf('User', $user);
        $user->name = "Test user updated 2";
        $user->password = "";
        $user->role = "a string";
        $result = $user->save();
        $this->assertTrue($result);
        $user = User::model()->findByPk($id);
        $this->assertEquals($user->name, 'Test user updated 2');

        // Test impossible change administrator role
        $user = User::model()->findByPk(1);
        $role = $user->role;
        $user->role = "a string";
        $user->password = "";
        $result = $user->save();
        $this->assertTrue($result);
        $user = User::model()->findByPk(1);
        $this->assertEquals($user->role, $role);

        return $id;
    }

    /**
     * @test
     * @depends update
     */
    public function delete($id)
    {
        $user = User::model()->findByPk($id);
        $this->assertInstanceOf('User', $user);
        $result = $user->delete();
        $this->assertTrue($result);
    }

}

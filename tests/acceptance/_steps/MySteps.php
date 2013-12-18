<?php
namespace WebGuy;

class MySteps extends \WebGuy
{
    public function canLoginAsAdministrator()
    {
        $I = $this;
        $I->amOnPage("index.php?r=site/login");
        $I->fillField("input[id=LoginForm_username]", "administrator");
        $I->fillField("input[id=LoginForm_password]", "password");
        $I->see("Sign in");
        $I->click("Sign in");
        $I->seeValidPage();
        $I->dontSee("Username not found or invalid password.");
        $I->see("Login successful, welcome back.");
        $I->seeInCurrentUrl("/index.php");
    }

    public function cantLoginAsFakeUser()
    {
        $I = $this;
        $I->amOnPage("index.php?r=site/login");
        $I->fillField("input[id=LoginForm_username]", "fakeuser");
        $I->fillField("input[id=LoginForm_password]", "fakepass");
        $I->see("Sign in");
        $I->click("Sign in");
        $I->seeValidPage();
        $I->see("Username not found or invalid password.");
    }

    public function seeValidPage()
    {
        $I = $this;
        // $I->seeResponseCodeIs(200);
        $I->dontSeeAnyError();
    }

    public function dontSeeAnyError()
    {
        $I = $this;
        $I->dontSee("Parse error");
        $I->dontSee("Fatal error");
        $I->dontSee("PHP error");
        $I->dontSee("PHP warning");
        $I->dontSee("PHP notice");
        $I->dontSee("Exception");
        $I->dontSee("CException");
        $I->dontSee("CDbException");
    }

    public function canSeeValidPage()
    {
        $I = $this;
        // $I->canSeeResponseCodeIs(200);
        $I->cantSeeAnyError();
    }

    public function cantSeeAnyError()
    {
        $I = $this;
        $I->cantSee("Parse error");
        $I->cantSee("Fatal error");
        $I->cantSee("PHP error");
        $I->cantSee("PHP warning");
        $I->cantSee("PHP notice");
        $I->cantSee("Exception");
        $I->cantSee("CException");
        $I->cantSee("CDbException");
    }

}
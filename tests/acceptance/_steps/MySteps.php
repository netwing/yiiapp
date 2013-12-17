<?php
namespace WebGuy;

class MySteps extends \WebGuy
{
    public function canLoginAsAdmin()
    {
        $I = $this;
        $I->amOnPage("login.php?ritorno=index.php");
        $I->fillField("input[name=username]", "admin");
        $I->fillField("input[name=password]", "password");
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
        $I->amOnPage("login.php?ritorno=index.php");
        $I->fillField("input[name=username]", "fakeuser");
        $I->fillField("input[name=password]", "fakepass");
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
        $I->dontSee('SOMETHING WENT WRONG');
    }

    public function dontSeeAnyError()
    {
        $I = $this;
        $I->dontSee("Parse error");
        $I->dontSee("Fatal error");
        $I->dontSee("PHP error");
        $I->dontSee("PHP warning");
        $I->dontSee("PHP notice");
        $I->dontSee("CException");
        $I->dontSee("CDbException");
    }

    public function canSeeValidPage()
    {
        $I = $this;
        // $I->canSeeResponseCodeIs(200);
        $I->cantSeeAnyError();
        $I->cantSee('SOMETHING WENT WRONG');
    }

    public function cantSeeAnyError()
    {
        $I = $this;
        $I->cantSee("Parse error");
        $I->cantSee("Fatal error");
        $I->cantSee("PHP error");
        $I->cantSee("PHP warning");
        $I->cantSee("PHP notice");
        $I->cantSee("CException");
        $I->cantSee("CDbException");
    }

}
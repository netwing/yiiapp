<?php
$I = new WebGuy\MySteps($scenario);
$I->wantTo('ensure that frontpage works');
$I->amOnPage("/");
$I->seeValidPage();
$I->see("Yiiapp");
<?php
$I = new WebGuy\MySteps($scenario);
$I->wantTo('perform actions and see result');
$I->amOnPage("/");
$I->seeValidPage();
$I->see("Yiiapp");
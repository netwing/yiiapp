<?php
$I = new WebGuy\MySteps($scenario);
$I->wantTo('test login with fake user and with admin');
$I->cantLoginAsFakeUser();
$I->canLoginAsAdministrator();

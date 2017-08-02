<?php
$I = new AcceptanceTester($scenario);
$I->amOnPage('/feedback.html');
$I->click('#name');
$I->fillField('#name', 'My Name');
$I->click('#email');
$I->fillField('#email', 'email@email.com');
$I->click('#phone');
$I->fillField('#phone', '+71234567890');
$I->click('#message');
$I->fillField('#message', 'Hello, guys!');
$I->click('#submit');
$I->waitForText('Success!');
$I->see('Success!');

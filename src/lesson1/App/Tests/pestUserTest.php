<?php
require_once __DIR__ . '/../../vendor/autoload.php';
use \App\Classes\User;
test('getUser возвращает корректное имя', function () {
    $user = new User();
    expect($user->getUser())->toBe('John Doe');
});

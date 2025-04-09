<?php

require_once 'User.php';

$user = new User('Jonh', 'Smith', '2000-01-01');

var_dump($user->getAge());
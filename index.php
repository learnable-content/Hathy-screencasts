<?php

require './vendor/autoload.php';

$myFirstLogger = new Monolog\Logger('myChannel');
$mySimpleHandler = new Monolog\Handler\StreamHandler('./my.log');

$myDBHandler = new MySQLHandler\MySQLHandler(
    new PDO('mysql:host=localhost;dbname=my_logs_db', 'root', 'root'),
    'logs'
);

$myFirstLogger->pushHandler($mySimpleHandler);
$myFirstLogger->pushHandler($myDBHandler);

$myFirstLogger->debug('My first debug message!');
$myFirstLogger->error('Something went wrong');


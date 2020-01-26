<?php

require_once './library/mvc/Dispatcher.php';

$dispatcher = new Dispatcher();
$dispatcher->setSystemRoot('src');
$dispatcher->dispatch();

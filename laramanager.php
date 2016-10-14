#! /usr/bin/env php

<?php
use App\SayHelloCommand;
use Symfony\Component\Console\Application;

require 'vendor/autoload.php';

$app = new Application('Laramanger', '1.0');

$app->add(new SayHelloCommand());

$app->run();
#! /usr/bin/env php

<?php
use App\NewCommand;
use App\RenderCommand;
use App\SayHelloCommand;
use GuzzleHttp\Client;
use Symfony\Component\Console\Application;

require 'vendor/autoload.php';

$app = new Application('Laramanger', '1.0');

$app->add(new SayHelloCommand());
$app->add(new RenderCommand());
$app->add(new NewCommand(new Client()));

$app->run();
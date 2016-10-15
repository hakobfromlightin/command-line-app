#! /usr/bin/env php

<?php
use App\AddCommand;
use App\DatabaseAdapter;
use App\NewCommand;
use App\RemoveCommand;
use App\RenderCommand;
use App\SayHelloCommand;
use App\ShowCommand;
use GuzzleHttp\Client;
use Symfony\Component\Console\Application;

require 'vendor/autoload.php';

try {
    $pdo = new PDO('mysql:host=localhost;dbname=laracasts', 'root', ''); //"mysql:host=127.0.0.1;dbname=laracasts", "root", "");
//    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
//    $pdo->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Could not connect to the database';
    exit(1);
}

$app = new Application('Laramanger', '1.0');

$app->add(new SayHelloCommand());
$app->add(new RenderCommand());
$app->add(new ShowCommand(new DatabaseAdapter($pdo)));
$app->add(new AddCommand(new DatabaseAdapter($pdo)));
$app->add(new RemoveCommand(new DatabaseAdapter($pdo)));
$app->add(new NewCommand(new Client()));

$app->run();
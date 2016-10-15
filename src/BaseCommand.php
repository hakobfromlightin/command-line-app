<?php

namespace App;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Output\OutputInterface;

class BaseCommand extends Command
{
    protected $database;

    public function __construct(DatabaseAdapter $database)
    {
        $this->database = $database;

        parent::__construct();
    }

    protected function showSkills(OutputInterface $output)
    {
        if (!$skills = $this->database->fetchAll('skills')) {
            return $output->writeln('<info>No Skills to show!<info>');
        }

        $table = new Table($output);

        $table->setHeaders(['id', 'name '])
            ->setRows($skills)
            ->render();
    }
}
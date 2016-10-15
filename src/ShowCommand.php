<?php

namespace App;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ShowCommand extends BaseCommand
{
    public function configure()
    {
        $this->setName('show')
            ->setDescription('Show all commands.');
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $this->showSkills($output);
    }
}
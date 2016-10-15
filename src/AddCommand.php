<?php

namespace App;

use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class AddCommand extends BaseCommand
{
    public function configure()
    {
        $this->setName('add')
            ->setDescription('Add a new skill.')
            ->addArgument('name', InputArgument::REQUIRED);
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $name = $input->getArgument('name');

        $this->database->query('insert into skills(name) values(:name)', compact('name'));

        $output->writeln('<info>Task Added!<info>');

        $this->showSkills($output);
    }


}
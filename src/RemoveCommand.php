<?php

namespace App;

use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class RemoveCommand extends BaseCommand
{
    public function configure()
    {
        $this->setName('remove')
            ->setDescription('Remove a skill.')
            ->addArgument('id', InputArgument::REQUIRED);
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $id = $input->getArgument('id');

        $this->database->query('delete from skills where id = :id', compact('id'));

        $output->writeln('<info>Skill Deleted!<info>');

        $this->showSkills($output);
    }


}
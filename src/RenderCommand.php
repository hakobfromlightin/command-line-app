<?php

namespace App;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class RenderCommand extends Command
{
    public function configure()
    {
        $this->setName('render')
            ->setDescription('Render some tabular data.');
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $table = new Table($output);

        $table->setHeaders(['name', 'age']);

        $table->setRows([
            ['John Doe', 32],
            ['Jane Doe', 42],
            ['Jakob Doe', 26],
            ['Rafa Doe', 52],
        ])->render();
    }

}
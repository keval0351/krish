<?php

namespace Magento\CommandExample\Console\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class HelloWorld extends Command
{
    protected function configure(){
        $this->setName('training:hello_world')
            ->setDescription('This is hello world command');
    }
    protected function execute(InputInterface $input, OutputInterface $output){
       $output->writeln('Hello World');
    }
}
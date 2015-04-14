<?php

namespace SDPHP\HangMan;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\Question;

class HangManGameCommand extends Command
{
    protected function configure()
    {
        $this->setName('game:hangman')
            ->setDescription('This is the main hangman game command!')
            ->addArgument(
                'length',
                InputArgument::REQUIRED,
                'Length of the word that you will be guessing.'
            )
            ->addOption(
                'attempts',
                null,
                InputOption::VALUE_REQUIRED,
                'Number of times a user is allowed to fail.',
                10
            )
            ->setHelp(
            <<<EOT
<info>This is the section where we write our help text</info>
EOT
)
        ;
    }
    
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $length = $input->getArgument('length');
        $attempts = $input->getOption('attempts');
        
        $output->writeln(sprintf("<comment>Length: %s, Attempts: %s</comment>", $length, $attempts));
        
        $questionHelper = $this->getHelper('question');
        
        //GET A WORD
        
        do {
            // ask user for input
            $question = new Question('What is your guess?');
            $answer = $questionHelper->ask($input, $output, $question);
            
            
            // check if input is correct
            
            // if input is correct add letter 
            // else decrease counter
            
            // check if user is dead
            // display
            // end game or continue
        } while ($attempts > 0);

    
    }
}

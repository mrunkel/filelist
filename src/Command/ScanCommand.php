<?php

namespace App\Command;

use App\Service\Scanner;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class ScanCommand extends Command
{
    protected static $defaultName = 'scan';
    protected static $defaultDescription = 'Scan the given directory(ies) and store all the new files';

    public function __construct(private Scanner $scanner, string $name = null)
    {
        parent::__construct($name);
    }

    protected function configure()
    {
        $this
            ->setDescription(self::$defaultDescription)
            ->addOption('test', 'T', InputOption::VALUE_OPTIONAL, 'In test mode, nothing is saved', false)
            ->addArgument('dirs', InputArgument::IS_ARRAY, 'Directory or directories to be scanned');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        $dirs = $input->getArgument('dirs');
        $test = $input->getOption('test');

        if ($test) {
            $io->note('Testing mode!');
        }
        $failed = false;
        if ($dirs) {
            foreach ($dirs as $dir) {
                $failed = $failed || !$this->scanner->scanDirectory($dir, $io);
            }
        }

        if ($failed) {
            $io->error('Oops');

            return Command::FAILURE;
        }

        $io->success('Scans completed without error.');

        return Command::SUCCESS;
    }
}

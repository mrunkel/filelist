<?php


namespace App\Service;

use Symfony\Component\Console\Style\SymfonyStyle;

class Scanner
{
    public function scanDirectory(string $path, SymfonyStyle $io): bool
    {
        $io->writeln(sprintf('Scanning: %s', $path));
        // open $path
        // scan through each file in path
        // directory -> call scanDirectory on that path
        // file ->
        //  get the absolute path
        //  check if file already exists
        //     yes, check mod date if file has changed, if yes update record
        //     no, insert new record
        return true;
    }
}

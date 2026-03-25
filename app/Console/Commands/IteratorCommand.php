<?php

namespace App\Console\Commands;

use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;

#[Signature('app:iterator')]
#[Description('Iterate from 1 to 100 and prints results based on divisibility')]
class IteratorCommand extends Command
{
    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        for ($i = 1; $i <= 100; ++$i) {
            if (!($i % 15)) {
                $this->info('SuperFaktura');
            } elseif (!($i % 5)) {
                $this->info('Faktura');
            } elseif (!($i % 3)) {
                $this->info('Super');
            } else {
                $this->info($i);
            }
        }

        return 0;
    }
}

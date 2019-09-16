<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;

class SatisBuild extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'repository:satis:build';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run satis build';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $process = new Process([
            'php',
            '/home/mgonzalez/Code/satis/bin/satis',
            'build'
        ]);
        $process->run();
    
        if(!$process->isSuccessful()){
            throw new ProcessFailedException($process);
        }
        
        $this->info($process->getOutput());
    }
}

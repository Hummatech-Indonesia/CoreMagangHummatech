<?php

namespace App\Console\Commands;

use App\Contracts\Interfaces\WorkFromHomeInterface;
use Illuminate\Console\Command;

class WfhCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'run:wfh';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    private WorkFromHomeInterface $workFromHome;

    public function __construct(WorkFromHomeInterface $workFromHome)
    {
        parent::__construct(); // Call the parent constructor
        
        $this->workFromHome = $workFromHome;
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $wfhToday = $this->workFromHome->getToday();
        $wfhYesterday = $this->workFromHome->getYesterday(); 

        $isOn = false;

        // Jika kemarin WFH is_on == 1, otomatis hari ini juga is_on = 1
        if ($wfhYesterday && $wfhYesterday->is_on == true) {
            $isOn = true;
        }

        if (!$wfhToday) {
            $this->workFromHome->store(['date' => now()->format('Y-m-d'), 'is_on' => $isOn]);
        }

        $this->info('Check WFH entries generated successfully.');
        return 0;
    }
}

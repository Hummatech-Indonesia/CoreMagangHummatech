<?php

namespace App\Console\Commands;

use App\Enum\StatusPresentationEnum;
use App\Models\Presentation;
use App\Models\QueuePresentation;
use Illuminate\Console\Command;

class RefreshQueuePresentation extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:refresh-queue-presentation';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        try {
            QueuePresentation::query()->update(['queue' => 0]);
            Presentation::query()
                ->where('status_presentation', StatusPresentationEnum::ONGOING->value)
                ->update([
                    'status_presentation' => StatusPresentationEnum::PENNDING->value,
                    'planning_date_presentation' => \Carbon::tomorrow(),
                ]);
            Presentation::query()
                ->where('status_presentation', StatusPresentationEnum::WAITING->value)
                ->update([
                    'status_presentation' => StatusPresentationEnum::WAITING->value,
                    'planning_date_presentation' => \Carbon::tomorrow(),
                ]);
        } catch (\Exception $e) {
            $this->error($e->getMessage());
        }
    }
}

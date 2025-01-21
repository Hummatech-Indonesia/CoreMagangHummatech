<?php

namespace App\Console\Commands;

use App\Enum\StatusPresentationEnum;
use App\Models\Division;
use App\Models\Presentation;
use App\Models\QueuePresentation;
use Carbon\Carbon;
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
    protected $description = 'Refresh queue and update presentation statuses';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        try {
            // Update queue to 1 for all divisions
            QueuePresentation::query()
                ->update(['queue' => 1]);

            // Update ONGOING presentations to PENDING
            Presentation::query()
                ->where('status_presentation', StatusPresentationEnum::ONGOING->value)
                ->update([
                    'status_presentation' => StatusPresentationEnum::PENNDING->value,
                    'planning_date_presentation' => Carbon::tomorrow(),
                ]);

            // Update WAITING presentations to adjust planning date
            Presentation::query()
                ->where('status_presentation', StatusPresentationEnum::WAITING->value)
                ->update([
                    'planning_date_presentation' => Carbon::tomorrow(),
                ]);

            // Reset the order for FINISH presentations
            Presentation::query()
                ->where('status_presentation', StatusPresentationEnum::FINISH->value)
                ->update(['urutan' => 0]);

            $this->info('Queue and presentation statuses refreshed successfully.');
        } catch (\Exception $e) {
            // Log error and output message
            \Log::error('Error refreshing queue presentations: ' . $e->getMessage());
            $this->error('Failed to refresh queue presentations. Check logs for details.');
        }
    }
}

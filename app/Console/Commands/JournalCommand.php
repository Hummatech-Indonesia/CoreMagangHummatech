<?php

namespace App\Console\Commands;

use App\Enum\StatusJournalEnum;
use App\Enum\StudentStatusEnum;
use App\Models\Attendance;
use Carbon\Carbon;
use App\Models\Journal;
use App\Models\Student;
use Illuminate\Console\Command;

class JournalCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:journal';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate journal entries for students who have not submitted';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $dayNow = Carbon::now()->format('l');
        $dateNow = Carbon::now()->format('Y-m-d');

        if ($dayNow != 'Saturday' && $dayNow != 'Sunday') {
            $student_Already = Journal::whereDate('created_at', $dateNow)->pluck('student_id')->toArray();
            $student_notYet = Student::query()
                ->where('status', StudentStatusEnum::ACCEPTED->value)
                ->whereNull('expired')
                ->whereNotIn('id', $student_Already)
                ->whereDate('start_date', '<=', $dateNow)
                ->get();

            foreach ($student_notYet as $student) {
                $attendance = Attendance::where('student_id', $student->id)
                    ->orderBy('id', 'desc')
                    ->first();

                $title_Permission = $attendance->status ?? 'Kosong';

                Journal::create([
                    'student_id' => $student->id,
                    'title' => $title_Permission,
                    'description' => $title_Permission,
                    'image' => 'Kosong.png',
                    'status' => StatusJournalEnum::NOTFILLING->value,
                ]);
            }
        }
        $this->info('Journal entries generated successfully.');
        return 0;
    }
}

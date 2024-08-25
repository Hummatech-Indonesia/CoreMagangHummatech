<?php

namespace App\Console\Commands;

use App\Enum\StudentStatusEnum;
use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Console\Command;

class AlumniCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:alumni';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate update student status to alumni';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $dateNow = Carbon::now()->format('Y-m-d');
        $students = Student::whereDate('finish_date', $dateNow)->get();

        foreach ($students as $student) {
            Student::findOrFail($student->id)->update([
                'acepted' => false,
                'status' => StudentStatusEnum::ALUMNUS->value
            ]);
        }
        $this->info('Update student to alumnus status successfully');
        return 0;
    }
}

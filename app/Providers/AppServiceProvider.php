<?php

namespace App\Providers;

use App\Contracts\Interfaces\AbsenteePermitInterface;
use App\Contracts\Interfaces\ApprovalInterface;
use App\Contracts\Interfaces\CourseInterface;
use App\Contracts\Interfaces\CodeOfConductInterface;
use App\Contracts\Interfaces\DivisionInterface;
use App\Contracts\Interfaces\JournalInterface;
use App\Contracts\Interfaces\LetterheadsInterface;
use App\Contracts\Interfaces\PicketingReportInterface;
use App\Contracts\Interfaces\PicketInterface;
use App\Contracts\Interfaces\ReportStudenttInterface;
use App\Contracts\Interfaces\StudentInterface;
use App\Contracts\Repositories\AbsenteePermitRepository;
use App\Contracts\Repositories\ApprovalRepository;
use App\Contracts\Repositories\CourseRepository;
use App\Contracts\Repositories\CodeOfConductRepository;
use App\Contracts\Repositories\DivisionRepository;
use App\Contracts\Repositories\JournalRepository;
use App\Contracts\Repositories\LetterheadsRepository;
use App\Contracts\Repositories\PicketingReportRepository;
use App\Contracts\Repositories\PicketRepository;
use App\Contracts\Repositories\ReportStudentRepository;
use App\Contracts\Repositories\StudentRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    private array $register = [
        StudentInterface::class => StudentRepository::class,
        DivisionInterface::class => DivisionRepository::class,
        JournalInterface::class => JournalRepository::class,
        PicketInterface::class => PicketRepository::class,
        CodeOfConductInterface::class => CodeOfConductRepository::class,
        ReportStudenttInterface::class => ReportStudentRepository::class,
        LetterheadsInterface::class => LetterheadsRepository::class,
        CourseInterface::class => CourseRepository::class,
        AbsenteePermitInterface::class => AbsenteePermitRepository::class,
        PicketingReportInterface::class => PicketingReportRepository::class,
        ApprovalInterface::class => ApprovalRepository::class,
    ];

    /**
     * Register any application services.
     */
    public function register(): void
    {
        foreach ($this->register as $index => $value) {
            $this->app->bind($index, $value);
        }
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}

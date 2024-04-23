<?php

namespace App\Providers;

use Illuminate\Support\Facades\URL;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use App\Contracts\Interfaces\TaskInterface;
use App\Contracts\Interfaces\UserInterface;
use App\Contracts\Interfaces\LimitInterface;
use App\Contracts\Interfaces\CourseInterface;
use App\Contracts\Interfaces\MentorInterface;
use App\Contracts\Interfaces\PicketInterface;
use App\Contracts\Interfaces\JournalInterface;
use App\Contracts\Interfaces\MaxLateInterface;
use App\Contracts\Interfaces\PaymentInterface;
use App\Contracts\Interfaces\ProductInterface;
use App\Contracts\Interfaces\StudentInterface;
use App\Contracts\Interfaces\VoucherInterface;
use App\Contracts\Repositories\TaskRepository;
use App\Contracts\Repositories\UserRepository;
use App\Contracts\Interfaces\ApprovalInterface;
use App\Contracts\Interfaces\DivisionInterface;
use App\Contracts\Repositories\LimitRepository;
use App\Contracts\Interfaces\DataAdminInterface;
use App\Contracts\Interfaces\SignatureInterface;
use App\Contracts\Interfaces\SubCourseInterface;
use App\Contracts\Repositories\CourseRepository;
use App\Contracts\Repositories\MentorRepository;
use App\Contracts\Repositories\PicketRepository;
use App\Contracts\Interfaces\AttendanceInterface;
use App\Contracts\Repositories\JournalRepository;
use App\Contracts\Repositories\MaxLateRepository;
use App\Contracts\Repositories\PaymentRepository;
use App\Contracts\Repositories\ProductRepository;
use App\Contracts\Repositories\StudentRepository;
use App\Contracts\Repositories\VoucherRepository;
use App\Contracts\Interfaces\LetterheadsInterface;
use App\Contracts\Repositories\ApprovalRepository;
use App\Contracts\Repositories\DivisionRepository;
use App\Contracts\Interfaces\AdminJournalInterface;
use App\Contracts\Interfaces\ZoomScheduleInterface;
use App\Contracts\Repositories\DataAdminRepository;
use App\Contracts\Repositories\SignatureRepository;
use App\Contracts\Repositories\SubCourseRepository;
use App\Contracts\Interfaces\CodeOfConductInterface;
use App\Contracts\Interfaces\MentorStudentInterface;
use App\Contracts\Interfaces\WarningLetterInterface;
use App\Contracts\Repositories\AttendanceRepository;
use App\Contracts\Interfaces\AbsenteePermitInterface;
use App\Contracts\Interfaces\AttendanceRuleInterface;
use App\Contracts\Interfaces\MentorDivisionInterface;
use App\Contracts\Interfaces\ReportStudenttInterface;
use App\Contracts\Interfaces\ResponseLetterInterface;
use App\Contracts\Repositories\LetterheadsRepository;
use App\Contracts\Interfaces\PicketingReportInterface;
use App\Contracts\Repositories\AdminJournalRepository;
use App\Contracts\Repositories\ZoomScheduleRepository;
use App\Contracts\Interfaces\AttendanceDetailInterface;
use App\Contracts\Interfaces\ChallengeInterface;
use App\Contracts\Interfaces\HummataskTeamInterface;
use App\Contracts\Interfaces\OrderInterface;
use App\Contracts\Interfaces\StudentChallengeInterface;
use App\Contracts\Interfaces\StudentTaskInterface;
use App\Contracts\Interfaces\SubCourseUnlockInterface;
use App\Contracts\Interfaces\TaskSubmissionInterface;
use App\Contracts\Repositories\CodeOfConductRepository;
use App\Contracts\Repositories\MentorStudentRepository;
use App\Contracts\Repositories\ReportStudentRepository;
use App\Contracts\Repositories\WarningLetterRepository;
use App\Contracts\Repositories\AbsenteePermitRepository;
use App\Contracts\Repositories\AttendanceRuleRepository;
use App\Contracts\Repositories\MentorDivisionRepository;
use App\Contracts\Repositories\ResponseLetterRepository;
use App\Contracts\Interfaces\TransactionHistoryInterface;
use App\Contracts\Repositories\PicketingReportRepository;
use App\Contracts\Repositories\AttendanceDetailRepository;
use App\Contracts\Repositories\ChallengeRepository;
use App\Contracts\Repositories\HummataskTeamRepository;
use App\Contracts\Repositories\StudentChallengeRepository;
use App\Contracts\Repositories\StudentTaskRepository;
use App\Contracts\Repositories\SubCourseUnlockRepository;
use App\Contracts\Repositories\TaskSubmissionRepository;
use App\Contracts\Repositories\TransactionHistoryRepository;
use App\Contracts\Repositories\OrderRepository;

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
        PaymentInterface::class => PaymentRepository::class,
        ResponseLetterInterface::class => ResponseLetterRepository::class,
        AttendanceRuleInterface::class => AttendanceRuleRepository::class,
        MaxLateInterface::class => MaxLateRepository::class,
        AttendanceInterface::class => AttendanceRepository::class,
        AttendanceDetailInterface::class => AttendanceDetailRepository::class,
        AdminJournalInterface::class => AdminJournalRepository::class,
        ProductInterface::class => ProductRepository::class,
        WarningLetterInterface::class => WarningLetterRepository::class,
        VoucherInterface::class => VoucherRepository::class,
        UserInterface::class => UserRepository::class,
        SubCourseInterface::class => SubCourseRepository::class,
        MentorInterface::class => MentorRepository::class,
        MentorStudentInterface::class => MentorStudentRepository::class,
        TransactionHistoryInterface::class => TransactionHistoryRepository::class,
        LimitInterface::class => LimitRepository::class,
        TaskInterface::class => TaskRepository::class,
        ZoomScheduleInterface::class => ZoomScheduleRepository::class,
        DataAdminInterface::class => DataAdminRepository::class,
        SignatureInterface::class => SignatureRepository::class,
        MentorDivisionInterface::class => MentorDivisionRepository::class,
        TaskSubmissionInterface::class => TaskSubmissionRepository::class,
        StudentTaskInterface::class => StudentTaskRepository::class,
        SubCourseUnlockInterface::class => SubCourseUnlockRepository::class,
        ChallengeInterface::class => ChallengeRepository::class,
        OrderInterface::class => OrderRepository::class,
        HummataskTeamInterface::class => HummataskTeamRepository::class,
        StudentChallengeInterface::class => StudentChallengeRepository::class,
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
     *
     * @see Blade Directive: https://adinata-id.medium.com/membuat-directive-custom-untuk-format-mata-uang-pada-laravel-blade-f56eaf6abf8a
     */
    public function boot(): void
    {
        if (env('FORCE_HTTPS', false)) {
            URL::forceScheme('https');
        }

        # Adding custom directive
        Blade::directive('fcurrency', function ($expression) {
            return "<?php echo number_format($expression, 0,',','.'); ?>";
        });
        Blade::directive('currency', function ($expression) {
            return "Rp <?php echo number_format($expression, 0,',','.'); ?>";
        });

        # Paginator change to bootstrap
        Paginator::useBootstrapFive();
    }
}

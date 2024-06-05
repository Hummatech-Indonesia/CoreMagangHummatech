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
use App\Contracts\Interfaces\ActiveCourseInterface;
use App\Contracts\Interfaces\ActiveFeatureInterface;
use App\Contracts\Interfaces\AdminAttendanceInterface;
use App\Contracts\Interfaces\AppointmentOfMentorInterface;
use App\Contracts\Interfaces\AttendanceRuleInterface;
use App\Contracts\Interfaces\MentorDivisionInterface;
use App\Contracts\Interfaces\ReportStudenttInterface;
use App\Contracts\Interfaces\ResponseLetterInterface;
use App\Contracts\Repositories\LetterheadsRepository;
use App\Contracts\Interfaces\PicketingReportInterface;
use App\Contracts\Repositories\AdminJournalRepository;
use App\Contracts\Repositories\ZoomScheduleRepository;
use App\Contracts\Interfaces\AttendanceDetailInterface;
use App\Contracts\Interfaces\BoardInterface;
use App\Contracts\Interfaces\CategoryBoardInterface;
use App\Contracts\Interfaces\CategoryProjectInterface;
use App\Contracts\Interfaces\ChallengeInterface;
use App\Contracts\Interfaces\CourseAssignmentInterface;
use App\Contracts\Interfaces\CourseUnlockInterface;
use App\Contracts\Interfaces\DataCOInterface;
use App\Contracts\Interfaces\FaceInterface;
use App\Contracts\Interfaces\HummataskTeamInterface;
use App\Contracts\Interfaces\LimitPresentationInterface;
use App\Contracts\Interfaces\NotePicketInterface;
use App\Contracts\Interfaces\OrderInterface;
use App\Contracts\Interfaces\PermissionInterface;
use App\Contracts\Interfaces\PresentationInterface;
use App\Contracts\Interfaces\ProjectInterface;
use App\Contracts\Interfaces\Signature_COInterface;
use App\Contracts\Interfaces\StudentChallengeInterface;
use App\Contracts\Interfaces\StudentCoursePositionInterface;
use App\Contracts\Interfaces\StudentProjectInterface;
use App\Contracts\Interfaces\StudentSubCourseInterface;
use App\Contracts\Interfaces\StudentTaskInterface;
use App\Contracts\Interfaces\StudentTeamInterface;
use App\Contracts\Interfaces\SubCourseUnlockInterface;
use App\Contracts\Interfaces\SubmitTaskInterface;
use App\Contracts\Interfaces\TaskSubmissionInterface;
use App\Contracts\Interfaces\ThesisInterface;
use App\Contracts\Repositories\CodeOfConductRepository;
use App\Contracts\Repositories\MentorStudentRepository;
use App\Contracts\Repositories\ReportStudentRepository;
use App\Contracts\Repositories\WarningLetterRepository;
use App\Contracts\Repositories\AbsenteePermitRepository;
use App\Contracts\Repositories\AttendanceRuleRepository;
use App\Contracts\Repositories\MentorDivisionRepository;
use App\Contracts\Repositories\ResponseLetterRepository;
use App\Contracts\Interfaces\TransactionHistoryInterface;
use App\Contracts\Interfaces\TransactionInterface;
use App\Contracts\Interfaces\VoucherUsageInterface;
use App\Contracts\Interfaces\WorkFromHomeInterface;
use App\Contracts\Repositories\ActiveCourseRepository;
use App\Contracts\Repositories\ActiveFeatureRepository;
use App\Contracts\Repositories\AdminAttendanceRepository;
use App\Contracts\Repositories\AppointmentOfMentorRepository;
use App\Contracts\Repositories\PicketingReportRepository;
use App\Contracts\Repositories\AttendanceDetailRepository;
use App\Contracts\Repositories\BoardRepository;
use App\Contracts\Repositories\CategoryBoardRepository;
use App\Contracts\Repositories\CategoryProjectRepository;
use App\Contracts\Repositories\ChallengeRepository;
use App\Contracts\Repositories\CourseAssignmentRepository;
use App\Contracts\Repositories\CourseUnlockRepository;
use App\Contracts\Repositories\DataCORepository;
use App\Contracts\Repositories\FaceRepository;
use App\Contracts\Repositories\HummataskTeamRepository;
use App\Contracts\Repositories\LimitPresentationRepository;
use App\Contracts\Repositories\NotePicketRepository;
use App\Contracts\Repositories\StudentChallengeRepository;
use App\Contracts\Repositories\StudentTaskRepository;
use App\Contracts\Repositories\SubCourseUnlockRepository;
use App\Contracts\Repositories\TaskSubmissionRepository;
use App\Contracts\Repositories\TransactionHistoryRepository;
use App\Contracts\Repositories\OrderRepository;
use App\Contracts\Repositories\PermissionRepository;
use App\Contracts\Repositories\PresentationRepository;
use App\Contracts\Repositories\ProjectRepository;
use App\Contracts\Repositories\Signature_CORepository;
use App\Contracts\Repositories\StudentCoursePositionRepository;
use App\Contracts\Repositories\StudentProjectRepository;
use App\Contracts\Repositories\StudentTeamRepository;
use App\Contracts\Repositories\SubmitTaskRepository;
use App\Contracts\Repositories\ThesisRepository;
use App\Contracts\Repositories\TransactionRepository;
use App\Contracts\Repositories\VoucherUsageRepository;
use App\Contracts\Repositories\WorkFromHomeRepository;
use App\Models\CourseAssignment;
use App\Models\StudentSubCourse;
use App\Models\SubCourse;
use App\Models\SubmitTask;
use App\Observers\CourseAssignmentObserver;
use App\Observers\SubCourseObserver;
use App\Observers\SubmitTaskObserver;

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
        CourseUnlockInterface::class => CourseUnlockRepository::class,
        VoucherUsageInterface::class => VoucherUsageRepository::class,
        ThesisInterface::class => ThesisRepository::class,
        NotePicketInterface::class => NotePicketRepository::class,
        PresentationInterface::class => PresentationRepository::class,
        LimitPresentationInterface::class => LimitPresentationRepository::class,
        BoardInterface::class => BoardRepository::class,
        CategoryBoardInterface::class => CategoryBoardRepository::class,
        CategoryProjectInterface::class => CategoryProjectRepository::class,
        AppointmentOfMentorInterface::class => AppointmentOfMentorRepository::class,
        ProjectInterface::class => ProjectRepository::class,
        StudentProjectInterface::class => StudentProjectRepository::class,
        FaceInterface::class => FaceRepository::class,
        StudentTeamInterface::class => StudentTeamRepository::class,
        TransactionInterface::class => TransactionRepository::class,
        ActiveFeatureInterface::class => ActiveFeatureRepository::class,
        ActiveCourseInterface::class => ActiveCourseRepository::class,
        WorkFromHomeInterface::class => WorkFromHomeRepository::class,
        PermissionInterface::class => PermissionRepository::class,
        DataCOInterface::class => DataCORepository::class,
        Signature_COInterface::class => Signature_CORepository::class,
        AdminAttendanceInterface::class => AdminAttendanceRepository::class,
        StudentSubCourseInterface::class => StudentSubCourse::class,
        StudentCoursePositionInterface::class => StudentCoursePositionRepository::class,
        CourseAssignmentInterface::class => CourseAssignmentRepository::class,
        SubmitTaskInterface::class => SubmitTaskRepository::class,
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

        CourseAssignment::observe(CourseAssignmentObserver::class);
        SubCourse::observe(SubCourseObserver::class);
        SubmitTask::observe(SubmitTaskObserver::class);

        if (env('FORCE_HTTPS', false)) {
            URL::forceScheme('https');
        }

        # Adding custom directive
        Blade::directive('fcurrency', function ($expression) {
            return "<?php echo number_format((int) round($expression), 0,',','.'); ?>";
        });
        Blade::directive('currency', function ($expression) {
            return "Rp <?php echo number_format((int) round($expression), 0,',','.'); ?>";
        });

        # Paginator change to bootstrap
        Paginator::useBootstrapFive();
    }
}

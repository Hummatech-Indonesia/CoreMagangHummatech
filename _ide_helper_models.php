<?php

// @formatter:off
// phpcs:ignoreFile
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $user_id
 * @property string $start
 * @property string $end
 * @property string $reason
 * @property string $admin_note
 * @property string $proof_of_doctor_notes
 * @property string|null $status
 * @property-read \App\Models\User $user
 * @method static \Database\Factories\AbsenteePermitFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|AbsenteePermit newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AbsenteePermit newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AbsenteePermit query()
 * @method static \Illuminate\Database\Eloquent\Builder|AbsenteePermit whereAdminNote($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AbsenteePermit whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AbsenteePermit whereEnd($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AbsenteePermit whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AbsenteePermit whereProofOfDoctorNotes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AbsenteePermit whereReason($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AbsenteePermit whereStart($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AbsenteePermit whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AbsenteePermit whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AbsenteePermit whereUserId($value)
 * @mixin \Eloquent
 */
	class AbsenteePermit extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $student_id
 * @property string $status
 * @property int|null $is_admin
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Student $student
 * @method static \Illuminate\Database\Eloquent\Builder|Attendance newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Attendance newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Attendance query()
 * @method static \Illuminate\Database\Eloquent\Builder|Attendance whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Attendance whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Attendance whereIsAdmin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Attendance whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Attendance whereStudentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Attendance whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class Attendance extends \Eloquent implements \App\Base\Interfaces\HasStudent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $attendance_id
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Attendance $attendance
 * @method static \Illuminate\Database\Eloquent\Builder|AttendanceDetail newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AttendanceDetail newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AttendanceDetail query()
 * @method static \Illuminate\Database\Eloquent\Builder|AttendanceDetail whereAttendanceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AttendanceDetail whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AttendanceDetail whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AttendanceDetail whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AttendanceDetail whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class AttendanceDetail extends \Eloquent implements \App\Base\Interfaces\HasAttendance {}
}

namespace App\Models{
/**
 * 
 *
 * @property string $id
 * @property string $checkin_starts
 * @property string $checkin_ends
 * @property string $break_starts
 * @property string $break_ends
 * @property string $return_starts
 * @property string $return_ends
 * @property string $checkout_starts
 * @property string $checkout_ends
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|AttendanceRule newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AttendanceRule newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AttendanceRule query()
 * @method static \Illuminate\Database\Eloquent\Builder|AttendanceRule whereBreakEnds($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AttendanceRule whereBreakStarts($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AttendanceRule whereCheckinEnds($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AttendanceRule whereCheckinStarts($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AttendanceRule whereCheckoutEnds($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AttendanceRule whereCheckoutStarts($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AttendanceRule whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AttendanceRule whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AttendanceRule whereReturnEnds($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AttendanceRule whereReturnStarts($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AttendanceRule whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class AttendanceRule extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @method static \Database\Factories\ChallengeFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Challenge newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Challenge newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Challenge query()
 * @mixin \Eloquent
 */
	class Challenge extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $file
 * @method static \Database\Factories\CodeOfConductFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|CodeOfConduct newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CodeOfConduct newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CodeOfConduct query()
 * @method static \Illuminate\Database\Eloquent\Builder|CodeOfConduct whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CodeOfConduct whereFile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CodeOfConduct whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CodeOfConduct whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class CodeOfConduct extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $title
 * @property int|null $price
 * @property string $status
 * @property string $image
 * @property string $description
 * @property int $division_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Division $division
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\SubCourse> $subCourse
 * @property-read int|null $sub_course_count
 * @method static \Database\Factories\CourseFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Course newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Course newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Course query()
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereDivisionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class Course extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $image
 * @property string $name
 * @property string $company
 * @property string $field
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\DataAdminFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|DataAdmin newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DataAdmin newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DataAdmin query()
 * @method static \Illuminate\Database\Eloquent\Builder|DataAdmin whereCompany($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DataAdmin whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DataAdmin whereField($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DataAdmin whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DataAdmin whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DataAdmin whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DataAdmin whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class DataAdmin extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Mentor> $Mentor
 * @property-read int|null $mentor_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Course> $course
 * @property-read int|null $course_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\MentorDivision> $mentordivision
 * @property-read int|null $mentordivision_count
 * @method static \Database\Factories\DivisionFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Division newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Division newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Division query()
 * @method static \Illuminate\Database\Eloquent\Builder|Division whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Division whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Division whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Division whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class Division extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $student_id
 * @property string $title
 * @property string $description
 * @property string $image
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Student $student
 * @method static \Database\Factories\JournalFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Journal newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Journal newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Journal query()
 * @method static \Illuminate\Database\Eloquent\Builder|Journal whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Journal whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Journal whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Journal whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Journal whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Journal whereStudentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Journal whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Journal whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class Journal extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $logo
 * @property string $letterhead_top
 * @property string $letterhead_middle
 * @property string $letterhead_bottom
 * @property string $footer
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\LetterheadFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Letterhead newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Letterhead newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Letterhead query()
 * @method static \Illuminate\Database\Eloquent\Builder|Letterhead whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Letterhead whereFooter($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Letterhead whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Letterhead whereLetterheadBottom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Letterhead whereLetterheadMiddle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Letterhead whereLetterheadTop($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Letterhead whereLogo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Letterhead whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Letterhead whereUserId($value)
 * @mixin \Eloquent
 */
	class Letterhead extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $limits
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\LimitsFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Limits newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Limits newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Limits query()
 * @method static \Illuminate\Database\Eloquent\Builder|Limits whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Limits whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Limits whereLimits($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Limits whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class Limits extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $minute
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|MaxLate newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MaxLate newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MaxLate query()
 * @method static \Illuminate\Database\Eloquent\Builder|MaxLate whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MaxLate whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MaxLate whereMinute($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MaxLate whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class MaxLate extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string $image
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Division|null $division
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\MentorDivision> $mentordivision
 * @property-read int|null $mentordivision_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\MentorStudent> $mentorstudent
 * @property-read int|null $mentorstudent_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Student> $students
 * @property-read int|null $students_count
 * @method static \Database\Factories\MentorFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Mentor newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Mentor newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Mentor query()
 * @method static \Illuminate\Database\Eloquent\Builder|Mentor whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mentor whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mentor whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mentor whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mentor whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mentor wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mentor whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class Mentor extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $mentor_id
 * @property int $division_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Division $division
 * @property-read \App\Models\Mentor $mentor
 * @method static \Database\Factories\MentorDivisionFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|MentorDivision newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MentorDivision newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MentorDivision query()
 * @method static \Illuminate\Database\Eloquent\Builder|MentorDivision whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MentorDivision whereDivisionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MentorDivision whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MentorDivision whereMentorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MentorDivision whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class MentorDivision extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $mentor_id
 * @property int $student_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Mentor $mentor
 * @property-read \App\Models\Student $student
 * @method static \Database\Factories\MentorStudentFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|MentorStudent newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MentorStudent newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MentorStudent query()
 * @method static \Illuminate\Database\Eloquent\Builder|MentorStudent whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MentorStudent whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MentorStudent whereMentorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MentorStudent whereStudentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MentorStudent whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class MentorStudent extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $day_picket
 * @property int $student_id
 * @property string $tim
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\PicketFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Picket newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Picket newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Picket query()
 * @method static \Illuminate\Database\Eloquent\Builder|Picket whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Picket whereDayPicket($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Picket whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Picket whereStudentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Picket whereTim($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Picket whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class Picket extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $user_id
 * @property string $proof
 * @property string $description
 * @property string $status
 * @method static \Database\Factories\PicketingReportFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|PicketingReport newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PicketingReport newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PicketingReport query()
 * @method static \Illuminate\Database\Eloquent\Builder|PicketingReport whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PicketingReport whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PicketingReport whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PicketingReport whereProof($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PicketingReport whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PicketingReport whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PicketingReport whereUserId($value)
 * @mixin \Eloquent
 */
	class PicketingReport extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $division_id
 * @property string $name
 * @property string $price
 * @property string $description
 * @property string $image
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Division $division
 * @method static \Database\Factories\ProductFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Product newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Product newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Product query()
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereDivisionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class Product extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $student_id
 * @property string $image
 * @property string $description
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\ReportStudentFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|ReportStudent newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ReportStudent newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ReportStudent query()
 * @method static \Illuminate\Database\Eloquent\Builder|ReportStudent whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ReportStudent whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ReportStudent whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ReportStudent whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ReportStudent whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ReportStudent whereStudentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ReportStudent whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class ReportStudent extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $student_id
 * @property string $letter_number
 * @property string $letter_file
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Student $student
 * @method static \Database\Factories\ResponseLetterFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|ResponseLetter newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ResponseLetter newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ResponseLetter query()
 * @method static \Illuminate\Database\Eloquent\Builder|ResponseLetter whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResponseLetter whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResponseLetter whereLetterFile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResponseLetter whereLetterNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResponseLetter whereStudentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResponseLetter whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class ResponseLetter extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $qr
 * @property int $data_admin_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\SignatureFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Signature newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Signature newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Signature query()
 * @method static \Illuminate\Database\Eloquent\Builder|Signature whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Signature whereDataAdminId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Signature whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Signature whereQr($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Signature whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class Signature extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $address
 * @property string $avatar
 * @property string $birth_date
 * @property string $birth_place
 * @property string $school
 * @property string $major
 * @property string $identify_number
 * @property string $phone
 * @property int $acepted
 * @property string $status
 * @property string|null $rfid
 * @property int|null $division_id
 * @property string $parents_statement
 * @property string $self_statement
 * @property string $school_address
 * @property string $school_phone
 * @property string $gender
 * @property string $start_date
 * @property string $finish_date
 * @property string $class
 * @property string $cv
 * @property string $password
 * @property string $internship_type
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, Attendance> $attendances
 * @property-read int|null $attendances_count
 * @property-read Division|null $division
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\MentorStudent> $mentorstudent
 * @property-read int|null $mentorstudent_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, ResponseLetter> $responseLetters
 * @property-read int|null $response_letters_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\StudentTask> $studentTasks
 * @property-read int|null $student_tasks_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, WarningLetter> $warningLetters
 * @property-read int|null $warning_letters_count
 * @method static \Database\Factories\StudentFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Student newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Student newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Student query()
 * @method static \Illuminate\Database\Eloquent\Builder|Student whereAcepted($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Student whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Student whereAvatar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Student whereBirthDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Student whereBirthPlace($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Student whereClass($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Student whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Student whereCv($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Student whereDivisionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Student whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Student whereFinishDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Student whereGender($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Student whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Student whereIdentifyNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Student whereInternshipType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Student whereMajor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Student whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Student whereParentsStatement($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Student wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Student wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Student whereRfid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Student whereSchool($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Student whereSchoolAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Student whereSchoolPhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Student whereSelfStatement($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Student whereStartDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Student whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Student whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class Student extends \Eloquent implements \App\Base\Interfaces\HasAttendances {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $student_id
 * @property int $task_id
 * @property string $file
 * @property string $status
 * @property int|null $score
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Student $student
 * @property-read \App\Models\Task $task
 * @method static \Database\Factories\StudentTaskFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|StudentTask newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|StudentTask newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|StudentTask query()
 * @method static \Illuminate\Database\Eloquent\Builder|StudentTask whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StudentTask whereFile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StudentTask whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StudentTask whereScore($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StudentTask whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StudentTask whereStudentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StudentTask whereTaskId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StudentTask whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class StudentTask extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property string $file_course
 * @property string $video_course
 * @property string $image_course
 * @property int $course_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Course $course
 * @property-read \App\Models\SubCourseUnlock|null $subCourseUnlock
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Task> $task
 * @property-read int|null $task_count
 * @method static \Database\Factories\SubCourseFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|SubCourse newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SubCourse newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SubCourse query()
 * @method static \Illuminate\Database\Eloquent\Builder|SubCourse whereCourseId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubCourse whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubCourse whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubCourse whereFileCourse($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubCourse whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubCourse whereImageCourse($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubCourse whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubCourse whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubCourse whereVideoCourse($value)
 * @mixin \Eloquent
 */
	class SubCourse extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $user_id
 * @property int $course_id
 * @property int $sub_course_id
 * @property int $unlock
 * @property-read \App\Models\Course $course
 * @property-read mixed $next
 * @property-read mixed $previous
 * @property-read \App\Models\SubCourse $subCourse
 * @property-read \App\Models\User $user
 * @method static \Database\Factories\SubCourseUnlockFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|SubCourseUnlock newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SubCourseUnlock newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SubCourseUnlock query()
 * @method static \Illuminate\Database\Eloquent\Builder|SubCourseUnlock whereCourseId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubCourseUnlock whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubCourseUnlock whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubCourseUnlock whereSubCourseId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubCourseUnlock whereUnlock($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubCourseUnlock whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubCourseUnlock whereUserId($value)
 * @mixin \Eloquent
 */
	class SubCourseUnlock extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property string $level
 * @property int $sub_course_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\StudentTask> $studentTasks
 * @property-read int|null $student_tasks_count
 * @property-read \App\Models\SubCourse $subCourse
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\TaskSubmission> $submissions
 * @property-read int|null $submissions_count
 * @method static \Database\Factories\TaskFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Task newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Task newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Task query()
 * @method static \Illuminate\Database\Eloquent\Builder|Task whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Task whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Task whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Task whereLevel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Task whereSubCourseId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Task whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Task whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class Task extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $task_id
 * @property int $user_id
 * @property string|null $file
 * @property string|null $status
 * @property string|null $comment
 * @property int|null $rating
 * @property-read \App\Models\Task $task
 * @method static \Database\Factories\TaskSubmissionFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|TaskSubmission newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TaskSubmission newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TaskSubmission query()
 * @method static \Illuminate\Database\Eloquent\Builder|TaskSubmission whereComment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TaskSubmission whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TaskSubmission whereFile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TaskSubmission whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TaskSubmission whereRating($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TaskSubmission whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TaskSubmission whereTaskId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TaskSubmission whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TaskSubmission whereUserId($value)
 * @mixin \Eloquent
 */
	class TaskSubmission extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property string $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $transaction_id
 * @property string $reference
 * @property int $user_id
 * @property int $product_id
 * @property int|null $amount
 * @property \Illuminate\Support\Carbon $issued_at
 * @property \Illuminate\Support\Carbon $expired_at
 * @property string $checkout_url
 * @property string|null $status
 * @property \Illuminate\Support\Carbon|null $paid_at
 * @property-read \App\Models\Product $product
 * @property-read \App\Models\User $user
 * @method static \Database\Factories\TransactionHistoryFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|TransactionHistory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TransactionHistory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TransactionHistory query()
 * @method static \Illuminate\Database\Eloquent\Builder|TransactionHistory whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TransactionHistory whereCheckoutUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TransactionHistory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TransactionHistory whereExpiredAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TransactionHistory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TransactionHistory whereIssuedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TransactionHistory wherePaidAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TransactionHistory whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TransactionHistory whereReference($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TransactionHistory whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TransactionHistory whereTransactionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TransactionHistory whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TransactionHistory whereUserId($value)
 * @mixin \Eloquent
 */
	class TransactionHistory extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property int|null $student_id
 * @property int|null $mentors_id
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property mixed $password
 * @property int $feature
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Division|null $division
 * @property-read \App\Models\Mentor|null $mentor
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Permission\Models\Permission> $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Permission\Models\Role> $roles
 * @property-read int|null $roles_count
 * @property-read \App\Models\Student|null $student
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\TransactionHistory> $transaction
 * @property-read int|null $transaction_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\ZoomSchedule> $zoomSchedule
 * @property-read int|null $zoom_schedule_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User permission($permissions, $without = false)
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User role($roles, $guard = null, $without = false)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereFeature($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereMentorsId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereStudentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User withoutPermission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder|User withoutRole($roles, $guard = null)
 * @mixin \Eloquent
 */
	class User extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $code_voucher
 * @property string $presentase
 * @property string $start_date
 * @property string $end_date
 * @property string $type
 * @property string|null $quota
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\VoucherFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Voucher newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Voucher newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Voucher query()
 * @method static \Illuminate\Database\Eloquent\Builder|Voucher whereCodeVoucher($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Voucher whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Voucher whereEndDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Voucher whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Voucher wherePresentase($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Voucher whereQuota($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Voucher whereStartDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Voucher whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Voucher whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class Voucher extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $student_id
 * @property string $status
 * @property string $date
 * @property string $reference_number
 * @property string $reason
 * @property string $file
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Student $student
 * @method static \Database\Factories\WarningLetterFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|WarningLetter newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|WarningLetter newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|WarningLetter query()
 * @method static \Illuminate\Database\Eloquent\Builder|WarningLetter whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WarningLetter whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WarningLetter whereFile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WarningLetter whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WarningLetter whereReason($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WarningLetter whereReferenceNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WarningLetter whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WarningLetter whereStudentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WarningLetter whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class WarningLetter extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $title
 * @property string $start_date
 * @property string $end_date
 * @property string $link
 * @property int $mentors_id
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\ZoomScheduleFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|ZoomSchedule newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ZoomSchedule newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ZoomSchedule query()
 * @method static \Illuminate\Database\Eloquent\Builder|ZoomSchedule whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZoomSchedule whereEndDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZoomSchedule whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZoomSchedule whereLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZoomSchedule whereMentorsId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZoomSchedule whereStartDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZoomSchedule whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZoomSchedule whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZoomSchedule whereUserId($value)
 * @mixin \Eloquent
 */
	class ZoomSchedule extends \Eloquent {}
}


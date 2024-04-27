<?php

namespace App\Models;

use App\Models\Attendance;
use App\Models\WarningLetter;
use App\Models\ResponseLetter;
use App\Base\Interfaces\HasAttendances;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Division;

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
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\StudentChallenge> $studentChallenge
 * @property-read int|null $student_challenge_count
 * @mixin \Eloquent
 */
class Student extends Model implements HasAttendances
{
    use HasFactory;

    protected $guarded = [];

    /**
     * attendances
     *
     * @return HasMany
     */
    public function attendances(): HasMany
    {
        return $this->hasMany(Attendance::class);
    }

    public function warningLetters(): HasMany
    {
        return $this->hasMany(WarningLetter::class);
    }

    public function responseLetters(): HasMany
    {
        return $this->hasMany(ResponseLetter::class);
    }

    public function division()
    {
        return $this->belongsTo(Division::class);
    }

    public function mentorstudent()
    {
        return $this->hasMany(MentorStudent::class);
    }

    /**
     * Get all of the studentTasks for the Task
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function studentTasks(): HasMany
    {
        return $this->hasMany(StudentTask::class);
    }
    public function studentChallenge(): HasMany
    {
        return $this->hasMany(StudentChallenge::class);
    }
}

<?php

namespace App\Models;

use App\Filters\TutoringSessionFilter;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

/**
 * App\Models\TutoringSession
 *
 * @property int $id
 * @property string $subject
 * @property string|null $note
 * @property string $session_date
 * @property int $duration
 * @property int|null $paid
 * @property int $student_id
 * @property int $tutor_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read User $student
 * @property-read User $tutor
 * @method static TutoringSessionFilter|TutoringSession filter(array $filters)
 * @method static TutoringSessionFilter|TutoringSession newModelQuery()
 * @method static TutoringSessionFilter|TutoringSession newQuery()
 * @method static TutoringSessionFilter|TutoringSession orderByField($field, $direction)
 * @method static TutoringSessionFilter|TutoringSession query()
 * @method static TutoringSessionFilter|TutoringSession search($term = null)
 * @method static TutoringSessionFilter|TutoringSession whereCreatedAt($value)
 * @method static TutoringSessionFilter|TutoringSession whereDuration($value)
 * @method static TutoringSessionFilter|TutoringSession whereId($value)
 * @method static TutoringSessionFilter|TutoringSession whereNote($value)
 * @method static TutoringSessionFilter|TutoringSession wherePaid($value)
 * @method static TutoringSessionFilter|TutoringSession whereSessionDate($value)
 * @method static TutoringSessionFilter|TutoringSession whereStudentId($value)
 * @method static TutoringSessionFilter|TutoringSession whereSubject($value)
 * @method static TutoringSessionFilter|TutoringSession whereTutorId($value)
 * @method static TutoringSessionFilter|TutoringSession whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class TutoringSession extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['subject', 'note', 'session_date', 'duration', 'paid', 'student_id', 'tutor_id'];

    /**
     * Create a new Eloquent query builder for the model.
     *
     * @param  \Illuminate\Database\Query\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder|static
     */
    public function newEloquentBuilder($query)
    {
        return new TutoringSessionFilter($query);
    }

    /**
     * Get the student associated with the tutoring session.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function student()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the tutor associated with the tutoring session.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tutor()
    {
        return $this->belongsTo(User::class);
    }
}

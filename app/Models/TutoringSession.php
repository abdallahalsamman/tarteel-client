<?php

namespace App\Models;

use App\Filters\TutoringSessionFilter;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class TutoringSession extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['book', 'comment', 'session_date', 'duration', 'paid', 'student_id', 'tutor_id'];

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

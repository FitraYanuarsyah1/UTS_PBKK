<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $primaryKey = 'course_id';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'course_id',
        'name',
        'code',
        'credits',
        'semester',
    ];

    public function enrollments()
    {
        return $this->hasMany(Enrollment::class, 'course_id');
    }

    public function courseLecturers()
    {
        return $this->hasMany(CourseLecturer::class, 'course_id');
    }
}

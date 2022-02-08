<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    use HasUuid;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'uuid',
        'full_name',
        'email',
        'department_id',
        'job_title',
        'payment_type_class',
        'salary',
        'hourly_rate',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'department_id' => 'integer',
    ];

    public function getRouteKeyName(): string
    {
        return 'uuid';
    }

    public function paychecks()
    {
        return $this->hasMany(Paycheck::class);
    }

    public function timelogs()
    {
        return $this->hasMany(Timelog::class);
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }
}

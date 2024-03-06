<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeAttendanceDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id',
        'date',
        'checkin_time',
        'checkout_time',
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}

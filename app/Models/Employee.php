<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'emp_code',
    ];

    public function officeDetail()
    {
        return $this->hasOne(EmployeeOfficeDetail::class);
    }

    public function attendanceDetails()
    {
        return $this->hasMany(EmployeeAttendanceDetail::class);
    }

    public static function boot()
    {
        parent::boot();

        static::creating(function ($employee) {
            $lastEmployee = self::latest('emp_code')->first();
            $nextEmpCode = $lastEmployee ? ++$lastEmployee->emp_code : 'EMP10001';

            $employee->emp_code = $nextEmpCode;
        });
    }
}

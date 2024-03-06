<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeOfficeDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id',
        'designation',
        'office_address',
        'office_mobile_no',
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}

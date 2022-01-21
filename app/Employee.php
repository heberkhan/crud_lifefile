<?php

namespace App;

use App\Department;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table = 'employees';
    
    protected $fillable = [
        'name', 'email', 'last_name', 'phone', 'address', 'employee_id', 'department_id', 'access',
    ];

    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id');
    }

    public function access_room()
    {
        return $this->belongsTo('App\AccessRoom', 'employee_id', 'employee_id');
    }
}

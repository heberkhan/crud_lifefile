<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{

    protected $table = 'departments';

    protected $fillable = [
        'name',
    ];

    public function employee()
    {
        return $this->belongsTo('App\Employee', 'department_id', 'id');
    }
    
}

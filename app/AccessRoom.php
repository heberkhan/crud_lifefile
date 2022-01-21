<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AccessRoom extends Model
{
    protected $table = 'access_rooms';
    
    protected $fillable = [
        'employee_id',
        'access_granted',
        'have_access',
    ];

    public function employee()
    {
        return $this->belongsTo('App\Employee', 'employee_id', 'employee_id');
    }
}

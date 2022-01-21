<?php

namespace App\Http\Middleware;

use Closure;
use App\Employee;
use App\AccessRoom;

class CheckAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $employee = Employee::where('employee_id', $request->employee_id)->first();
        
        if (!$employee) {
          return back()->with(['message'=> 'Please login first','alert'=>'danger']);  
        }
        else {
            if ($employee->access == 1) {
                return $next($request);
            }
            else {
                $access = new AccessRoom;
                $access->employee_id = $employee->employee_id;
                $access->have_access = 0;
                $access->access_granted = 0;
                $access->save();
                return back()->with(['message'=> 'Employee have not Access','alert'=>'danger']);
            }
            
            }
        
    }
}

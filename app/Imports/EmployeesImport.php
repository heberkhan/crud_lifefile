<?php

namespace App\Imports;

use App\Employee;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class EmployeesImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Employee([
            
            'name'          => $row['name'],
            'last_name'     => $row['last_name'], 
            'phone'         => $row['phone'],
            'address'       => $row['address'],
            'email'         => $row['email'],
            'employee_id'   => $row['employee_id'],
            'department_id' => $row['department_id'],
            'access'        => $row['access'],
            
        ]);
    }

    public function getCsvSettings(): array
    {
        return [
            'input_encoding' => 'ISO-8859-1'
        ];
    }
}

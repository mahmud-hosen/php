<?php

namespace App\Http\Controllers;
use App\Employee;


use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    function employeeRoles()
    {
        return Employee::with('roles')->get();

    }
}

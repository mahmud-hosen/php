<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;


class RoleController extends Controller
{
    function rolesToEmployee()
    {
        return Role::with('employees')->get();

    }
}

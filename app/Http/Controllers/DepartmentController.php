<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /**
     * Browsing department
     */
    public function index()
    {
        // tulis code untuk browsing
        return view('department.index', [
            'departments' => Department::paginate(10)
        ]);
    }
}

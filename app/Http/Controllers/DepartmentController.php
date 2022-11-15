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

    public function show($id)
    {
        return view('department.show', [
            'department' => Department::find($id)
        ]);
    }

}

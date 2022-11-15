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

    public function edit($id)
    {
        return view('department.edit', [
            'department' => Department::find($id)
        ]);
    }

    /** 
     * Update
     * Dependency Injector 
     */
    public function update(Request $request, $id)
    {        
        // code update massive assigment 
        Department::find($id)->update($request->all());

        // redirect user to index page
        return redirect()->route('department.index');      

    }

}

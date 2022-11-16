<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /**
     * Browsing department
     * 
     * Senarai deparment dipaparkan dekat method ini
     * Query pun akan berlaku disini 
     */
    public function index(Request $request)
    {
        return view('department.index', [
            'departments' => Department::withCount('contacts')
                ->filter()->paginate(10)
        ]);
    }

    public function create()
    {
        return view('department.create', [
            'department' => new Department()
        ]);
    }

    /**
     * Create new record
     */
    public function store(Request $request)
    {
        // validation
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required'
        ]);

        $department = Department::create($request->all());

        // buat dkt sini redirect ke show
        return redirect()->route('department.show', $department->id);
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
        // validation
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required'
        ]);

        // code update massive assigment 
        Department::find($id)->update($request->all());

        // redirect user to index page
        return redirect()->route('department.index');
    }

    // Delete method
    public function delete($id)
    {
        // delete dengan cara kita find record then delete
        Department::find($id)->delete();

        return redirect()->route('department.index')
            ->with('message', 'Ok bro dah delete. Setel!');

        // delete destory terus tanpa kata2         
        // Department::destroy($id);

    }
}

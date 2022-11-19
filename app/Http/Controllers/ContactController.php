<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use App\Models\Department;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // filtering recycle;
        // First method 1
        // $contacts = Contact::where('jika ada recyle display recycle, jika tiada display normal')
        //     ->paginate(10);

        // second method
        // - modified filter 

        return view('contact.index', [
            'departments' => Department::all(),
            // 'contacts' => $contacts
            'contacts' => Contact::active()->filter()->paginate(10),            
        ]);
    }

    public function recycle()
    {
        return view('contact.recycle', [
            'departments' => Department::all(),            
            'contacts' => Contact::recycle()->filter()->paginate(10),            
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContactRequest $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        return view('contact.show', compact('contact'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        $departments = Department::all();
        return view('contact.edit', compact('contact', 'departments'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ContactRequest $request, Contact $contact)
    {
        // save dan validate input field 
        $contact->update($request->all());

        // lepas update redirect ke show
        return redirect()->route('contact.show', $contact->id)->with('toast_success', 'Record updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        $contact->is_deleted = true;
        $contact->delete_user_id = auth()->user()->id;      
        $contact->delete_timestamp = now();
        $contact->update();

        return redirect()->route('contact.index')->with('success', 'Record successfully deleted');
    }

    public function restore(Contact $contact)
    {
        $contact->is_deleted = false;  
        $contact->delete_user_id = null;      
        $contact->delete_timestamp = null;
        $contact->restore_timestamp = now();
        $contact->update();

        return redirect()->route('contact.recycle')->with('success', 'Record restore successfully.');   
    }
}

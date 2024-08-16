<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Http\Requests\UpdateContactRequest;
use App\Models\Contact;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $contacts = Contact::all();
        $sort = $request->get('sort');


        if ($sort == 'name') {
            $contacts = Contact::orderBy('name')->get();
        } elseif ($sort == 'created_at') {
            $contacts = Contact::orderBy('created_at')->get();
        }
        
        $search = $request->get('search');
        if($search){
            $contacts = Contact::where('name','like','%'.$search.'%')
            ->orWhere('email','like','%'.$search.'%')
            ->get();
        }

        return view('index', compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ContactRequest $request)
    {
        //
        $validated = $request->validated();
        // dd($request->all());

        Contact::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $request->get('phone'),
            'address' => $request->get('address')
        ]);

        return redirect()->route('contacts.create')->with('success', 'Contact created successfully.');

    }

    /**
     * Display the specified resource.
     */
    public function show(Contact $contact)
    {
        //\

        return view('show', compact('contact'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contact $contact)
    {
        //
        return view('edit', compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateContactRequest $request, Contact $contact)
    {
        //

        $request->validated();

        $contact->update($request->all());
        return redirect()->route('contacts.index')->with('success', 'Contact updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contact $contact)
    {
        //
        $contact->delete();
        return redirect()->back()->with('success', 'Contact deleted successfully.');
    }
}

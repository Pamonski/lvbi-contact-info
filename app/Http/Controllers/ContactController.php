<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Http\Requests\AddContactRequest;
use App\Http\Requests\UpdateContactRequest;

class ContactController extends Controller
{
    // Show form for new contact
    public function create()
    {
        return Inertia::render('Contacts/AddContact');
    }

    // Store new contact
    public function store(AddContactRequest $request)
    {
        if($request->validated())
        {
            // Save the contact
            Contact::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'job_title' => $request->job_title,
                'company' => $request->company,
                'country' => $request->country,
                'country_code' => $request->country_code,
                'user_id' => 1
            ]);

            // Attach the created contact to the user logged in

            // Show success message
            return redirect()->route('home')->with([
                'message' => 'Contact created successfully',
                'class' => 'alert alert-success'
            ]);
        }
    }

    // Show form for editing existing contact
    public function edit(Contact $contact)
    {
        return Inertia::render('Contacts/EditContact')->with([
            'contact' => $contact
        ]);
    }

    // Update existing contact
    public function update(UpdateContactRequest $request, Contact $contact)
    {
        if($request->validated())
        {
            // Update the contact
            $contact->update([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'job_title' => $request->job_title,
                'company' => $request->company,
                'country' => $request->country,
                'country_code' => $request->country_code,
                'user_id' => 1
            ]);

            // Show success message
            return redirect()->route('home')->with([
                'message' => 'Contact updated successfully',
                'class' => 'alert alert-success'
            ]);
        }
    }

    // Delete existing contact
    public function delete(Contact $contact)
    {
        // Delete the contact
        $contact->delete();

        // Show success message
        return redirect()->route('home')->with([
            'message' => 'Contact deleted successfully',
            'class' => 'alert alert-danger'
        ]);
    }
}

<?php

namespace App\Http\Controllers\Core;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{

    public function index()
    {
        $contacts = Contact::where('user_id', auth()->user()->id)->get();
        return view('pages.app.contacts', [
            'title' => 'Contact Us',
            'description' => 'Contact Us',
            'active' => 'contact',
            'contacts' => $contacts
        ]);
    }

    public function store(Request $request)
    { 
        // Validate the request...
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'occupation' => 'required',
            'linkedin' => 'nullable',
            'phone' => 'nullable',
        ]);

        // Send email
        // Mail::to(request('email'))->send(new ContactFormMail());

        try {
            $contact = new Contact();
            $contact->name = $validated['name'];
            $contact->email = $validated['email'];
            $contact->occupation = $validated['occupation'];
            $contact->linkedin = $validated['linkedin'];
            $contact->phone = $validated['phone'];
            $contact->user_id = auth()->user()->id;
            $contact->save();

            return redirect('/app/contacts')->with('success', 'Contact saved!');
        } catch (\Exception $e) {
            return redirect('/app/contacts')->with('error', 'Failed to Save Contact');
        }
    }

    public function update(Request $request, $id)
    {
        // Validate the request...
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'occupation' => 'required',
            'linkedin' => 'nullable',
            'phone' => 'nullable',
        ]);

        try {
            $contact = Contact::find($id);
            $contact->name = $validated['name'];
            $contact->email = $validated['email'];
            $contact->occupation = $validated['occupation'];
            $contact->linkedin = $validated['linkedin'];
            $contact->phone = $validated['phone'];
            $contact->save();

            return redirect('/app/contacts')->with('success', 'Contact updated!');
        } catch (\Exception $e) {
            return redirect('/app/contacts')->with('error', 'Failed to Update Contact');
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(Request $request)
    {
        return Contact::where('user_id', $request->user()->id)->get();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'nullable|email',
            'phone' => 'nullable|string|max:50',
        ]);
        $data['user_id'] = $request->user()->id;

        return Contact::create($data);
    }

    public function show(Request $request, Contact $contact)
    {
        $this->authorize('update-contact', $contact);
        return $contact;
    }

    public function update(Request $request, Contact $contact)
    {
        $this->authorize('update-contact', $contact);

        $data = $request->validate([
            'name'  => 'sometimes|string|max:255',
            'email' => 'nullable|email',
            'phone' => 'nullable|string|max:50',
        ]);

        $contact->update($data);
        return $contact->refresh();
    }

    public function destroy(Request $request, Contact $contact)
    {
        $this->authorize('update-contact', $contact);
        $contact->delete();
        return response()->noContent();
    }
}
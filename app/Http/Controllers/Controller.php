<?php

namespace App\Http\Controllers;

abstract class Controller
{
    public function edit(Request $request, Contact $contact)
{
    // if (Gate::cannot('update-contact', $contact)) {
    //     abort(403);
    // }

    $this->authorize('update-contact', $contact);

    return view('contacts.edit', ['contact' => $contact]);
}
}
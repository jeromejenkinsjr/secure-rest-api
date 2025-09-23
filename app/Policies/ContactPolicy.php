<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Contact;

class ContactPolicy
{
    /**
     * Determine if the given contact can be updated by the user.
     */
    public function update(User $user, Contact $contact): bool
    {
        return $user->id === $contact->user_id;
    }
}
<?php

namespace App\Policies;

use App\User;
use App\Contact;
use Illuminate\Auth\Access\HandlesAuthorization;

class ContactPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any contact.
     *
     * @param  App\User  $user
     * @return bool
     */
    public function viewAny(User $user)
    {
        return false;
    }

    /**
     * Determine whether the user can view the contact.
     *
     * @param  App\User  $user
     * @param  App\Contact  $contact
     * @return bool
     */
    public function view(User $user, Contact $contact)
    {
        return false;
    }

    /**
     * Determine whether the user can create a contact.
     *
     * @param  App\User  $user
     * @return bool
     */
    public function create(User $user)
    {
        return false;
    }

    /**
     * Determine whether the user can update the contact.
     *
     * @param  App\User  $user
     * @param  App\Contact  $contact
     * @return bool
     */
    public function update(User $user, Contact $contact)
    {
        return false;
    }

    /**
     * Determine whether the user can delete the contact.
     *
     * @param  App\User  $user
     * @param  App\Contact  $contact
     * @return bool
     */
    public function delete(User $user, Contact $contact)
    {
        return false;
    }

    /**
     * Determine whether the user can restore the contact.
     *
     * @param  App\User  $user
     * @param  App\Contact  $contact
     * @return bool
     */
    public function restore(User $user, Contact $contact)
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the contact.
     *
     * @param  App\User  $user
     * @param  App\Contact  $contact
     * @return bool
     */
    public function forceDelete(User $user, Contact $contact)
    {
        return false;
    }
}

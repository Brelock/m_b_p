<?php

namespace App\Http\Controllers\Admin;

use App\Contact;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ContactController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index()
    {
        $contacts = Contact::all();

        return view('admin.contacts.index', compact('contacts'));
    }

    public function destroy(Request $request, Contact $contact)
    {
        $contact->delete();

        return redirect()->back();
    }
}

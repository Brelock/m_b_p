<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Http\Resources\ContactResource;
use App\Jobs\ContactSendEmailJob;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Mail;

class ContactController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index()
    {
        return view('site.contacts.index');
        //return Contact::paginate();
    }

    public function show(Contact $contact)
    {
        return new ContactResource($contact->load([]));
    }

    public function store(Request $request)
    {
        $this->validate(request(), [
            'name'=>'required',
            'email'=>'required|email',
            'message'=>'required'
        ]);

        $contact = Contact::create($request->all());

        $data = [
            'email' => $contact->email,
            'name' => $contact->name,
            'msg' => $contact->message,
        ];

        $this->dispatch( new ContactSendEmailJob($data));

        return redirect()->back()->with('success', 'Ваше сообщение отправлено!');
    }

    public function update(Request $request, Contact $contact)
    {
        $contact->update($request->all());

        return new ContactResource($contact);
    }

    public function destroy(Request $request, Contact $contact)
    {
        $contact->delete();
        return response()->noContent();
    }
}

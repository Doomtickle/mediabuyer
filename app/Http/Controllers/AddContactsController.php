<?php

namespace App\Http\Controllers;

use App\Client;
use App\ClientContact;
use Illuminate\Http\Request;

class AddContactsController extends Controller
{
    public function addContact(Request $request, $name)
    {
        $this->validate($request, [
            'first_name'=>'required',
            'last_name' =>'required',
            'title'     =>'required',
            'email'     =>'required',
            'phone'     =>'required'

        ]);
        $contact = ClientContact::create($request->all());

        Client::fromName($name)->addClientContact($contact);

        return back();
    }
}

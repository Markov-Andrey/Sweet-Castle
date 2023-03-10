<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactFormRequest;
use App\Mail\ContactForm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function showContactForm()
    {
        return view("contact_form");
    }

    public function contactForm(ContactFormRequest $request)
    {
        Mail::to("AMarkov1911@yandex.by")->send(new ContactForm($request->validated()));

        return redirect(route("contacts"));
    }
}

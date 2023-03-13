<?php

namespace App\Http\Controllers;

use App\Actions\ContactEmailAction;
use App\Http\Requests\ContactFormRequest;

/**
 * Class ContactController
 * @package App\Http\Controllers
 */
class ContactController extends Controller
{
    public function showContactForm()
    {
        return view("contact_form");
    }

    public function contactForm(ContactFormRequest $request, ContactEmailAction $contactEmailAction)
    {
        $data = $request->validated();

        $contactEmailAction($data);

        return redirect(route("contacts"));
    }
}

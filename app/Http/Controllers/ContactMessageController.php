<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use Illuminate\Http\Request;

class ContactMessageController extends Controller
{
    public function messageSubmit(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'subject' => 'nullable|string',
            'message' => 'required|string',
        ]);

        ContactMessage::create($request->only('name', 'email', 'subject', 'message'));

        return redirect()->back()->with('success', 'Your message has been sent.');
    }
}

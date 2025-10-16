<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    /**
     * Display landing page
     */
    public function index()
    {
        return view('landing.index');
    }

    /**
     * Display features section
     */
    public function features()
    {
        return view('landing.features');
    }

    /**
     * Display about section
     */
    public function about()
    {
        return view('landing.about');
    }

    /**
     * Display contact section
     */
    public function contact()
    {
        return view('landing.contact');
    }

    /**
     * Handle contact form submission
     */
    public function submitContact(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string|max:1000',
        ]);

        // Send email logic here
        // Mail::to('admin@polcabot.com')->send(new ContactMail($validated));

        return redirect()->route('contact')->with('success', 'Pesan berhasil dikirim!');
    }
}
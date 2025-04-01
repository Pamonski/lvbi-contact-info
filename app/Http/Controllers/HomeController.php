<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use Inertia\Inertia;

class HomeController extends Controller
{
    // Get contacts list of currently logged in user
    public function index()
    {
        return Inertia::render('Home/Index')->with([
            'contacts' => Contact::paginate(10)
        ]);
    }

    
}

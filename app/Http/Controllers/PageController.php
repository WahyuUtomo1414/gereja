<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        return view('pages.home');
    }

    public function about()
    {
        return view('pages.about');
    }

    public function events()
    {
        return view('pages.events.index');
    }

    public function eventShow($id)
    {
        return view('pages.events.show', compact('id'));
    }

    public function docs()
    {
        return view('pages.docs.index');
    }

    public function docShow($id)
    {
        return view('pages.docs.show', compact('id'));
    }

    public function proposeEvent()
    {
        return view('pages.events.propose');
    }

    public function contact()
    {
        return view('pages.contact');
    }
}

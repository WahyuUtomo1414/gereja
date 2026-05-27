<?php

namespace App\Http\Controllers;

use App\Services\KegiatanStatusService;

class PageController extends Controller
{
    public function __construct(
        protected KegiatanStatusService $kegiatanStatusService,
    ) {}

    public function home()
    {
        $this->kegiatanStatusService->markExpiredActivitiesAsFinished();

        return view('pages.home');
    }

    public function about()
    {
        return view('pages.about');
    }

    public function events()
    {
        $this->kegiatanStatusService->markExpiredActivitiesAsFinished();

        return view('pages.events.index');
    }

    public function eventShow($id)
    {
        $this->kegiatanStatusService->markExpiredActivitiesAsFinished();

        return view('pages.events.show', compact('id'));
    }

    public function docs()
    {
        $this->kegiatanStatusService->markExpiredActivitiesAsFinished();

        return view('pages.docs.index');
    }

    public function docShow($id)
    {
        $this->kegiatanStatusService->markExpiredActivitiesAsFinished();

        return view('pages.docs.show', compact('id'));
    }

    public function proposeEvent()
    {
        return view('pages.events.propose');
    }

    public function contact()
    {
        return redirect()->to(route('about') . '#kontak');
    }
}

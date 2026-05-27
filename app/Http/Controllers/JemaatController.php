<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class JemaatController extends Controller
{
    public function dashboard(Request $request): View
    {
        $jemaat = $request->user()->jemaat;

        $upcomingCount = $this->upcomingQuery($jemaat?->id)->count();
        $historyCount = $this->historyQuery($jemaat?->id)->count();

        return view('pages.jemaat.dashboard', compact('upcomingCount', 'historyCount'));
    }

    public function upcoming(Request $request): View
    {
        $kegiatan = $this->upcomingQuery($request->user()->jemaat?->id)
            ->paginate(6);

        return view('pages.jemaat.upcoming', compact('kegiatan'));
    }

    public function history(Request $request): View
    {
        $kegiatan = $this->historyQuery($request->user()->jemaat?->id)
            ->paginate(6);

        return view('pages.jemaat.history', compact('kegiatan'));
    }

    public function profile(Request $request): View
    {
        $user = $request->user()->load('jemaat');

        return view('pages.jemaat.profile', compact('user'));
    }

    public function updateProfile(Request $request): RedirectResponse
    {
        $user = $request->user()->load('jemaat');

        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('users', 'email')->ignore($user->id),
            ],
            'alamat' => ['nullable', 'string', 'max:255'],
            'foto' => ['nullable', 'image', 'max:2048'],
        ]);

        $user->update([
            'name' => $data['name'],
            'email' => $data['email'],
        ]);

        $jemaatData = [
            'nama' => $data['name'],
            'email' => $data['email'],
            'alamat' => $data['alamat'] ?? null,
        ];

        if ($request->hasFile('foto')) {
            $jemaatData['foto'] = $request->file('foto')->store('jemaat', 'public');
        }

        $user->jemaat()->updateOrCreate(
            ['user_id' => $user->id],
            $jemaatData,
        );

        return back()->with('status', 'Profil berhasil diperbarui.');
    }

    public function password(): View
    {
        return view('pages.jemaat.password');
    }

    public function updatePassword(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'current_password' => ['required', 'current_password'],
            'password' => ['required', 'string', 'confirmed', 'min:8'],
        ], [
            'current_password.current_password' => 'Password saat ini tidak cocok.',
        ]);

        $request->user()->update([
            'password' => Hash::make($data['password']),
        ]);

        return back()->with('status', 'Password berhasil diperbarui.');
    }

    protected function upcomingQuery(?int $jemaatId)
    {
        return Kegiatan::query()
            ->with(['jenisKegiatan', 'pembicara'])
            ->whereHas('peserta', fn ($query) => $query->where('jemaat_id', $jemaatId))
            ->whereDate('tanggal', '>=', now()->toDateString())
            ->orderBy('tanggal')
            ->orderBy('jam_mulai');
    }

    protected function historyQuery(?int $jemaatId)
    {
        return Kegiatan::query()
            ->with(['jenisKegiatan', 'pembicara'])
            ->whereHas('peserta', fn ($query) => $query->where('jemaat_id', $jemaatId))
            ->whereDate('tanggal', '<', now()->toDateString())
            ->orderByDesc('tanggal')
            ->orderByDesc('jam_mulai');
    }
}

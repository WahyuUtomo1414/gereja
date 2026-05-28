<?php

namespace App\Providers;

use App\Models\Gereja;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('components.footer', function ($view): void {
            $gereja = Gereja::query()
                ->where('active', true)
                ->latest('id')
                ->first();

            $website = $gereja?->sosial_media['website'] ?? null;
            $facebook = $gereja?->sosial_media['facebook'] ?? '#';
            $instagram = $gereja?->sosial_media['instagram'] ?? '#';

            $view->with('gereja', [
                'nama' => $gereja?->nama ?? 'Gereja Protestan Maluku',
                'short_name' => 'GPM',
                'tagline' => 'Melayani jemaat dengan kasih dan dedikasi, bertumbuh bersama dalam iman dan pelayanan.',
                'logo_url' => $this->resolvePublicAssetUrl($gereja?->logo) ?? asset('assets/logo.png'),
                'alamat' => $gereja?->alamat,
                'no_tlpn' => $gereja?->no_tlpn,
                'email' => $gereja?->email,
                'website_url' => $website,
                'website_label' => $website ? Str::of($website)->replace(['https://', 'http://'], '')->rtrim('/')->toString() : '-',
                'facebook_url' => $facebook,
                'instagram_url' => $instagram,
            ]);
        });
    }

    protected function resolvePublicAssetUrl(?string $path): ?string
    {
        if (blank($path)) {
            return null;
        }

        if (str_starts_with($path, 'http://') || str_starts_with($path, 'https://')) {
            return $path;
        }

        if (str_starts_with($path, 'assets/')) {
            return asset($path);
        }

        return asset('storage/' . ltrim($path, '/'));
    }
}

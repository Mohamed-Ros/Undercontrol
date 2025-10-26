<?php

namespace App\Providers\Filament;

use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Widgets;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class MangerPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('manger')
            ->path('manger')
            ->brandName('أكاديمية Under Control')
            ->brandLogo(asset('https://i.ibb.co/bgRzCjn1/logo.png'))
            ->favicon('https://i.ibb.co/bgRzCjn1/logo.png')
            ->login()
            ->colors([
                'primary' => Color::Amber,
            ])
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\\Filament\\Pages')
            ->pages([
                \App\Filament\Pages\Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\\Filament\\Widgets')
->widgets([
    \App\Filament\Resources\NoneResource\Widgets\StatsOverview::class,
])

            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ])
            // ✅ حذف الحقوق من الفوتر
            ->renderHook('panels::footer.before', fn () => '')
->renderHook('panels::footer', fn () => '')
->renderHook('panels::footer.after', fn () => '')
->renderHook('panels::body.end', fn () => '')
            ->renderHook('panels::head.start', fn () =>
                '<link rel="stylesheet" href="'.asset('css/filament-rtl.css').'">'
            )
            ->renderHook('panels::head.end', fn () => '
                <script>
                    document.addEventListener("DOMContentLoaded", function() {
                        let heading = document.querySelector(".fi-simple-header-heading");
                        if (heading) heading.innerText = "تسجيل الدخول";

                        let emailLabel = document.querySelector("label[for*=email]");
                        if (emailLabel) emailLabel.innerText = "البريد الإلكتروني";

                        let passwordLabel = document.querySelector("label[for*=password]");
                        if (passwordLabel) passwordLabel.innerText = "كلمة المرور";

                        let button = document.querySelector("button[type=submit]");
                        if (button) button.innerText = "تسجيل الدخول";
                    });
                </script>
            ');
    }

    public static function getNavigationLabel(): string
    {
        return 'لوحة التحكم';
    }

    public static function getTitle(): string
    {
        return 'لوحة التحكم';
    }
}

<?php

namespace App\Providers\Filament;

use App\Http\Middleware\RedirectIfNotAuthorized;
use App\Http\Middleware\RedirectIfNotOwner;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Navigation\MenuItem;
use Filament\Navigation\UserMenuItem;
use Filament\Pages;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Widgets;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\AuthenticateSession;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class OwnerPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('owner')
            ->path('/dashboard')
            ->databaseNotifications()
            ->databaseNotificationsPolling('3s')
            ->sidebarCollapsibleOnDesktop(false)
            ->login()
            ->registration()
            ->emailVerification()
            ->userMenuItems([
                MenuItem::make()
                    ->label('settings')
                    ->url(env('APP_URL') . ('/user/profile'))
                    ->icon('heroicon-o-cog-6-tooth'),
            ])
            ->passwordReset()
            ->profile(isSimple: false)
            ->colors([
                'primary' => Color::Blue,
                'gray' => Color::Pink
            ])
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\\Filament\\Pages')
            ->pages([
                Pages\Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\\Filament\\Widgets')
            ->widgets([
                Widgets\AccountWidget::class,
                //Widgets\FilamentInfoWidget::class,
                \App\Filament\Resources\ChildResource\Widgets\ChildStates::class
            ])
            ->middleware([
                RedirectIfNotOwner::class,
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
            ]);
    }
}

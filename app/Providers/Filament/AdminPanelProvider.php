<?php

namespace App\Providers\Filament;

use Filament\Pages;
use Filament\Panel;
use Filament\Widgets;
use Livewire\Livewire;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\View\PanelsRenderHook;
use Illuminate\Support\Facades\Blade;
use Filament\Http\Middleware\Authenticate;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Filament\Http\Middleware\AuthenticateSession;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Navigation\NavigationGroup;
use Filament\Navigation\NavigationItem;
// use Filament\Panels\Concerns\PanelsRenderHook;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;



class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin')
            ->path('office_soft')
            ->login()
            ->profile()
            ->registration()
            ->colors([
                'danger' => Color::Red,
                'gray' => Color::Zinc,
                'info' => Color::Blue,
                'primary' => '#F05A27',
                'success' => Color::Green,
                'warning' => Color::Amber,
                'secondary' => '#106681',
                'ternary' => Color::Pink,
            ])
            ->brandLogo(asset('assets/icon/office_soft_icon.png'))
            ->favicon(asset('assets/icon/office_soft_fav-icon.png'))
            ->brandLogoHeight('4rem')
            ->font('poppins')
            ->brandName('Office Soft')
            ->spa()
            ->unsavedChangesAlerts()
            ->font('poppins')
            ->darkMode(false)
            ->sidebarWidth('15rem')
            // ->navigationItems([
            //     NavigationItem::make('Company Profile')
            //     // ->url('https://www.office-soft.com')
            //     ->group('External')
            //     ->sort(4),
            // ])
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\\Filament\\Pages')
            ->pages([
                Pages\Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\\Filament\\Widgets')
            ->viteTheme('resources/css/filament/admin/theme.css')
            ->widgets([
            //    Widgets\AccountWidget::class,
            //     Widgets\FilamentInfoWidget::class,
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
            ->plugins([
                \BezhanSalleh\FilamentShield\FilamentShieldPlugin::make(),
            ]);
    }
}

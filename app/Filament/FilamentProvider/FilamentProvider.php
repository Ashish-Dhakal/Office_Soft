<?php

namespace App\Filament\FilamentProvider;
use Filament\Support\Facades\FilamentView;
use Filament\View\PanelsRenderHook;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;

class FilamentProvider
{
    public function ClockInClockOut(): void
    {
        FilamentView::registerRenderHook(
            PanelsRenderHook::USER_MENU_BEFORE,
            fn (): string => Auth::check() && Auth::user()->employee
                ? Blade::render('@livewire(\'clock-in-button\')')
                : ''
        );
    }
    
}

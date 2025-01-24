<?php

namespace App\Filament\FilamentProvider;
use Filament\Support\Facades\FilamentView;
use Filament\View\PanelsRenderHook;
use Illuminate\Support\Facades\Blade;

class FilamentProvider
{
    public function ClockInClockOut(): void
    {
        FilamentView::registerRenderHook(
            PanelsRenderHook::SIDEBAR_NAV_START,
            fn (): string => Blade::render('@livewire(\'clock-in-button\')'),
        );
    }
}

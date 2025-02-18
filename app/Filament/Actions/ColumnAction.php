<?php

namespace App\Filament\Actions;

use Filament\Tables\Actions\Action;

final class ColumnAction extends Action
{
    public string $eventName;

    public string $component;

    public \Closure|bool $default = false;

    public function default(\Closure|bool $condition = false): self
    {
        $this->default = $condition;

        return $this;
    }

    public function eventName(string $eventName): self
    {
        $this->eventName = $eventName;

        return $this;
    }

    public function component(string $component): self
    {
        $this->component = $component;

        return $this;

    }

    public function getEventName(): string
    {
        return $this->evaluate($this->eventName);
    }

    public function getComponent(): string
    {
        return $this->evaluate($this->component);
    }

    public function getDefault(): bool
    {
        return $this->evaluate($this->default);
    }
}

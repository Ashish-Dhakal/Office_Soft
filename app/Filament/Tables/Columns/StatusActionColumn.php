<?php

namespace App\Filament\Tables\Columns;

use App\Filament\Actions\ColumnAction;
use Filament\Tables\Actions\Action;
use Filament\Tables\Columns\TextColumn;

class StatusActionColumn extends TextColumn
{
    /**
     * @var array<int, ColumnAction>|\Closure;
     */
    public array|\Closure $actions = [];

    public Action $defaultAction;

    protected string $view = 'filament.tables.columns.status-action-column';

    public function getUrl(): ?string
    {
        return 'javascript:void(0);';
    }

    /**
     * @param  array<int, ColumnAction>|\Closure  $actions
     */
    public function actions(array|\Closure $actions): self
    {
        $this->actions = $actions;

        return $this;
    }

    /**
     * @return array<int, ColumnAction>
     */
    public function getActions(): array
    {
        return $this->evaluate($this->actions ?? []);
    }

    public function getDefaultAction(): ?ColumnAction
    {
        foreach ($this->getActions() as $action) {
            if ($action->getDefault()) {
                return $action;
            }
        }

        return null;
    }
}

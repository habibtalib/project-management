<?php

namespace App\Filament\Resources\ProjectCostResource\Pages;

use App\Filament\Resources\ProjectCostResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewProjectCost extends ViewRecord
{
    protected static string $resource = ProjectCostResource::class;

    protected function getActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}

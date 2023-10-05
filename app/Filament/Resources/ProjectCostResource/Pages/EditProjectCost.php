<?php

namespace App\Filament\Resources\ProjectCostResource\Pages;

use App\Filament\Resources\ProjectCostResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditProjectCost extends EditRecord
{
    protected static string $resource = ProjectCostResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->previousUrl ?? $this->getResource()::getUrl('index');
    }

    protected function getActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}

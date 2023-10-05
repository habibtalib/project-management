<?php

namespace App\Filament\Resources\ProjectCostResource\Pages;

use App\Filament\Resources\ProjectCostResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateProjectCost extends CreateRecord
{
    protected static string $resource = ProjectCostResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->previousUrl ?? $this->getResource()::getUrl('index');
    }
}

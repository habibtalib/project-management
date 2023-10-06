<?php

namespace App\Filament\Resources\CostAttributeResource\Pages;

use App\Filament\Resources\CostAttributeResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageCostAttributes extends ManageRecords
{
    protected static string $resource = CostAttributeResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

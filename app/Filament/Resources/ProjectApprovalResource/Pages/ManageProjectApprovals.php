<?php

namespace App\Filament\Resources\ProjectApprovalResource\Pages;

use App\Filament\Resources\ProjectApprovalResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageProjectApprovals extends ManageRecords
{
    protected static string $resource = ProjectApprovalResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

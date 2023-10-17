<?php

namespace App\Filament\Resources\UserResource\Pages;

use Filament\Pages\Actions;
use App\Filament\Resources\UserResource;
use Filament\Resources\Pages\ViewRecord;

class ViewUser extends ViewRecord
{
    protected static string $resource = UserResource::class;

    protected function getActions(): array
    {
        return [
            Actions\EditAction::make(),

        ];
    }
}

<?php

namespace App\Filament\Resources\UserResource\Pages;

use Filament\Pages\Actions;
use App\Filament\Resources\UserResource;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;

class CreateUser extends CreateRecord
{
    protected static string $resource = UserResource::class;

    public function save(): void
    {
        // ...

        Notification::make()
            ->title('Saved successfully Yaaa')
            ->toDatabase();
    }
}

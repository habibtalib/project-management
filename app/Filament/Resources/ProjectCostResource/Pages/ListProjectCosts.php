<?php

namespace App\Filament\Resources\ProjectCostResource\Pages;

use App\Filament\Resources\ProjectCostResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;

class ListProjectCosts extends ListRecords
{
    protected static string $resource = ProjectCostResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    protected function getTableQuery(): Builder
    {
        return parent::getTableQuery()
            ->where(function ($query) {
                return $query->whereHas(
                    'project',
                    function ($query) {
                        return $query->where('owner_id', auth()->user()->id)->orWhereHas('users', function ($query) {
                            return $query->where('users.id', auth()->user()->id);
                        });
                    }
                );
            });
    }
}
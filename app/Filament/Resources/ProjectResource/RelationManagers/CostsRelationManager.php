<?php

namespace App\Filament\Resources\ProjectResource\RelationManagers;

use App\Filament\Resources\ProjectCostResource;
use Filament\Forms;
use Filament\Tables;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Resources\RelationManagers\RelationManager;

class CostsRelationManager extends RelationManager
{
    protected static string $relationship = 'costs';

    protected static ?string $recordTitleAttribute = 'description';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('description')
                    ->required()
                    ->maxLength(255),
                // Forms\Components\TextInput::make('justification')
                //     ->required()
                //     ->maxLength(255),
                Forms\Components\TextInput::make('cost')->mask(fn (Forms\Components\TextInput\Mask $mask) => $mask->money(prefix: 'RM', thousandsSeparator: ',', decimalPlaces: 2)),
                Forms\Components\TextInput::make('quantity')
                    ->numeric()
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('description'),
                // Tables\Columns\TextColumn::make('justification'),
                Tables\Columns\TextColumn::make('cost'),
                Tables\Columns\TextColumn::make('quantity'),
                Tables\Columns\TextColumn::make('total_cost'),
                Tables\Columns\TextColumn::make('actual_spending'),
                Tables\Columns\TextColumn::make('balance'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\ViewAction::make()->url(fn (Model $record): string => ProjectCostResource::getUrl('view', $record)),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }
}
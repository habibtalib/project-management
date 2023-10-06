<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\ProjectCost;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\ProjectCostResource\Pages;
use App\Filament\Resources\ProjectCostResource\RelationManagers;
use App\Filament\Resources\ProjectCostResource\RelationManagers\ExpensesRelationManager;

class ProjectCostResource extends Resource
{
    protected static ?string $model = ProjectCost::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';


    protected static ?int $navigationSort = 2;

    protected static function getNavigationLabel(): string
    {
        return __('Project Costs');
    }

    public static function getPluralLabel(): ?string
    {
        return static::getNavigationLabel();
    }

    protected static function getNavigationGroup(): ?string
    {
        return __('Management');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('project_id')
                    ->required(),
                // Forms\Components\TextInput::make('project_cost_id'),
                Forms\Components\TextInput::make('description')
                    ->maxLength(255),
                Forms\Components\TextInput::make('justification')
                    ->maxLength(255),
                Forms\Components\TextInput::make('cost')->mask(fn (Forms\Components\TextInput\Mask $mask) => $mask->money(prefix: 'RM', thousandsSeparator: ',', decimalPlaces: 2)),
                Forms\Components\TextInput::make('quantity'),
                Forms\Components\TextInput::make('total_cost')->mask(fn (Forms\Components\TextInput\Mask $mask) => $mask->money(prefix: 'RM', thousandsSeparator: ',', decimalPlaces: 2))->disabled(),
                Forms\Components\TextInput::make('actual_spending')->mask(fn (Forms\Components\TextInput\Mask $mask) => $mask->money(prefix: 'RM', thousandsSeparator: ',', decimalPlaces: 2))->disabled(),
                Forms\Components\TextInput::make('balance')->mask(fn (Forms\Components\TextInput\Mask $mask) => $mask->money(prefix: 'RM', thousandsSeparator: ',', decimalPlaces: 2))->disabled()
                // Forms\Components\Toggle::make('checked'),
                // Forms\Components\TextInput::make('receipt')
                //     ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('project_id'),
                // Tables\Columns\TextColumn::make('project_cost_id'),
                Tables\Columns\TextColumn::make('description'),
                Tables\Columns\TextColumn::make('justification'),
                Tables\Columns\TextColumn::make('cost'),
                Tables\Columns\TextColumn::make('quantity'),
                Tables\Columns\TextColumn::make('total_cost'),
                Tables\Columns\TextColumn::make('actual_spending'),
                Tables\Columns\TextColumn::make('balance'),
                Tables\Columns\IconColumn::make('checked')
                    ->boolean(),
                // Tables\Columns\TextColumn::make('receipt'),
                // Tables\Columns\TextColumn::make('deleted_at')
                //     ->dateTime(),
                // Tables\Columns\TextColumn::make('created_at')
                //     ->dateTime(),
                // Tables\Columns\TextColumn::make('updated_at')
                //     ->dateTime(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
            ExpensesRelationManager::class
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProjectCosts::route('/'),
            'create' => Pages\CreateProjectCost::route('/create'),
            'view' => Pages\ViewProjectCost::route('/{record}'),
            'edit' => Pages\EditProjectCost::route('/{record}/edit'),
        ];
    }
}
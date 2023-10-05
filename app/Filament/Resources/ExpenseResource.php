<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ExpenseResource\Pages;
use App\Filament\Resources\ExpenseResource\RelationManagers;
use App\Models\Expense;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ExpenseResource extends Resource
{
    protected static ?string $model = Expense::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?int $navigationSort = 2;

    protected static function getNavigationLabel(): string
    {
        return __('Expenses');
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
                Forms\Components\TextInput::make('project_cost_id')
                    ->required(),
                Forms\Components\TextInput::make('project_id')
                    ->required(),
                Forms\Components\TextInput::make('owner_id')
                    ->required(),
                Forms\Components\TextInput::make('vendor_id')
                    ->required(),
                Forms\Components\TextInput::make('payment_type_id')
                    ->required(),
                Forms\Components\TextInput::make('total_amount'),
                Forms\Components\TextInput::make('attachment')
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('project_cost_id'),
                Tables\Columns\TextColumn::make('project_id'),
                Tables\Columns\TextColumn::make('owner_id'),
                Tables\Columns\TextColumn::make('vendor_id'),
                Tables\Columns\TextColumn::make('payment_type_id'),
                Tables\Columns\TextColumn::make('total_amount'),
                Tables\Columns\TextColumn::make('attachment'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime(),
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
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListExpenses::route('/'),
            'create' => Pages\CreateExpense::route('/create'),
            'view' => Pages\ViewExpense::route('/{record}'),
            'edit' => Pages\EditExpense::route('/{record}/edit'),
        ];
    }
}

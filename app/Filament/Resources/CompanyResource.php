<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\User;
use Filament\Tables;
use App\Models\Company;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\CompanyResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\CompanyResource\RelationManagers;
use App\Filament\Resources\CompanyResource\RelationManagers\CompanyUserRelationManager;

class CompanyResource extends Resource
{
    protected static ?string $model = Company::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?int $navigationSort = 2;

    protected static function getNavigationLabel(): string
    {
        return __('Companies');
    }

    public static function getPluralLabel(): ?string
    {
        return static::getNavigationLabel();
    }

    protected static function getNavigationGroup(): ?string
    {
        return __('Company');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('owner_id')
                    ->label(__('Project owner'))
                    ->searchable()
                    ->options(fn () => User::all()->pluck('name', 'id')->toArray())
                    ->default(fn () => auth()->user()->id)
                    ->required(),
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('registration_number')
                    ->maxLength(255),
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->maxLength(255),
                Forms\Components\TextInput::make('phone_number')
                    ->tel()
                    ->maxLength(255),
                Forms\Components\TextInput::make('address')
                    ->maxLength(255),
                Forms\Components\TextInput::make('city')
                    ->maxLength(255),
                // Forms\Components\TextInput::make('city_id')
                //     ->maxLength(255),
                Forms\Components\TextInput::make('state')
                    ->maxLength(255),
                // Forms\Components\TextInput::make('state_id')
                //     ->maxLength(255),
                Forms\Components\TextInput::make('country')
                    ->maxLength(255),
                // Forms\Components\TextInput::make('country_id')
                //     ->maxLength(255),
                Forms\Components\TextInput::make('postcode')
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('owner.name'),
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('registration_number'),
                Tables\Columns\TextColumn::make('email'),
                Tables\Columns\TextColumn::make('phone_number'),
                // Tables\Columns\TextColumn::make('address'),
                // Tables\Columns\TextColumn::make('city'),
                // Tables\Columns\TextColumn::make('city_id'),
                // Tables\Columns\TextColumn::make('state'),
                // Tables\Columns\TextColumn::make('state_id'),
                // Tables\Columns\TextColumn::make('country'),
                // Tables\Columns\TextColumn::make('country_id'),
                // Tables\Columns\TextColumn::make('postcode'),
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
            RelationManagers\CompanyUserRelationManager::class
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCompanies::route('/'),
            'create' => Pages\CreateCompany::route('/create'),
            'view' => Pages\ViewCompany::route('/{record}'),
            'edit' => Pages\EditCompany::route('/{record}/edit'),
        ];
    }
}

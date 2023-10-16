<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProjectApprovalResource\Pages;
use App\Filament\Resources\ProjectApprovalResource\RelationManagers;
use App\Models\ProjectApproval;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProjectApprovalResource extends Resource
{
    protected static ?string $model = ProjectApproval::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('project_id')
                    ->required(),
                Forms\Components\TextInput::make('requester_id')
                    ->required(),
                Forms\Components\TextInput::make('approval_status_id')
                    ->required(),
                Forms\Components\TextInput::make('approver_level'),
                Forms\Components\TextInput::make('requester_remarks')
                    ->maxLength(255),
                Forms\Components\TextInput::make('approver_remarks')
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('project_id'),
                Tables\Columns\TextColumn::make('requester_id'),
                Tables\Columns\TextColumn::make('approval_status_id'),
                Tables\Columns\TextColumn::make('approver_level'),
                Tables\Columns\TextColumn::make('requester_remarks'),
                Tables\Columns\TextColumn::make('approver_remarks'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageProjectApprovals::route('/'),
        ];
    }    
}

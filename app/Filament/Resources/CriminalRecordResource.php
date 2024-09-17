<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CriminalRecordResource\Pages;
use App\Filament\Resources\CriminalRecordResource\RelationManagers;
use App\Models\CriminalRecord;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Validation\Rule;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TextInput;

class CriminalRecordResource extends Resource
{
    protected static ?string $model = CriminalRecord::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('criminal_name')->required()->maxLength(20),
                TextInput::make('criminal_address')->required()->maxLength(30),
                DateTimePicker::make('criminal_dob')->required(),
                TextInput::make('criminal_mobile')
                    ->tel()
                    ->maxLength(11)
                    ->required()
                    // Modify unique validation to ignore the current record during update
                    ->rule(function ($record) {
                        return Rule::unique('criminal_records', 'criminal_mobile')->ignore($record);
                    }),
                TextInput::make('criminal_nic')
                    ->numeric()
                    ->minLength(13)
                    ->maxLength(13)
                    ->required()
                    // Modify unique validation to ignore the current record during update
                    ->rule(function ($record) {
                        return Rule::unique('criminal_records', 'criminal_nic')->ignore($record);
                    }),
                TextInput::make('father_name')->required()->maxLength(20)->required(),
                TextInput::make('father_nic')
                    ->numeric()
                    ->minLength(13)
                    ->maxLength(13)
                    ->required()
                    // Modify unique validation to ignore the current record during update
                    ->rule(function ($record) {
                        return Rule::unique('criminal_records', 'father_nic')->ignore($record);
                    }),
            ])
            ->columns(2);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('criminal_name'),
                Tables\Columns\TextColumn::make('criminal_address'),
                Tables\Columns\TextColumn::make('criminal_dob'),
                Tables\Columns\TextColumn::make('criminal_mobile'),
                Tables\Columns\TextColumn::make('criminal_nic'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
            'index' => Pages\ListCriminalRecords::route('/'),
            'create' => Pages\CreateCriminalRecord::route('/create'),
            'edit' => Pages\EditCriminalRecord::route('/{record}/edit'),
        ];
    }
}

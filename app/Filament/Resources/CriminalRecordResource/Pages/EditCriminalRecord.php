<?php

namespace App\Filament\Resources\CriminalRecordResource\Pages;

use App\Filament\Resources\CriminalRecordResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCriminalRecord extends EditRecord
{
    protected static string $resource = CriminalRecordResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

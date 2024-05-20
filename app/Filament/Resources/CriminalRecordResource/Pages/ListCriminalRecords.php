<?php

namespace App\Filament\Resources\CriminalRecordResource\Pages;

use App\Filament\Resources\CriminalRecordResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCriminalRecords extends ListRecords
{
    protected static string $resource = CriminalRecordResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

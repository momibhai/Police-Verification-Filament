<?php

namespace App\Filament\Resources\CriminalRecordResource\Pages;

use App\Filament\Resources\CriminalRecordResource;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Validation\ValidationException;

class CreateCriminalRecord extends CreateRecord
{
    protected static string $resource = CriminalRecordResource::class;

    // Custom validation to ensure criminal NIC and father NIC are different
    protected function beforeSave(): void
    {
        $criminalNic = $this->data['criminal_nic'];
        $fatherNic = $this->data['father_nic'];

        if ($criminalNic === $fatherNic) {
            throw ValidationException::withMessages([
                'father_nic' => 'The father NIC must be different from the criminal NIC.',
            ]);
        }
    }

    // Override the redirect behavior after creating a record
    protected function getRedirectUrl(): string
    {
        // Redirect to the index (list) page after successful creation
        return $this->getResource()::getUrl('index');
    }
}

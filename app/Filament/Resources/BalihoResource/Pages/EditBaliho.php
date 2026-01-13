<?php

namespace App\Filament\Resources\BalihoResource\Pages;

use App\Filament\Resources\BalihoResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBaliho extends EditRecord
{
    protected static string $resource = BalihoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

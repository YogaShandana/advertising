<?php

namespace App\Filament\Resources\VideotronResource\Pages;

use App\Filament\Resources\VideotronResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditVideotron extends EditRecord
{
    protected static string $resource = VideotronResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

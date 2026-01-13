<?php

namespace App\Filament\Resources\VideotronResource\Pages;

use App\Filament\Resources\VideotronResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListVideotrons extends ListRecords
{
    protected static string $resource = VideotronResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

<?php

namespace App\Filament\Resources\BalihoResource\Pages;

use App\Filament\Resources\BalihoResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListBalihos extends ListRecords
{
    protected static string $resource = BalihoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

<?php

namespace App\Filament\Resources\TentangKami2Resource\Pages;

use App\Filament\Resources\TentangKami2Resource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTentangKami2s extends ListRecords
{
    protected static string $resource = TentangKami2Resource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

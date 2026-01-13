<?php

namespace App\Filament\Resources\TentangKami1Resource\Pages;

use App\Filament\Resources\TentangKami1Resource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTentangKami1s extends ListRecords
{
    protected static string $resource = TentangKami1Resource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

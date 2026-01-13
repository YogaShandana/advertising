<?php

namespace App\Filament\Resources\TentangKami1Resource\Pages;

use App\Filament\Resources\TentangKami1Resource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTentangKami1 extends EditRecord
{
    protected static string $resource = TentangKami1Resource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

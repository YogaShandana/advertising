<?php

namespace App\Filament\Resources\TentangKami2Resource\Pages;

use App\Filament\Resources\TentangKami2Resource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTentangKami2 extends EditRecord
{
    protected static string $resource = TentangKami2Resource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

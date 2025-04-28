<?php

namespace App\Filament\Resources\IntroCardResource\Pages;

use App\Filament\Resources\IntroCardResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditIntroCard extends EditRecord
{
    protected static string $resource = IntroCardResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

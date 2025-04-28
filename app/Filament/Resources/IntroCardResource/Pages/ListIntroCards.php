<?php

namespace App\Filament\Resources\IntroCardResource\Pages;

use App\Filament\Resources\IntroCardResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListIntroCards extends ListRecords
{
    protected static string $resource = IntroCardResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

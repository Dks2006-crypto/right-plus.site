<?php

namespace App\Filament\Resources;

use App\Filament\Resources\IntroResource\Pages;
use App\Filament\Resources\IntroResource\RelationManagers;
use App\Models\Intro;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class IntroResource extends Resource
{
    protected static ?string $model = Intro::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static?string $modelLabel ="Интро";

    protected static?string $pluralModelLabel ="Интро";

    protected static ?string $navigationLabel = "Интро";

    protected static ?string $navigationGroup = "Интро";

    public static function canCreate(): bool
    {
        if(Intro::count() >= 1) {
            return false;
        }
        return true;
    }


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('title')
                    ->label('Заголовок')
                    ->required(),
                TextInput::make('description')
                    ->label('Описание')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->label('Заголовок'),
                TextColumn::make('description')
                    ->label('Описание'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListIntros::route('/'),
            'create' => Pages\CreateIntro::route('/create'),
            'edit' => Pages\EditIntro::route('/{record}/edit'),
        ];
    }
}

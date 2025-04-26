<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ApplicationResource\Pages;
use App\Filament\Resources\ApplicationResource\RelationManagers;
use App\Models\Application;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\SelectColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ApplicationResource extends Resource
{
    protected static ?string $model = Application::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static?string $modelLabel ="Заявка";

    protected static?string $pluralModelLabel ="Заявки";

    protected static ?string $navigationLabel = "Заявки";

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->label('Имя клиента')
                    ->required(),
                TextInput::make('phone')
                    ->label('Номер клиента')
                    ->required(),
                TextInput::make('email')
                    ->label('Email клиента')
                    ->email()
                    ->required(),
                TextInput::make('description')
                    ->label('Описание проблемы клиента')
                    ->required(),
                Select::make('status')
                    ->label('Статус')
                    ->options([
                        'new' => 'Новая',
                        'assigned' => 'Назначена',
                        'compleated' => 'Завершена',
                        'canceled' => 'Отменена',
                    ])
                    ->default('new'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Имя')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('phone')
                    ->label('Телефон')
                    ->searchable(),
                SelectColumn::make('status')
                    ->label('Статус')
                    ->options([
                        'new' => 'Новая',
                        'assigned' => 'Назначена',
                        'compleated' => 'Завершена',
                        'canceled' => 'Отменена',
                    ])
                    ->selectablePlaceholder(false),
            ])
            ->filters([
                SelectFilter::make('Status')
                    ->label('Статус')
                    ->options([
                        'new' => 'Новая',
                        'assigned' => 'Назначена',
                        'compleated' => 'Завершена',
                        'canceled' => 'Отменена',
                    ])
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageApplications::route('/'),
        ];
    }
}

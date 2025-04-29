<?php

namespace App\Filament\Resources\LawyerResource\RelationManagers;

use App\Filament\Resources\ApplicationResource;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class ApplicationsRelationManager extends RelationManager
{
    protected static string $relationship = 'applications';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('name')
            ->columns([
                Tables\Columns\TextColumn::make('created_at')
                ->label('Дата')
                ->dateTime('d.m.Y H:i')
                ->sortable(),
            Tables\Columns\TextColumn::make('name')
                ->label('Клиент')
                ->searchable(),
            Tables\Columns\TextColumn::make('phone')
                ->label('Телефон')
                ->searchable(),
            Tables\Columns\TextColumn::make('status')
                ->label('Статус')
                ->badge()
                ->color(fn (string $state): string => match ($state) {
                    'new' => 'gray',
                    'assigned' => 'info',
                    'completed' => 'success',
                    'canceled' => 'danger',
                }),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->label('Статус')
                    ->options([
                        'new' => 'Новая',
                        'assigned' => 'Назначена',
                        'completed' => 'Завершена',
                        'canceled' => 'Отменена',
                    ]),
            ])
            ->headerActions([])
            ->actions([
                Tables\Actions\ViewAction::make()
                    ->url(fn ($record) => ApplicationResource::getUrl('edit', ['record' => $record])),
            ])
            ->bulkActions([]);
    }
}

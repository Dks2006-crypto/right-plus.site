<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ApplicationResource\Pages;
use App\Models\Application;
use App\Models\Lawyer;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class ApplicationResource extends Resource
{
    protected static ?string $model = Application::class;
    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $modelLabel = "Заявка";
    protected static ?string $pluralModelLabel = "Заявки";
    protected static ?string $navigationLabel = "Заявки";

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Контактная информация')
                    ->schema([
                        TextInput::make('name')
                            ->label('ФИО клиента')
                            ->required(),
                        TextInput::make('phone')
                            ->label('Телефон')
                            ->required(),
                        TextInput::make('email')
                            ->label('Email')
                            ->email(),
                    ])->columns(2),

                Forms\Components\Section::make('Детали заявки')
                    ->schema([
                        Forms\Components\Select::make('lawyer_id')
                            ->label('Назначенный юрист')
                            ->options(Lawyer::where('is_active', true)->pluck('name', 'id'))
                            ->searchable(),
                        Forms\Components\Select::make('status')
                            ->label('Статус')
                            ->options([
                                'new' => 'Новая',
                                'assigned' => 'Назначена',
                                'completed' => 'Завершена',
                                'canceled' => 'Отменена',
                            ])
                            ->default('new')
                            ->required(),
                        Forms\Components\Textarea::make('description')
                            ->label('Описание проблемы')
                            ->required()
                            ->columnSpanFull(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('created_at')
                    ->label('Дата')
                    ->dateTime('d.m.Y H:i')
                    ->sortable(),
                TextColumn::make('name')
                    ->label('Клиент')
                    ->searchable(),
                TextColumn::make('phone')
                    ->label('Телефон')
                    ->searchable(),
                TextColumn::make('lawyer.name')
                    ->label('Юрист')
                    ->placeholder('Не назначен')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\SelectColumn::make('status')
                    ->label('Статус')
                    ->options([
                        'new' => 'Новая',
                        'assigned' => 'Назначена',
                        'completed' => 'Завершена',
                        'canceled' => 'Отменена',
                    ])
                    ->selectablePlaceholder(false),
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
                Tables\Filters\SelectFilter::make('lawyer_id')
                    ->label('Юрист')
                    ->options(Lawyer::where('is_active', true)->pluck('name', 'id')),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\Action::make('assign')
                    ->label('Назначить')
                    ->form([
                        Forms\Components\Select::make('lawyer_id')
                            ->label('Юрист')
                            ->options(Lawyer::where('is_active', true)->pluck('name', 'id'))
                            ->required(),
                    ])
                    ->action(function (Application $record, array $data): void {
                        $record->update([
                            'lawyer_id' => $data['lawyer_id'],
                            'status' => 'assigned'
                        ]);
                    })
                    ->visible(fn (Application $record): bool => $record->status === 'new'),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('created_at', 'desc');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageApplications::route('/'),
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::where('status', 'new')->count();
    }

    public static function getNavigationBadgeColor(): ?string
    {
        return static::getModel()::where('status', 'new')->count() > 0 ? 'danger' : 'primary';
    }
}

<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LawyerResource\Pages;
use App\Filament\Resources\LawyerResource\RelationManagers;
use App\Models\Application;
use App\Models\Lawyer;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class LawyerResource extends Resource
{
    protected static ?string $model = Lawyer::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static?string $modelLabel ="Юрист";

    protected static?string $pluralModelLabel ="Юристы";

    protected static ?string $navigationLabel = "Юристы";


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Основная информация')
                    ->schema([
                        TextInput::make('name')
                            ->label('ФИО')
                            ->required(),
                        TextInput::make('specialization')
                            ->label('Специализация')
                            ->required(),
                        TextInput::make('experience')
                            ->label('Опыт работы (лет)')
                            ->numeric()
                            ->required(),
                    ])->columns(2),

                Forms\Components\Section::make('Дополнительно')
                    ->schema([
                        FileUpload::make('photo')
                            ->label('Фото')
                            ->directory('lawyers')
                            ->image()
                            ->disk('public'),
                        Toggle::make('is_active')
                            ->label('Активен')
                            ->default(true),
                    ])->columns(2),

                Forms\Components\Section::make('Детали')
                    ->schema([
                        RichEditor::make('biography')
                            ->label('Биография'),
                        TextInput::make('education')
                            ->label('Образование'),
                        FileUpload::make('certificates')
                            ->label('Сертификаты')
                            ->acceptedFileTypes(['application/pdf'])
                            ->multiple()
                            ->directory('lawyers/certificates'),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('photo')
                    ->label('')
                    ->circular(),
                TextColumn::make('name')
                    ->label('ФИО')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('specialization')
                    ->label('Специализация')
                    ->searchable(),
                TextColumn::make('experience')
                    ->label('Опыт')
                    ->suffix(' лет')
                    ->sortable(),
                TextColumn::make('applications_count')
                    ->label('Заявок')
                    ->counts('applications')
                    ->sortable(),
                ToggleColumn::make('is_active')
                    ->label('Статус'),

            ])
            ->filters([
                Tables\Filters\SelectFilter::make('is_active')
                    ->label('Статус')
                    ->options([
                        true => 'Активен',
                        false => 'Неактивен',
                    ]),
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
            RelationManagers\ApplicationsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListLawyers::route('/'),
            'create' => Pages\CreateLawyer::route('/create'),
            'edit' => Pages\EditLawyer::route('/{record}/edit'),
        ];
    }
    public static function getNavigationBadge(): ?string
    {
        return Application::where('status', 'new')->count();
    }
}

<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LawyerResource\Pages;
use App\Filament\Resources\LawyerResource\RelationManagers;
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
                TextInput::make('name')
                    ->label('Имя Юриста')
                    ->required(),
                TextInput::make('specialization')
                    ->label('Специализация юриста')
                    ->required(),
                TextInput::make('experience')
                    ->label('Опыт юриста')
                    ->numeric(),
                FileUpload::make('photo')
                    ->label('Фото юриста')
                    ->directory('lawyers')
                    ->image()
                    ->disk('public')
                    ->visibility('public')
                    ->panelLayout('integrated')
                    ->imageEditor(),
                RichEditor::make('biography')
                    ->label('Биография юриста'),
                Toggle::make('is_active')
                    ->label('Работающий юрист'),
                TextInput::make('education')
                    ->label('Образование'),
                FileUpload::make('certificates')
                    ->label('Сертификаты')
                    ->acceptedFileTypes(['application/pdf'])
                    ->multiple()
                    ->directory('lawyers/certificates')
                    ->downloadable()
                    ->openable(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Имя'),
                TextColumn::make('specialization')
                    ->label('Специализация'),
                TextColumn::make('experience')
                    ->label('Опыт'),
                TextColumn::make('education')
                    ->label('Образование'),
                ToggleColumn::make('is_active')
                    ->label('Статус'),

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
            'index' => Pages\ListLawyers::route('/'),
            'create' => Pages\CreateLawyer::route('/create'),
            'edit' => Pages\EditLawyer::route('/{record}/edit'),
        ];
    }
}

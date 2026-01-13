<?php

namespace App\Filament\Resources;

use App\Filament\Resources\HeroSectionResource\Pages;
use App\Filament\Resources\HeroSectionResource\RelationManagers;
use App\Models\HeroSection;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class HeroSectionResource extends Resource
{
    protected static ?string $model = HeroSection::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('page_name')
                    ->options([
                        'home' => 'Home',
                        'videotron' => 'Videotron',
                        'baliho' => 'Baliho',
                        'billboard' => 'Billboard',
                        'tentang_kami' => 'Tentang Kami',
                        'kontak' => 'Kontak',
                    ])
                    ->required()
                    ->unique(ignoreRecord: true),
                Forms\Components\TextInput::make('judul')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('deskripsi')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\FileUpload::make('gambar')
                    ->required()
                    ->image()
                    ->directory('img/herosection')
                    ->visibility('public')
                    ->disk('public'),
                Forms\Components\View::make('filament.forms.components.image-preview-single')
                    ->visible(fn ($record) => $record?->gambar)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('page_name')
                    ->badge()
                    ->colors([
                        'primary' => 'home',
                        'success' => 'videotron',
                        'warning' => 'baliho',
                        'danger' => 'billboard',
                        'info' => 'tentang_kami',
                        'secondary' => 'kontak',
                    ])
                    ->sortable(),
                Tables\Columns\ImageColumn::make('gambar')
                    ->getStateUsing(fn ($record) => $record->gambar ? asset('storage/' . $record->gambar) : null)
                    ->size(80),
                Tables\Columns\TextColumn::make('judul')
                    ->searchable(),
                Tables\Columns\TextColumn::make('deskripsi')
                    ->limit(50),
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
            'index' => Pages\ListHeroSections::route('/'),
            'create' => Pages\CreateHeroSection::route('/create'),
            'edit' => Pages\EditHeroSection::route('/{record}/edit'),
        ];
    }
}

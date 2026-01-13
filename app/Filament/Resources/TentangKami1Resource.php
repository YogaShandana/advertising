<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TentangKami1Resource\Pages;
use App\Filament\Resources\TentangKami1Resource\RelationManagers;
use App\Models\TentangKami1;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TentangKami1Resource extends Resource
{
    protected static ?string $model = TentangKami1::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

       protected static ?string $navigationGroup = 'Tentang Kami';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\FileUpload::make('gambar')
                ->required()
                    ->label('Gambar')
                    ->image()
                    ->directory('tentang-kami')
                    ->maxSize(2048)
                    ->columnSpanFull(),
                
                Forms\Components\TextInput::make('judul')
                ->required()
                    ->label('Judul')
                    ->placeholder('SIAPA KAMI')
                    ->maxLength(255),
                
                Forms\Components\TextInput::make('sub_judul')
                ->required()
                    ->label('Sub Judul')
                    ->placeholder('Mitra Strategis untuk Pertumbuhan Bisnis Anda')
                    ->maxLength(255)
                    ->columnSpanFull(),
                
                Forms\Components\Textarea::make('deskripsi')
                ->required()
                    ->label('Deskripsi')
                    ->rows(6)
                    ->columnSpanFull(),
                
                Forms\Components\Section::make('Icon 1')
                    ->schema([
                        Forms\Components\Select::make('icon1')
                        ->required()
                            ->label('Pilih Icon 1')
                            ->options([
                                'bi-stars' => 'Stars (Bintang)',
                                'bi-shield-check' => 'Shield Check (Perisai)',
                                'bi-award' => 'Award (Penghargaan)',
                                'bi-gem' => 'Gem (Permata)',
                                'bi-lightbulb' => 'Lightbulb (Ide)',
                                'bi-rocket-takeoff' => 'Rocket (Roket)',
                                'bi-trophy' => 'Trophy (Trofi)',
                                'bi-heart' => 'Heart (Hati)',
                            ])
                            ->searchable(),
                        
                        Forms\Components\TextInput::make('judul_icon1')
                        ->required()
                            ->label('Judul Icon 1')
                            ->placeholder('Solusi Kreatif')
                            ->maxLength(255),
                        
                        Forms\Components\TextInput::make('deskripsi_icon1')
                        ->required()
                            ->label('Deskripsi Icon 1')
                            ->placeholder('Inovasi tanpa batas')
                            ->maxLength(255),
                    ])
                    ->columns(1),
                
                Forms\Components\Section::make('Icon 2')
                    ->schema([
                        Forms\Components\Select::make('icon2')
                        ->required()
                            ->label('Pilih Icon 2')
                            ->options([
                                'bi-stars' => 'Stars (Bintang)',
                                'bi-shield-check' => 'Shield Check (Perisai)',
                                'bi-award' => 'Award (Penghargaan)',
                                'bi-gem' => 'Gem (Permata)',
                                'bi-lightbulb' => 'Lightbulb (Ide)',
                                'bi-rocket-takeoff' => 'Rocket (Roket)',
                                'bi-trophy' => 'Trophy (Trofi)',
                                'bi-heart' => 'Heart (Hati)',
                            ])
                            ->searchable(),
                        
                        Forms\Components\TextInput::make('judul_icon2')
                        ->required()
                            ->label('Judul Icon 2')
                            ->placeholder('Legalitas Terjamin')
                            ->maxLength(255),
                        
                        Forms\Components\TextInput::make('deskripsi_icon2')
                        ->required()
                            ->label('Deskripsi Icon 2')
                            ->placeholder('Aman & Terpercaya')
                            ->maxLength(255),
                    ])
                    ->columns(1),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('gambar')
                    ->label('Gambar'),
                Tables\Columns\TextColumn::make('judul')
                    ->label('Judul')
                    ->searchable(),
                Tables\Columns\TextColumn::make('sub_judul')
                    ->label('Sub Judul')
                    ->searchable()
                    ->toggleable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Dibuat')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
            'index' => Pages\ListTentangKami1s::route('/'),
            'create' => Pages\CreateTentangKami1::route('/create'),
            'edit' => Pages\EditTentangKami1::route('/{record}/edit'),
        ];
    }
}

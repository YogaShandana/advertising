<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TentangKami2Resource\Pages;
use App\Filament\Resources\TentangKami2Resource\RelationManagers;
use App\Models\TentangKami2;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TentangKami2Resource extends Resource
{
    protected static ?string $model = TentangKami2::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

           protected static ?string $navigationGroup = 'Tentang Kami';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('judul')
                    ->required()
                    ->label('Judul')
                    ->placeholder('Mengapa Memilih Kami?')
                    ->maxLength(255)
                    ->columnSpanFull(),
                
                Forms\Components\Textarea::make('deskripsi')
                    ->required()
                    ->label('Deskripsi')
                    ->rows(4)
                    ->columnSpanFull(),
                
                Forms\Components\Section::make('Icon 1')
                    ->schema([
                        Forms\Components\Select::make('icon1')
                            ->required()
                            ->label('Pilih Icon 1')
                            ->options([
                                'bi-person-check' => 'Person Check (Klien)',
                                'bi-geo-alt' => 'Location (Lokasi)',
                                'bi-award' => 'Award (Penghargaan)',
                                'bi-stars' => 'Stars (Bintang)',
                                'bi-shield-check' => 'Shield Check (Perisai)',
                                'bi-gem' => 'Gem (Permata)',
                                'bi-lightbulb' => 'Lightbulb (Ide)',
                                'bi-rocket-takeoff' => 'Rocket (Roket)',
                                'bi-trophy' => 'Trophy (Trofi)',
                            ])
                            ->searchable(),
                        
                        Forms\Components\TextInput::make('angka_icon1')
                            ->required()
                            ->label('Angka/Statistik Icon 1')
                            ->placeholder('500+')
                            ->maxLength(50),
                        
                        Forms\Components\Textarea::make('deskripsi_icon1')
                            ->required()
                            ->label('Deskripsi Icon 1')
                            ->placeholder('Klien puas yang telah mempercayakan promosi bisnis mereka kepada kami.')
                            ->rows(3),
                    ])
                    ->columns(1),
                
                Forms\Components\Section::make('Icon 2')
                    ->schema([
                        Forms\Components\Select::make('icon2')
                            ->required()
                            ->label('Pilih Icon 2')
                            ->options([
                                'bi-person-check' => 'Person Check (Klien)',
                                'bi-geo-alt' => 'Location (Lokasi)',
                                'bi-award' => 'Award (Penghargaan)',
                                'bi-stars' => 'Stars (Bintang)',
                                'bi-shield-check' => 'Shield Check (Perisai)',
                                'bi-gem' => 'Gem (Permata)',
                                'bi-lightbulb' => 'Lightbulb (Ide)',
                                'bi-rocket-takeoff' => 'Rocket (Roket)',
                                'bi-trophy' => 'Trophy (Trofi)',
                            ])
                            ->searchable(),
                        
                        Forms\Components\TextInput::make('angka_icon2')
                            ->required()
                            ->label('Angka/Statistik Icon 2')
                            ->placeholder('50+')
                            ->maxLength(50),
                        
                        Forms\Components\Textarea::make('deskripsi_icon2')
                            ->required()
                            ->label('Deskripsi Icon 2')
                            ->placeholder('Titik lokasi strategis tersebar di seluruh wilayah Bali dan sekitarnya.')
                            ->rows(3),
                    ])
                    ->columns(1),
                
                Forms\Components\Section::make('Icon 3')
                    ->schema([
                        Forms\Components\Select::make('icon3')
                            ->required()
                            ->label('Pilih Icon 3')
                            ->options([
                                'bi-person-check' => 'Person Check (Klien)',
                                'bi-geo-alt' => 'Location (Lokasi)',
                                'bi-award' => 'Award (Penghargaan)',
                                'bi-stars' => 'Stars (Bintang)',
                                'bi-shield-check' => 'Shield Check (Perisai)',
                                'bi-gem' => 'Gem (Permata)',
                                'bi-lightbulb' => 'Lightbulb (Ide)',
                                'bi-rocket-takeoff' => 'Rocket (Roket)',
                                'bi-trophy' => 'Trophy (Trofi)',
                            ])
                            ->searchable(),
                        
                        Forms\Components\TextInput::make('angka_icon3')
                            ->required()
                            ->label('Angka/Statistik Icon 3')
                            ->placeholder('10+')
                            ->maxLength(50),
                        
                        Forms\Components\Textarea::make('deskripsi_icon3')
                            ->required()
                            ->label('Deskripsi Icon 3')
                            ->placeholder('Tahun pengalaman dalam industri periklanan dan media luar ruang.')
                            ->rows(3),
                    ])
                    ->columns(1),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('judul')
                    ->label('Judul')
                    ->searchable(),
                Tables\Columns\TextColumn::make('deskripsi')
                    ->label('Deskripsi')
                    ->limit(50)
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
            'index' => Pages\ListTentangKami2s::route('/'),
            'create' => Pages\CreateTentangKami2::route('/create'),
            'edit' => Pages\EditTentangKami2::route('/{record}/edit'),
        ];
    }
}

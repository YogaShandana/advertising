<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KontakResource\Pages;
use App\Filament\Resources\KontakResource\RelationManagers;
use App\Models\Kontak;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class KontakResource extends Resource
{
    protected static ?string $model = Kontak::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Header Section')
                    ->schema([
                        Forms\Components\TextInput::make('judul')
                            ->required()
                            ->label('Judul Utama')
                            ->placeholder('Mari Diskusikan Project Anda')
                            ->maxLength(255)
                            ->columnSpanFull(),
                        
                        Forms\Components\TextInput::make('sub_judul')
                            ->label('Sub Judul (opsional)')
                            ->maxLength(255)
                            ->columnSpanFull(),
                        
                        Forms\Components\Textarea::make('deskripsi')
                            ->required()
                            ->label('Deskripsi')
                            ->placeholder('Kami siap membantu bisnis Anda...')
                            ->rows(3)
                            ->columnSpanFull(),
                    ])
                    ->collapsible(),
                
                Forms\Components\Section::make('Alamat Kantor')
                    ->schema([
                        Forms\Components\Select::make('icon_alamat')
                            ->required()
                            ->label('Icon')
                            ->options([
                                'bi-geo-alt-fill' => 'Location Pin (Filled)',
                                'bi-geo-alt' => 'Location Pin',
                                'bi-house-door' => 'House Door',
                                'bi-building' => 'Building',
                            ])
                            ->default('bi-geo-alt-fill'),
                        
                        Forms\Components\TextInput::make('judul_alamat')
                            ->required()
                            ->label('Judul')
                            ->placeholder('Alamat Kantor')
                            ->maxLength(255),
                        
                        Forms\Components\Textarea::make('deskripsi_alamat')
                            ->required()
                            ->label('Deskripsi')
                            ->placeholder('Jl. Pulau Saelus No. 50X / 61\nDenpasar, Bali')
                            ->rows(3)
                            ->columnSpanFull(),
                    ])
                    ->columns(2)
                    ->collapsible(),
                
                Forms\Components\Section::make('Telepon & Fax')
                    ->schema([
                        Forms\Components\Select::make('icon_telepon')
                            ->required()
                            ->label('Icon')
                            ->options([
                                'bi-telephone-fill' => 'Telephone (Filled)',
                                'bi-telephone' => 'Telephone',
                                'bi-phone' => 'Phone',
                            ])
                            ->default('bi-telephone-fill'),
                        
                        Forms\Components\TextInput::make('judul_telepon')
                            ->required()
                            ->label('Judul')
                            ->placeholder('Telepon & Fax')
                            ->maxLength(255),
                        
                        Forms\Components\Textarea::make('deskripsi_telepon')
                            ->required()
                            ->label('Deskripsi')
                            ->placeholder('Phone: (0361) 232355\nFax: (0361) 221874')
                            ->rows(3)
                            ->columnSpanFull(),
                    ])
                    ->columns(2)
                    ->collapsible(),
                
                Forms\Components\Section::make('Email')
                    ->schema([
                        Forms\Components\Select::make('icon_email')
                            ->required()
                            ->label('Icon')
                            ->options([
                                'bi-envelope-fill' => 'Envelope (Filled)',
                                'bi-envelope' => 'Envelope',
                                'bi-at' => 'At Symbol',
                            ])
                            ->default('bi-envelope-fill'),
                        
                        Forms\Components\TextInput::make('judul_email')
                            ->required()
                            ->label('Judul')
                            ->placeholder('Email')
                            ->maxLength(255),
                        
                        Forms\Components\TextInput::make('deskripsi_email')
                            ->required()
                            ->label('Email Address')
                            ->email()
                            ->placeholder('tribhakti77@yahoo.com')
                            ->maxLength(255)
                            ->columnSpanFull(),
                    ])
                    ->columns(2)
                    ->collapsible(),
                
                Forms\Components\Section::make('Direktur')
                    ->schema([
                        Forms\Components\Select::make('icon_direktur')
                            ->required()
                            ->label('Icon')
                            ->options([
                                'bi-person-badge-fill' => 'Person Badge (Filled)',
                                'bi-person-badge' => 'Person Badge',
                                'bi-person-vcard' => 'Person VCard',
                            ])
                            ->default('bi-person-badge-fill'),
                        
                        Forms\Components\TextInput::make('judul_direktur')
                            ->required()
                            ->label('Judul')
                            ->placeholder('Direktur')
                            ->maxLength(255),
                        
                        Forms\Components\Textarea::make('deskripsi_direktur')
                            ->required()
                            ->label('Deskripsi (Nama & Nomor Telepon)')
                            ->placeholder('I Made Sukadana, SE\n+62 81 139 6778\n+62 81 558 217 777\n+62 361 853 8778')
                            ->rows(5)
                            ->columnSpanFull(),
                    ])
                    ->columns(2)
                    ->collapsible(),
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
                    ->searchable(),
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
            'index' => Pages\ListKontaks::route('/'),
            'create' => Pages\CreateKontak::route('/create'),
            'edit' => Pages\EditKontak::route('/{record}/edit'),
        ];
    }
}

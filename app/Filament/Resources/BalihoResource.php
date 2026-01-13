<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BalihoResource\Pages;
use App\Filament\Resources\BalihoResource\RelationManagers;
use App\Models\Baliho;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class BalihoResource extends Resource
{
    protected static ?string $model = Baliho::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    
    protected static ?string $navigationGroup = 'Layanan';
    
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('judul')
                    ->required()
                    ->maxLength(255)
                    ->columnSpan(1),
                Forms\Components\Section::make('Foto Saat Ini')
                    ->schema([
                        Forms\Components\View::make('filament.forms.components.image-preview')
                            ->viewData(fn ($record) => ['images' => $record?->images ?? []])
                    ])
                    ->hidden(fn ($record) => !$record || empty($record->images))
                    ->collapsible()
                    ->collapsed(false),
                Forms\Components\FileUpload::make('images')
                    ->label('Upload Foto Baru (akan menggantikan foto lama)')
                    ->multiple()
                    ->reorderable()
                    ->image()
                    ->imagePreviewHeight('200')
                    ->disk('public')
                    ->visibility('public')
                    ->getUploadedFileNameForStorageUsing(
                        fn (TemporaryUploadedFile $file): string => 'img/baliho/' . now()->timestamp . '-' . str_replace(' ', '-', $file->getClientOriginalName())
                    )
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('link_maps')
                    ->label('Lokasi Koordinat')
                    ->placeholder('Contoh: -8.544245628753634, 115.12641210342724')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('deskripsi')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\Toggle::make('is_featured')
                    ->label('Lokasi Unggulan')
                    ->required()
                    ->live()
                    ->afterStateUpdated(function ($state, $record) {
                        if ($state) {
                            Baliho::where('id', '!=', $record?->id)->update(['is_featured' => false]);
                        }
                    }),
                Forms\Components\Section::make('Periode Booking')
                    ->schema([
                        Forms\Components\Repeater::make('bookings')
                            ->schema([
                                Forms\Components\TextInput::make('booking_name')
                                    ->label('Nama Pemesan')
                                    ->maxLength(255)
                                    ->columnSpan(1),
                                Forms\Components\DatePicker::make('booking_start_date')
                                    ->label('Dari Tanggal')
                                    ->native(false)
                                    ->displayFormat('d/m/Y')
                                    ->columnSpan(1),
                                Forms\Components\DatePicker::make('booking_end_date')
                                    ->label('Sampai Tanggal')
                                    ->native(false)
                                    ->displayFormat('d/m/Y')
                                    ->afterOrEqual('booking_start_date')
                                    ->columnSpan(1),
                            ])
                            ->columns(3)
                            ->defaultItems(0)
                            ->addActionLabel('Tambah Booking')
                            ->columnSpanFull(),
                    ])
                    ->collapsible()
                    ->columnSpanFull(),
            ])
            ->columns(2);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('judul')
                    ->searchable(),
                Tables\Columns\TextColumn::make('images')
                    ->label('Jumlah Foto')
                    ->formatStateUsing(fn ($state): string => count((array)$state))
                    ->badge()
                    ->color('info'),
                Tables\Columns\TextColumn::make('deskripsi')
                    ->limit(50)
                    ->searchable(),
                Tables\Columns\IconColumn::make('is_featured')
                    ->label('Unggulan')
                    ->boolean(),
                Tables\Columns\TextColumn::make('bookings')
                    ->label('Status Booking')
                    ->badge()
                    ->default('✗')
                    ->formatStateUsing(function ($state, $record) {
                        if ($state && is_array($state) && count($state) > 0) {
                            return '✓';
                        }
                        return '✗';
                    })
                    ->color(fn ($state) => ($state && is_array($state) && count($state) > 0) ? 'success' : 'danger')
                    ->searchable(false)
                    ->sortable(false),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
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
            'index' => Pages\ListBalihos::route('/'),
            'create' => Pages\CreateBaliho::route('/create'),
            'edit' => Pages\EditBaliho::route('/{record}/edit'),
        ];
    }
}

<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CourseResource\Pages;
use App\Models\Course;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class CourseResource extends Resource
{
    protected static ?string $model = Course::class;

    protected static ?string $navigationIcon = 'heroicon-o-book-open';
    protected static ?string $pluralLabel = 'الدورات';
    protected static ?string $modelLabel = 'دورة';
    protected static ?string $navigationGroup = 'القسم الاول';
    protected static ?string $navigationLabel = 'الدورات';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label('اسم الدورة')
                    ->required()
                    ->maxLength(255),

                Forms\Components\FileUpload::make('image')
                    ->label('صورة الدورة')
                    ->image()
                    ->required()
                    ->helperText('الحجم : 284x177'),

                // 👇 Grid لعرض الأسعار معًا
                Forms\Components\Grid::make(3)
                    ->schema([
                        Forms\Components\TextInput::make('price_usd')
                            ->label('السعر بالدولار')
                            ->required()
                            ->numeric()
                            ->suffix('$'),

                        Forms\Components\TextInput::make('price_egp')
                            ->label('السعر بالجنيه')
                            ->required()
                            ->numeric()
                            ->suffix('جنيه'),

                        Forms\Components\TextInput::make('price_omr')
                            ->label('السعر بالريال العماني')
                            ->required()
                            ->numeric()
                            ->suffix('ريال'),
                    ]),

                Forms\Components\Textarea::make('description')
                    ->label('وصف مختصر')
                    ->required()
                    ->maxLength(65535)
                    ->columnSpanFull(),

                Forms\Components\RichEditor::make('detailed_description')
                    ->label('وصف تفصيلي')
                    ->required()
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('اسم الدورة')
                    ->searchable(),

                Tables\Columns\ImageColumn::make('image')
                    ->label('الصورة'),

                Tables\Columns\TextColumn::make('price_usd')
                    ->label('السعر بالدولار')
                    ->formatStateUsing(fn (string $state): string => "{$state} $")
                    ->sortable(),

                Tables\Columns\TextColumn::make('price_egp')
                    ->label('السعر بالجنيه')
                    ->formatStateUsing(fn (string $state): string => "{$state} جنيه")
                    ->sortable(),

                Tables\Columns\TextColumn::make('price_omr')
                    ->label('السعر بالريال العماني')
                    ->formatStateUsing(fn (string $state): string => "{$state} ريال")
                    ->sortable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('تاريخ الإنشاء')
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
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCourses::route('/'),
            'create' => Pages\CreateCourse::route('/create'),
            'edit' => Pages\EditCourse::route('/{record}/edit'),
        ];
    }
}

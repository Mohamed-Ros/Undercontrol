<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FaqResource\Pages;
use App\Filament\Resources\FaqResource\RelationManagers;
use App\Models\Faq;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class FaqResource extends Resource
{
    protected static ?string $model = Faq::class;

    protected static ?string $navigationIcon = 'heroicon-o-question-mark-circle';
    protected static ?string $pluralLabel = 'الأسئلة المتكررة';
    protected static ?string $modelLabel = 'سؤال متكرر';
    protected static ?string $navigationGroup = 'القسم الثاني';
    protected static ?string $navigationLabel = 'الأسئلة المتكررة';


 public static function form(Form $form): Form
{
    return $form
        ->schema([
            Forms\Components\TextInput::make('question')
                ->label('السؤال')
                ->required()
                ->maxLength(255),

            Forms\Components\Textarea::make('answer')
                ->label('الإجابة')
                ->required()
                ->maxLength(65535)
                ->columnSpanFull(),
        ]);
}


public static function table(Table $table): Table
{
    return $table
        ->columns([
            Tables\Columns\TextColumn::make('question')
                ->label('السؤال')
                ->searchable(),

            Tables\Columns\TextColumn::make('answer')
                ->label('الإجابة')
                ->limit(50),

            Tables\Columns\TextColumn::make('created_at')
                ->label('تاريخ الإضافة')
                ->dateTime()
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
        ])
        ->filters([])
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
            'index' => Pages\ListFaqs::route('/'),
            'create' => Pages\CreateFaq::route('/create'),
            'edit' => Pages\EditFaq::route('/{record}/edit'),
        ];
    }
}

<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SettingResource\Pages;
use App\Filament\Resources\SettingResource\RelationManagers;
use App\Models\Setting;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SettingResource extends Resource
{
    protected static ?string $model = Setting::class;
protected static bool $shouldRegisterNavigation = false;

    protected static ?string $navigationIcon = 'heroicon-o-cog';
    protected static ?string $pluralLabel = 'الإعدادات';
    protected static ?string $modelLabel = 'إعداد';
    protected static ?string $navigationGroup = 'القسم الثاني';
    protected static ?string $navigationLabel = 'الإعدادات';


    public static function form(Form $form): Form
{
    return $form
        ->schema([
            Forms\Components\FileUpload::make('logo')
                ->label('شعار الموقع')
                ->image()
                ->directory('settings/logos')
                ->required(),

            Forms\Components\Textarea::make('description')
                ->label('وصف الموقع')
                ->rows(4)
                ->required(),

            Forms\Components\TextInput::make('facebook')
                ->label('رابط الفيسبوك')
                ->url()
                ->maxLength(255),

            Forms\Components\TextInput::make('linkedin')
                ->label('رابط لينكدإن')
                ->url()
                ->maxLength(255),

            Forms\Components\TextInput::make('tiktok')
                ->label('رابط تيك توك')
                ->url()
                ->maxLength(255),

            Forms\Components\TextInput::make('copyright')
                ->label('حقوق النشر')
                ->default('جميع الحقوق محفوظة © 2025')
                ->maxLength(255),
        ]);
}

public static function table(Table $table): Table
{
    return $table
        ->columns([
            Tables\Columns\ImageColumn::make('logo')
                ->label('الشعار'),

            Tables\Columns\TextColumn::make('description')
                ->label('الوصف')
                ->limit(40),

            Tables\Columns\TextColumn::make('facebook')
                ->label('فيسبوك')
                ->limit(20),

            Tables\Columns\TextColumn::make('linkedin')
                ->label('لينكدإن')
                ->limit(20),

            Tables\Columns\TextColumn::make('tiktok')
                ->label('تيك توك')
                ->limit(20),

            Tables\Columns\TextColumn::make('copyright')
                ->label('حقوق النشر')
                ->limit(25),
        ])
        ->filters([])
        ->actions([
            Tables\Actions\EditAction::make(),
        ])
        ->bulkActions([]);
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
            'index' => Pages\ListSettings::route('/'),
            'edit' => Pages\EditSetting::route('/{record}/edit'),
        ];
    }
}

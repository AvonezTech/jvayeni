<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\MenuItemResource\Pages;
use App\Models\MenuItem;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class MenuItemResource extends Resource
{
    protected static ?string $model = MenuItem::class;
    protected static ?string $navigationIcon = 'heroicon-o-shopping-bag';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('name')->required(),
            Forms\Components\TextInput::make('price')->required()->numeric()->prefix('Rs.'),
            Forms\Components\Toggle::make('is_special')->label('Today\'s Special'),
            Forms\Components\Toggle::make('is_available')->default(true),
            Forms\Components\FileUpload::make('photo')->image()->directory('menu_items'),
            Forms\Components\Select::make('menu_category')
                ->options([
                    'snacks' => 'Snacks',
                    'lunch' => 'Lunch',
                    'beverage' => 'Beverage',
                ])
                ->required(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            Tables\Columns\TextColumn::make('name')->searchable()->sortable(),
            Tables\Columns\TextColumn::make('price')->money('NPR')->sortable(),
            Tables\Columns\IconColumn::make('is_special')->label('Special')->boolean(),
            Tables\Columns\ToggleColumn::make('is_available')->label('Available'),
            
            // Fixed: Removed ->directory(), it reads directly from stored string path
            Tables\Columns\ImageColumn::make('photo')->disk('public'),
            
            // Enhanced: Replaced ->enum() with a colorful badge layout
            Tables\Columns\TextColumn::make('menu_category')
                ->badge()
                ->color(fn (string $state): string => match ($state) {
                    'snacks' => 'warning',
                    'lunch' => 'success',
                    'beverage' => 'info',
                    default => 'gray',
                })
                ->formatStateUsing(fn (string $state): string => ucfirst($state)),
        ])
            ->actions([Tables\Actions\EditAction::make()])
            ->bulkActions([Tables\Actions\DeleteBulkAction::make()]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMenuItems::route('/'),
            'create' => Pages\CreateMenuItem::route('/create'),
            'edit' => Pages\EditMenuItem::route('/{record}/edit'),
        ];
    }
}
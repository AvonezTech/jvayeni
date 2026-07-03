<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\UserResource\Pages;
use App\Filament\Admin\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->required()
                    ->unique(ignoreRecord: true)
                    ->maxLength(255),
                Forms\Components\TextInput::make('password')
                    ->password()
                    ->dehydrated(fn ($state) => filled($state))
                    ->required(fn (string $context): bool => $context === 'create')
                    ->maxLength(255),
                Forms\Components\Select::make('role')
                    ->options([
                        'student' => 'Student',
                        'college_staff' => 'College Staff',
                        'kitchen_staff' => 'Kitchen Staff',
                        'admin' => 'Admin',
                    ])
                    ->required()
                    ->live()
                    ->afterStateUpdated(function (string $state, Forms\Set $set) {
                        if ($state === 'college_staff') {
                            $set('credit_limit', 1500.00);
                            $set('credit_balance', 1500.00);
                        } else {
                            $set('credit_limit', 0.00);
                            $set('credit_balance', 0.00);
                        }
                    }),
                Forms\Components\TextInput::make('credit_limit')
                    ->numeric()
                    ->prefix('Rs.')
                    ->default(0.00)
                    ->visible(fn (Forms\Get $get): bool => $get('role') === 'college_staff')
                    ->required(fn (Forms\Get $get): bool => $get('role') === 'college_staff'),
                Forms\Components\TextInput::make('credit_balance')
                    ->numeric()
                    ->prefix('Rs.')
                    ->default(0.00)
                    ->visible(fn (Forms\Get $get): bool => $get('role') === 'college_staff')
                    ->required(fn (Forms\Get $get): bool => $get('role') === 'college_staff'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('role')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'admin' => 'danger',
                        'kitchen_staff' => 'warning',
                        'college_staff' => 'success',
                        'student' => 'info',
                        default => 'gray',
                    })
                    ->sortable(),
                Tables\Columns\TextColumn::make('credit_balance')
                    ->money('NPR')
                    ->sortable(),
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}

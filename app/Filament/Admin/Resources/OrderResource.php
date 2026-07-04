<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\OrderResource\Pages;
use App\Filament\Admin\Resources\OrderResource\RelationManagers;
use App\Models\Order;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class OrderResource extends Resource
{
    protected static ?string $model = Order::class;

    protected static ?string $navigationIcon = 'heroicon-o-shopping-cart';

    public static function getEloquentQuery(): Builder
    {
        $user = auth()->user();
        $query = parent::getEloquentQuery()->with(['menuItems', 'user']);
        if ($user && ($user->role === 'admin' || $user->role === 'kitchen_staff')) {
            return $query;
        }
        return $query->where('user_id', $user?->id ?? 0);
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Order Details')
                    ->schema([
                        Forms\Components\Select::make('user_id')
                            ->relationship('user', 'name')
                            ->searchable()
                            ->preload()
                            ->required(),
                        Forms\Components\Select::make('status')
                            ->options([
                                'pending' => 'Pending',
                                'preparing' => 'Preparing',
                                'ready' => 'Ready',
                                'completed' => 'Completed',
                                'cancelled' => 'Cancelled',
                            ])
                            ->required(),
                        Forms\Components\TextInput::make('total_price')
                            ->numeric()
                            ->prefix('Rs.')
                            ->required(),
                    ])->columns(3),

                Forms\Components\Section::make('Payment Information')
                    ->schema([
                        Forms\Components\Select::make('payment_method')
                            ->options([
                                'cash' => 'Cash',
                                'credit' => 'Credit',
                                'mixed' => 'Mixed',
                            ])
                            ->required(),
                        Forms\Components\TextInput::make('credit_paid')
                            ->numeric()
                            ->prefix('Rs.')
                            ->default(0.00),
                        Forms\Components\TextInput::make('cash_paid')
                            ->numeric()
                            ->prefix('Rs.')
                            ->default(0.00),
                    ])->columns(3),

                Forms\Components\Section::make('Ordered Items')
                    ->schema([
                        Forms\Components\Repeater::make('orderItems')
                            ->relationship('orderItems')
                            ->schema([
                                Forms\Components\Select::make('menu_item_id')
                                    ->relationship('menuItem', 'name')
                                    ->required()
                                    ->searchable()
                                    ->preload()
                                    ->label('Menu Item'),
                                Forms\Components\TextInput::make('quantity')
                                    ->numeric()
                                    ->required()
                                    ->default(1)
                                    ->minValue(1)
                                    ->label('Quantity'),
                            ])
                            ->columns(2)
                            ->defaultItems(1)
                            ->label('Items')
                            ->columnSpanFull(),
                    ]),
            ])
            ->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->label('Order ID')
                    ->sortable(),
                Tables\Columns\TextColumn::make('user.name')
                    ->label('Customer')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('user.role')
                    ->label('Role')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'admin' => 'danger',
                        'kitchen_staff' => 'warning',
                        'college_staff' => 'success',
                        'student' => 'info',
                        default => 'gray',
                    }),
                Tables\Columns\TextColumn::make('menuItems')
                    ->label('Ordered Items')
                    ->getStateUsing(fn (Order $record): array => $record->menuItems->map(fn ($item) => "{$item->name} (x{$item->pivot->quantity})")->toArray())
                    ->badge()
                    ->color('primary')
                    ->searchable(query: function (Builder $query, string $search): Builder {
                        return $query->whereHas('menuItems', function ($q) use ($search) {
                            $q->where('name', 'like', "%{$search}%");
                        });
                    }),
                Tables\Columns\TextColumn::make('total_price')
                    ->money('NPR')
                    ->sortable(),
                Tables\Columns\TextColumn::make('payment_method')
                    ->formatStateUsing(fn (string $state): string => ucfirst($state))
                    ->sortable(),
                Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'pending' => 'gray',
                        'preparing' => 'info',
                        'ready' => 'warning',
                        'completed' => 'success',
                        'cancelled' => 'danger',
                        default => 'gray',
                    })
                    ->formatStateUsing(fn (string $state): string => ucfirst($state))
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\Action::make('start_preparing')
                    ->label('Prepare')
                    ->color('info')
                    ->icon('heroicon-o-play')
                    ->visible(fn (Order $record) => $record->status === 'pending')
                    ->action(fn (Order $record) => $record->update(['status' => 'preparing'])),
                Tables\Actions\Action::make('mark_ready')
                    ->label('Ready')
                    ->color('warning')
                    ->icon('heroicon-o-check-circle')
                    ->visible(fn (Order $record) => $record->status === 'preparing')
                    ->action(fn (Order $record) => $record->update(['status' => 'ready'])),
                Tables\Actions\Action::make('complete')
                    ->label('Complete')
                    ->color('success')
                    ->icon('heroicon-o-check')
                    ->visible(fn (Order $record) => $record->status === 'ready')
                    ->action(fn (Order $record) => $record->update(['status' => 'completed'])),
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
            'index' => Pages\ListOrders::route('/'),
            'create' => Pages\CreateOrder::route('/create'),
            'edit' => Pages\EditOrder::route('/{record}/edit'),
        ];
    }
}

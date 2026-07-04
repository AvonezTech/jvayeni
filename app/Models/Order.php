<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'total_price',
        'status',
        'payment_method',
        'credit_paid',
        'cash_paid',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function orderItems(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    public function menuItems(): BelongsToMany
    {
        return $this->belongsToMany(MenuItem::class, 'order_items')
                    ->withPivot('quantity')
                    ->withTimestamps();
    }

    public function income(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Income::class);
    }

    protected static function booted()
    {
        static::saved(function ($order) {
            if ($order->status === 'completed') {
                if (!$order->income()->exists()) {
                    $order->income()->create([
                        'amount' => $order->total_price,
                        'payment_method' => $order->payment_method,
                        'credit_paid' => $order->credit_paid,
                        'cash_paid' => $order->cash_paid,
                    ]);
                }
            }
        });
    }
}
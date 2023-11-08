<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'status'
    ];

    //relacionamento personalizado com informaçoes
    public function order_products()
    {
        return $this->hasMany(OrderProduct::class);
    }

    public function order_products_itens()
    {
        return $this->hasMany(OrderProduct::class);
    }

    public static function queryId($where)
    {
        $order = self::where($where)->first(['id']);
        return !empty($order->id) ? $order->id : null;
    }
}

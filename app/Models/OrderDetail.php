<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;
    protected $guarded = ['id_order_details'];

    // untuk membuat nama tabel di database supaya sesuai kriteria
    protected $table = 'tbl_order_details';
    protected $primaryKey = 'id_order_details';

    // order detail memiliki 1 order saja
    public function Order()
    {
        return $this->belongsTo(Order::class, 'id_order_details', 'order_id');
    }
    public function order_detail()
    {
        return $this->hasMany(OrderDetail::class, 'order_id');
    }

    // // order detail memilki 1 paket saja
    public function Produk()
    {
        return $this->belongsTo(Produk::class);
    }
}

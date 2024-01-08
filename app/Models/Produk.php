<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_produks';
    protected $guarded = ['id_produks'];
    protected $table = 'tbl_produks';
    // protected $fillable = ['kode_produks', 'nama_produks', 'kategori_produks', 'stok_produks', 'harga_produks', 'gambar_produks', 'deskripsi_produks'];


    public function ProdukKategory()
    {
        return $this->belongsTo(ProdukKategory::class, 'kategori_produks', 'id_produk_kategories');
    }

    public function OrderDetail()
    {
        return $this->hasMany(OrderDetail::class);
    }
}

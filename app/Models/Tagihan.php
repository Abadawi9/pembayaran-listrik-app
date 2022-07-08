<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tagihan extends Model
{
    use HasFactory;
    protected $fillable = [
        'pelanggan_id',
        'tahun',
        'bulan',
        'jml_pemakaian',
        'total_bayar',
        'status',
    ];

    public function pelanggan()
    {
        return $this->belongsTo(Pelangan::class, 'pelanggan_id', 'id');
    }


    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->created_at = now();
        });

        static::updating(function ($model) {
            $model->updated_at = now();
        });
        
    }
}

<?php
namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarif extends Model
{
    use HasFactory;
    protected $fillable = [
        'daya',
        'tarif',
        'beban',
    ];

    // make function boot
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

    public function pelanggans()
    {
        return $this->hasMany(Pelangan::class, 'tarif_id', 'id');
    }
}

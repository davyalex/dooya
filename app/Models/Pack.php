<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pack extends Model
{
    use HasFactory,
    SoftDeletes,
    Sluggable;


    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }


    protected $fillable = [
        'code',
        'title',
        'slug',
        'prix',
        'prix_promo',
        'date_fin_promo',
        'stock',
        'disponibilite',
        'description',
        'promotion',
        'created_at',
        'updated_at',
        'deleted_at',
    ];


    public function category_pack(): BelongsTo
    {
        return $this->belongsTo(CategoryPack::class);
    }
}

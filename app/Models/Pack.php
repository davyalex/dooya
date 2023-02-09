<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\HasMedia;

class Pack extends Model implements HasMedia
{
    use HasFactory,
    InteractsWithMedia,
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
        'date_debut_promo',
        'date_fin_promo',
        'stock',
        'disponibilite',
        'description',
        'promotion',
        'category_pack_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];


    public function category_pack(): BelongsTo
    {
        return $this->belongsTo(CategoryPack::class);
    }
}

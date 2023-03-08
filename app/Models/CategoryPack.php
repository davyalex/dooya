<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CategoryPack extends Model
{
    use HasFactory,
    SoftDeletes,
    Sluggable;


    protected $fillable = [
        'code',
        'slug',
        'title',
        'position',
        'description',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

     //slugable
     public function sluggable(): array
     {
         return [
             'slug' => [
                 'source' => 'title'
             ]
         ];
     }

     public function packs(): HasMany
     {
         return $this->hasMany(Pack::class);
     }

     public function produits(): HasMany
     {
         return $this->hasMany(Produit::class);
     }
}

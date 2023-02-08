<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SousCategory extends Model
{
    use HasFactory,
    SoftDeletes,
    Sluggable;


    protected $fillable = [
        'code',
        'slug',
        'title',
        'description',
        'user_id',
        'category_id',
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
 


    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function categorie(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function produits(): HasMany
    {
        return $this->hasMany(Produit::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Section extends Model
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
        'slug',
        'title',
        'description',
        'user_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];


    public function produits(): BelongsToMany
    {
        return $this->belongsToMany(Produit::class, 'produit_section', 'section_id', 'produit_id')
            // ->withPivot('quantite', 'prix_unitaire')
            ->withTimestamps();
    }
    

}

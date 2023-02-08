<?php

namespace App\Models;

use Spatie\MediaLibrary\HasMedia;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Permission\Traits\HasPermissions;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Produit extends Model implements HasMedia
{
    use HasFactory,
        SoftDeletes,
        InteractsWithMedia,
        Sluggable,
        HasRoles,
        HasPermissions;


    protected $fillable = [
        'code',
        'title',
        'slug',
        'prix',
        'prix_promo',
        'date_debut_promo',
        'date_fin_promo',
        'couleur',
        'stock',
        'disponibilite',
        'description',
        'promotion',
        'user_id',
        'category_id',
        'sous_category_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];




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

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function sous_category(): BelongsTo
    {
        return $this->belongsTo(SousCategory::class, 'sous_category_id');
    }

   
    public function commandes(): BelongsToMany
    {
        return $this->belongsToMany(Commande::class, 'commande_produit', 'commande_id', 'produit_id')
        ->withPivot('quantite', 'prix_unitaire')
        ->withTimestamps();
        
    }


    public function sections(): BelongsToMany
    {
        return $this->belongsToMany(Section::class, 'produit_section', 'produit_id','section_id',)
            // ->withPivot('quantite', 'prix_unitaire')
            ->withTimestamps();
    }
}
